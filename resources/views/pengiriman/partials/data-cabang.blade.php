{{-- @can('edit-cabang-pengiriman') --}}
<div class="form-group form-textinput" id="form_cmblistcabang">
    <div>
        <label for="cmblistcabang" class=" form-control-label"> Cabang</label>
    </div>

    <select class="form-control select2" id="cmblistcabang" name="cabang_id" @if(auth()->user()->can('edit-cabang-pengiriman') == false || $store == 'update')
        readonly
    @endif  >
        <option selected="selected" value="">Pilih cabang
        </option>
        @foreach ($dataCabang as $cabang)
        <option value="{{ $cabang->id }}" id="cabang_{{ $cabang->id }}" {{ $cabang_id == $cabang->id ? "selected" : "" }}>
            {{ ucwords($cabang->nama) }}
        </option>
        @endforeach
    </select>
</div>
@if ($store == 'update')
<div class="row">
    <div class="form-group form-textinput col-lg-12 col-md-12" id="form_tanggal_resi">
        <div>
            <label for="tanggal_resi" class=" form-control-label">Tanggal Resi</label>
        </div>
        <input type="datetime-local" class="form-control" name="tanggal_resi" id="tanggal_resi" value="{{ $data->tanggal_resi }}" >
    </div>
</div>
@endif
<div class="row">
    <div class="form-group form-textinput col-lg-6 col-md-6" id="form_kode_resi">
        <div>
            <label for="kode_resi" class=" form-control-label">Kode Resi</label>
        </div>
        <input type="text" class="form-control" name="kode" id="kode_resi" value="{{ $kode_resi }}" readonly>
    </div>
    <div class="form-group form-textinput col-lg-6 col-md-6" id="form_cmblistlayanan">
        <div>
            <label for="cmblistlayanan" class=" form-control-label">Pilih Jenis Layanan</label>
        </div>

        <select class="form-control select2" id="cmblistlayanan" name="jenis_layanan_id">
            <option selected="selected" value="">Pilih Jenis Layanan
            </option>
            @foreach ($dataJenislayanan as $layanan)
            <option value="{{ $layanan->id }}" id="layanan_{{ $layanan->id }}" {{ $store == 'update' && $data->jenis_layanan_id == $layanan->id ? "selected" : "" }}>
                {{ ucwords($layanan->nama) }}
            </option>
            @endforeach
        </select>
    </div>
</div>


<div class="row">
    <div class="form-group form-textinput col-lg-6 col-md-6" id="form_cmbharga">
        <div>
            <label for="kode_resi" class=" form-control-label">Pilih Paket Harga</label>
        </div>
        {{-- select2 --}}
        <select class="form-control select2" id="cmbharga" name="harga_id">
            <option selected="selected" value="">Pilih Paket Harga
            </option>
            @foreach ($dataHarga as $harga)
            <option value="{{ $harga->id }}" id="harga_{{ $harga->id }}" {{ $store == 'update' && $data->harga_id == $harga->id ? "selected" : "" }}>
                {{ ucwords($harga->nama) }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group form-textinput col-5" id="form_harga_berat">
        <div>
            <label for="harga_berat" class=" form-control-label">Harga /Kg</label>
        </div>

        <div class="input-group">
            <span class="input-group-prepend">
                <label class="input-group-text">Rp.</label>
            </span>
            <input type="text" class="form-control rupiah" name="harga_berat_tampil" id="harga_berat_tampil" value="{{ $store == 'update' && $data->harga_berat  ? format_uang($data->harga_berat) : "" }}">
            <input type="hidden" class="form-control nominal" name="harga_berat" id="harga_berat" value="{{ $store == 'update' && $data->harga_berat  ? $data->harga_berat : "" }}">
        </div>
    </div>

</div>
@push('script')
<script>
    $("#harga_berat_tampil").on("keyup blur", function(e) {
        let harga_berat =  $(this).val() === '' ||  $(this).val() === undefined ? 0 : $(this).val().replaceAll(/\./g,'') ;
        $('#harga_berat').val(harga_berat);
        totalQty();

    });

</script>
@endpush

