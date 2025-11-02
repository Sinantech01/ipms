<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Module</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .module-container {
            max-width: 800px;
            margin: 50px auto;
        }
    </style>
</head>

<body>

    <div class="container module-container">
        <h2 class="text-center">Maintenance Module</h2>

        <!-- Form for entering maintenance data -->
        <form id="maintenanceForm">
            <div class="mb-3">
                <label for="payment" class="form-label">Payment Amount</label>
                <input type="number" class="form-control" id="payment" placeholder="Enter payment amount" required>
            </div>

            <div class="mb-3">
                <label for="issueReport" class="form-label">Issue Report</label>
                <textarea class="form-control" id="issueReport" rows="3" placeholder="Describe the maintenance issue" required></textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="notApplicable">
                <label class="form-check-label" for="notApplicable">Not Applicable</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <hr>

        <!-- Display the entered maintenance information -->
        <h4>Current Maintenance Information</h4>
        <div id="maintenanceInfo">
            <p><strong>Payment:</strong> $<span id="displayPayment">0.00</span></p>
            <p><strong>Issue Report:</strong> <span id="displayIssueReport">No issues reported.</span></p>
            <p><strong>Not Applicable:</strong> <span id="displayNotApplicable">No</span></p>
        </div>
    </div>

    <!-- Bootstrap 5.3 JS & Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        // JavaScript to handle form submission and display data dynamically
        document.getElementById('maintenanceForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from refreshing the page

            // Get values from the form
            const paymentAmount = parseFloat(document.getElementById('payment').value) || 0;
            const issueReport = document.getElementById('issueReport').value.trim() || "No issues reported.";
            const isNotApplicable = document.getElementById('notApplicable').checked;

            // Display payment
            document.getElementById('displayPayment').textContent = paymentAmount.toFixed(2);

            // Display issue report
            document.getElementById('displayIssueReport').textContent = issueReport;

            // Display "Not Applicable" status
            document.getElementById('displayNotApplicable').textContent = isNotApplicable ? "Yes" : "No";

            // Optionally, clear form inputs after submission
            document.getElementById('maintenanceForm').reset();
        });
    </script>

</body>

</html>
