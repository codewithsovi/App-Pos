@extends('layouts.app')

@section('header_content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Penerimaan Barang</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div>
                <select name="select2" id="select2" class="form-control"></select>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#select2').select2({
                theme: 'bootstrap',
                placeholder: 'Cari Produk....',
               ajax:{
                url:"{{ route('get-data.produk') }}",
                dataType:'json',
                delay:250,
                data:(params) => {
                    return{
                        search:params.tern
                    }
                },
                processResults:(data)=>{
                    data.forEach(item=>{
                        slect
                    })
                }
               }
                });
            })
        });
    </script>
@endpush
