

<div class="modal fade" id="AddUser" tabindex="-1" aria-labelledby="AddUserlb" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddUserlb">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.add_user') }}"> 
                @csrf
                <div class="modal-body">
                    <div class="mb-3 text-start">
                        <label class="name">name</label>
                        <input type="text" name="name" id="name" class="form-control h-auto ps-2" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">email</label>
                        <input type="email" name='email' class="form-control" id="email" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="phone" class="form-label">phone</label>
                        <input type="number" name='phone' class="form-control" id="phone" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="userroll" class="form-label">phone</label>
                        <select name="userroll" id="userroll" class="form-select" required>
                            <option value="customer">customer</option>
                            <option value="worker">worker</option>
                            <option value="owner">owner</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">password</label>
                        <input type="password" name='password' class="form-control" id="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>
