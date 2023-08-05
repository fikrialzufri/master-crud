@extends('template.transaksi')
@section('title', ucwords(str_replace([':', '_', '-', '*'], ' ', $title)))

@push('head')
{{-- <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}"> --}}
<style>

</style>
@endpush

@section('content')


        <!-- Small boxes (Stat box) -->
        <form
            @if ($store == 'update') action="{{ route($route . '.' . $store, $data->id) }}" @else action="{{ route($route . '.' . $store) }}" @endif
            method="post" role="form" id="form" enctype="multipart/form-data">
            <div class="row">
                {{ csrf_field() }}
                @if ($store == 'update')
                    {{ method_field('PUT') }}
                @endif

                <div class="col-md-4">
                    <div class="card">
                        <!-- /.card-header -->

                        <div class="card-body">
                            {{-- get kode resi --}}

                            @include('pengiriman.partials.data-cabang')
                            @include('pengiriman.partials.data-pengirim')

                            {{-- <div class="row">
                                <div class="form-group form-textinput col-12" id="form_sales_id">
                                    <div>
                                        <label for="sales_id" class=" form-control-label">Nama Sales</label>
                                    </div>
                                    <input type="text" class="form-control" name="sales_id" id="sales_id"
                                        value="" readonly>
                                </div>
                            </div> --}}



                        </div>
                    </div>
                </div>
                @include('pengiriman.partials.data-berat')
                <!-- ./col -->
            </div>
            @include('pengiriman.partials.data-pembayaran')

        </form>

        @include('pengiriman.partials.modal-pengirim')
        @include('pengiriman.partials.modal-vendor')




@endsection
@push('script')
    @include('pengiriman.partials.scripts')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
@endpush

