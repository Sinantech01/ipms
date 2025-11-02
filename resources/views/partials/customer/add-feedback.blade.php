

<div class="modal fade" id="AddFeedback" tabindex="-1" aria-labelledby="AddFeedbackLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddFeedbackModalLabel">Add Feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('customer.add-feedback') }}"> 
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="feedback" class="form-label">Feedback</label>
                        <textarea name="feedback" class="form-control" id="feedback" placeholder="Enter Feedback" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Feedback</button>
                </div>
            </form>
        </div>
    </div>
</div>
