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
            <div class="d-flex">
                <div class="w-100">
                    <label for="">Produk</label>
                    <select name="select2" id="select2" class="form-control"></select>
                </div>
                <div>
                    <label for="">Stok Tersedia</label>
                    <input type="number" name="current_stok" id="current_stok" class="form-control mx-1"
                        style="width: 100px" readonly>
                </div>
                <div>
                    <label for="">Qty</label>
                    <input type="number" name="qty" id="qty" class="form-control mx-1" style="width: 100px">
                </div>
                <div style="padding-top: 32px">
                    <button class="btn btn-dark">Tambahkan</button>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            let selectedProduk = {};
            $('#select2').select2({
                theme: 'bootstrap',
                placeholder: 'Cari Produk....',
                ajax: {
                    url: "{{ route('get-data.produk') }}",
                    dataType: 'json',
                    delay: 250,
                    data: (params) => {
                        return {
                            search: params.tern
                        }
                    },
                    processResults: (data) => {
                        data.forEach(item => {
                            selectedProduk[item.id] = item;
                        })

                        return {
                            results: data.map((item) => {
                                return {
                                    id: item.id,
                                    text: item.nama_produk
                                }
                            })
                        }
                    },
                    cache: true
                },
                minimumInputLength: 5
            })

            $("#select2").on("change", function(e) {
                let id = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "{{ route('get-data.cekstok') }}",
                    data: {
                        id: id
                    },
                    dataType: "jdon",
                    success: function(response) {
                        $("#current_stok").val(response);
                    }
                });

            });
        });
    </script>
@endpush
