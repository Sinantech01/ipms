

<div class="modal fade" id="deleteComplaint{{ $complaint->id }}" tabindex="-1" aria-labelledby="deleteComplaintLabel{{ $complaint->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteComplaintModalLabel{{ $complaint->id }}">Delete Complaint</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('customer.delete-complaint') }}"> 
                @csrf
                <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
                <div class="modal-body">
                    <h4 class="text-danger">Are You Sure You Want To Delete?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
