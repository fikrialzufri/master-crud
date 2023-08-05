<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th class="th-50">Total Kg</th>
                    <td>
                        <div class="row">
                            <div class="col">

                                <div class="input-group">
                                    <input type="hidden" class="" name="total_qty" id="total_qty"
                                        value="{{ $store == 'update' ? $data->total_qty : '' }}">
                                    <input type="text" class="form-control nominal" name="total_qty_tampil" id="total_qty_tampil"
                                        value="{{ $store == 'update' ? format_uang($data->total_qty) : '' }}" readonly>
                                    <span class="input-group-prepend">
                                        <label class="input-group-text">Kg<label>
                                    </span>

                                </div>
                            </div>
                            <div class="form-group form-textinput col-6" id="form_min_berat">


                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text">Min Berat<label>
                                    </span>
                                    <input type="text" class="form-control nominal" name="min_berat" id="min_berat"
                                        value="{{ $store == 'update' ? format_uang($data->min_berat) : '' }}" readonly>
                                    <span class="input-group-prepend">
                                        <label class="input-group-text">Kg<label>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                <tr>
                    <th class="th-50">Total Harga</th>
                    <td>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text">Rp.</label>
                            </span>
                            <input type="hidden" class="form-control " name="total_bayar" id="total_bayar" value="{{ $store == 'update' ? $data->total_transaksi : '' }}"
                                readonly>
                            <input type="text" class="form-control" name="total_bayar_tampil" id="total_bayar_tampil" value="{{ $store == 'update' ? format_uang($data->total_transaksi) : '' }}"
                                readonly>
                        </div>
                        <span id="textDangerLimitPlafon" class="text-danger"></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
