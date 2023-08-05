<div class="modal fade" id="modalPembayaran" role="dialog" aria-labelledby="PembayaranLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PembayaranLabel">Rincian Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 col-lg-3 col">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between">
                                <b>Daftar Pengirim</b>

                            </div>
                            <table class="table">
                                <tr>
                                    <th class="th-50">Nama Pengirim :</th>
                                    <td>
                                        <span id="nama_pengirim_pembayaran">{{ $store == 'update' && $dataPengirim ? $dataPengirim->nama :'' }}</span>
                                        <input type="hidden" name="id_pengirim_pembayaran" id="id_pengirim_pembayaran" value="{{ $store == 'update' && $dataPengirim ? $dataPengirim->id :'' }}">
                                        <input type="hidden" name="nama_pengirim_pembayaran" id="nama_pengirim_pembayaran" value="{{ $store == 'update' && $dataPengirim ? $dataPengirim->nama :'' }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="th-50">No HP Pengirim :</th>
                                    <td>
                                        <span id="no_hp_pengirim_pembayaran">{{ $store == 'update' && $dataPengirim ? $dataPengirim->no_hp :'' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="th-50">Alamat Pengirim :</th>
                                    <td>
                                        <span id="alamat_pengirim_pembayaran">{{ $store == 'update' && $dataPengirim ? $dataPengirim->alamat :'' }}</span>
                                    </td>
                                </tr>
                                <tr id="limit_pengirim_pembayaran_detail">
                                    <th class="th-50">Sisa Plafon Pengirim :</th>
                                    <td>
                                        <span id="limit_pengirim_pembayaran">{{ $store == 'update' && $dataPengirim ? "Rp. ".format_uang($dataPengirim->limit) :'' }}</span>
                                    </td>
                                </tr>
                            </table>
                            <div class="text-justify">
                                <b>Daftar Penerima</b>
                            </div>
                            <table class="table">
                                <tr>
                                    <th class="th-50">Nama Penerima :</th>
                                    <td>
                                        <span id="nama_penerima_pembayaran">{{ $store == 'update' && $dataPengirim ? $dataPenerima->nama :'' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="th-50">No HP Penerima :</th>
                                    <td>
                                        <span id="no_hp_penerima_pembayaran">{{ $store == 'update' && $dataPengirim ? $dataPenerima->no_hp :'' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="th-50">Alamat Penerima :</th>
                                    <td>
                                        <span id="alamat_penerima_pembayaran">{{ $store == 'update' && $dataPengirim ? $dataPenerima->alamat :'' }}</span>
                                    </td>
                                </tr>
                                <tr id="limit_penerima_pembayaran_detail">
                                    <th class="th-50">Sisa Plafon Penerima :</th>
                                    <td>
                                        <span id="limit_penerima_pembayaran">{{ $store == 'update' && $dataPengirim ? "Rp. $store != 'update'".format_uang($dataPenerima->limit) :'' }}</span>
                                    </td>
                                </tr>
                            </table>

                        </div>

                    </div>
                    <div class="col-3 col-lg-3 col">
                        <div class="text-justify">
                            <b>Daftar Barang</b>
                        </div>
                        <table class="table">
                            <tr>
                                <th class="th-50">Total Berat</th>
                                <td>
                                    <span id="berat_pembayaran">{{ $store == 'update' ? "Rp. ".format_uang($data->total_harga_berat) : '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="th-50">Diskon Berat</th>
                                <td>
                                    <span id="diskon_berat_pembayaran">{{ $store == 'update' ? "Rp. ".format_uang(abs($data->sub_total_harga_berat - $data->total_harga_berat)) : '' }} </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="th-50">Total Harga Berat</th>
                                <td>
                                    <span id="total_harga_berat_pembayaran">{{ $store == 'update' ? "Rp. ".format_uang($data->total_harga_berat) : '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="th-50">Total Kubikasi</th>
                                <td>
                                    <span id="total_kubikasi_pembayaran">{{ $store == 'update' ? "Rp. ".format_uang($data->total_harga_kubikasi) : '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="th-50">Diskon Kubikasi</th>
                                <td>
                                    <span id="diskon_kubikasi_pembayaran">{{ $store == 'update' ? 'Rp. '.format_uang(abs($data->sub_total_harga_kubikasi - $data->total_harga_kubikasi)) : '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="th-50">Total Harga Kubikasi</th>
                                <td>
                                    <span id="total_harga_kubikasi_pembayaran">{{ $store == 'update' ? "Rp. ".format_uang($data->sub_total_harga_kubikasi) : '' }}</span>
                                </td>
                            </tr>
                            <tr id="form_total_qty_pembayaran">
                                <th>Total Qty</th>
                                <td>
                                    <span id="total_qty_pembayaran">{{ $store == 'update' ? format_uang($data->total_qty) : '' }}</span>
                                </td>
                            </tr>
                            <tr id="form_asuransi_pembayaran">
                                <th>Asuransi</th>
                                <td>
                                    <span id="asuransi_pembayaran">{{ $store == 'update' ? 'Rp. ' . format_uang($data->nilai_barang) : '' }}</span>
                                </td>
                            </tr>
                            <tr id="form_packing_pembayaran">
                                <th>Packing</th>
                                <td>
                                    <span id="packing_pembayaran">{{ $store == 'update' ? 'Rp. ' . format_uang($data->packing_barang) : '' }}</span>
                                </td>
                            </tr>
                            <tr id="form_jemput_barang_pembayaran">
                                <th>Jemput Barang</th>
                                <td>
                                    <span id="jemput_barang_pembayaran">{{ $store == 'update' ? 'Rp. ' . format_uang($data->jemput_barang) : '' }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6 col-lg-6 col">
                        <div class="table-responsive">
                            <table class="table">
                                <tr >
                                    <th class="text-center align-middle">
                                        <h4>Grand Total </h4>

                                    </th>
                                    <th class="text-left align-middle">
                                        <h1><span id="grandtotal">{{ $store == 'update' ? 'Rp. ' . format_uang($data->total_transaksi) : '' }}</span></h1>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <span id="uang_angsul"> {{ $store == 'update' ? format_uang($data->sisa) : '' }}</span>
                                    </th>
                                </tr>
                                <tr id="form_cash">
                                    <th>Cash</th>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <label class="input-group-text">Rp.</label>
                                            </span>
                                            <input type="text" class="form-control rupiah" name="cash" id="cash" value="{{ $store == 'update' ? format_uang($data->cash) : '' }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr id="form_transfer">
                                    <th>Transfer</th>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <label class="input-group-text">Rp.</label>
                                            </span>
                                            <input type="text" class="form-control rupiah" name="transfer" id="transfer" value="{{ $store == 'update' ? format_uang($data->transfer) : '' }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr id="form_cmblistBank">
                                    <th>Pilih Bank</th>
                                    <td>
                                        <select class="form-control select2" id="cmblistBank" name="bank_id">
                                            <option value="">
                                                Pilih Bank
                                            </option>
                                            @foreach ($dataBank as $bank)
                                            <option value="{{ $bank->id }}" id="bank_{{ $bank->id }}" {{ $store == 'update' && $data->bank_id == $bank->id ? "selected" : "" }}>
                                                {{ ucwords($bank->nama) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr id="form_catatan">
                                    <th>Catatan</th>
                                    <td>
                                        <textarea class="form-control " name="catatan" id="catatan" >{{ $store == 'update' ? $data->catatan : '' }}</textarea>
                                    </td>
                                </tr>
                                <tr id="form_koli_pembayaran">
                                    <th>Koli</th>
                                    <td>
                                        <div class="input-group">

                                            <input type="text" class="form-control nominal" name="koli_pembayaran"
                                                id="koli_pembayaran" value="{{ $store == 'update' ? format_uang($data->koli_berat) : '' }}" readonly>
                                        </div>
                                    </td>
                                </tr>



                            </table>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="submitSimpanPembayaran" type="submit" name="Tambah Pelanggan" disabled>
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        @if ($store == 'update' && $dataPengirim && $dataPengirim->transfer > 0)
            $('#form_cmblistBank').show();
        @else
            $('#form_cmblistBank').hide();
        @endif

        $("#cmblistBank").select2({
            width: '100%'
        });
        $("#transfer").on("keyup keypress blur", function(e) {
            buttonPembayaran();
        });
        $("#cash").on("keyup keypress blur", function(e) {
            buttonPembayaran();
        });

        $("#cmblistBank").on("change", function(e) {
            if ($(this).val() !== '') {
                buttonPembayaran();
            }else{
                $('#submitSimpanPembayaran').prop("disabled", true);
            }
        });



        function buttonPembayaran() {

            let kredit_pengirim = $("#kredit_pengirim").val();
            let cmblistPembayaran = $("#cmblistPembayaran").text();
            let cmblistBank = $("#cmblistBank").val() === '' || $("#cmblistBank").val() === undefined ? "" : $("#cmblistBank").val() ;

            let cash = $("#cash").val() === '' || $("#cash").val() === undefined ? 0 : $("#cash").val().replaceAll(/\./g,'');
            let transfer = $("#transfer").val() === '' || $("#transfer").val() === undefined ? 0 :$("#transfer").val().replaceAll(/\./g,'') ;

            let grantotal = Number($("#total_bayar").val());

            let total = Number(cash) + Number(transfer);
            let uang_angsul =  0;
            let jenis_pembayaran = $("#jenis_pembayaran").val();

            if (grantotal > total) {
                uang_angsul = Number(grantotal) - Number(total);
                $("#uang_angsul").text("Kurang Bayar " + formatRupiah(uang_angsul.toString(), ''));
            }else{
                uang_angsul = Number(total) - Number(grantotal);
                $("#uang_angsul").text("Uang Kembali  " + formatRupiah(uang_angsul.toString(), ''));

            }

            if (transfer > 0 ) {
                $('#form_cmblistBank').show();
                if (cmblistBank != '') {
                    $('#submitSimpanPembayaran').prop("disabled", null);
                }else{
                    $('#submitSimpanPembayaran').prop("disabled", true);

                }
                return false;
            }else{
                $('#form_cmblistBank').hide();
                $("#cmblistBank").val('').trigger('change');
                let includecash = $('#includecash').val()
                console.log(includecash);
                if (jenis_pembayaran == 'ya' || includecash == 'tidak' || includecash == '' || includecash == undefined) {

                    $('#submitSimpanPembayaran').prop("disabled", null);
                }else{

                    if (total >= 1) return $('#submitSimpanPembayaran').prop("disabled", null);
                    if (total <= 1) return $('#submitSimpanPembayaran').prop("disabled", true);
                }
            }

            return false;
        }
    </script>
@endpush
