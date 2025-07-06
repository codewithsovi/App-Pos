@extends('layouts.app')

@section('header_content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kategori</h1>
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
                            <h3 class="card-title">Tabel Kategori</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- <x-kategori.form-kategori /> --}}
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger d-flex flex-column">
                                    @foreach ($errors->all() as $error)
                                        <small class="text-white my-2">{{ $error }}</small>
                                    @endforeach
                                </div>
                            @endif --}}

                            @include('components.alert')

                            <div class="d-flex justify-content-end mb-2">


                                @include('MasterData.kategori.modal-create')
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                        <th>Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $kategori)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kategori->nama_kategori }}</td>
                                            <td>{{ $kategori->deskripsi }}</td>

                                            <td class="d-flex justify-content-center">
                                                <a href="" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modal-edit-{{ $kategori->id }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a href="{{ route('master-data.kategori.destroy', $kategori->id) }}"
                                                    data-confirm-delete="true" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('master-data.produk.byKategori', $kategori->id) }}">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        @include('MasterData.kategori.modal-edit')
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
