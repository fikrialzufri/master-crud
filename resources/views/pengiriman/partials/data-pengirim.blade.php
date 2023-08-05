<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="button" id="btnPengirimModal">
                    Input Pengirim & Penerima
                </button>
            </div>
        </div>

    </div>
    <div class="form-group form-textinput col-lg-6 col-md-6" id="form_cmblistTagihan">
        <div class="checkbox-fade fade-in-warning">
            <label>
                <input type="checkbox" value="ya" id="over_via_check" name="over_via" {{ $store == 'update' && $data->over_via == 'ya' ? 'checked' :'' }}>
                <span class="cr">
                    <i class="cr-icon ik ik-check txt-warning"></i>
                </span>
                <span>Over Via Ke Vendor</span>
            </label>
        </div>
    </div>
    <div class="form-group form-textinput col-lg-6 col-md-6" id="form_cmblistPembayaran">
        <div>
            <label for="cmblistPembayaran" class=" form-control-label">Pilih Jenis Pembayaran</label>
        </div>
        <select class="form-control select2" id="cmblistPembayaran" name="jenis_pembayaran_id" {{ $store != 'update'   ? "disabled" : '' }}>
            <option selected="selected" value="">Pilih Jenis Pembayaran
            </option>
            @foreach ($dataJenisPembayaran as $pembayaran)
            <option value="{{ $pembayaran->id }}" id="jenis_pembayaran_{{ $pembayaran->id }}" data-includelimit={{ $pembayaran->include_limit }} data-includecash={{ $pembayaran->include_cash }} {{ $store == 'update' && $data->jenis_pembayaran_id == $pembayaran->id ? "selected" : "" }}>
                {{ ucwords($pembayaran->nama) }}
            </option>
            @endforeach
        </select>
        <input type="hidden" name="jenis_pembayaran" id="jenis_pembayaran">
        <input type="hidden" name="includecash" id="includecash">
    </div>
    <div class="form-group form-textinput col-lg-6 col-md-6" id="form_cmblistTagihan">
        <div>
            <label for="cmblistTagihan" class=" form-control-label">Pilih Jenis Tagihan</label>
        </div>

        <select class="form-control select2" id="cmblistTagihan" name="jenis_Tagihan_id" {{ $store != 'update'   ? "disabled" : '' }}>
            <option selected="selected" value="">Pilih Jenis Tagihan
            </option>
            @foreach ($dataJenisTagihan as $jenis_tagihan)
            <option value="{{ $jenis_tagihan->id }}" id="jenis_tagihan_{{ $jenis_tagihan->id }}" data-tagihan="{{ $jenis_tagihan->tagihan }}" {{ $store == 'update' && $data->jenis_tagihan_id == $jenis_tagihan->id ? "selected" : "" }}>
                {{ ucwords($jenis_tagihan->nama) }}
            </option>
            @endforeach
        </select>
        <span id="textDangerJenisTagihan" class="text-danger"></span>
        <input type="hidden" name="jenis_tagihan" id="jenis_tagihan">
    </div>

