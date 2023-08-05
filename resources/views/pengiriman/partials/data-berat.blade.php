<div class="col-md-8">
    <div class="card">
        <!-- /.card-header -->

        <div class="card-body">
            {{-- get kode resi --}}


            <div class="row">
                <div class="col-12">
                    <b><span class="sub-title">Data Barang</span></b>
                </div>
                <hr />
                <div class="form-group form-textinput col-md-2" id="form_berat">
                    <div>
                        <label for="berat" class=" form-control-label">Berat</label>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control rupiah" name="berat" id="berat" value="{{ $store == 'update' ? $data->berat : '' }}" >
                        <span class="input-group-prepend">
                            <label class="input-group-text">Kg</label>
                        </span>

                    </div>
                    <span class="text-danger text-capitalize">
                        <strong id="textBeratDanger">

                        </strong>
                    </span>
                </div>
                <div class="form-group form-textinput col-md-3" id="form_total_harga_berat">
                    <div>
                        <label for="total_harga_berat" class=" form-control-label">Total Harga /Kg</label>
                    </div>

                    <div class="input-group">
                        <span class="input-group-prepend">
                            <label class="input-group-text">Rp.</label>
                        </span>
                        <input type="hidden" class="form-control nominal" name="total_harga_berat" id="total_harga_berat"
                            value="{{ $store == 'update' ? $data->total_harga_berat : '' }}">
                        <input type="text" class="form-control rupiah" name="total_harga_berat_tampil" id="total_harga_berat_tampil"
                            value="{{ $store == 'update' ? format_uang($data->total_harga_berat) : '' }}">
                    </div>
                    <input type="hidden" id="editTotalHargaBerat" value="tidak">
                </div>

                <div class="form-group form-textinput col-md-2" id="form_diskon_persen_berat">
                    <div>
                        <label for="diskon_persen_berat" class=" form-control-label">Diskon Persen</label>
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control nominal" name="diskon_persen_berat" id="diskon_persen_berat" value="{{ $store == 'update' ? $data->diskon_persen_berat  : '' }}" {{ $store == 'update' && $data->diskon_rupiah_berat > 0  ? "readonly" : '' }}>
                        <span class="input-group-prepend">
                            <label class="input-group-text">%</label>
                        </span>
                    </div>
                </div>
                <div class="form-group form-textinput col-md-2" id="form_diskon_rupiah_berat">
                    <div>
                        <label for="diskon_rupiah_berat" class=" form-control-label">Diskon Rupiah</label>
                    </div>

                    <div class="input-group">
                        <span class="input-group-prepend">
                            <label class="input-group-text">Rp.</label>
                        </span>
                        <input type="text" class="form-control rupiah" name="diskon_rupiah_berat"
                            id="diskon_rupiah_berat" value="{{ $store == 'update' ? $data->diskon_rupiah_berat  : '' }}" {{ $store == 'update'  && $data->diskon_persen_berat > 0 ? "readonly" : '' }}>
                    </div>
                </div>

                <div class="form-group form-textinput col-md-3" id="form_sub_total_harga_berat">
                    <div>
                        <label for="sub_total_harga_berat" class=" form-control-label">Sub Total Harga</label>
                    </div>

                    <div class="input-group">
                        <span class="input-group-prepend">
                            <label class="input-group-text">Rp.</label>
                        </span>
                        <input type="text" class="form-control rupiah" name="sub_total_harga_berat" id="sub_total_harga_berat"
                            value="{{ $store == 'update' ? format_uang($data->sub_total_harga_berat) : '' }}" readonly>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <b><span class="sub-title">Kubikasi</span></b>
                </div>
                <hr />
                <div class="form-group form-textinput col" id="form_panjang">
                    <div>
                        <label for="panjang" class=" form-control-label">Panjang</label>
                    </div>
                    <input type="text" class="form-control rupiah" name="panjang" id="panjang" value="{{ $store == 'update' ? format_uang($data->panjang) : '' }}" {{ $store != 'update'   ? "readonly" : '' }}>
                </div>
                <div class="form-group form-textinput col" id="form_lebar">
                    <div>
                        <label for="lebar" class=" form-control-label">Lebar</label>
                    </div>
                    <input type="text" class="form-control rupiah" name="lebar" id="lebar" value="{{ $store == 'update' ? format_uang($data->lebar) : '' }}" {{ $store != 'update'   ? "readonly" : '' }}>
                </div>
                <div class="form-group form-textinput col" id="form_tinggi">
                    <div>
                        <label for="tinggi" class=" form-control-label">Tinggi</label>
                    </div>
                    <input type="text" class="form-control rupiah" name="tinggi" id="tinggi" value="{{ $store == 'update' ? format_uang($data->tinggi) : '' }}" {{ $store != 'update'   ? "readonly" : '' }}>
                </div>
                <div class="form-group form-textinput col" id="form_total_kubikasi">
                    <div>
                        <label for="total_kubikasi" class=" form-control-label">Total Kubikasi</label>
                    </div>

                    <div class="input-group">

                        <input type="hidden" class="" name="total_kubikasi" id="total_kubikasi"
                            value="{{ $store == 'update' ? $data->total_kubikasi : '' }}">
                        <input type="text" class="form-control" name="total_kubikasi_tampil" id="total_kubikasi_tampil"
                            value="{{ $store == 'update' ? format_uang($data->total_kubikasi) : '' }}" readonly >
                        <span class="input-group-prepend">
                            <label class="input-group-text">M<sup>3</sup> </label>
                        </span>
                    </div>


                    <span class="text-danger text-capitalize">
                        <strong id="textTotalDanger">

                        </strong>
                    </span>
                </div>




                {{-- menghitung kubikasi --}}
            </div>
            <div class="row">
                <div class="form-group form-textinput col-md-2 col-lg-2" id="form_total_konversi">
                    <div>
                        <label for="total_konversi" class=" form-control-label">Total Konversi</label>
                    </div>

                    <div class="input-group">

                        <input type="hidden" class="form-control" name="total_konversi" id="total_konversi"
                            value="{{ $store == 'update' ? format_uang($data->total_konversi) : '' }}">
                        <input type="text" class="form-control" name="total_konversi_tampil" id="total_konversi_tampil"
                            value="{{ $store == 'update' ? format_uang($data->total_konversi) : '' }}" readonly>
                        <span class="input-group-prepend">
                            <label class="input-group-text">Kg</label>
                        </span>
                    </div>
                </div>
                <div class="form-group form-textinput col-md-3 col-lg-3" id="form_total_harga_kubikasi">
                    <div>
                        <label for="total_harga_kubikasi" class=" form-control-label">Total Harga Kubikasi</label>
                    </div>

                    <div class="input-group">
                        <span class="input-group-prepend">
                            <label class="input-group-text">Rp.</label>
                        </span>
                        <input type="hidden" class="" name="total_harga_kubikasi" id="total_harga_kubikasi"
                            value="{{ $store == 'update' ? $data->total_harga_kubikasi : '' }}">
                        <input type="text" class="form-control rupiah" name="total_harga_kubikasi_tampil"
                            id="total_harga_kubikasi_tampil"
                            value="{{ $store == 'update' ? format_uang($data->total_harga_kubikasi) : '' }}">
                        <input type="hidden" id="editTotalKubikasi" value="tidak">
                    </div>
                </div>
                <div class="form-group form-textinput col-md-2 col-lg-2" id="form_diskon_persen_kubikasi">
                    <div>
                        <label for="diskon_persen_kubikasi" class=" form-control-label">Diskon Persen Kubikasi</label>
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control nominal" name="diskon_persen_kubikasi" id="diskon_persen_kubikasi" value="{{ $store == 'update' ? $data->diskon_persen_kubikasi  : '' }}" {{ $store == 'update'  && $data->diskon_rupiah_kubikasi > 0 ? "readonly" : '' }}>
                        <span class="input-group-prepend">
                            <label class="input-group-text">%</label>
                        </span>
                    </div>
                </div>
                <div class="form-group form-textinput col-md-2 col-lg-2" id="form_diskon_rupiah_kubikasi">
                    <div>
                        <label for="diskon_rupiah_kubikasi" class=" form-control-label" >Diskon Rupiah Kubikasi</label>
                    </div>

                    <div class="input-group">
                        <span class="input-group-prepend">
                            <label class="input-group-text">Rp.</label>
                        </span>
                        <input type="text" class="form-control rupiah" name="diskon_rupiah_kubikasi"
                            id="diskon_rupiah_kubikasi" value="{{ $store == 'update' ? $data->diskon_rupiah_kubikasi  : '' }}" {{ $store == 'update'  && $data->diskon_persen_kubikasi > 0 ? "readonly" : '' }}>
                    </div>
                </div>
                <div class="form-group form-textinput col-md-3 col-lg-3" id="form_sub_total_harga_kubikasi">
                    <div>
                        <label for="sub_total_harga_kubikasi" class=" form-control-label">Sub Total Harga Kubikasi</label>
                    </div>

                    <div class="input-group">
                        <span class="input-group-prepend">
                            <label class="input-group-text">Rp.</label>
                        </span>
                        <input type="text" class="form-control" name="sub_total_harga_kubikasi"
                            id="sub_total_harga_kubikasi" value="{{ $store == 'update' ? format_uang($data->sub_total_harga_kubikasi) : '' }}" readonly>

                    </div>
                </div>

            </div>
            <div class="row">


                <div class="form-group form-textinput col" id="form_nilai_barang">
                    <div>
                        <label for="total_harga_berat" class=" form-control-label">Nilai Barang / Asuransi</label>
                    </div>

                    <div class="input-group">
                        <span class="input-group-prepend">
                            <label class="input-group-text">Rp.</label>
                        </span>
                        <input type="text" class="form-control rupiah" name="nilai_barang" id="nilai_barang" value="{{ $store == 'update' ? format_uang($data->nilai_barang) : '' }}">
                    </div>
                </div>
                <div class="form-group form-textinput col" id="form_packing_barang">
                    <div>
                        <label for="total_harga_berat" class=" form-control-label">Packing Barang</label>
                    </div>

                    <div class="input-group">
                        <span class="input-group-prepend">
                            <label class="input-group-text">Rp.</label>
                        </span>
                        <input type="text" class="form-control rupiah" name="packing_barang" id="packing_barang"
                            value="{{ $store == 'update' ? format_uang($data->nilai_barang) : '' }}">
                    </div>
                </div>
                <div class="form-group form-textinput col" id="form_jemput_barang">
                    <div>
                        <label for="jemput_barang" class=" form-control-label">Jemput Barang</label>
                    </div>

                    <div class="input-group">
                        <span class="input-group-prepend">
                            <label class="input-group-text">Rp.</label>
                        </span>
                        <input type="text" class="form-control rupiah" name="jemput_barang" id="jemput_barang" value="{{ $store == 'update' ? format_uang($data->jemput_barang) : '' }}">
                    </div>
                </div>
                <div class="form-group form-textinput col" id="form_koli_berat">
                    <div>
                        <label for="koli_berat" class=" form-control-label">Koli</label>
                    </div>
                    <input type="text" class="form-control rupiah" name="koli_berat" id="koli_berat" value="{{ $store == 'update' ? format_uang($data->koli_berat) : '' }}">
                </div>
            </div>
            @include('pengiriman.partials.data-total')


        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" id="btnSimpan" class="btn btn-primary" {{ $store == 'update' ? "" : 'disabled' }}>Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('head')
    <style>

    </style>
