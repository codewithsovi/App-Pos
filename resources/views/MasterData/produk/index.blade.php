@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Produk - {{ $kategoris->nama_kategori }} </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            @include('components.alert')

                            <div class="d-flex justify-content-end mb-2">
                                @include('MasterData.produk.components.modal-create')
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
                                            <td>{{ $produk->is_active }}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modal-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a href="{{ route('master-data.produk.destroy', $produk->id) }}"
                                                    data-confirm-delete="true" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                            @include('MasterData.produk.components.modal-edit')
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