</div>
<div class="" id="detail_over_vial">

    <div class="row">
        <div class="col-lg-12 col-md-12" id="form_cmblistVendorOverVia">
            <div>
                <label for="cmblistVendorOverVia" class=" form-control-label">Vendor Over Via</label>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button" id="btnVendor">
                                Pilih Vendor Over Via
                            </button>
                        </div>
                        <input type="hidden" name="vendor_id" id="vendor_id" value="{{ $store == 'update' && $data ? $data->vendor_id :'' }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <label for="cmblistVendorOverVia" class=" form-control-label">Data Vendor Over Via</label>
                    </div>
                    <span id="nama_vendor">{{ $store == 'update' && $data ? $data->vendor :'' }} </span>
                    <br>
                    <span id="no_hp_vendor">{{ $store == 'update' && $data ? $data->no_hp_vendor :'' }}</span>
                    <br>
                    <span id="total_hutang_vendor">{{ $store == 'update' && $data ? "Rp. ".format_uang($data->total_hutang_vendor) :'' }}</span>
                </div>
            </div>
            <hr />
        </div>

        <div class="col-lg-6 col-md-6">
            <div>
                <label for="harga_modal" class=" form-control-label">Harga Over Via Vendor</label>
            </div>
            <div class="input-group">
                <span class="input-group-prepend">
                    <label class="input-group-text">Rp.</label>
                </span>
                <input type="text" class="form-control rupiah" name="harga_modal" id="harga_modal" value="{{ $store == 'update' && $data ? format_uang($data->harga_modal) :'' }}">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div>
                <label for="harga_pelanggan" class=" form-control-label">Harga Over Via Pelanggan</label>
            </div>
            <div class="input-group">
                <span class="input-group-prepend">
                    <label class="input-group-text">Rp.</label>
                </span>
                <input type="text" class="form-control rupiah" name="harga_pelanggan" id="harga_pelanggan" value="{{ $store == 'update' && $data ? format_uang($data->harga_pelanggan) :'' }}">
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-12">

        <div class="d-flex justify-content-between">
            <b>Daftar Pengirim</b>

        </div>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th class="th-50">Nama Pengirim : </th>
                    <td>
                        <span id="nama_pengirim_tampil">{{ $store == 'update' && $dataPengirim ? $dataPengirim->nama :'' }}</span>
                        <input type="hidden" name="id_pengirim_kirim" id="id_pengirim_kirim" value="{{ $store == 'update' && $dataPengirim ? $dataPengirim->id :'' }}">
                        <input type="hidden" name="nama_pengirim_kirim" id="nama_pengirim_kirim" value="{{ $store == 'update' && $dataPengirim ? $dataPengirim->nama :'' }}">
                    </td>
                </tr>
                <tr>
                    <th class="th-50">No HP Pengirim : </th>
                    <td>
                        <span id="no_hp_pengirim_tampil"> {{ $store == 'update' && $dataPengirim ? $dataPengirim->no_hp :'' }}</span>
                        <input type="hidden" name="no_hp_pengirim_kirim" id="no_hp_pengirim_kirim" value="{{ $store == 'update' && $dataPengirim ? $dataPengirim->no_hp :'' }}">
                    </td>
                </tr>
                <tr>
                    <th class="th-50">Alamat Pengirim : </th>
                    <td>
                        <span id="alamat_pengirim_tampil">{{ $store == 'update' && $dataPengirim ? $dataPengirim->alamat :'' }}</span>
                        <input type="hidden" name="alamat_pengirim_kirim" id="alamat_pengirim_kirim" value="{{ $store == 'update' && $dataPengirim ? $dataPengirim->alamat :'' }}">
                    </td>

                </tr>
                <tr id="limit_pengirim_detail">
                    <th class="th-50">Limit Pengirim :</th>
                    <td>
                        <span id="limit_pengirim_kirim"> {{ $store == 'update' && $dataPengirim ? "Rp. " . format_uang($dataPengirim->limit) :'' }}</span>
                    </td>

                </tr>
            </table>
        </div>
    </div>


    <div class="col-12">
        <div class="d-flex justify-content-between">
            <div class="text-justify">
                <b>Daftar Penerima</b>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th class="th-50">Nama Penerima :</th>
                    <td>
                        <span id="nama_penerima_tampil">{{ $store == 'update' && $dataPenerima ? $dataPenerima->nama :'' }}</span>
                        <input type="hidden" name="id_penerima_kirim" id="id_penerima_kirim" value="{{ $store == 'update' && $dataPenerima ? $dataPenerima->id :'' }}">
                        <input type="hidden" name="nama_penerima_kirim" id="nama_penerima_kirim" value="{{ $store == 'update' && $dataPenerima ? $dataPenerima->nama :'' }}">
                    </td>
                </tr>
                <tr>
                    <th class="th-50">No HP Penerima :</th>
                    <td>
                        <span id="no_hp_penerima_tampil">{{ $store == 'update' && $dataPenerima ? $dataPenerima->no_hp :'' }}</span>
                        <input type="hidden" name="no_hp_penerima_kirim" id="no_hp_penerima_kirim" value="{{ $store == 'update' && $dataPenerima ? $dataPenerima->no_hp :'' }}">
                    </td>
                </tr>
                <tr>
                    <th class="th-50">Alamat Penerima :</th>
                    <td>
                        <span id="alamat_penerima_tampil">{{ $store == 'update' && $dataPenerima ? $dataPenerima->alamat :'' }}</span>
                        <input type="hidden" name="alamat_penerima_kirim" id="alamat_penerima_kirim" value="{{ $store == 'update' && $dataPenerima ? $dataPenerima->alamat :'' }}">
                    </td>
                </tr>
                <tr id="limit_penerima_detail">
                    <th class="th-50">Limit Penerima :</th>
                    <td>
                        <span id="limit_penerima_kirim">{{ $store == 'update' && $dataPenerima ? "Rp. ".format_uang($dataPenerima->limit) :'' }}</span>
                    </td>

                </tr>
            </table>
        </div>
    </div>
