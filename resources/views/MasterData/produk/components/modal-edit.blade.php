{{-- modal edit --}}
<div class="modal fade" id="modal-edit-{{ $produk->id }}">
    <form action="{{ route('master-data.produk.update',  [$produk->id, $kategoris->id]) }}" method="POST">
        @csrf
        @method('PUT')

      <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Produk - Kategori {{ $kategoris->nama_kategori }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group my-1">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ old('nama_produk', $produk->nama_produk) }}">
                    </div>
                    <div class="form-group my-1">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" name="harga_jual" id="harga_jual" class="form-control" value="{{ old('harga_jual', $produk->harga_jual) }}">
                    </div>
                    <div class="form-group my-1">
                        <label for="harga_beli_pokok">Harga Beli Pokok</label>
                        <input type="number" name="harga_beli_pokok" id="harga_beli_pokok" class="form-control" value="{{ old('harga_beli_pokok', $produk->harga_beli_pokok) }}">
                    </div>
                     <div class="form-group my-1">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $produk->stock) }}">
                    </div>
                    <div class="form-group my-1">
                        <label for="stock_min">Stock Minimal</label>
                        <input type="number" name="stock_min" id="stock_min" class="form-control" value="{{ old('stock_min', $produk->stock_min) }}">
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
