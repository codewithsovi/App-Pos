@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Kategori</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                        <th>Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Mozilla 1.6</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td>
                                            <a href="">

                                                <i class="fas fa-pencil-alt"></i></a>
                                            <a href=""><i class="fas fa-trash-alt"></i></a>

                                        </td>
                                        <td><a href=""><i class="far fa-eye"></i></a></td>
                                    </tr>
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
