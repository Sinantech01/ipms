@extends('layouts.app')

@section('content')



<style>
    .main-content {
        margin-top: 8rem;
        margin-bottom: 2rem;
        min-height: 50vh
    }

    #paymentsTable {
        width: 100%;
        border-collapse: collapse;
    }

    #paymentsTable th,
    #paymentsTable td {
        padding: 8px;
        text-align: left;
    }

    #paymentsTable thead {
        background-color: #f2f2f2;
    }

    #paymentsTable th {
        font-weight: bold;
    }
</style>
    
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


<div class="main-content container">

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
                My Profile
            </button>

            <button class="nav-link" id="property-tab" data-bs-toggle="tab" data-bs-target="#property" type="button" role="tab" aria-controls="property" aria-selected="false">
                My Property
            </button>

            <button class="nav-link" id="complaints-tab" data-bs-toggle="tab" data-bs-target="#complaints" type="button" role="tab" aria-controls="complaints" aria-selected="false">
                Complaints
            </button>

            <button class="nav-link" id="feedbacks-tab" data-bs-toggle="tab" data-bs-target="#feedbacks" type="button" role="tab" aria-controls="feedbacks" aria-selected="false">
                Feedbacks
            </button>
        </div>
    </nav>


    <div class="tab-content" id="nav-tabContent">
        <!-- profile -->
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <div class="container mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4 class="text-white">Details</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Customer ID:</strong> {{ Auth::user()->id }}</p>
                            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p><strong>Number:</strong> {{ Auth::user()->phone }}</p>
                            <p><strong>Created At:</strong> {{ Auth::user()->created_at->format('d-m-Y (h:i a)') }}</p>
                            <p><strong>Last Update:</strong> {{ Auth::user()->updated_at->format('d-m-Y (h:i a)') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- property -->
        <div class="tab-pane fade" id="property" role="tabpanel" aria-labelledby="property-tab" tabindex="0">
            <div class="container mt-5">
                <div class="col-md-12">
                    <div class="card">
                        @if(isset($payment))
                            <div class="d-flex justify-content-between align-items-center card-header bg-primary text-white">
                                <h4 class="text-white">My Property</h4>
                                <button class="btn btn-success pt-2 pb-2 rounded" data-bs-toggle="modal" data-bs-target="#viewBill">View Bill</button>
                                @include('partials.customer.view-bill')
                            </div>   
                            <div class="card-body">
                                <p><strong>Payment ID:</strong> {{ $payment->id }}</p>
                                <p><strong>Property Name:</strong> {{ $payment->property->name }}</p>
                                <p><strong>Total Amount:</strong> {{ number_format($payment->amount, 2) }}₹</p>
                                <p><strong>Transaction ID:</strong> {{ $payment->transaction_id }}</p>
                                <p><strong>Date:</strong> {{ $payment->created_at->format('d-m-Y (h:i a)') }}</p>
                            </div>
                        @else
                            <div class="card-body">
                                <p>You Dont Have Any Property!</p>   
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- complaint -->
        <div class="tab-pane fade" id="complaints" role="tabpanel" aria-labelledby="complaints-tab" tabindex="0">
            <div class="container mt-5">
                @if(isset($payment))
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Your Complaints</h4>
                        <button class="btn btn-primary pt-2 pb-2 rounded" data-bs-toggle="modal" data-bs-target="#AddComplaint">Make New Complaint</button>
                        @include('partials.customer.add-complaint')
                    </div>   
                    @if(isset($complaints) && $complaints->isEmpty())
                        <h5 class="text-center mt-5">No complaints found!</h5>
                    @else
                        <table class="mt-3" style="width: 100%; border-collapse: collapse; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                            <thead style="background-color: #007BFF; color: white; text-align: left;">
                                <tr>
                                    <th style="padding: 12px 15px; border: 1px solid #ddd;">Complaint</th>
                                    <th style="padding: 12px 15px; border: 1px solid #ddd;">Property</th>
                                    <th style="padding: 12px 15px; border: 1px solid #ddd;">Status</th>
                                    <th style="padding: 12px 15px; border: 1px solid #ddd;">Submitted At</th>
                                    <th style="padding: 12px 15px; border: 1px solid #ddd;">Updated At</th>
                                    <th style="padding: 12px 15px; border: 1px solid #ddd; text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($complaints))
                                    @foreach($complaints as $complaint)
                                    <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                                        <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $complaint->complaint }}</td>
                                        <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $complaint->property->name }}</td>
                                        <td style="padding: 12px 15px; border: 1px solid #ddd;"><b class="{{ $complaint->status == 'pending' ? 'text-warning' : 'text-success' }}">{{ $complaint->status }}</b></td>
                                        <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $complaint->created_at->format('d-m-Y (h:i a)') }}</td>
                                        <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $complaint->updated_at->format('d-m-Y (h:i a)') }}</td>
                                        <td style="padding: 12px 15px; border: 1px solid #ddd; text-align: center;">
                                            <button style="padding: 5px 10px; background-color: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px;" data-bs-toggle="modal" data-bs-target="#EditComplaint{{ $complaint->id }}">Update</button>
                                            @include('partials.customer.edit-complaint')
                                            <button style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; cursor: pointer; border-radius: 4px; margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#deleteComplaint{{ $complaint->id }}">Delete</button>
                                            @include('partials.customer.delete-complaint')
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    @endif
                @else
                    <h4 class="text-center mt-5">You Dont Have Any Property!</h4>
                @endif
            </div>
        </div>

        <!-- feedback -->
        <div class="tab-pane fade" id="feedbacks" role="tabpanel" aria-labelledby="feedbacks-tab" tabindex="0">
            <div class="container mt-5">
                @if(isset($payment))
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Your Feedback</h4>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddFeedback">Add Feedback</button>
                        @include('partials.customer.add-feedback')
                    </div>   
                    @if(isset($feedbacks) && $complaints->isEmpty())
                        <h5 class="text-center mt-5">No feedbacks found!</h5>
                    @else
                        <table class="mt-3" style="width: 100%; border-collapse: collapse; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                            <thead style="background-color: #007BFF; color: white; text-align: left;">
                                <tr>
                                    <th style="padding: 12px 15px; border: 1px solid #ddd;">Feedback</th>
                                    <th style="padding: 12px 15px; border: 1px solid #ddd;">Property</th>
                                    <th style="padding: 12px 15px; border: 1px solid #ddd;">Submitted At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($feedbacks))
                                    @foreach($feedbacks as $feedback)
                                    <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                                        <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $feedback->feedback }}</td>
                                        <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $feedback->property->name }}</td>
                                        <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $feedback->created_at->format('d-m-Y (h:i a)') }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    @endif
                @else
                    <h4 class="text-center mt-5">You Dont Have Any Property!</h4>
                @endif
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap 5.3 JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#paymentsTable').DataTable({
            responsive: true,  
            order: [[5, 'desc']], 
            pageLength: 10,  
            language: {search: "Filter records:",   lengthMenu: "Show _MENU_ records per page",   zeroRecords: "No matching records found"}
        });
    });
</script>

@endsection
    