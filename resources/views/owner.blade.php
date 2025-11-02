@extends('layouts.app')

@section('content')

<style>
    .main-content {
        margin-top: 8rem;
        margin-bottom: 2rem;
        min-height: 50vh
    }

    .sidebar {
        background-color: #f8f9fa;
        padding: 20px;
        min-height: 100vh;
    }

    .sidebar .nav-link {
        font-weight: 600;
    }

    .main-content {
        padding: 20px;
    }

    .card-header {
        background-color: #f1f1f1;
    }

    .nav-link.active {
        background-color: #0d6efd;
        color: white;
    }

    .notification-icon {
        font-size: 1.5rem;
        color: #0d6efd;
    }
</style>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


<div class="main-content container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Property Owner Dashboard</h2>
        <div class="notification-icon"><i class="bi bi-bell"></i></div>
    </div>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
                Stats Section
            </button>

            <button class="nav-link" id="propertys-tab" data-bs-toggle="tab" data-bs-target="#propertys" type="button" role="tab" aria-controls="propertys" aria-selected="false">
                Propertys
            </button>

            <button class="nav-link" id="payments-tab" data-bs-toggle="tab" data-bs-target="#payments" type="button" role="tab" aria-controls="payments" aria-selected="false">
                Payments
            </button>

            <button class="nav-link" id="complaints-tab" data-bs-toggle="tab" data-bs-target="#complaints" type="button" role="tab" aria-controls="complaints" aria-selected="false">
                Complaints
            </button>

            <button class="nav-link" id="feedbacks-tab" data-bs-toggle="tab" data-bs-target="#feedbacks" type="button" role="tab" aria-controls="feedbacks" aria-selected="false">
                Feedbacks
            </button>
        </div>
    </nav>


    <div class="tab-content mt-3" id="nav-tabContent">

        <!-- Quick Stats Section -->
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-header">Total Properties</div>
                        <div class="card-body">
                            <h5 class="card-title">{{count($propertys)}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-header">Income This Month</div>
                        <div class="card-body">
                            <h5 class="card-title">₹{{ number_format($monthIncome, 2) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-header">Total Income</div>
                        <div class="card-body">
                            <h5 class="card-title">₹{{ number_format($payments->sum('amount'), 2) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-header">Active Bookings</div>
                        <div class="card-body">
                            <h5 class="card-title">{{count($payments)}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-header">Active Complaints</div>
                        <div class="card-body">
                            <h5 class="card-title">{{count($complaints)}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-header">Total Feedbacks</div>
                        <div class="card-body">
                            <h5 class="card-title">{{count($feedbacks)}}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- actions -->
            <div class="card mb-4">
                <div class="card-header">Owner Details</div>
                <div class="card-body">
                    <p><strong>User ID:</strong> {{ Auth::user()->id }}</p>
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Phone Number:</strong> {{ Auth::user()->phone }}</p>
                </div>
            </div>
        </div>

        <!-- property -->
        <div class="tab-pane fade" id="propertys" role="tabpanel" aria-labelledby="propertys-tab" tabindex="0">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Propertys</h4>
                    <button class="btn btn-primary pt-2 pb-2 rounded" data-bs-toggle="modal" data-bs-target="#AddProperty">Add Property</button>
                    @include('partials.owner.add-property')
                </div>  
                @if($propertys->isEmpty())
                    <h5 class="text-center mt-5">No Propertys found!</h5>
                @else
                    <table class="mt-3" style="width: 100%; border-collapse: collapse; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                        <thead style="background-color: #007BFF; color: white; text-align: left;">
                            <tr>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Property</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Rent</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Bookings</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Adress</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Added At</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Updated At</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd; text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($propertys as $property)
                            <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$property->name}}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$property->rent}}₹</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$property->payment_count}}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$property->address}}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $property->created_at->format('d-m-Y (h:i a)') }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $property->updated_at->format('d-m-Y (h:i a)') }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd; text-align: center;">                                 
                                    <button style="padding: 5px 10px; background-color: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px;" data-bs-toggle="modal" data-bs-target="#editProperty{{ $property->id }}">Update</button>
                                    @include('partials.owner.edit-property')
                                    @if($property->payment_count==0)
                                        <button style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; cursor: pointer; border-radius: 4px; margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#deleteProperty{{ $property->id }}">Delete</button>
                                        @include('partials.owner.delete-property')
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- payments -->
        <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab" tabindex="0">
            <div class="container mt-5">
                @if($payments->isEmpty())
                    <h5 class="text-center mt-5">No Propertys found!</h5>
                @else
                    <table class="mt-3" style="width: 100%; border-collapse: collapse; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                        <thead style="background-color:rgb(91, 255, 73); color: black; text-align: left;">
                            <tr>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Customer</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Property</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Transaction ID</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Amount</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Buyed At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$payment->user->name}}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$payment->property->name}}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$payment->transaction_id}}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$payment->amount}}₹</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $payment->created_at->format('d-m-Y (h:i a)') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- complaint -->
        <div class="tab-pane fade" id="complaints" role="tabpanel" aria-labelledby="complaints-tab" tabindex="0">
            <div class="container mt-5">
                @if($complaints->isEmpty())
                    <h5 class="text-center mt-5">No complaints found!</h5>
                @else
                    <table class="mt-3" style="width: 100%; border-collapse: collapse; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                        <thead style="background-color:rgb(255, 111, 79); color: white; text-align: left;">
                            <tr>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Customer</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Complaint</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Property</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Status</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Submitted At</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Updated At</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd; text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($complaints as $complaint)
                            <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $complaint->user->name }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $complaint->complaint }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $complaint->property->name }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;"><b class="{{ $complaint->status == 'pending' ? 'text-warning' : 'text-success' }}">{{ $complaint->status }}</b></td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $complaint->created_at->format('d-m-Y (h:i a)') }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $complaint->updated_at->format('d-m-Y (h:i a)') }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd; text-align: center;">
                                    @if($complaint->status == 'pending')
                                        <button style="padding: 5px 10px; background-color: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px;" data-bs-toggle="modal" data-bs-target="#assignWork{{ $complaint->id }}">assign work</button>
                                        @include('partials.owner.assign-work')
                                    @else
                                        <b class='text-success'>completed</b>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- feedback -->
        <div class="tab-pane fade" id="feedbacks" role="tabpanel" aria-labelledby="feedbacks-tab" tabindex="0">
            <div class="container mt-5">
                @if($complaints->isEmpty())
                    <h5 class="text-center mt-5">No feedbacks found!</h5>
                @else
                    <table class="mt-3" style="width: 100%; border-collapse: collapse; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                        <thead style="background-color:rgb(85, 95, 235); color: white; text-align: left;">
                            <tr>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Customer</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Feedback</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Property</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Submitted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feedbacks as $feedback)
                            <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $complaint->user->name }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $feedback->feedback }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $feedback->property->name }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $feedback->created_at->format('d-m-Y (h:i a)') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

    </div>
</div>


@endsection