

<div class="modal fade" id="AddComplaint" tabindex="-1" aria-labelledby="AddComplaintLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddComplaintModalLabel">Add Complaint</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('customer.add-complaint') }}"> 
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="complaint" class="form-label">Complaint</label>
                        <textarea name="complaint" class="form-control" id="complaint" placeholder="Enter Complaint" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Complaint</button>
                </div>
            </form>
        </div>
    </div>
</div>
