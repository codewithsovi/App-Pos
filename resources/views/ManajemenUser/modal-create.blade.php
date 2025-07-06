<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
    Tambah User
</button>

{{-- modal create --}}
<div class="modal fade" id="modal-tambah">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group my-1">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" required class="form-control">
                    </div>
                    <div class="form-group my-1">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required class="form-control">
                    </div>
                    <div class="form-group my-1">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="custom-select rounded-0" id="role" name="role">
                            <option> </option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
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