</div>
@push('head')
    <style>
        .select2-results__options .span {
            display: none;
        }
    </style>
@endpush
@push('script')
<script>

    @if ($store == 'update' && $dataPenerima  && $dataPenerima->limit > 0)
        $("#limit_penerima_pembayaran_detail").show();
        $('#limit_penerima_tampil_detail').show();
        $("#limit_penerima_detail").show();
    @else
        $("#limit_penerima_pembayaran_detail").hide();
        $('#limit_penerima_tampil_detail').hide();
        $("#limit_penerima_detail").hide();
    @endif
    @if ($store == 'update' && $dataPengirim  && $dataPengirim->limit > 0)
        $("#limit_pengirim_pembayaran_detail").show();
        $('#limit_pengirim_tampil_detail').show();
        $("#limit_pengirim_detail").show();
    @else
        $("#limit_pengirim_pembayaran_detail").hide();
        $('#limit_pengirim_tampil_detail').hide();
        $("#limit_pengirim_detail").hide();
    @endif

    @if ($store == 'update' && $data  && $data->over_via == 'ya')
        $("#detail_over_vial").show();
    @else
        $("#detail_over_vial").hide();
    @endif



    $("#cmblistTagihan").on("change", function(e) {

        $("#textDangerJenisTagihan").text('');
        let id_tagihan = $("#cmblistTagihan").val();
        if (id_tagihan != undefined) {
            let jenis_tagihan = $("#jenis_tagihan_"+id_tagihan).data('tagihan');
            $("#jenis_tagihan").val(jenis_tagihan);
        }
        buttonSimpan();
        validasiPembayaran();

    });

    $("#harga_pelanggan").on("keyup keypress blur", function(e) {
        let harga_pelanggan = $(this).val() === undefined ? 0 :  $(this).val().replaceAll(/\./g,'');
        $(this).val(formatRupiah(harga_pelanggan));

        $('#harga_berat').val(harga_pelanggan);
        if (harga_pelanggan > 0) {

            $('#harga_berat').prop('readonly',true);
            $('#harga_berat_tampil').prop('readonly',true);
        }else{

            $('#harga_berat').prop('readonly',null);
            $('#harga_berat_tampil').prop('readonly',null);
        }
        harga_pelanggan = formatRupiah(harga_pelanggan.toString(), '');
        $('#harga_berat_tampil').val(harga_pelanggan);
        buttonSimpan();
        validasiPembayaran();
    });
    $("#cmblistPembayaran").on('select2:select', function (e) {
        let includelimit = $(e.params.data.element).data('includelimit');
        let includecash = $(e.params.data.element).data('includecash');
        $("#jenis_pembayaran").val(includelimit);
        $("#includecash").val(includecash);

        console.log(includecash);
        buttonSimpan();
        validasiPembayaran();
    });
    $("#harga_modal").on("keyup blur", function(e) {
        $("#harga_modal").removeClass('is-invalid');
    });
    $("#harga_pelanggan").on("keyup blur", function(e) {
        totalQty();
        $("#harga_pelanggan").removeClass('is-invalid');
    });

    let urlDaftarPelanggan = "{{ route('daftar-pelanggan') }}";
    $('#btnVendor').on('click', function(e){
        // daftar-pelanggan

        let cabang_id = $('#cmblistcabang').val();
        if (cabang_id == undefined || cabang_id == '') {
            $("#cmblistcabang").addClass("is-invalid");
            alert("Mohon Pilih Cabang");
            return false;
        }

        $('#vendorTable').DataTable().destroy();
        $('#vendorTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                'type': 'get',
                'url': urlDaftarPelanggan,
                'data': {
                    "_token": "{{ csrf_token() }}",
                    overvia: 'ya',
                    cabang_id
                },
            },
            autoWidth: false,
            "bSort": true,
            columns: [
                { data: 'nama' },
                { data: 'no_hp' },
                {
                    data: 'total_hutang',
                    render: function(data, type, row, meta){
                        return `Rp. ${formatRupiah(data.toString())}`
                    }
                },
                {
                    data:"data",
                    render: function(value, type, row, meta){
                        return `<span class="btn btn-warning btnvendor" data-id="${value.id}" data-no_hp="${value.no_hp}" data-email="${value.email}"
                            data-nama="${value.nama}" data-alamat="${value.alamat}" data-hutang="${value.total_hutang}" data-type="vendor"
                            data-kota_id="${value.kota_id}">Pilih Vendor</span>`
                    },
                    width: "1%",
                }
            ]
        });



        $('#modalVendor').modal("show");
        // $("#modalPelanggan").modal("show");
    });
    $(document).on('click', '.btnvendor', function() {
        let id = $(this).attr("data-id");
        let nama = $(this).attr("data-nama");
        let no_hp = $(this).attr("data-no_hp");
        let total_hutang = $(this).attr("data-hutang");
        let id_pengirim = $('#id_pengirim_kirim').val();
        let id_penerima = $('#id_penerima_kirim').val();
        $('#vendor_id').val(id);

        if (id === id_pengirim) {
            return alert("Pengirim dan Vendor tidak boleh sama");
        }
        if (id === id_penerima) {
            return alert("Penerima dan Vendor tidak boleh sama");
        }

        $('#nama_vendor').text(nama);
        $('#no_hp_vendor').text(no_hp);
        $('#total_hutang_vendor').text("Total Hutang : Rp. " + formatRupiah(total_hutang.toString()));
        $('#harga_modal').prop("readonly", null);
        $('#harga_pelanggan').prop("readonly", null);
        $('#modalVendor').modal("hide");

        console.log(id);
    });
    $("#btnPengirimModal").on("click", function(e) {
        let cabang_id = $('#cmblistcabang').val();
        if (cabang_id == undefined || cabang_id == '') {
            $("#cmblistcabang").addClass("is-invalid");
            alert("Mohon Pilih Cabang");
            return false;
        }
        let daftartPelanggan = '';

        var tabelPengirimPenerima;
        var strIconSearch = '<i class="fas fa-search"></i> Cari';

        $('#tabelPengirimPenerima').DataTable().destroy();
        $('#tabelPengirimPenerima').DataTable({
            "processing": true,
            "serverSide": true,
            // "paging": true,
            language: {
                lengthMenu: " _MENU_ PerPage",
                search: strIconSearch,
                info: "_START_ / _END_ dari _TOTAL_ Data"
            },
            pageLength: 10,
            searching: true,
            autoWidth: false,
            "bPaginate": true,
            info: true,
            "ajax": {
                'type': 'get',
                'url': urlDaftarPelanggan,
                'data': {
                    cabang_id
                },
            },
            "bSort": true,
            columns: [
                { data: 'nama' },
                { data: 'no_hp' },
                {
                    data: 'plafon',
                    render: function(data, type, row, meta){
                        return `Rp. ${formatRupiah(data.toString())}`
                    }
                },
                {
                    data:"data",
                    render: function(value, type, row, meta){
                        return `<span class="btn btn-warning btnpengirim" data-id="${value.id}" data-no_hp="${value.no_hp}" data-email="${value.email}"
                            data-nama="${value.nama}" data-alamat="${value.alamat}" data-limit="${value.plafon}" data-type="pengirim"
                            data-kota_id="${value.kota_id}">Pengirim</span><span class="btn btn-primary btnpenerima" data-id="${value.id}" data-no_hp="${value.no_hp}" data-email="${value.email}"
                                data-nama="${value.nama}" data-alamat="${value.alamat}" data-limit="${value.plafon}" data-type="penerima"
                                data-kota_id="${value.kota_id}">Penerima</span>`
                    },
                    className: "text-center",
                    width: "25%",
                }
            ],

            aoColumnDefs: [
            {
                bSortable: false,
                aTargets: [ -1 ]
            }
            ],
            "bInfo" : false,
            select: 'single',
            responsive: true,

        });
        $("#modalPelanggan").modal("show");
        // semua-pelanggan

    });




</script>
@endpush
