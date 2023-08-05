@extends('template.transaksi')
@section('title', ucwords(str_replace([':', '_', '-', '*'], ' ', $title)))

@push('head')
{{--
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}"> --}}
<style>

</style>
@endpush

@section('content')


<!-- Small boxes (Stat box) -->
<form @if ($store=='update' ) action="{{ route($route . '.' . $store, $data->id) }}" @elseif ($store=='proses' ) action="{{ route($route . '.' . $store, $data->id) }}" @else
    action="{{ route($route . '.' . $store) }}" @endif method="post" role="form" id="formSuratJalan"
    enctype="multipart/form-data">
    <div class="row">
        {{ csrf_field() }}
        @if ($store == 'update')
        {{ method_field('PUT') }}
        @endif

        <div class="col-md-12">
            <div class="card">
                <!-- /.card-header -->

                <div class="card-body">
                    {{-- get kode resi --}}
                    <div class="row">
                        <div class="form-group form-textinput col-lg-1 col-md-1" id="form_cmblistcabang">
                            <div>
                                <label for="cmblistcabang" class=" form-control-label"> Cabang</label>
                            </div>

                            <select class="form-control select2" id="cmblistcabang" name="cabang_id"
                                @if( $store == 'update')
                                disabled
                                @endif >
                                <option selected="selected" value="">Pilih Cabang
                                </option>
                                @foreach ($dataCabang as $cabang)
                                <option value="{{ $cabang->id }}" id="cabang_{{ $cabang->id }}"
                                    {{  $cabang_id==$cabang->id ? "selected" : "" }}
                                >
                                    {{ ucwords($cabang->nama) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-textinput col-lg-2 col-md-2" id="form_kode_resi">
                            <div>
                                <label for="kode_resi" class=" form-control-label">Kode Resi</label>
                            </div>
                            <input type="text" class="form-control" name="kode" id="kode_resi" value="{{ $kode_resi }}" readonly>
                            {{-- <input type="hidden" name="cabang_id_admin" id="cabang_id" value="{{ $cabang_id }}"> --}}
                        </div>
                        <div class="form-group form-textinput col-lg-2 col-md-2" id="form_kode_resi">
                            <div>
                                <label for="tanggal" class=" form-control-label">Tanggal</label>
                            </div>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $tanggal }}">
                            {{-- <input type="hidden" name="cabang_id_admin" id="cabang_id" value="{{ $cabang_id }}"> --}}
                        </div>
                        <div class="form-group form-textinput col-lg-2 col-md-2" id="form_cmblistkaryawan">
                            <div>
                                <label for="cmblistkaryawan" class=" form-control-label"> Karyawan (Driver)</label>
                            </div>

                            <select class="form-control select2" id="cmblistkaryawan" name="karyawan_id"
                                @if(!auth()->user()->can('edit-karyawan-pengiriman') || $store == 'update')
                                readonly
                                @endif >
                                <option selected="selected" value="">Pilih Karyawan
                                </option>
                                @foreach ($dataKaryawan as $karyawan)
                                <option value="{{ $karyawan->id }}" id="karyawan_{{ $karyawan->id }}"
                                    @if ($store=='proses' || $store=='update' )
                                        {{ $data->karyawan_id == $karyawan->id ? 'selected': ''  }}
                                    @endif
                                >
                                    {{ ucwords($karyawan->nama) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-textinput col-lg-2 col-md-2" id="form_cmblistkota">
                            <div>
                                <label for="cmblistkota" class=" form-control-label"> Tujuan</label>
                            </div>

                            <select class="form-control select2" id="cmblistkota" name="kota_id[]"
                                @if(!auth()->user()->can('edit-kota-surat-jalan') || $store == 'update')
                                readonly
                                @endif multiple="multiple">
                                <option value="">Pilih Tujuan
                                </option>
                                @foreach ($dataKota as $kota)
                                <option value="{{ $kota->id }}" id="kota_{{ $kota->id }}"
                                    @if ($store=='proses' || $store=='update' )
                                    {{ $data->hasAnyKota($kota->nama) == 1 ? 'selected' :'' }}
                                    @endif
                                    >
                                    {{ ucwords($kota->nama) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-textinput col-lg-2 col-md-2" id="form_catatan">
                            <div>
                                <label for="catatan" class=" form-control-label">Catatan</label>
                            </div>

                            <textarea class="form-control " name="catatan" id="catatan">{{ $store == 'update' || $store=='proses' ? $data->catatan : '' }}</textarea>
                        </div>
                        @if( $store == 'store')
                        <div class="form-group form-textinput col-lg-1 col-md-1" >
                            <div class="text-center">
                                <label for="Aksi" class=" form-control-label">Aksi</label>
                            </div>
                        <button type="button" class="btn btn-primary btn-block" id="btnProses">Proses</button>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>

</form>

@if( $store == 'proses')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group input-group-button">
                    <input type="text" class="form-control" placeholder="Scan Qrcode" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">Scan Qrcode</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-12 col-lg-12">
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode</td>
                            <td>Tanggal</td>
                            <td>Tujuan</td>
                            <td>Pengirim</td>
                            <td>Penerima</td>
                            <td class="text-center">Total Koli</td>
                            <td class="text-center">Total Berat</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($daftarResi as $index => $resi)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $resi->kode }}</td>
                            <td>{{ $resi->tanggal }}</td>
                            <td>{{ $resi->tujuan }}</td>
                            <td>{{ $resi->pengirim }}</td>
                            <td>{{ $resi->penerima }}</td>
                            <td class="text-center">{{ $resi->koli_berat }} / <input type="text" value="0" class="form-control" id="totalScan_{{ $resi->id }}" width="1%"></td>

                            <td class="text-center">{{ $resi->total_qty }} Kg</td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endif


@endsection
@push('script')

<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>
<script>
    $("#cmblistcabang").select2({

        width: '100%'
    });
    $("#cmblistkaryawan").select2({

        width: '100%'
    });
    $("#cmblistkota").select2({
        placeholder: '--- Pilih ' + "Tujuan" + ' ---',
        width: '100%'
    });
    $("#cmblistcabang").on("change", function(e) {
        $("#cmblistcabang").removeClass("is-invalid");
        $("#textlistcabang").html("");
        // get generate-kode-resi
        var id = $(this).val();
        var url = "{{ route('generate-kode-manivest', ':id') }}";
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $("#kode_resi").val(data.kode_resi);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    });
    $("#btnProses").on("click", function(e) {
        $("#formSuratJalan").submit();
    });
</script>
@endpush
