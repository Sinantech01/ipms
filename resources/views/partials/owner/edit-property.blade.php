

<div class="modal fade" id="editProperty{{ $property->id }}" tabindex="-1" aria-labelledby="editPropertyLabel{{ $property->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPropertyModalLabel{{ $property->id }}">Edit New Property</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('owner.edit_property') }}" enctype="multipart/form-data"> 
                @csrf
                <input type="hidden" name="property_id" value="{{ $property->id }}">
                <div class="modal-body">
                    <div class="mb-3 text-start">
                        <label class="img" class="form-label text-start">Choose Image</label>
                        <input type="file" name="img" id="img" class="form-control h-auto ps-2">
                    </div>
                    <div class="mb-3 text-start">          
                        <label for="propertyName" class="form-label text-start">Property Name</label>
                        <input type="text" name='name' value="{{ $property->name }}" class="form-control" id="propertyName" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="propertyAddress" class="form-label text-start">Address</label>
                        <input type="text" name='address' value="{{ $property->address }}" class="form-control" id="propertyAddress" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="propertyRent" class="form-label text-start">Rent Amount</label>
                        <input type="number" name='rent' value="{{ $property->rent }}" class="form-control" id="propertyRent" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Property</button>
                </div>
            </form>
        </div>
    </div>
</div>
