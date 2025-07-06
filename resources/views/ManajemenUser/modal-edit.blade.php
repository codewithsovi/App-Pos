{{-- modal edit --}}
<div class="modal fade" id="modal-edit-{{ $user->id }}">
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group my-1">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" required class="form-control" value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="form-group my-1">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" required class="form-control" value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="form-group my-1">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="custom-select rounded-0" id="role" name="role" value="{{ old('role', $user->role) }}">
                            <option> </option>
                            <option>Admin</option>
                            <option>Kasir</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </form>
    <!-- /.modal-dialog -->
</div>
