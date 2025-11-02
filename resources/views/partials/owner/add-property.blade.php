

<div class="modal fade" id="AddProperty" tabindex="-1" aria-labelledby="AddPropertyLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddPropertyModalLabel">Add New Property</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('owner.add_property') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="img">Choose Image</label>
                        <input type="file" name="img" id="img" class="form-control h-auto ps-2" required>
                    </div>
                    <div class="mb-3">
                        <label for="propertyName" class="form-label">Property Name</label>
                        <input type="text" name='name' class="form-control" id="propertyName" placeholder="Enter property name" required>
                    </div>
                    <div class="mb-3">
                        <label for="propertyAddress" class="form-label">Address</label>
                        <input type="text" name='address' class="form-control" id="propertyAddress" placeholder="Enter property address" required>
                    </div>
                    <div class="mb-3">
                        <label for="propertyRent" class="form-label">Rent Amount</label>
                        <input type="number" name='rent' class="form-control" id="propertyRent" placeholder="Enter rent amount" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Property</button>
                </div>
            </form>
        </div>
    </div>
</div>