@endpush

@push('script')
{{-- get-jenis-tagihan --}}
    <script>
        function buttonSimpan() {
            let total_qty = $('#total_qty').val();
            let kode_resi = $('#total_qty').val();
            let koli_berat = $('#koli_berat').val();

            let no_hp_pengirim_kirim = $('#no_hp_pengirim_kirim').val();
            let no_hp_penerima_kirim = $('#no_hp_penerima_kirim').val();
            let cmblistPembayaran = $('#cmblistPembayaran').val();
            let cmblistTagihan = $('#cmblistTagihan').val();
            let cmbharga = $('#cmbharga').val();
            let cmblistlayanan = $('#cmblistlayanan').val();
            let cabang_id = $('#cmblistcabang').val();

            let over_via_check = $('#over_via_check').is(':checked');
            if (cabang_id == '') {
                $('#cmblistcabang').addClass('is-invalid');
            }
            if (koli_berat == '') {
                $('#koli_berat').addClass('is-invalid');
            }
            let total_harga_berat = $('#total_harga_berat').val();
            let total_harga_kubikasi = $('#total_harga_kubikasi').val();

            let diasble = false;

            if (total_harga_kubikasi > 1 || total_harga_berat > 1) {
                diasble = true;

                $('#panjang').removeClass('is-invalid');
                $('#lebar').removeClass('is-invalid');
                $('#tinggi').removeClass('is-invalid');
                $('#berat').removeClass('is-invalid');
            }else{
                diasble = false;
                $('#panjang').addClass('is-invalid');
                $('#lebar').addClass('is-invalid');
                $('#tinggi').addClass('is-invalid');
                $('#berat').addClass('is-invalid');
            }

            if (koli_berat > 0) {
                $('#koli_berat').removeClass('is-invalid');
            }
            if (cmblistlayanan == '') {
                $('#cmblistlayanan').addClass('is-invalid');
            }
            if (cmbharga == '') {
                $('#cmbharga').addClass('is-invalid');
            }else{
                $('#cmbharga').removeClass('is-invalid');
            }
            if (cmblistTagihan == '') {
                $('#cmblistTagihan').addClass('is-invalid');
            }else{
                $('#cmblistTagihan').removeClass('is-invalid');
            }
            if (cmblistPembayaran == '') {
                $('#cmblistPembayaran').addClass('is-invalid');
            }else{
                $('#cmblistPembayaran').removeClass('is-invalid');
            }

            let jenis_pembayaran = $('#jenis_pembayaran').val();

            if (jenis_pembayaran == 'ya') {
                $('#submitSimpanPembayaran').prop("disabled", null);
            }

            let harga_modal = $('#harga_modal').val();
            let harga_pelanggan = $('#harga_pelanggan').val();
            if (harga_modal == '' || harga_modal == 0 ) {
                $('#harga_modal').addClass('is-invalid');

            }
            if ( harga_pelanggan == '' || harga_pelanggan == 0) {

                $('#harga_pelanggan').addClass('is-invalid');

            }




            if (diasble === true && kode_resi != '' && no_hp_pengirim_kirim != '' && no_hp_penerima_kirim != '' &&
            cmblistPembayaran != '' && cmblistTagihan != '' && cmbharga != '' && cmblistlayanan != '' && cabang_id != '' && koli_berat != '') {
                if (over_via_check === true) {
                    $('#btnSimpan').prop("disabled", true);

                    let cmblistVendorOverVia = $('#cmblistVendorOverVia').val();

                    if (cmblistVendorOverVia !== '' && harga_modal != '' && harga_pelanggan != '') {
                        $('#btnSimpan').prop("disabled", null);
                        return false;
                    }
                } else {
                    $('#btnSimpan').prop("disabled", null);
                }

            } else {

                $('#btnSimpan').prop("disabled", true);
            }
        }
        $("#cmbharga").on("change", function(e) {
            $("#cmbharga").removeClass("is-invalid");
            $("#textcmbharga").html("");
            let id = $(this).val();
            let url = "{{ route('get-harga') }}";

            let databarang = $('#data_barang').is(":checked");
            let datakubikasi = $('#kubikasi').is(":checked");
            let panjang = $('#panjang').val();
            let lebar = $('#lebar').val();
            let tinggi = $('#tinggi').val();
            let koli_kubikasi = $('#koli_kubikasi').val();
            let berat = $('#berat').val();
            let kubikasi = panjang * lebar * tinggi;

            let setBerat = 0;
            if (databarang) {
                setBerat = berat;
            }
            if (datakubikasi) {
                setBerat = kubikasi;
            }
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    id: id,
                    berat: setBerat,
                },
                success: function(data) {
                    const {
                        id,
                        harga,
                        asal_kota_id,
                        tujuan_kota_id,
                        min_berat,
                        nama

                    } = data;


                    $('#tujuan_kota').text(nama);

                    $('#min_berat').val(min_berat);
                    if (datakubikasi) {
                        if (kubikasi < min_berat) {
                            $('#total_kubikasi').addClass('is-invalid');
                            $('#textTotalDanger').html('Minimal Total Kubikasi ' +
                                min_berat + 'M<sup>3</sup>');
                            $("#textTotalDanger").show();

                        } else {
                            $('#total_kubikasi').removeClass('is-invalid');
                            $('#textTotalDanger').html('');
                            $("#textTotalDanger").hide();
                        }
                    }
                    // triger asal_kota_id
                    $("#cmbasalkota option[value=" + asal_kota_id + "]").prop("selected",
                        true);
                    $("#cmbasalkota").trigger("change");
                    // triger tujuan_kota_id
                    $("#cmbtujuankota option[value=" + tujuan_kota_id + "]").prop(
                        "selected",
                        true);
                    $("#cmbtujuankota").trigger("change");
                    // harga_berat
                    // harga jadi string
                    let hargaberat = formatRupiah(harga.toString(), '');

                    // $('#harga_berat').val(harga);
                    let harga_pelanggan = Number($('#harga_pelanggan').val());
                    if (harga_pelanggan < 0 ||harga_pelanggan == '' ) {
                        $('#harga_berat').val(harga);
                        $('#harga_berat_tampil').val(hargaberat);
                    }

                    $('#harga_kubikasi').val(hargaberat);
                    $('#asal_kota_id').val(asal_kota_id);
                    $('#tujuan_kota_id').val(tujuan_kota_id);


                    let total_kubikasi = kubikasi * koli_kubikasi;

                    let hargakubikasi = total_kubikasi * harga;
                    let hargakubikasiString = formatRupiah(hargakubikasi.toString(), '');
                    $('#total_harga_kubikasi').val(hargakubikasiString);


                    let koli_berat = $('#koli_berat').val();
                    // hilangkan titik
                    let hasilberat = berat * harga * koli_berat;
                    let hargajadi = formatRupiah(hasilberat.toString(), '');
                    $('#total_harga_berat').val(hargajadi);

                    $('#berat').prop("readonly", false);
                    $('#panjang').prop("readonly", false);
                    $('#tinggi').prop("readonly", false);
                    $('#lebar').prop("readonly", false);

                },
                complete: function (data) {
                    totalQty();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
            // uangkembali();

        });
        $('#cmbharga').on("select2:select", function(e) {
            $("#cmbharga").select2('close');
        });
        $("#berat").on("keyup blur", function(e) {
            totalQty();
            $('#diskon_persen_berat').prop("readonly", false);
            $('#diskon_rupiah_berat').prop("readonly", false);
        });

        $("#diskon_persen_berat").on("keyup blur", function(e) {
            let diskon_persen_berat = $(this).val();
            if (diskon_persen_berat > 100) {
                diskon_persen_berat = 100;
            }
            $(this).val(diskon_persen_berat);
            if (diskon_persen_berat > 0) {

                $('#diskon_rupiah_berat').prop("readonly", true);
            }else{
                $('#diskon_rupiah_berat').prop("readonly", false);
            }
            totalQty();
        });
        $("#diskon_rupiah_berat").on("keyup blur", function(e) {

            let diskon_rupiah_berat = $(this).val() === '' ||  $(this).val() === undefined ? 0 :  $(this).val().replaceAll(/\./g,'');
            $("#diskon_persen_berat").val("");
            if (diskon_rupiah_berat > 0) {

                $('#diskon_persen_berat').prop("readonly", true);
            }else{
                $('#diskon_persen_berat').prop("readonly", false);
            }
            totalQty();
        });

        $("#diskon_persen_kubikasi").on("keyup blur", function(e) {
            let diskon_persen_kubikasi = $(this).val();
            if (diskon_persen_kubikasi > 100) {
                diskon_persen_kubikasi = 100;
            }
            $(this).val(diskon_persen_kubikasi);
            if (diskon_persen_kubikasi > 0) {

                $('#diskon_rupiah_kubikasi').prop("disabled", true);
            }else{
                $('#diskon_rupiah_kubikasi').prop("disabled", false);
            }
            totalQty();
        });
        $("#diskon_rupiah_kubikasi").on("keyup blur", function(e) {

            let diskon_rupiah_kubikasi = $(this).val() === '' || $(this).val() === undefined ? 0 : $(this).val().replaceAll(/\./g,'');;
            if (diskon_rupiah_kubikasi > 0) {

                $('#diskon_persen_kubikasi').prop("disabled", true);
            }else{
                $('#diskon_persen_kubikasi').prop("disabled", false);
            }
            $("#diskon_persen_kubikasi").val("");
            totalQty();
        });


        $("#panjang").on("keyup blur", function(e) {
            totalQty();
            $('#editTotalKubikasi').val("tidak");
        });
        $("#tinggi").on("keyup blur", function(e) {
            totalQty();
            $('#editTotalKubikasi').val("tidak");
        });
        $("#lebar").on("keyup blur", function(e) {
            totalQty();
            $('#editTotalKubikasi').val("tidak");
        });

        $("#nilai_barang").on("keyup blur", function(e) {
            totalQty();
        });
        $("#packing_barang").on("keyup blur", function(e) {
            totalQty();
        });
        $("#jemput_barang").on("keyup blur", function(e) {
            totalQty();
        });
        $("#total_harga_kubikasi_tampil").on("keyup blur", function(e) {
            let total_harga_kubikasi = $(this).val() === '' || $(this).val() === undefined ? 0 : $(this).val().replaceAll(/\./g,'') ;

            $('#total_harga_kubikasi').val(Number(total_harga_kubikasi));
            $('#diskon_persen_kubikasi').val("");
            $('#diskon_rupiah_kubikasi').val("");
            if (total_harga_kubikasi > 0) {
                $('#editTotalKubikasi').val("ya");
            }else{

                $('#editTotalKubikasi').val("tidak");
            }
            totalQty('total_harga_kubikasi');
        });
        $("#total_harga_berat_tampil").on("keyup blur", function(e) {
            let total_harga_berat_tampil = $(this).val() === '' || $(this).val() === undefined ? 0 : $(this).val().replaceAll(/\./g,'');
            $('#total_harga_berat').val(Number(total_harga_berat_tampil));
            $('#diskon_persen_berat').val("");
            $('#diskon_rupiah_berat').val("");
            if (total_harga_berat_tampil > 0) {

                $('#editTotalHargaBerat').val("ya");
            }else{
                $('#editTotalHargaBerat').val("tidak");

            }
            totalQty('total_harga_berat_tampil');
        });

        $("#koli_berat").on("keyup blur", function(e) {
            let koli = $(this).val();
            $('#koli_pembayaran').val(koli);
            buttonSimpan();
        });


        // bukan modal pembayaran onclick btn simpan
        $("#btnSimpan").on("click", function(e) {
            let validasi  =  validasiPembayaran();
            if (validasi == false) {
                return  false;
            }
            // bukan kredit
            buttonPembayaran();
            $("#modalPembayaran").modal("show");
            // get nama pengirim
        });



        function validasiPembayaran() {
            $("#textDangerLimitPlafon").text("");
            $("#textDangerJenisTagihan").text("");
            $("#cmblistTagihan").removeClass('is-invalid');


            let jenis_tagihan = $("#jenis_tagihan").val();
            // kredit atau bukan disini value nya
            let jenis_pembayaran = $("#jenis_pembayaran").val();

            if (jenis_pembayaran != 'ya') {
                $('#submitSimpanPembayaran').prop("disabled", true);
            }else{
                $('#submitSimpanPembayaran').prop("disabled", null);

            }

            let limit_pengirim = $("#limit_pengirim").val();
            let limit_penerima = $("#limit_penerima").val();
            let total_bayar = $('#total_bayar').val();

            if (jenis_tagihan === 'pengirim' && jenis_pembayaran == 'ya') {
                if (limit_pengirim  == '' || limit_pengirim < 1) {
                    // bukan kredit pengirim
                    $("#cmblistTagihan").addClass('is-invalid');

                    $("#textDangerJenisTagihan").text('Limit Plafon Pengirim tidak ada');
                    return false;
                }

                if (Number(limit_pengirim) < Number(total_bayar)) {
                    // bukan kredit pengirim
                    $("#cmblistTagihan").addClass('is-invalid');
                    $("#textDangerJenisTagihan").text('Sisa Plafon Pengirim : Rp. ' + formatRupiah(limit_pengirim));
                    $("#textDangerLimitPlafon").text('Sisa Plafon Pengirim : Rp. ' + formatRupiah(limit_pengirim));
                    return false;
                }

            }
            if (jenis_tagihan === 'penerima' && jenis_pembayaran == 'ya') {

                if (limit_penerima  == '' || limit_penerima < 1) {

                    // bukan kredit pengirim
                    $("#cmblistTagihan").addClass('is-invalid');
                    $("#textDangerJenisTagihan").text('Limit Plafon Penerima tidak ada');
                    return false;
                }
                if (Number(limit_penerima) < Number(total_bayar)) {
                    // bukan kredit pengirim
                    $("#cmblistTagihan").addClass('is-invalid');
                    $("#textDangerJenisTagihan").text('Sisa Plafon Penerima : Rp. ' + formatRupiah(limit_penerima));
                    $("#textDangerLimitPlafon").text('Sisa Plafon Penerima : Rp. ' + formatRupiah(limit_penerima));

                    return false;
                }

            }

            return true;
        }






        function totalQty(keypress) {

            // Start Berat
            let harga_satuan = $("#harga_berat").val() === '' || $("#harga_berat").val() === undefined ? 0 : $("#harga_berat").val().replaceAll(/\./g,'');

            let diskon_persen_berat = $("#diskon_persen_berat").val();
            let nilai_barang = $("#nilai_barang").val() === undefined ? 0 : $("#nilai_barang").val().replaceAll(/\./g,'');

            let diskon_rupiah_berat = $("#diskon_rupiah_berat").val() === undefined ? 0 : $("#diskon_rupiah_berat").val().replaceAll(/\./g,'');

            let berat = $('#berat').val() === undefined ? 0 : $('#berat').val().replaceAll(/\./g,'');
            $('#berat_pembayaran').text(formatRupiah(berat.toString()));


            let total_harga = 0;
            let grand_total_harga = $('#sub_total_harga_berat').val();
            let harga_diskon = 0;

            total_harga = $("#total_harga_berat_tampil").val() === '' || $("#total_harga_berat_tampil").val() === undefined ? 0 : $("#total_harga_berat_tampil").val().replaceAll(/\./g,'');

            let editTotalHargaBerat = $('#editTotalHargaBerat').val();
            total_harga = Number(total_harga);
            if (editTotalHargaBerat == "tidak") {
                total_harga = harga_satuan * berat;
            }
            grand_total_harga = total_harga;
            if (diskon_persen_berat >0 && diskon_persen_berat !='') {
                diskon_persen_berat = (diskon_persen_berat / 100).toFixed(2);
                harga_diskon = total_harga *  diskon_persen_berat;
                grand_total_harga = total_harga - harga_diskon;
            }
            if (diskon_rupiah_berat >0 && diskon_rupiah_berat !='') {
                if (diskon_rupiah_berat > total_harga) {

                    harga_diskon = total_harga;
                    $("#diskon_rupiah_berat").val(harga_diskon);
                }else{
                    harga_diskon = diskon_rupiah_berat;

                }

                grand_total_harga = total_harga - diskon_rupiah_berat;
            }
            $('#diskon_berat_pembayaran').text("Rp. " + formatRupiah(harga_diskon.toString()));
            $('#total_harga_berat').val(total_harga);
            $('#total_harga_berat_tampil').val(formatRupiah(total_harga.toString()));
            $('#total_harga_berat_pembayaran').text("Rp. " +  formatRupiah(total_harga.toString()));
            $('#sub_total_harga_berat').val(formatRupiah(grand_total_harga.toString()));
            // end Berat

            // Start Kubikasi
            let panjang = $('#panjang').val() === undefined ? 0 : $('#panjang').val().replaceAll(/\./g,'');
            let tinggi = $('#tinggi').val() === undefined ? 0 : $('#tinggi').val().replaceAll(/\./g,'');
            let lebar = $('#lebar').val() === undefined ? 0 : $('#lebar').val().replaceAll(/\./g,'');

            let kubik = panjang * tinggi * lebar;
            let kubikToKg = kubik / 6000;
            let total_kg_kubik = Math.round(kubikToKg);

            let total_qty = Number(berat) + Number(total_kg_kubik);

            let total_kubikasi = $('#total_kubikasi').val(kubik);
            $('#total_kubikasi_tampil').val(formatRupiah(kubik.toString()));

            $('#total_konversi').val(total_kg_kubik);
            $('#total_konversi_tampil').val(formatRupiah(total_kg_kubik.toString()));

            $('#total_kubikasi_pembayaran').text(formatRupiah(total_kg_kubik.toString()));
            $('#asuransi_pembayaran').text("Rp. " + formatRupiah(nilai_barang.toString()));

            let editTotalKubikasi  =  $('#editTotalKubikasi').val();

            let total_harga_kubikasi = 0;
            let sub_total_harga_kubikasi = 0;

            if (keypress == "total_harga_kubikasi" || editTotalKubikasi == 'ya')   {
                total_harga_kubikasi = $('#total_harga_kubikasi_tampil').val() === undefined ? 0 :
                $('#total_harga_kubikasi_tampil').val().replaceAll(/\./g,'');
                total_harga_kubikasi = Number(total_harga_kubikasi);
                sub_total_harga_kubikasi = total_harga_kubikasi;
            }else{
                total_harga_kubikasi = total_kg_kubik * harga_satuan;
                sub_total_harga_kubikasi = total_harga_kubikasi;
            }


            let harga_diskon_kubikasi = 0;
            let diskon_persen_kubikasi = $("#diskon_persen_kubikasi").val();
            let diskon_rupiah_kubikasi = $("#diskon_rupiah_kubikasi").val() === undefined ? 0 :
            $("#diskon_rupiah_kubikasi").val().replaceAll(/\./g,'');

            if (diskon_persen_kubikasi > 0 && diskon_persen_kubikasi !='') {
                diskon_persen_kubikasi = (diskon_persen_kubikasi / 100).toFixed(2);
                harga_diskon_kubikasi = total_harga_kubikasi *  diskon_persen_kubikasi;
            }
            if (diskon_rupiah_kubikasi >0 && diskon_rupiah_kubikasi !='') {
                harga_diskon_kubikasi = diskon_rupiah_kubikasi;
            }
            sub_total_harga_kubikasi = total_harga_kubikasi - harga_diskon_kubikasi ;

            console.log(harga_diskon_kubikasi);
            $('#diskon_kubikasi_pembayaran').text("Rp. " + formatRupiah(harga_diskon_kubikasi.toString()));




            if (grand_total_harga > 0) {
                grand_total_harga = grand_total_harga + sub_total_harga_kubikasi;
            }else{
                grand_total_harga = sub_total_harga_kubikasi;

            }


            $('#total_harga_kubikasi_tampil').val(formatRupiah(total_harga_kubikasi.toString()));
            $('#total_harga_kubikasi').val(total_harga_kubikasi);

            $('#sub_total_harga_kubikasi').val(formatRupiah(sub_total_harga_kubikasi.toString()));
            $('#total_harga_kubikasi_pembayaran').text("Rp. " + formatRupiah(sub_total_harga_kubikasi.toString()));
            // END KUBIKASI

            let jemput_barang = $("#jemput_barang").val() === undefined ? 0 : $("#jemput_barang").val().replaceAll(/\./g,'');
            let packing = $("#packing_barang").val() === undefined ? 0 : $("#packing_barang").val().replaceAll(/\./g,'');

            $('#packing_pembayaran').text("Rp. " + formatRupiah(packing.toString()));
            $('#jemput_barang_pembayaran').text("Rp. " + formatRupiah(jemput_barang.toString()));

            grand_total_harga = grand_total_harga + Number(packing) + Number(jemput_barang) + Number(nilai_barang);

            $('#total_qty').val(total_qty);
            $('#total_qty_tampil').val(formatRupiah(total_qty.toString()));

            // pembayaran
            $('#total_qty_pembayaran').text(formatRupiah(total_qty.toString()));

            $('#total_bayar').val(grand_total_harga);
            $('#total_bayar_tampil').val(formatRupiah(grand_total_harga.toString()));
            $('#grandtotal').text("Rp. " + formatRupiah(grand_total_harga.toString()));

            let cash = $("#cash").val() === '' || $("#cash").val() === undefined ? 0 : $("#cash").val().replaceAll(/\./g,'');
            let transfer = $("#transfer").val() === '' || $("#transfer").val() === undefined ? 0
            :$("#transfer").val().replaceAll(/\./g,'') ;


            let total = Number(cash) + Number(transfer);
            let uang_angsul = 0;

            if (grand_total_harga > total) {
                uang_angsul = Number(grand_total_harga) - Number(total);
                $("#uang_angsul").text("Kurang Bayar " + formatRupiah(uang_angsul.toString(), ''));
            }else{
                uang_angsul = Number(total) - Number(grand_total_harga);
                $("#uang_angsul").text("Uang Kembali " + formatRupiah(uang_angsul.toString(), ''));

            }

            validasiPembayaran();

            buttonSimpan();
        }
    </script>
@endpush
