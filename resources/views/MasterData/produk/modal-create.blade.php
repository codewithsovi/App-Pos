<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
    Tambah Produk
</button>

{{-- modal create --}}
<div class="modal fade" id="modal-tambah">
    <form action="{{ route('master-data.produk.store', $kategoris->id) }}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Produk - {{ $kategoris->nama_kategori }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group my-1">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk" required class="form-control">
                    </div>
                    <div class="form-group my-1">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" name="harga_jual" id="harga_jual" required class="form-control">
                    </div>
                    <div class="form-group my-1">
                        <label for="harga_beli_pokok">Harga Beli Pokok</label>
                        <input type="number" name="harga_beli_pokok" id="harga_beli_pokok" required class="form-control">
                    </div>
                     <div class="form-group my-1">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" required class="form-control">
                    </div>
                    <div class="form-group my-1">
                        <label for="stock_min">Stock Minimal</label>
                        <input type="number" name="stock_min" required id="stock_min" class="form-control">
                    </div>
                     <div class="form-group my-1 d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <label for="is_active"  class="mr-3">Produk Aktif?</label>
                            <input type="checkbox" name="is_active" id="is_active">
                        </div>
                         <small class="text-secondary">Jika Aktif maka produk akan ditampilkan di halaman kasir</small>
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
