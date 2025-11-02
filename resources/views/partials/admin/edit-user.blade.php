

<div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1" aria-labelledby="editUser{{ $user->id }}lb" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUser{{ $user->id }}lb">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.edit_user') }}"> 
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="modal-body">
                    <div class="mb-3 text-start">
                        <label class="name">name</label>
                        <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control h-auto ps-2" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">email</label>
                        <input type="email" name='email' value="{{$user->email}}" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="phone" class="form-label">phone</label>
                        <input type="number" name='phone' value="{{$user->phone}}" class="form-control" id="phone" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="userroll" class="form-label">phone</label>
                        <select name="userroll" id="userroll" class="form-select" required>
                            <option value="customer" @if($user->userroll == 'customer') selected @endif>customer</option>
                            <option value="worker" @if($user->userroll == 'worker') selected @endif>worker</option>
                            <option value="owner" @if($user->userroll == 'owner') selected @endif>owner</option>
                            <option value="admin" @if($user->userroll == 'admin') selected @endif>admin</option>
                        </select>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">password</label>
                        <input type="password" name='password' class="form-control" id="password">
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
