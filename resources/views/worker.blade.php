@extends('layouts.app')

@section('content')

<div class="container" style='margin-top: 8rem; margin-bottom: 3rem; min-height: 50vh'>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
        <button class="nav-link" id="works-tab" data-bs-toggle="tab" data-bs-target="#works" type="button" role="tab" aria-controls="works" aria-selected="false">My Works</button>
    </div>

    <div class="tab-content" id="nav-tabContent">
        <!-- profile Tab -->
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Employee Details</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>User ID:</strong> {{ Auth::user()->id }}</p>
                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Phone Number:</strong> {{ Auth::user()->phone }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- works -->
        <div class="tab-pane fade" id="works" role="tabpanel" aria-labelledby="works-tab" tabindex="0">
            <div class="container mt-5">
                @if($works->isEmpty())
                    <h5 class="text-center mt-5">No works found!</h5>
                @else
                    <table class="mt-3" style="width: 100%; border-collapse: collapse; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                        <thead style="background-color:rgb(255, 111, 79); color: white; text-align: left;">
                            <tr>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Customer</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Complaint</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Property</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Status</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Submitted At</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd;">Assinged At</th>
                                <th style="padding: 12px 15px; border: 1px solid #ddd; text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($works as $work)
                            <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $work->complaint->user->name }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $work->complaint->complaint }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $work->complaint->property->name }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;"><b class="{{ $work->complaint->status == 'pending' ? 'text-warning' : 'text-success' }}">{{ $work->complaint->status }}</b></td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $work->complaint->created_at->format('d-m-Y (h:i a)') }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd;">{{ $work->created_at->format('d-m-Y (h:i a)') }}</td>
                                <td style="padding: 12px 15px; border: 1px solid #ddd; text-align: center;">
                                    @if($work->complaint->status == 'pending')
                                        <form method="POST" action="{{ route('worker.work-completed') }}"> 
                                            @csrf
                                            <input type="hidden" name="complaint_id" value="{{ $work->complaint->id }}">
                                            <button type='submit' style="padding: 5px 10px; background-color: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px;">work completed</button>
                                        </form>
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

    </div>
</div>


<!-- Bootstrap 5.3 JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {$('#complaintsTable').DataTable();});</script>

@endsection
