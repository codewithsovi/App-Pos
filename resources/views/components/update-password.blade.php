<!-- Modal Ubah Password-->
<div class="modal fade" id="update-password" tabindex="-1" aria-labelledby="update-passwordLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form action="{{ route('user.update_password', auth()->user()->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group my-1">
                            <label for="current_password">Password Lama</label>
                            <input type="password" name="current_password" id="current_password" class="form-control">

                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group my-1">
                            <label for="new_password">Password Baru</label>
                            <input type="password" name="new_password" id="new_password" class="form-control">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group my-1">
                            <label for="new_password_confirmation">Validasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                class="form-control">
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
</div>
