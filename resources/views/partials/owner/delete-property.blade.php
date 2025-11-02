

<div class="modal fade" id="deleteProperty{{ $property->id }}" tabindex="-1" aria-labelledby="deletePropertyLabel{{ $property->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePropertyModalLabel{{ $property->id }}">Delete Property</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('owner.delete_property') }}" enctype="multipart/form-data"> 
                @csrf
                <input type="hidden" name="property_id" value="{{ $property->id }}">
                <div class="modal-body">
                    <h4 class="text-danger">Are You Sure You Want To Delete?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
