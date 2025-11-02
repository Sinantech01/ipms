

<div class="modal fade" id="EditComplaint{{ $complaint->id }}" tabindex="-1" aria-labelledby="EditComplaintLabel{{ $complaint->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditComplaintModalLabel{{ $complaint->id }}">Edit Complaint</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('customer.edit-complaint') }}"> 
                @csrf
                <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="complaint" class="form-label text-start">Complaint</label>
                        <textarea name="complaint" class="form-control" id="complaint" placeholder="Enter Complaint" rows="4" required>{{ $complaint->complaint }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
