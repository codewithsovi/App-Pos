@extends('layouts.app')

@section('header_content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('master-data.kategori.index') }}">Back</a></li>
                    <li class="breadcrumb-item active">Kategori</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kategori {{ $kategoris->nama_kategori }} </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            @include('components.alert')

                            <div class="d-flex justify-content-end mb-2">
                                @include('MasterData.produk.modal-create')
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>SKU</th>
                                        <th>Produk</th>
                                        <th>Harga Jual</th>
                                        <th>Harga Beli Pokok</th>
                                        <th>Stock</th>
                                        <th>Stock Minimal</th>
                                        <th>Atatus</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris->produks as $index => $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->sku }}</td>
                                            <td>{{ $produk->nama_produk }}</td>
                                            <td>Rp. {{ number_format($produk->harga_jual) }}</td>
                                            <td>Rp. {{ number_format($produk->harga_beli_pokok) }}</td>
                                            <td>{{ $produk->stock }}</td>
                                            <td>{{ $produk->stock_min }}</td>
                                            <td>
                                                <p class="badge {{ $produk->is_active ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $produk->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                                </p>
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modal-edit-{{ $produk->id }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <form
                                                    action="{{ route('master-data.produk.destroy', [$produk->id, $kategoris->id]) }}"
                                                    method="POST" style="display: inline-block;"
                                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            @include('MasterData.produk.modal-edit')
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
