<div class="modal fade" id="viewBill" tabindex="-1" aria-labelledby="viewBillLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewBillModalLabel">Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="invoiceContent">
                <!-- Invoice Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <img src="{{ asset('images/logo.png')}}" alt="Company Logo" class="img-fluid" style="max-height: 80px;">
                    </div>
                    <div class="text-end">
                        <h4 class="text-uppercase">Invoice</h4>
                        <p class="mb-0"><strong>#INV{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</strong></p>
                        <p class="text-muted">Date: {{ now()->format('d/m/Y') }}</p>
                    </div>
                </div>

                <!-- Billing Details -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">From:</h6>
                        <p class="mb-0 text-dark"><strong>IPMS</strong></p>
                        <p class='text-dark'>ipms.team@gmail.com</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h6 class="text-muted">To:</h6>
                        <p class="mb-0 text-dark"><strong>{{ $payment->user->name }}</strong></p>
                        <p class="mb-0 text-dark">{{ $payment->user->email }}</p>
                        <p class="mb-0 text-dark">Property: {{ $payment->property->name }}</p>
                        <p class="mb-0 text-dark">Transaction ID: {{ $payment->transaction_id }}</p>
                        <p class="text-dark">Payment Via: VISA Card</p>
                    </div>
                </div>

                <!-- Invoice Table -->
                <div class="table-responsive">
                    <table class="table table-bordered text-dark">
                        <thead class="table-light">
                            <tr>
                                <th>Property</th>
                                <th class="text-center">Cost</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Property Payment - {{ $payment->property->name }}</td>
                                <td class="text-center">₹{{ number_format($payment->amount, 2) }}</td>
                                <td class="text-center">1</td>
                                <td class="text-end">₹{{ number_format($payment->amount, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Summary -->
                <div class="row mt-3">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <table class="table table-borderless text-dark">
                            <tr>
                                <td class="text-end"><strong>Subtotal:</strong></td>
                                <td class="text-end">₹{{ number_format($payment->amount, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="text-end"><strong>Tax (10%):</strong></td>
                                <td class="text-end">₹{{ number_format($payment->amount * 0.10, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="text-end"><strong>Total:</strong></td>
                                <td class="text-end"><strong>₹{{ number_format($payment->amount * 1.10, 2) }}</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer no-print">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times-circle"></i> Close
                </button>
                <button type="button" class="btn btn-primary" id="printButton">
                    <i class="fas fa-print"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Print Styling -->
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #invoiceContent, #invoiceContent * {
            visibility: visible;
        }
        #invoiceContent {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .no-print {
            display: none !important;
        }
    }
</style>

<!-- Print Function -->
<script>
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });
</script>