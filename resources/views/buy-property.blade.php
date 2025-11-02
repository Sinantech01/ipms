@extends('layouts.app')

@section('content')
<style>
    body { background-color: #f8f9fa; }
    .main-container { margin-top: 6rem; margin-bottom: 2rem; }
    .payment-card { margin-top: 50px; }
    #card-element { border: 1px solid #ced4da; padding: 10px; border-radius: 5px; }
    #card-errors { color: red; margin-top: 5px; }
</style>

<div class="container main-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card payment-card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Complete Your Payment</h4>
                </div>
                <div class="card-body">
                    <form id="payment-form">
                        @csrf
                        <input type="hidden" name="property_id" id="property_id" value="{{ $property->id }}" required>
                        
                        <div class="mb-3">
                            <label for="amount" class="form-label">Total Amount</label>
                            <input type="number" name="amount" id="amount" class="form-control" value="{{ $property->rent }}" readonly required>
                        </div>

                        <div class="mb-3">
                            <label for="card-element" class="form-label">Card Details</label>
                            <div id="card-element"></div>
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <button id="submit-button" class="btn btn-success w-100">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Loader Modal -->
<div class="modal fade" id="loaderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-body">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-3">Processing your payment, please wait...</p>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">Payment Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Thank you for your payment! Your transaction was successful.</p>
                <p><strong>Transaction Details:</strong></p>
                <p id="transaction-details"></p>
            </div>
            <div class="modal-footer">
                <a href="/customer" class="btn btn-secondary">Close</a>
            </div>
        </div>
    </div>
</div>

<!-- Stripe JS -->
<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        const elements = stripe.elements();
        const cardElement = elements.create("card");
        cardElement.mount("#card-element");

        const form = document.getElementById("payment-form");
        form.addEventListener("submit", async function (e) {
            e.preventDefault();

            // Show loader modal
            const loaderModal = new bootstrap.Modal(document.getElementById("loaderModal"));
            loaderModal.show();

            const { token, error } = await stripe.createToken(cardElement);

            if (error) {
                loaderModal.hide(); // Hide loader if there's an error
                document.getElementById("card-errors").textContent = error.message;
            } else {
                const property_id = document.getElementById("property_id").value;
                const amount = document.getElementById("amount").value;

                fetch("{{ route('customer.book-property') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        token: token.id,
                        property_id: property_id,
                        amount: amount,
                    }),
                })
                .then((response) => response.json())
                .then((data) => {
                    loaderModal.hide();

                    if (data.success) {
                        document.getElementById("transaction-details").innerText = `Amount: ₹${amount}\nTransaction ID: ${data.transaction_id}`;
                        const successModal = new bootstrap.Modal(document.getElementById("successModal"));
                        successModal.show();
                    } else {
                        document.getElementById("card-errors").textContent = data.message;
                    }
                })
                .catch((error) => {
                    loaderModal.hide();
                    console.error("Payment process failed:", error);
                });
            }
        });
    });
</script>
@endsection
