@extends('layouts.app')

@section('header_content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Semua Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

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
                            <h3 class="card-title">Produk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
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
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produks as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->sku }}</td>
                                            <td>{{ $produk->nama_produk }}</td>
                                            <td>Rp. {{ number_format($produk->harga_jual) }}</td>
                                            <td>Rp. {{ number_format($produk->harga_beli_pokok) }}</td>
                                            <td>{{ $produk->stock }}</td>
                                            <td>{{ $produk->stock_min }}</td>
                                            <td>
                                                <p class="badge">
                                                    {{ $produk->is_active }}
                                                </p>
                                            </td>
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
