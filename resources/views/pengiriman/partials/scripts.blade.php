<script script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>


<script>

    $(document).ready(function() {

        // hiden class cash
        $(".cash").hide();
        $("#form_sales_id").hide();
        $("#form_uang_bayar").hide();
        $("#form_uang_kembali").hide();
        $("#textTotalDanger").hide();
        $("#textUangDanger").hide();
        // $('#btnSimpan').prop("disabled", true);
        var cabang_id = $('#cmblistcabang').val();


        $(".nominal").on("keypress keyup blur", function(event) {
            $(this).val($(this).val().replace(/[^0-9\.|\,]/g, ''));
            if (event.which == 44) {
                return true;
            }
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event
                    .which > 57)) {

                event.preventDefault();
            }
        });

        // key press rupiah
        $(".rupiah").keyup(function() {
            var nominal = $(this).val();
            var rupiah = nominal.replace(/\D/g, '');
            $(this).val(formatRupiah(rupiah));
        });
        $("#cmblistcabang").select2({
            placeholder: '--- Pilih ' + "Cabang" + ' ---',
            width: '100%'
        });

        $("#cmblistcabang").on("change", function(e) {
            $("#cmblistcabang").removeClass("is-invalid");
            $("#textlistcabang").html("");
            // get generate-kode-resi
            var id = $(this).val();
            var url = "{{ route('generate-kode-resi', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $("#kode_resi").val(data.kode_resi);
                    $("#cabang_id_pelanggan").val(id);

                    $('#cabang_id').val(id);

                    buttonSimpan();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Mohon Refresh Windows anda');
                }
            });
        });
        $("#cmblistkotaPengirim").select2({
            placeholder: '--- Pilih ' + "Kota" + ' ---',
            width: '100%'
        });
        $("#cmblistkotaPenerima").select2({
            placeholder: '--- Pilih ' + "Kota" + ' ---',
            width: '100%'
        });
        $("#cmblistpengirim").select2({
            placeholder: '--- Pilih ' + "Pengirim" + ' ---',
            width: '100%'
        });
        $("#cmblistpengirim").on("change", function(e) {
            $("#listpengirim").removeClass("is-invalid");
            $("#textlistpengirim").html("");
            let idpengirim = $(this).val();
            let urlpengirim = "{{ route('get-pelanggan', ':idpengirim') }}";
            urlpengirim = urlpengirim.replace(':idpengirim', idpengirim);
            $.ajax({
                url: urlpengirim,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    const {
                        id,
                        kode,
                        nama,
                        no_hp,
                        email,
                        alamat,
                        kota_id,
                        sales
                    } = data.data;
                    $("#kode_pengirim").val(kode);
                    $("#nama_pengirim").val(nama);
                    $("#no_hp_pengirim").val(no_hp);
                    $("#alamat_pengirim").val(alamat);
                    if (sales != null)
                    {
                        $("#sales_id").val(sales);
                        $("#form_sales_id").show();
                    } else {
                        $("#sales_id").val('');
                        $("#form_sales_id").hide();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Mohon Refresh Windows anda');
                }
            });
        });

        $("#cmblistpenerima").select2({
            placeholder: '--- Pilih ' + "Pengirim" + ' ---',
            width: '100%'
        });




        $("#cmblistpenerima").on("change", function(e) {
            $("#listpenerima").removeClass("is-invalid");
            $("#textlistpenerima").html("");
            let idpenerima = $(this).val();
            let urlpenerima = "{{ route('get-pelanggan', ':idpenerima') }}";
            urlpenerima = urlpenerima.replace(':idpenerima', idpenerima);
            $.ajax({
                url: urlpenerima,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    const {
                        id,
                        kode,
                        nama,
                        no_hp,
                        email,
                        alamat,
                        kota_id
                    } = data.data;
                    $("#kode_penerima").val(kode);
                    $("#nama_penerima").val(nama);
                    $("#no_hp_penerima").val(no_hp);
                    $("#alamat_penerima").val(alamat);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Mohon Refresh Browser anda');
                }
            });
        });

        // jika btnPengirim di klik maka muncul modal pengirim
        $("#btnPengirim").on("click", function(e) {
            $("#modalPelanggan").modal("show");

        });

        $("#btnPenerima").on("click", function(e) {
            $("#modalPelanggan").modal("show");
        });




        // data penerima
        $("#cari_no_hp_pengirim").on("click", function(e) {
            let no_hp_pengirim = $('#no_hp_pengirim').val();


            caripelanggan(no_hp_pengirim);

        });

        function caripelanggan(params) {
            let url_no_pengirim = "{{ route('get-pelanggan-no-hp') }}";
            $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                    no_hp: no_hp_pengirim,
                    id:cabang_id,
                },
                success: function(data) {
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        }

        // chechbok over via


        $(document).on('click', '#over_via_check', function(e) {
            e.stopPropagation();

            let over_via_check = $('#over_via_check').is(':checked');

            if (over_via_check == true) {
                // $('#cmblistVendorOverVia').prop("disabled", false);
                $('#detail_over_vial').show();
                $('#harga_berat').prop('readonly',null);
                $('#harga_berat_tampil').prop('readonly',null);
                totalQty();
            }else{
                $("#vendor_id").val('')
                $('#detail_over_vial').hide();
                $('#harga_berat').prop('readonly',null);
                $('#harga_berat_tampil').prop('readonly',null);
                $('#harga_modal').val(0);
                $('#harga_pelanggan').val(0);
                $('#nama_vendor').html("");
                $('#no_hp_vendor').html("");
                $('#total_hutang_vendor').html("");
                totalQty();
            }
        });



        $('#formPelanggan').on('submit', function(e) {
            e.preventDefault();
        });




        $("#cmbasalkota").select2({
            placeholder: '--- Pilih ' + "Asal Kota" + ' ---',
            width: '100%'
        });

        // $('#cmbasalkota').select2("readonly", true);
        // $('#cmbtujuankota').select2("readonly", true);
        $("#cmbasalkota").prop("disabled", true);
        $("#cmbtujuankota").prop("disabled", true);

        $("#cmbtujuankota").select2({
            // placeholder: '--- Pilih ' + "Tujuan Kota" + ' ---',
            width: '100%'
        });
        $("#cmbharga").select2({
            // placeholder: '--- Pilih ' + "Paket Harga" + ' ---',
            width: '100%'
        });
        $("#cmbakunkas").select2({
            // placeholder: '--- Pilih ' + "Paket Akun Kas" + ' ---',
            width: '100%'
        });




        $("#cmblistPembayaran").select2({
            width: '100%'
        });


        $("#cmblistTagihan").select2({
            width: '100%'
        });


        $("#cmblistlayanan").select2({});
        $("#cmblistlayanan").on('select2:select', function (e) {
            let id_cmblistlayanan = $(this).val();
            if (id_cmblistlayanan != '' || id_cmblistlayanan == undefined) {
                $("#cmblistlayanan").removeClass('is-invalid');
            }
            buttonSimpan();
        });

        $("#cmbbank").select2({
            // placeholder: '--- Pilih ' + "Bank" + ' ---',
            width: '100%'
        });
        // $("#cmbbank").on("change", function(e) {
        //     $('#btnSimpan').prop("disabled", false);
        // });

        // let daftarPelanggan = [];
        // let jumlahPelanggan = 0;
        // async function getData(cabang_id, start, skip) {
        //     return await
        //     $.ajax({
        //         url: "{{ route('semua-pelanggan') }}",
        //         data: {
        //             cabang_id,
        //             start,
        //             skip,
        //         },
        //     })
        //     .then(data => {
        //         jumlahPelanggan = data.count;
        //         let skip  = data.skip + 100;
        //         let start  = data.skip;
        //         let cabang_id  = data.cabang_id;

        //         daftarPelanggan.push(data.data);
        //         console.log(daftarPelanggan);
        //         console.log(data);

        //         getData(cabang_id,start,skip).then((dataChild) =>{
        //             console.log("dataChild",dataChild);
        //             // console.log(daftarPelanggan);
        //         })
        //     });
        // }

    });
</script>
