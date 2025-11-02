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
        <h2>Admin Dashboard</h2>
        <div class="notification-icon"><i class="bi bi-bell"></i></div>
    </div>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
                Stauts Section
            </button>

            <button class="nav-link" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="false">
                Users
            </button>

            <button class="nav-link" id="payments-tab" data-bs-toggle="tab" data-bs-target="#payments" type="button" role="tab" aria-controls="payments" aria-selected="false">
                Payments
            </button>
        </div>
    </nav>


    <div class="tab-content mt-3" id="nav-tabContent">

        <!-- Quick Stats Section -->
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header">Total Users</div>
                        <div class="card-body">
                            <h5 class="card-title">{{count($users)}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header">Total Income</div>
                        <div class="card-body">
                            <h5 class="card-title">₹{{ number_format($payments->sum('amount'), 2) }}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- actions -->
            <div class="card mb-4">
                <div class="card-header">Admin Details</div>
                <div class="card-body">
                    <p><strong>User ID:</strong> {{ Auth::user()->id }}</p>
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Phone Number:</strong> {{ Auth::user()->phone }}</p>
                </div>
            </div>
        </div>

        <!-- users -->
        <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab" tabindex="0">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Users</h4>
                    <button class="btn btn-primary pt-2 pb-2 rounded" data-bs-toggle="modal" data-bs-target="#AddUser">Add User</button>
                    @include('partials.admin.add-user')
                </div>  
                @if($users->isEmpty())
                    <h5 class="text-center mt-5">No users found!</h5>
                @else
                    <table class="mt-3" style="width: 100%; border-collapse: collapse; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                        <thead style="background-color: #007BFF; color: white; text-align: left;">
                            <tr>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">id</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">name</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">email</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">phone</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">user role</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Created At</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Updated At</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd; text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$user->id}}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$user->name}}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$user->email}}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$user->phone}}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$user->userroll}}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $user->created_at->format('d-m-Y (h:i a)') }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $user->updated_at->format('d-m-Y (h:i a)') }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd; text-align: center;">                                 
                                    <button style="padding: 5px 10px; background-color: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px;" data-bs-toggle="modal" data-bs-target="#editUser{{ $user->id }}">Update</button>
                                    @include('partials.admin.edit-user')
                                    <button style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; cursor: pointer; border-radius: 4px; margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#deleteUser{{ $user->id }}">Delete</button>
                                    @include('partials.admin.delete-user')
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
    </div>
</div>


@endsection