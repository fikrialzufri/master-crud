<div class="modal fade full-window-modal" id="modalPelanggan" tabindex="-1" role="dialog"
    aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullwindowModalLabel">Daftar Penerima & Pengirim</h5>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="row d-flex justify-content-between">
                        {{-- Daftar Pelanggan --}}

                        <div class="col-6">

                            <div class="">
                                <table id="tabelPengirimPenerima" class="table table-hover table-fixed" width="100%">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Nama')}}</th>
                                            <th>{{ __('No HP')}}</th>
                                            <th>{{ __('Sisa Plafon')}}</th>
                                            <th class="text-center">{{ __('Aksi')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block" id="btnKirimPelanggan">{{ __('Simpan Pelanggan')}}</button>
                            </div>
                            <hr>
                            <div class="col-12">
                                <form id="formPelanggan">
                                    {{-- hiden pelanggan dapat dari data pelanggan --}}
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group form-textinput">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" value="" id="new_pengirim">
                                                        <span class="cr">
                                                            <i class="cr-icon ik ik-check txt-primary"></i>
                                                        </span>
                                                        <span>Pengirim Baru</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group form-textinput">
                                                <div>
                                                    <label for="no_hp_pengirim" class=" form-control-label">No Hp
                                                        Pengirim</label>
                                                </div>

                                                <input type="hidden" id="id_pengirim" name="id_pengirim" value="{{ $store == 'update' && $dataPengirim ? $dataPengirim->id :'' }}<">

                                                <input type="text" class="form-control" name="no_hp_pengirim"
                                                    id="no_hp_pengirim" value="{{ $store == 'update' && $dataPengirim ? $dataPengirim->no_hp :'' }}">
                                                <span id="textno_hp_pengirim" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="d-block">Nama Pengirim</label>
                                                <input type="text" name="nama_pengirim" id="nama_pengirim"
                                                    class="form-control" placeholder="isi Nama pengirim" required value="{{ $store == 'update' && $dataPengirim ? $dataPengirim->nama :'' }}">

                                                <span id="textnama_pengirim" class="text-danger"></span>
                                            </div>

                                            <div class="form-group">
                                                <label class="d-block">Email</label>
                                                <input type="text" name="email_pengirim" id="email_pengirim"
                                                    class="form-control" placeholder="isi Email" value="{{ $store == 'update' && $dataPengirim ? $dataPengirim->email :'' }}">
                                                <span id="textemail_pengirim" class="text-danger"></span>

                                            </div>

                                            <div class="form-group" id="limit_pengirim_tampil_detail">
                                                <label class="d-block">Limit Pengirim</label>
                                                <input type="hidden" id="limit_pengirim" name="limit_pengirim" value="{{ $store == 'update' && $dataPengirim ? $dataPengirim->plafon :'' }}">
                                                <input type="hidden" id="kredit_pengirim" name="kredit_pengirim" value="{{ $store == 'update' && $dataPengirim && $dataPengirim->limit > 0 ? 'ya' : 'tidak' }}">
                                                <input type="text" class="form-control" id="limit_pengirim_tampil" name="limit_pengirim_tampil" value="{{ $store == 'update' && $dataPengirim ? "Rp. ".format_uang($dataPengirim->plafon) :'' }}" disabled>

                                            </div>
                                            <div class="form-group">
                                                <label class="d-block">Alamat Pengirim</label>
                                                <textarea name="alamat_pengirim" id="alamat_pengirim" cols="30" rows="10"
                                                    class="form-control">{{ $store == 'update' && $dataPengirim ? $dataPengirim->alamat :'' }}</textarea>
                                                <span id="textAlamatPengirimDanger" class="text-danger"></span>
                                            </div>


                                            <div class="form-group">
                                                <div>
                                                    <label for="cmblistkotaPengirim" class=" form-control-label">Pilih
                                                        Kota</label>
                                                </div>
                                                {{-- select2 --}}
                                                <select class="form-control select2" id="cmblistkotaPengirim"
                                                    name="kota_id_pengirim">
                                                    <option selected="selected" value="" required>Pilih kota
                                                    </option>
                                                    @foreach ($dataKota as $kota)
                                                    <option value="{{ $kota->id }}" id="kota_pengirim_{{ $kota->id }}" {{
                                                        $kota->nama !== 'Samarinda' ?: 'selected' }}>
                                                        {{ ucwords($kota->nama) }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group form-textinput">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" value="" id="new_penerima">
                                                        <span class="cr">
                                                            <i class="cr-icon ik ik-check txt-primary"></i>
                                                        </span>
                                                        <span>Penerima Baru</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group form-textinput">
                                                <div>
                                                    <label for="no_hp_penerima" class=" form-control-label">No Hp
                                                        Penerima</label>
                                                </div>
                                                <input type="hidden" id="id_penerima" name="id_penerima" value="{{ $store == 'update' && $dataPenerima ? $dataPenerima->id :'' }}">

                                                <input type="text" class="form-control" name="no_hp_penerima"
                                                    id="no_hp_penerima" value="{{ $store == 'update' && $dataPenerima ? $dataPenerima->no_hp :'' }}">
                                                <span id="textno_hp_penerima" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="d-block">Nama penerima</label>

                                                <input type="text" name="nama_penerima" id="nama_penerima"
                                                    class="form-control" placeholder="isi Nama Penerima"  value="{{ $store == 'update' && $dataPenerima ? $dataPenerima->nama :'' }}" required>
                                                <span id="textnama_penerima" class="text-danger" ></span>
                                            </div>

                                            <div class="form-group">
                                                <label class="d-block">Email</label>
                                                <input type="text" name="email_penerima" id="email_penerima"
                                                    class="form-control" placeholder="isi Email" value="{{ $store == 'update' && $dataPenerima ? $dataPenerima->email :'' }}">
                                                <span id="textemail_penerima" class="text-danger"></span>
                                            </div>
                                            <div class="form-group" id="limit_penerima_tampil_detail">
                                                <label class="d-block">Limit Penerima</label>
                                                <input type="hidden" id="limit_penerima" name="limit_penerima" value="{{ $store == 'update' && $dataPenerima ? format_uang($dataPenerima->plafon) :'' }}">
                                                <input type="hidden" id="kredit_penerima" name="kredit_penerima" value="{{ $store == 'update' && $dataPenerima && $dataPenerima->limit > 0 ? 'ya' : 'tidak' }}">
                                                <input type="text" class="form-control" id="limit_penerima_tampil" name="limit_penerima_tampil" value="{{ $store == 'update' && $dataPenerima ? "Rp. ".format_uang($dataPenerima->plafon) :'' }}" disabled >

                                            </div>
                                            <div class="form-group">
                                                <label class="d-block">Alamat</label>
                                                <textarea name="alamat_penerima" id="alamat_penerima" cols="30" rows="10"
                                                    class="form-control"></textarea>
                                                <span id="textalamat_penerima" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <label for="cmblistkotaPenerima" class=" form-control-label">Pilih
                                                        Kota</label>
                                                </div>
                                                {{-- select2 --}}
                                                <select class="form-control select2" id="cmblistkotaPenerima"
                                                    name="kota_id_penerima">
                                                    <option selected="selected" value="" required>Pilih Kota
                                                    </option>
                                                    @foreach ($dataKota as $kotaPenerima)
                                                    <option value="{{ $kotaPenerima->id }}"
                                                        id="kota_penerima_{{ $kotaPenerima->id }}" {{ $kotaPenerima->nama
                                                        !== 'Samarinda' ?: 'selected' }}>
                                                        {{ ucwords($kotaPenerima->nama) }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

@push('script')
<script>

    $(document).on('click','.btnpengirim', function() {

        let id = $(this).attr("data-id");
        let nama = $(this).attr("data-nama");
        let no_hp = $(this).attr("data-no_hp");
        let email = $(this).attr("data-email");
        let alamat = $(this).attr("data-alamat");
        let kota_id = $(this).attr("data-kota_id");
        let limit = $(this).attr("data-limit");

        let id_penerima = $('#id_penerima').val();

        let vendor_id = $('#vendor_id').val();

        if (vendor_id === id) {
            return alert("Pengirim dan Vendor tidak boleh sama");
        }
        if (id_penerima === id) {
            return alert("Pengirim dan Penerima tidak boleh sama");
        }

        $("#new_pengirim").prop('checked', false);

        dataPengirim(id, no_hp, nama, alamat,email,kota_id,limit);

    });


    $(document).on('click','.btnpenerima', function() {

        let id = $(this).attr("data-id");
        let nama = $(this).attr("data-nama");
        let no_hp = $(this).attr("data-no_hp");
        let email = $(this).attr("data-email");
        let alamat = $(this).attr("data-alamat");
        let kota_id = $(this).attr("data-kota_id");
        let limit = $(this).attr("data-limit");

        let vendor_id = $('#vendor_id').val();
        let id_pengirim = $('#id_pengirim').val();

        if (vendor_id === id) {
            return alert("Penerima dan Vendor tidak boleh sama");
        }

        if (id_pengirim === id) {
            return alert("Penerima dan Penerima tidak boleh sama");
        }

        $("#new_penerima").prop('checked', false);

        dataPenerima(id, no_hp,nama, alamat,email,kota_id,limit);


    });



    function dataPengirim(id, no_hp, nama, alamat,email,kota_id,limit) {
        $('#id_pengirim').val(id);
        $('#no_hp_pengirim').val(no_hp);
        $('#nama_pengirim').val(nama);
        $('#alamat_pengirim').val(alamat);
        $('#email_pengirim').val(email);
        $('#limit_pengirim').val(limit);
        if (limit > 0) {
            $('#limit_pengirim_tampil_detail').show();

            $('#limit_pengirim_tampil').val("Rp. " + formatRupiah(limit.toString()));
        }else{
            $('#limit_pengirim_tampil_detail').hide();

            $('#limit_pengirim_tampil').val();
        }

        $('#id_pengirim_kirim').val(id);
        $('#nama_pengirim_tampil').text(nama);
        $('#nama_pengirim_kirim').val(nama);
        $('#no_hp_pengirim_tampil').text(no_hp);
        $('#no_hp_pengirim_kirim').val(no_hp);
        $('#alamat_pengirim_tampil').text(alamat);
        $('#alamat_pengirim_kirim').val(alamat);
        if (limit > 0) {
            $("#limit_pengirim_detail").show();
            $("#limit_pengirim_pembayaran_detail").show();
            $('#limit_pengirim_kirim').text("Rp. " + formatRupiah(limit.toString()));
            $("#limit_pengirim_pembayaran_detail").show();
            $("#kredit_pengirim").val("ya");
            $("#limit_pengirim").val(limit);
            $('#limit_pengirim_pembayaran_kirim').text("Rp. " +formatRupiah(limit.toString()));
            $('#limit_pengirim_pembayaran').text("Rp. " +formatRupiah(limit.toString()));
        }else{
            $("#limit_pengirim_detail").hide();
            $("#limit_pengirim_pembayaran_detail").hide();
            $('#limit_pengirim_kirim').text("");
            $("#kredit_pengirim").val("tidak");
            $("#limit_pengirim").val("");
            $("#limit_pengirim_pembayaran_detail").hide();
            $('#limit_pengirim_pembayaran_kirim').text("");
            $('#limit_pengirim_pembayaran').text("");
        }

        // pembayaran
        $('#nama_pengirim_pembayaran').text(nama);
        $('#no_hp_pengirim_pembayaran').text(no_hp);
        $('#alamat_pengirim_pembayaran').text(alamat);
        // endpembayaran

        $("#cmblistkotaPengirim").val(kota_id).trigger('change');

        $('#no_hp_pengirim').removeClass('is-invalid');
        $('#nama_pengirim').removeClass('is-invalid');
        $('#alamat_pengirim').removeClass('is-invalid');
        $('#email_pengirim').removeClass('is-invalid');
        $('#textno_hp_penerima').text('');
        $('#textnama_pengirim').text('');
        $('#textAlamatPengirimDanger').text('');
        $('#textemail_pengirim').text('');
    }

    function dataPenerima(id, no_hp,nama, alamat,email,kota_id,limit) {
        $('#id_penerima').val(id);
        $('#no_hp_penerima').val(no_hp);
        $('#nama_penerima').val(nama);
        $('#alamat_penerima').val(alamat);
        $('#email_penerima').val(email);
        $('#limit_penerima').val(limit);


        if (limit > 0) {
            $("#limit_penerima_detail").show();
            $("#limit_penerima_tampil_detail").show();
            $("#limit_penerima_pembayaran_detail").show();
            $('#limit_penerima_tampil').val("Rp. " + formatRupiah(limit.toString()));
            $('#limit_penerima_kirim').text("Rp. " + formatRupiah(limit.toString()));
            $('#limit_penerima_pembayaran').text("Rp. " + formatRupiah(limit.toString()));
        }else{
            $("#limit_penerima_detail").hide();
            $("#limit_penerima_tampil_detail").hide();
            $("#limit_penerima_pembayaran_detail").hide();
            $('#limit_penerima_tampil').val("");
            $('#limit_penerima_kirim').text("");
            $('#limit_penerima_pembayaran').text("");
        }

        $('#id_penerima_kirim').val(id);
        $('#nama_penerima_tampil').text(nama);
        $('#nama_penerima_kirim').val(nama);
        $('#no_hp_penerima_tampil').text(no_hp);
        $('#no_hp_penerima_kirim').val(no_hp);
        $('#alamat_penerima_tampil').text(alamat);
        $('#alamat_penerima_kirim').val(alamat);

        // pembayaran
        $('#nama_penerima_pembayaran').text(nama);
        $('#no_hp_penerima_pembayaran').text(no_hp);
        $('#alamat_penerima_pembayaran').text(alamat);
        // endpembayaran

        $("#cmblistkotaPenerima").val(kota_id).trigger('change');

        $('#no_hp_penerima').removeClass('is-invalid');
        $('#nama_penerima').removeClass('is-invalid');
        $('#email_penerima').removeClass('is-invalid');
        $('#alamat_penerima').removeClass('is-invalid');
        $('#textno_hp_penerima').text('');
        $('#textnama_penerima').text('');
        $('#textalamat_penerima').text('');
        $('#textemail_penerima').text('');
    }

    const dataPelanggan = [];

    function Pelanggan(id, no_hp,nama, alamat,email,kota_id, type, limit) {
        this.id = id;
        this.nama = nama;
        this.no_hp = no_hp;
        this.alamat = alamat;
        this.email = email;
        this.kota_id = kota_id;
        this.type = type;
        this.limit = limit;
    }
    function listPembayaran(id, text) {
        this.id = id;
        this.text = text;
    }



    $('#btnKirimPelanggan').on('click', function(e){

        var dataPelangganKirim = [];
        var dataPelangganPengirim = [];
        var dataPelangganPenerima = [];

        var no_hp_pengirim = $('#no_hp_pengirim').val();
        var email_pengirim = $('#email_pengirim').val();
        var nama_pengirim = $('#nama_pengirim').val();
        var alamat_pengirim = $('#alamat_pengirim').val();
        var kota_id_pengirim = $('#cmblistkotaPengirim').val();
        var limit_pengirim = $('#limit_pengirim').val();

        var no_hp_penerima = $('#no_hp_penerima').val();
        var nama_penerima = $('#nama_penerima').val();
        var alamat_penerima = $('#alamat_penerima').val();
        var email_penerima = $('#email_penerima').val();
        var kota_id_penerima = $('#cmblistkotaPenerima').val();
        var limit_penerima = $('#limit_penerima').val();

        var cmblistVendorOverVia = $('#cmblistVendorOverVia').val();
        if (no_hp_pengirim === '') {
            $('#no_hp_pengirim').addClass('is-invalid');
            $('#textno_hp_penerima').text('No Hp tidak boleh kosong');
        }
        if (nama_pengirim === '') {
            $('#nama_pengirim').addClass('is-invalid');
            $('#textnama_pengirim').text('No Hp tidak boleh kosong');
        }
        if (alamat_pengirim === '') {
            $('#alamat_pengirim').addClass('is-invalid');
            $('#textAlamatPengirimDanger').text('Alamat tidak boleh kosong');
        }

        if (email_pengirim === '') {
            $('#email_pengirim').addClass('is-invalid');
            $('#textemail_pengirim').text('Email tidak boleh kosong');
        }

        if (no_hp_penerima === '') {
            $('#no_hp_penerima').addClass('is-invalid');
            $('#textno_hp_penerima').text('No Hp tidak boleh kosong');
        }
        if (nama_penerima === '') {
            $('#nama_penerima').addClass('is-invalid');
            $('#textnama_penerima').text('No Hp tidak boleh kosong');
        }
        if (email_penerima === '') {
            $('#email_penerima').addClass('is-invalid');

            $('#textemail_penerima').text('Email tidak tidak boleh kosong');
        }
        if (alamat_penerima === '') {
            $('#alamat_penerima').addClass('is-invalid');
            $('#textalamat_penerima').text('Alamat tidak boleh kosong');
        }

        if (
            no_hp_pengirim === ''
            || nama_pengirim === ''
            || email_pengirim === ''
            || alamat_pengirim === ''
            || kota_id_pengirim === ''

            || no_hp_penerima === ''
            || email_penerima === ''
            || nama_penerima === ''
            || alamat_penerima === ''
            || kota_id_penerima === ''
            ) {
            return false;
        }

        // validasi
        let succeesKirim = false;
        if (no_hp_pengirim == no_hp_penerima ) {
            alert("No Hp penerima tidak boleh sama dengan pengirim");
            $('#no_hp_penerima').addClass('is-invalid');
            $('#textno_hp_penerima').text('No Hp tidak boleh sama dengan penerima');
            $('#textno_hp_penerima').text('No Hp tidak boleh sama dengan pengirim');
            $('#no_hp_pengirim').addClass('is-invalid');
            return false;

        } else if (email_pengirim == email_penerima) {
            alert("Email penerima tidak boleh sama dengan pengirim");

            $('#email_penerima').addClass('is-invalid');
            $('#email_pengirim').addClass('is-invalid');
            $('#textemail_pengirim').text('Email tidak boleh sama dengan penerima');
            $('#textemail_penerima').text('Email tidak boleh sama dengan pengirim');
            return false;
        }else{

            let new_pengirim =  $("#new_pengirim").is(":checked")
            let new_penerima =  $("#new_penerima").is(":checked")
            console.log("new_pengirim",new_pengirim);
            console.log("new_penerima",new_penerima);

            // kirim ke serve data pelanggan;
            if (new_pengirim == true || new_penerima == true)  {
                if (new_pengirim  === true) {

                dataPelangganPengirim ={
                    "no_hp_pengirim" : no_hp_pengirim,
                    "nama_pengirim" : nama_pengirim,
                    "alamat_pengirim" : alamat_pengirim,
                    "email_pengirim" : email_pengirim,
                    "alamat_pengirim" : alamat_pengirim,
                    "kota_id_pengirim" : kota_id_pengirim,
                    "kota_id_pengirim" : kota_id_pengirim,
                    "limit_pengirim" : limit_pengirim,
                };


                dataPelangganKirim = {...dataPelangganPengirim};
                }
                if (new_penerima === true) {

                    dataPelangganPenerima = {
                        "no_hp_penerima":no_hp_penerima,
                        "nama_penerima":nama_penerima,
                        "email_penerima":email_penerima,
                        "alamat_penerima":alamat_penerima,
                        "kota_id_penerima":kota_id_penerima,
                        "limit_penerima":limit_penerima,
                    };
                    dataPelangganKirim = {...dataPelangganPengirim, ...dataPelangganPenerima};
                }

                let url  = "{{ route('pelanggan.pelangganmultiple') }}";
                var cabang_id = $('#cmblistcabang').val();
                if (cabang_id == '' || cabang_id == undefined) {
                    alert('cabang belum di pilih');
                    return false;
                }

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        ...dataPelangganKirim,
                        cabang_id:cabang_id
                    },
                    success: function (data) {
                        succeesKirim = true;
                        if (new_pengirim == true) {
                            let id_pengirim = data.data.id_pengirim;
                            no_hp_pengirim = data.data.no_hp_pengirim;
                            nama_pengirim = data.data.nama_pengirim;
                            alamat_pengirim = data.data.alamat_pengirim;
                            email_pengirim = data.data.email_pengirim;
                            alamat_pengirim = data.data.alamat_pengirim;
                            kota_id_pengirim = data.data.kota_id_pengirim;
                            limit_pengirim = data.data.limit_pengirim;
                            dataPengirim(id_pengirim, no_hp_pengirim,
                            nama_pengirim, alamat_pengirim, email_pengirim,
                            kota_id_pengirim, limit_pengirim);
                        }
                        if (new_pengirim == true) {
                            let id_penerima = data.data.id_penerima;
                            no_hp_penerima = data.data.no_hp_penerima;
                            nama_penerima = data.data.nama_penerima;
                            alamat_penerima = data.data.alamat_penerima;
                            email_penerima = data.data.email_penerima;
                            alamat_penerima = data.data.alamat_penerima;
                            kota_id_penerima = data.data.kota_id_penerima;
                            limit_penerima = data.data.limit_penerima;
                            dataPenerima(id_penerima, no_hp_penerima,
                            nama_penerima, alamat_penerima, email_penerima,
                            alamat_penerima, alamat_penerima);
                        }

                        console.log(succeesKirim);

                    },
                    error: function (data) {
                        var error = $.parseJSON(data.responseText);
                        let content = '';
                        $.each(error.errors, function (key, value) {
                            // content += `${value} <br>`;
                            $('#' + key).addClass("is-invalid");
                            $('#text' + key).text(value);
                        });
                        succeesKirim = false;
                    }
                });

            }else{
                succeesKirim = true;
            }
            console.log("succeesKirim",succeesKirim);

            if (succeesKirim == false) {
                return false;
            }

            buttonSimpan();

            $('#cmblistPembayaran').prop("disabled", false);
            $('#cmblistTagihan').prop("disabled", false);


            var cmblistPembayaran = $('#cmblistPembayaran');

            let listPembayaranArray = "";
            let kredit = 'tidak';

            if (limit_pengirim > 0) {
                kredit = 'ya';
            }
            if (limit_penerima > 0) {
                kredit = 'ya';
            }
            let listJenisPembayaran = @json($dataJenisPembayaran);

            listPembayaranArray += `<option value="">Pilih Jenis Pembayaran</option>`;

            const filteredPembayaran = Object.entries(listJenisPembayaran).filter(([key, value])=> value.include_limit === 'tidak');

            let listPembayaran = [];

            if (kredit == 'tidak') {
                listPembayaran = Object.fromEntries(filteredPembayaran);
            }else{
                listPembayaran = listJenisPembayaran;
            }
            $.each( listPembayaran, function( key, value ) {
                listPembayaranArray += `
                <option value="${value.id}" id="jenis_pembayaran_${value.id}" data-includelimit=${value.include_limit}
                    data-includecash=${value.include_cash}>
                    ${value.nama}
                </option>
                `;
            });

            clearAllFormPelanggan();

            $("#cmblistPembayaran").html(listPembayaranArray);
            $('#cmblistPembayaran option:eq(0)').prop('selected',true);
            $('#cmblistPembayaran').select2({});
            $('#modalPelanggan').modal('hide');
            buttonSimpan();
            validasiPembayaran()
            return false;


        }


    });

    function clearAllFormPelanggan() {
        // form pengirim
        $('#no_hp_pengirim').removeClass("is-invalid");
        $('#textno_hp_penerima').text('');
        $('#nama_pengirim').removeClass("is-invalid");
        $('#textnama_pengirim').text('');
        $('#alamat_pengirim').removeClass("is-invalid");
        $('#textAlamatPengirimDanger').text('');
        $('#email_pengirim').removeClass("is-invalid");
        $('#textemail_pengirim').text('');

        // form pelanggan
        $('#no_hp_penerima').removeClass("is-invalid");
        $('#textno_hp_penerima').text('');
        $('#nama_penerima').removeClass("is-invalid");
        $('#textnama_penerima').text('');
        $('#alamat_penerima').removeClass("is-invalid");
        $('#textalamat_penerima').text('');
        $('#email_penerima').removeClass("is-invalid");
        $('#textemail_penerima').text('');
    }

    $("#no_hp_pengirim").on("keypress keyup blur", function(e) {
        $('#no_hp_pengirim').removeClass("is-invalid");
        $('#textno_hp_pengirim').text('');
        $("#new_pengirim").prop('checked', true);
        $("#limit_pengirim_detail").hide();
        $("#limit_pengirim_tampil_detail").hide();
        $("#limit_pengirim_pembayaran_detail").hide();
        $('#limit_pengirim_tampil').val("");
        $('#limit_pengirim_kirim').text("");
        $('#limit_pengirim_pembayaran').text("");
    });

    $("#nama_pengirim").on("keypress keyup blur", function(e) {
        $('#nama_pengirim').removeClass("is-invalid");
        $('#textnama_pengirim').text('');
        $("#new_pengirim").prop('checked', true);
        $("#limit_pengirim_detail").hide();
        $("#limit_pengirim_tampil_detail").hide();
        $("#limit_pengirim_pembayaran_detail").hide();
        $('#limit_pengirim_tampil').val("");
        $('#limit_pengirim_kirim').text("");
        $('#limit_pengirim_pembayaran').text("");
    });
    $("#alamat_pengirim").on("keypress keyup blur", function(e) {
        $('#alamat_pengirim').removeClass("is-invalid");
        $('#textAlamatPengirimDanger').text('');
        $("#new_pengirim").prop('checked', true);
        $("#limit_pengirim_detail").hide();
        $("#limit_pengirim_tampil_detail").hide();
        $("#limit_pengirim_pembayaran_detail").hide();
        $('#limit_pengirim_tampil').val("");
        $('#limit_pengirim_kirim').text("");
        $('#limit_pengirim_pembayaran').text("");
    });
    $("#email_pengirim").on("keypress keyup blur", function(e) {
        $('#email_pengirim').removeClass("is-invalid");
        $('#textemail_pengirim').text('');
        $("#new_pengirim").prop('checked', true);
        $("#limit_pengirim_detail").hide();
        $("#limit_pengirim_tampil_detail").hide();
        $("#limit_pengirim_pembayaran_detail").hide();
        $('#limit_pengirim_tampil').val("");
        $('#limit_pengirim_kirim').text("");
        $('#limit_pengirim_pembayaran').text("");
    });

    $("#no_hp_penerima").on("keypress keyup blur", function (e) {
        $('#no_hp_penerima').removeClass("is-invalid");
        $('#textno_hp_penerima').text('');
        $("#new_penerima").prop('checked', true);
        $("#limit_penerima_detail").hide();
        $("#limit_penerima_tampil_detail").hide();
        $("#limit_penerima_pembayaran_detail").hide();
        $('#limit_penerima_tampil').val("");
        $('#limit_penerima_kirim').text("");
        $('#limit_penerima_pembayaran').text("");
    });
    $("#nama_penerima").on("keypress keyup blur", function(e) {
        $('#nama_penerima').removeClass("is-invalid");
        $('#textnama_penerima').text('');
        $("#new_penerima").prop('checked', true);
        $("#limit_penerima_detail").hide();
        $("#limit_penerima_tampil_detail").hide();
        $("#limit_penerima_pembayaran_detail").hide();
        $('#limit_penerima_tampil').val("");
        $('#limit_penerima_kirim').text("");
        $('#limit_penerima_pembayaran').text("");
    });
    $("#alamat_penerima").on("keypress keyup blur", function(e) {
        $('#alamat_penerima').removeClass("is-invalid");
        $('#textalamat_penerima').text('');
        $("#new_penerima").prop('checked', true);
        $("#limit_penerima_detail").hide();
        $("#limit_penerima_tampil_detail").hide();
        $("#limit_penerima_pembayaran_detail").hide();
        $('#limit_penerima_tampil').val("");
        $('#limit_penerima_kirim').text("");
        $('#limit_penerima_pembayaran').text("");
    });
    $("#email_penerima").on("keypress keyup blur", function (e) {
        $('#email_penerima').removeClass("is-invalid");
        $('#textemail_penerima').text('');
        $("#new_penerima").prop('checked', true);
        $("#limit_penerima_detail").hide();
        $("#limit_penerima_tampil_detail").hide();
        $("#limit_penerima_pembayaran_detail").hide();
        $('#limit_penerima_tampil').val("");
        $('#limit_penerima_kirim').text("");
        $('#limit_penerima_pembayaran').text("");
    });

</script>
@endpush
