<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
    Tambah Produk
</button>

{{-- modal create --}}
<div class="modal fade" id="modal-tambah">
    <form action="" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Produk - </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control">
                    </div>
                    <div>
                        <label for="sku">SKU</label>
                        <input type="text" name="sku" id="sku" class="form-control">
                    </div>
                    <div>
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" name="harga_jual" id="harga_jual" class="form-control">
                    </div>
                    <div>
                        <label for="harga_beli_pokok">Harga Beli Pokok</label>
                        <input type="number" name="harga_beli_pokok" id="harga_beli_pokok" class="form-control">
                    </div>
                    <div>
                        <label for="stock_minimal">Stock Minimal</label>
                        <input type="number" name="stock_minimal" id="stock_minimal" class="form-control">
                    </div>
                    <div>
                        <label for="harga_beli_pokok">Harga Beli Pokok</label>
                        <input type="number" name="harga_beli_pokok" id="harga_beli_pokok" class="form-control">
                    </div>
                     <div>
                        <label for="is_active">Status</label>
                        <input type="number" name="is_active" id="is_active" class="form-control">
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
