@extends('template.app')
@section('title', ucwords(str_replace([':', '_', '-', '*'], ' ', $title)))

@section('content')

    <div class="container-fluid">
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
                            @can('edit-cabang-pengiriman')

                                <div class="form-group form-textinput" id="form_cmblistcabang">
                                    <div>
                                        <label for="cmblistcabang" class=" form-control-label">Pilih Cabang</label>
                                    </div>
                                    {{-- select2 --}}
                                    <select class="form-control select2" id="cmblistcabang" name="cabang_id">
                                        <option selected="selected" value="">Pilih cabang
                                        </option>
                                        @foreach ($dataCabang as $cabang)
                                            <option value="{{ $cabang->id }}" id="cabang_{{ $cabang->id }}">
                                                {{ ucwords($cabang->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endcan
                            <div class="row">
                                <div class="form-group form-textinput col-6" id="form_kode_resi">
                                    <div>
                                        <label for="kode_resi" class=" form-control-label">Kode Resi</label>
                                    </div>
                                    <input type="text" class="form-control" name="kode" id="kode_resi"
                                        value="{{ $kode_resi }}" readonly>
                                </div>
                                <div class="form-group form-textinput col-6" id="form_tanggal_pengiriman">
                                    <div>
                                        <label for="tanggal_pengiriman" class=" form-control-label">Tanggal
                                            Pengiriman</label>
                                    </div>
                                    <input type="text" class="form-control" name="tanggal_pengiriman_tampil"
                                        id="tanggal_pengiriman_tampil" value="{{ tanggal_indonesia($now) }}" readonly>
                                    <input type="hidden" name="tanggal" value="{{ $now }}">
                                </div>
                            </div>
                            <div class="form-group form-textinput" id="form_pengirim">
                                <div class="row">

                                    <div class="col-sm-10 pr-0">
                                        <label>Pengirim</label>

                                        <select class="form-control select2" id="cmblistpengirim">
                                            <option selected="selected" value="">Pilih Pengirim
                                            </option>
                                            @foreach ($dataPelanggan as $pelanggan)
                                                <option value="{{ $pelanggan->id }}" id="pengerim_{{ $pelanggan->id }}">
                                                    {{ ucwords($pelanggan->nama) }} | No HP :
                                                    {{ $pelanggan->no_hp }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-sm-2 pl-1 pt-1">
                                        <button type="button" class="mt-4 btn btn-sm btn-primary" data-pelanggan="pengirim"
                                            id="btnPengirim">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group form-textinput col-4" id="form_kode_pengirim">
                                    <div>
                                        <label for="kode_pengirim" class=" form-control-label">Kode Pengirim</label>
                                    </div>
                                    <input type="text" class="form-control" name="kode_pengirim" id="kode_pengirim"
                                        value="" readonly>
                                </div>
                                {{-- nama Pengirim --}}
                                <div class="form-group form-textinput col-4" id="form_nama_pengirim">
                                    <div>
                                        <label for="nama_pengirim" class=" form-control-label">Nama Pengirim</label>
                                    </div>
                                    <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim"
                                        value="" readonly>
                                </div>
                                <div class="form-group form-textinput col-4" id="form_no_hp_pengirim">
                                    <div>
                                        <label for="no_hp_pengirim" class=" form-control-label">No HP Pengirim</label>
                                    </div>
                                    <input type="text" class="form-control" name="no_hp_pengirim" id="no_hp_pengirim"
                                        value="" readonly>
                                </div>
                            </div>
                            <div class="form-group form-textinput" id="form_alamat_pengirim">
                                <div>
                                    <label for="alamat_pengirim" class=" form-control-label">Alamat Pengirim</label>
                                </div>
                                <input type="text" class="form-control" name="alamat_pengirim" id="alamat_pengirim"
                                    value="" readonly>
                            </div>

                            <div class="form-group form-textinput" id="form_penerima">
                                <div class="row">

                                    <div class="col-sm-10 pr-0">
                                        <label>Penerima</label>

                                        <select class="form-control select2" id="cmblistpenerima">
                                            <option selected="selected" value="">Pilih Penerima
                                            </option>
                                            @foreach ($dataPelanggan as $pelanggan)
                                                <option value="{{ $pelanggan->id }}" id="penerima_{{ $pelanggan->id }}">
                                                    {{ ucwords($pelanggan->nama) }} | No HP :
                                                    {{ $pelanggan->no_hp }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-sm-2 pl-1 pt-1">
                                        <button type="button" class="mt-4 btn btn-sm btn-primary"
                                            data-pelanggan="penerima" id="btnPenerima">+</button>
                                    </div>
                                </div>
                            </div>

                            {{-- nama Penerima --}}
                            <div class="row">
                                <div class="form-group form-textinput col-4" id="form_kode_penerima">
                                    <div>
                                        <label for="kode_penerima" class=" form-control-label">Kode Penerima</label>
                                    </div>
                                    <input type="text" class="form-control" name="kode_penerima" id="kode_penerima"
                                        value="" readonly>
                                </div>
                                <div class="form-group form-textinput col-4" id="form_nama_penerima">
                                    <div>
                                        <label for="nama_penerima" class=" form-control-label">Nama Penerima</label>
                                    </div>
                                    <input type="text" class="form-control" name="nama_penerima" id="nama_penerima"
                                        value="" readonly>
                                </div>
                                <div class="form-group form-textinput col-4" id="form_no_hp_penerima">
                                    <div>
                                        <label for="no_hp_penerima" class=" form-control-label">No HP Penerima</label>
                                    </div>
                                    <input type="text" class="form-control" name="no_hp_penerima" id="no_hp_penerima"
                                        value="" readonly>
                                </div>
                            </div>
                            <div class="form-group form-textinput" id="form_alamat_penerima">
                                <div>
                                    <label for="alamat_penerima" class=" form-control-label">Alamat Penerima</label>
                                </div>
                                <input type="text" class="form-control" name="alamat_penerima" id="alamat_penerima"
                                    value="" readonly>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <!-- /.card-header -->

                        <div class="card-body">
                            {{-- get kode resi --}}


                            <div class="row">
                                <div class="form-group form-textinput col-3" id="form_cmbharga">
                                    <div>
                                        <label for="kode_resi" class=" form-control-label">Pilih Paket Harga</label>
                                    </div>
                                    {{-- select2 --}}
                                    <select class="form-control select2" id="cmbharga" name="harga_id">
                                        <option selected="selected" value="">Pilih Paket Harga
                                        </option>
                                        @foreach ($dataHarga as $harga)
                                            <option value="{{ $harga->id }}" id="harga_{{ $harga->id }}">
                                                {{ ucwords($harga->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-textinput col-3" id="form_cmbasalkota">
                                    <div>
                                        <label for="cmbasalkota" class=" form-control-label">Pilih Asal Kota</label>
                                    </div>
                                    {{-- select2 --}}
                                    <select class="form-control select2" id="cmbasalkota" readonly>
                                        <option selected="selected" value="">Pilih Asal Kota
                                        </option>
                                        @foreach ($dataKota as $kota)
                                            <option value="{{ $kota->id }}" id="kota_{{ $kota->id }}">
                                                {{ ucwords($kota->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="asal_kota_id" id="asal_kota_id">
                                </div>
                                <div class="form-group form-textinput col-3" id="form_cmbtujuankota">
                                    <div>
                                        <label for="cmbtujuankota" class=" form-control-label">Pilih Tujuan Kota</label>
                                    </div>
                                    {{-- select2 --}}
                                    <select class="form-control select2" id="cmbtujuankota" name="tujuan_kota_id">
                                        <option selected="selected" value="">Pilih Tujuan Kota
                                        </option>
                                        @foreach ($dataKota as $kota)
                                            <option value="{{ $kota->id }}" id="tujuan_kota_{{ $kota->id }}">
                                                {{ ucwords($kota->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="tujuan_kota_id" id="tujuan_kota_id">

                                </div>
                                <div class="form-group form-textinput col-3" id="form_cmbsales">
                                    <div>
                                        <label for="cmbsales" class=" form-control-label">Pilih Sales</label>
                                    </div>
                                    {{-- select2 --}}
                                    <select class="form-control select2" id="cmbsales" name="karyawan_id">
                                        <option selected="selected" value="">Pilih Sales
                                        </option>
                                        @foreach ($dataKaryawan as $karyawan)
                                            <option value="{{ $karyawan->id }}" id="karyawan_{{ $karyawan->id }}">
                                                {{ ucwords($karyawan->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">

                                    <h4 class="sub-title">Data Barang
                                        <input type="checkbox" name="type_barang_pengiriman" value="berat"
                                            id="data_barang">
                                    </h4>
                                </div>
                                <div class="form-group form-textinput col-md-3" id="form_berat">
                                    <div>
                                        <label for="berat" class=" form-control-label">Berat</label>
                                    </div>
                                    <div class="input-group">
                                        <input type="number" class="form-control nominal" name="berat" id="berat"
                                            value="">
                                        <span class="input-group-prepend">
                                            <label class="input-group-text">Kg</label>
                                        </span>

                                    </div>
                                    <span class="text-danger text-capitalize">
                                        <strong id="textBeratDanger">

                                        </strong>
                                    </span>
                                </div>
                                <div class="form-group form-textinput col-md-3" id="form_harga_berat">
                                    <div>
                                        <label for="harga_berat" class=" form-control-label">Harga /Kg</label>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <label class="input-group-text">Rp.</label>
                                        </span>
                                        <input type="text" class="form-control nominal" name="harga_berat"
                                            id="harga_berat" value="" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-textinput col-md-3" id="form_qty_berat">
                                    <div>
                                        <label for="qty_berat" class=" form-control-label">Qty</label>
                                    </div>
                                    <input type="text" class="form-control nominal" name="qty_berat" id="qty_berat"
                                        value="">
                                </div>
                                <div class="form-group form-textinput col-md-3" id="form_total_harga_berat">
                                    <div>
                                        <label for="total_harga_berat" class=" form-control-label">Total Harga /Kg</label>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <label class="input-group-text">Rp.</label>
                                        </span>
                                        <input type="text" class="form-control rupiah" name="total_harga_berat"
                                            id="total_harga_berat" value="">
                                    </div>
                                </div>
                                <div class="form-group form-textinput col-md-3" id="form_nilai_barang">
                                    <div>
                                        <label for="total_harga_berat" class=" form-control-label">Nilai Barang</label>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <label class="input-group-text">Rp.</label>
                                        </span>
                                        <input type="text" class="form-control rupiah" name="nilai_barang"
                                            id="nilai_barang" value="">
                                    </div>
                                </div>
                                <div class="form-group form-textinput col-md-9" id="form_catatan_barang">
                                    <div>
                                        <label for="catatan" class=" form-control-label">Catatan Barang</label>
                                    </div>

                                    <textarea name="catatan" id="catatan_barang" cols="2" class="form-control" rows="2">

                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">

                                    <h4 class="sub-title">Kubikasi
                                        <input type="checkbox" name="type_barang_pengiriman" value="kubikasi"
                                            id="kubikasi">
                                    </h4>
                                </div>
                                <div class="form-group form-textinput col" id="form_panjang">
                                    <div>
                                        <label for="panjang" class=" form-control-label">Panjang</label>
                                    </div>
                                    <input type="text" class="form-control nominal" name="panjang" id="panjang"
                                        value="">
                                </div>
                                <div class="form-group form-textinput col" id="form_lebar">
                                    <div>
                                        <label for="lebar" class=" form-control-label">Lebar</label>
                                    </div>
                                    <input type="text" class="form-control nominal" name="lebar" id="lebar"
                                        value="">
                                </div>
                                <div class="form-group form-textinput col" id="form_tinggi">
                                    <div>
                                        <label for="tinggi" class=" form-control-label">Tinggi</label>
                                    </div>
                                    <input type="text" class="form-control nominal" name="tinggi" id="tinggi"
                                        value="">
                                </div>
                                <div class="form-group form-textinput col" id="form_qty">
                                    <div>
                                        <label for="total_kubikasi" class=" form-control-label">Total</label>
                                    </div>

                                    <div class="input-group">

                                        <input type="text" class="form-control nominal" name="total_kubikasi"
                                            id="total_kubikasi" value="" readonly>
                                        <span class="input-group-prepend">
                                            <label class="input-group-text">M<sup>3</sup> </label>
                                        </span>
                                    </div>


                                    <span class="text-danger text-capitalize">
                                        <strong id="textTotalDanger">

                                        </strong>
                                    </span>
                                </div>
                                <input type="hidden" name="min_berat" id="min_berat">
                                <div class="form-group form-textinput col" id="form_qty_kubikasi">
                                    <div>
                                        <label for="qty_kubikasi" class=" form-control-label">Qty</label>
                                    </div>
                                    <input type="number" class="form-control nominal" name="qty_kubikasi"
                                        id="qty_kubikasi" value="">
                                </div>

                                {{-- menghitung kubikasi --}}
                            </div>
                            <div class="row">
                                <div class="form-group form-textinput col" id="form_harga_kubikasi">
                                    <div>
                                        <label for="harga_kubikasi" class=" form-control-label">Harga</label>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <label class="input-group-text">Rp.</label>
                                        </span>
                                        <input type="text" class="form-control nominal" name="harga_kubikasi"
                                            id="harga_kubikasi" value="" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-textinput col" id="form_total_harga_kubikasi">
                                    <div>
                                        <label for="total_harga_kubikasi" class=" form-control-label">Total Harga</label>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <label class="input-group-text">Rp.</label>
                                        </span>
                                        <input type="text" class="form-control nominal" name="total_harga_kubikasi"
                                            id="total_harga_kubikasi" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr />

                            <div class="row">
                                <div class="form-group form-textinput col-md-4" id="form_cmbjenislayanan">
                                    <div>
                                        <label for="cmbjenislayanan" class=" form-control-label">Pilih Jenis
                                            layanan</label>
                                    </div>
                                    {{-- select2 --}}
                                    <select class="form-control select2" id="cmbjenislayanan" name="jenis_layanan_id">
                                        <option selected="selected" value="">Pilih Jenis
                                            layanan
                                        </option>
                                        @foreach ($dataJenislayanan as $layanan)
                                            <option value="{{ $layanan->id }}" id="layanan_{{ $layanan->id }}">
                                                {{ ucwords($layanan->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-textinput col-md-4" id="form_cmbjenistagihan">
                                    <div>
                                        <label for="cmbjenistagihan" class=" form-control-label">Pilih Jenis
                                            tagihan</label>
                                    </div>
                                    {{-- select2 --}}
                                    <select class="form-control select2" id="cmbjenistagihan" name="jenis_tagihan_id">
                                        <option selected="selected" value="">Pilih Jenis Tagihan </option>
                                        @foreach ($dataJenisTagihan as $tagihan)
                                            <option value="{{ $tagihan->id }}" id="tagihan_{{ $tagihan->id }}">
                                                {{ ucwords($tagihan->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-textinput col-md-4" id="form_cmbjenispembayaran">
                                    <div>
                                        <label for="cmbjenispembayaran" class=" form-control-label">Pilih Jenis
                                            Pembayaran</label>
                                    </div>
                                    {{-- select2 --}}
                                    <select class="form-control select2" id="cmbjenispembayaran"
                                        name="jenis_pembayaran_id">
                                        <option selected="selected" value="">Pilih Jenis Pembayaran
                                        </option>
                                        @foreach ($dataJenisPembayaran as $pembayaran)
                                            <option value="{{ $pembayaran->id }}" id="pembayaran_{{ $pembayaran->id }}">
                                                {{ $pembayaran->kode }} - {{ ucwords($pembayaran->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row cash">
                                <div class="form-group form-textinput col-md-6" id="form_cmbmetodepembayaran">
                                    <div>
                                        <label for="cmbmetodepembayaran" class=" form-control-label">Pilih Metode
                                            Bayar</label>
                                    </div>
                                    {{-- select2 --}}
                                    <select class="form-control select2" id="cmbmetodepembayaran"
                                        name="metode_pembayaran_id">
                                        <option selected="selected" value="">Pilih Metode Bayar
                                        </option>
                                        @foreach ($dataMetodePembayaran as $metode)
                                            <option value="{{ $metode->id }}" id="metode_{{ $metode->id }}">
                                                {{ ucwords($metode->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-textinput col-md-6" id="form_cmbbank">
                                    <div>
                                        <label for="cmbbank" class=" form-control-label">Pilih Bank</label>
                                    </div>
                                    {{-- select2 --}}
                                    <select class="form-control select2" id="cmbbank" name="bank_id">
                                        <option selected="selected" value="">Pilih Bank
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th class="th-50">Total</th>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <label class="input-group-text">Rp.</label>
                                                        </span>
                                                        <input type="text" class="form-control nominal"
                                                            name="total_bayar" id="total_bayar" value="" readonly>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Diskon</th>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control nominal rupiah"
                                                            name="diskon" id="diskon" value="">
                                                        <span class="input-group-prepend">
                                                            <label class="input-group-text">%</label>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="form_grand_total">
                                                <th>Grand Total</th>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <label class="input-group-text">Rp.</label>
                                                        </span>
                                                        <input type="text" class="form-control nominal"
                                                            name="grandtotal" id="grandtotal" value="" readonly>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr id="form_uang_bayar">
                                                <th>Uang Bayar</th>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <label class="input-group-text">Rp.</label>
                                                        </span>
                                                        <input type="text" class="form-control nominal rupiah"
                                                            name="uang_bayar" id="uang_bayar" value="">
                                                    </div>
                                                    <span class="text-danger text-capitalize">
                                                        <strong id="textUangDanger">

                                                        </strong>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr id="form_uang_kembali">
                                                <th>Uang Kembali</th>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <label class="input-group-text">Rp.</label>
                                                        </span>
                                                        <input type="text" class="form-control nominal"
                                                            name="uang_kembali" id="uang_kembali" value=""
                                                            readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr></tr>
                                            <tr>
                                                <th>Asuransi</th>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <label class="input-group-text">Rp.</label>
                                                        </span>
                                                        <input type="text" class="form-control nominal"
                                                            name="asuransi" id="asuransi" value="" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-footer clearfix">
                            <button type="submit" id="btnSimpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <div class="modal fade edit-layout-modal pr-0 " id="modalPelanggan" role="dialog"
            aria-labelledby="CustomerAddLabel" aria-hidden="true">
            <div class="modal-dialog w-150" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CustomerAddLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="formPelanggan">
                            {{-- hiden pelanggan dapat dari data pelanggan --}}
                            <input type="hidden" name="pelanggan" id="pelanggan">
                            <input type="hidden" name="cabang_id_pelanggan" id="cabang_id_pelanggan"
                                value="{{ $cabang_id }}">
                            <div class="form-group">
                                <label class="d-block">Nama Pelanggan</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="isi Nama Pelanggan" required>
                            </div>
                            <div class="form-group">
                                <label class="d-block">No HP</label>
                                <input type="number" name="no_hp" id="no_hp" class="form-control"
                                    placeholder="isi No HP" required>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="isi Email">
                            </div>
                            <div class="form-group">
                                <label class="d-block">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="kode_resi" class=" form-control-label">Pilih Kota</label>
                                </div>
                                {{-- select2 --}}
                                <select class="form-control select2" id="cmblistkota" name="kota_id_pelanggan">
                                    <option selected="selected" value="" required>Pilih kota
                                    </option>
                                    @foreach ($dataKota as $kota)
                                        <option value="{{ $kota->id }}" id="kota_pelanggan_{{ $kota->id }}">
                                            {{ ucwords($kota->nama) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" id="submintPelanggan" type="submit"
                                    name="Tambah Pelanggan">
                                    Tambah Pelanggan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

@endsection

@push('script')
    <script script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // hiden class cash
            $(".cash").hide();
            $("#form_uang_bayar").hide();
            $("#form_uang_kembali").hide();
            $("#textTotalDanger").hide();
            $("#textUangDanger").hide();
            $('#btnSimpan').prop("disabled", true);

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
                $("#listcabang").removeClass("is-invalid");
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
                        $("#kode_resi").val(data);
                        $("#cabang_id_pelanggan").val(id);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            });
            $("#cmblistkota").select2({
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
                            kota_id
                        } = data.data;
                        $("#kode_pengirim").val(kode);
                        $("#nama_pengirim").val(nama);
                        $("#no_hp_pengirim").val(no_hp);
                        $("#alamat_pengirim").val(alamat);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
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
                        alert('Error get data from ajax');
                    }
                });
            });

            // jika btnPengirim di klik maka muncul modal pengirim

            $("#btnPenerima").on("click", function(e) {
                $("#modalPelanggan").modal("show");
                // get data-pelanggan
                let pelanggan = $(this).data('pelanggan');
                // set $('#pelanggan').val();
                $('#pelanggan').val(pelanggan);
                // set CustomerAddLabel
                // set pelanggan uppercase
                pelanggan = pelanggan.charAt(0).toUpperCase() + pelanggan.slice(1);
                $('#CustomerAddLabel').html('Tambah' + ' ' + pelanggan);
            });

            $('#formPelanggan').on('submit', function(e) {
                e.preventDefault();

                let nama = $('#nama').val();
                let email = $('#email').val();
                let no_hp = $('#no_hp').val();
                let alamat = $('#alamat').val();
                let cabang_id = $('#cabang_id_pelanggan').val();
                let kota_id = $('#cmblistkota').val();
                let pelanggan = $('#pelanggan').val();

                // cek jika nama email no_hp alamat cabang_id kosong
                // cek jika nama kosong
                if (nama == '') {
                    $('#nama').addClass('is-invalid');
                }
                // cek jika no_hp kosong
                if (no_hp == '') {
                    $('#no_hp').addClass('is-invalid');
                }

                if (nama == '' || no_hp == '' || kota_id == '') {
                    // jika kosong maka muncul alert

                    return false;
                }
                if (cabang_id == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "Cabang Belum dipilih",
                        footer: ''
                    })
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: '/simpanpelanggan',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        nama: nama,
                        email: email,
                        no_hp: no_hp,
                        alamat: alamat,
                        kota_id: kota_id,
                        cabang_id: cabang_id,
                    },
                    success: function(data) {
                        const {
                            id,
                            kode,
                            nama,
                            no_hp,
                            cabang_id
                        } = data.data;

                        $('#nama').val('');
                        $('#email').val('');
                        $('#no_hp').val('');
                        $('#alamat').val('');
                        // trigger select2 cmblistkota null
                        $("#cmblistkota").val(null).trigger("change");

                        // set value kode_pelanggan
                        $('#kode_' + pelanggan).val(kode);
                        // set value nama_pelanggan
                        $('#nama_' + pelanggan).val(nama);
                        // set value no_hp_pelanggan
                        $('#no_hp_' + pelanggan).val(no_hp);
                        // set value alamat_pelanggan
                        $('#alamat_' + pelanggan).val(alamat);

                        $('#modalPelanggan').modal('hide');


                        if (pelanggan == 'pengirim') {
                            $('#cmblist' + pelanggan).append($('<option>', {
                                value: id,
                                text: `${nama} | No HP : ${no_hp}`
                            }));
                            $('#cmblistpenerima').append($('<option>', {
                                value: id,
                                text: `${nama} | No HP : ${no_hp}`
                            }));
                        }
                        if (pelanggan == 'penerima') {
                            $('#cmblist' + pelanggan).append($('<option>', {
                                value: id,
                                text: `${nama} | No HP : ${no_hp}`
                            }));
                            $('#cmblistpengirim').append($('<option>', {
                                value: id,
                                text: `${nama} | No HP : ${no_hp}`
                            }));
                        }
                        $("#cmblist" + pelanggan + " option[value=" + id + "]").prop("selected",
                            true);
                        $("#cmblist" + pelanggan).trigger("change");

                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "No Hp sudah ada",
                            footer: '<a href="">Why do I have this issue?</a>'
                        })
                    }
                });
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
                placeholder: '--- Pilih ' + "Tujuan Kota" + ' ---',
                width: '100%'
            });
            $("#cmbharga").select2({
                placeholder: '--- Pilih ' + "Paket Harga" + ' ---',
                width: '100%'
            });
            $("#cmbakunkas").select2({
                placeholder: '--- Pilih ' + "Paket Akun Kas" + ' ---',
                width: '100%'
            });


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
                let qty_kubikasi = $('#qty_kubikasi').val();
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
                            min_berat

                        } = data;

                        if (berat < min_berat) {
                            $("#berat").attr({
                                "min": min_berat, // substitute your own
                            });
                            $('#berat').val(min_berat);
                            berat = min_berat;
                        }
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
                        $("#cmbtujuankota").trigger("change");x
                        $("#cmbtujuankota").trigger("change");x
                        // harga_berat
                        // harga jadi string
                        let hargaberat = formatRupiah(harga.toString(), '');

                        let harga_pelanggan = $('#harga_pelanggan').val();
                        console.log(harga_pelanggan);
                        if (harga_pelanggan <= 0) {

                            $('#harga_berat').val(hargaberat);
                        }

                        $('#harga_kubikasi').val(hargaberat);
                        $('#asal_kota_id').val(asal_kota_id);
                        $('#tujuan_kota_id').val(tujuan_kota_id);


                        let total_kubikasi = kubikasi * qty_kubikasi;

                        let hargakubikasi = total_kubikasi * harga;
                        let hargakubikasiString = formatRupiah(hargakubikasi.toString(), '');
                        $('#total_harga_kubikasi').val(hargakubikasiString);


                        let qty_berat = $('#qty_berat').val();
                        // hilangkan titik
                        let hasilberat = berat * harga * qty_berat;
                        let hargajadi = formatRupiah(hasilberat.toString(), '');
                        $('#total_harga_berat').val(hargajadi);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
                uangkembali();
                totalQty();
            });

            $("#panjang").keyup(function(e) {
                let panjang = $(this).val();
                let lebar = $('#lebar').val();
                let tinggi = $('#tinggi').val();
                let id = $("#cmbharga").val();
                let url = "{{ route('get-harga') }}";
                let kubikasi = panjang * lebar * tinggi;
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        id: id,
                        berat: kubikasi
                    },
                    success: function(data) {
                        const {
                            id,
                            harga,

                        } = data;
                        // triger asal_kota_id
                        if (harga != null) {
                            let newharga = formatRupiah(harga.toString(), '');
                            $('#harga_kubikasi').val(newharga);
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
                let harga = $('#harga_kubikasi').val();
                let qty_kubikasi = $('#qty_kubikasi').val();
                let hargaberat = harga.replace(/\./g, '');
                let min_berat = $('#min_berat').val();

                if (kubikasi < min_berat) {
                    $('#total_kubikasi').addClass('is-invalid');
                    $('#textTotalDanger').html('Minimal Total Kubikasi ' + min_berat + 'M<sup>3</sup>');
                    $("#textTotalDanger").show();

                } else {
                    $('#total_kubikasi').removeClass('is-invalid');
                    $('#total_kubikasi').html('');
                    $("#textTotalDanger").hide();
                }
                let hargakubikasi = kubikasi * hargaberat;
                let hargakubikasiString = formatRupiah(hargakubikasi.toString(), '');
                $('#total_kubikasi').val(kubikasi);
                $('#total_harga_kubikasi').val(hargakubikasiString);
                $('#total_bayar').val(hargakubikasiString);
                $('#data_barang').prop('checked', false);
                $('#kubikasi').prop('checked', true);
                uangkembali()

            });

            $("#lebar").keyup(function(e) {
                let panjang = $('#panjang').val();
                let lebar = $(this).val();
                let tinggi = $('#tinggi').val();
                let id = $("#cmbharga").val();
                let url = "{{ route('get-harga') }}";
                let kubikasi = panjang * lebar * tinggi;
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        id: id,
                        berat: kubikasi
                    },
                    success: function(data) {
                        const {
                            id,
                            harga,

                        } = data;
                        // triger asal_kota_id
                        if (harga != null) {
                            let newharga = formatRupiah(harga.toString(), '');
                            $('#harga_kubikasi').val(newharga);
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });

                let harga = $('#harga_kubikasi').val();
                // hilangkan titik
                let hargaberat = harga.replace(/\./g, '');
                let qty_kubikasi = $('#qty_kubikasi').val();
                let totalkubikasi = kubikasi * qty_kubikasi;
                let min_berat = $('#min_berat').val();

                if (kubikasi < min_berat) {
                    $('#total_kubikasi').addClass('is-invalid');
                    $('#textTotalDanger').html('Minimal Total Kubikasi ' + min_berat + 'M<sup>3</sup>');
                    $("#textTotalDanger").show();

                } else {
                    $('#total_kubikasi').removeClass('is-invalid');
                    $('#textTotalDanger').html('');
                    $("#textTotalDanger").hide();
                }
                let hargakubikasi = totalkubikasi * hargaberat;

                let hargakubikasiString = formatRupiah(hargakubikasi.toString(), '');

                // total_kubikasi
                $('#total_kubikasi').val(kubikasi);

                $('#total_harga_kubikasi').val(hargakubikasiString);
                $('#total_bayar').val(hargakubikasiString);
                $('#data_barang').prop('checked', false);
                $('#kubikasi').prop('checked', true);
                uangkembali()

            });

            $("#tinggi").keyup(function(e) {
                let panjang = $('#panjang').val();
                let lebar = $('#lebar').val();
                let tinggi = $(this).val();

                let id = $("#cmbharga").val();
                let url = "{{ route('get-harga') }}";
                let kubikasi = panjang * lebar * tinggi;
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        id: id,
                        berat: kubikasi
                    },
                    success: function(data) {
                        const {
                            id,
                            harga,

                        } = data;
                        // triger asal_kota_id
                        if (harga != null) {
                            let newharga = formatRupiah(harga.toString(), '');
                            $('#harga_berat').val(newharga);
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });

                let harga = $('#harga_berat').val();
                // hilangkan titik
                let hargaberat = harga.replace(/\./g, '');
                let qty_kubikasi = $('#qty_kubikasi').val();
                let totalkubikasi = kubikasi * qty_kubikasi;

                let hargakubikasi = totalkubikasi * hargaberat;

                let hargakubikasiString = formatRupiah(hargakubikasi.toString(), '');
                let min_berat = $('#min_berat').val();

                if (kubikasi < min_berat) {
                    $('#total_kubikasi').addClass('is-invalid');
                    $('#textTotalDanger').html('Minimal Total Kubikasi ' + min_berat + 'M<sup>3</sup>');
                    $("#textTotalDanger").show();

                } else {
                    $('#total_kubikasi').removeClass('is-invalid');
                    $('#textTotalDanger').html('');
                    $("#textTotalDanger").hide();
                }
                // total_kubikasi
                $('#total_kubikasi').val(kubikasi);

                $('#total_harga_kubikasi').val(hargakubikasiString);
                $('#total_bayar').val(hargakubikasiString);
                $('#data_barang').prop('checked', false);
                $('#kubikasi').prop('checked', true);
                uangkembali()

            });
            $("#qty_kubikasi").keyup(function(e) {
                let panjang = $('#panjang').val();
                let lebar = $('#lebar').val();
                let tinggi = $('#tinggi').val();

                let qty_kubikasi = $(this).val();

                let id = $("#cmbharga").val();
                let url = "{{ route('get-harga') }}";
                let kubikasi = panjang * lebar * tinggi;
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        id: id,
                        berat: kubikasi
                    },
                    success: function(data) {
                        const {
                            id,
                            harga,

                        } = data;
                        // triger asal_kota_id
                        if (harga != null) {
                            let newharga = formatRupiah(harga.toString(), '');
                            $('#harga_berat').val(newharga);
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });

                let harga = $('#harga_berat').val();
                // hilangkan titik
                let hargaberat = harga.replace(/\./g, '');
                let totalkubikasi = kubikasi * qty_kubikasi;

                let hargakubikasi = totalkubikasi * hargaberat;

                let hargakubikasiString = formatRupiah(hargakubikasi.toString(), '');

                // total_kubikasi
                $('#total_kubikasi').val(kubikasi);

                $('#total_harga_kubikasi').val(hargakubikasiString);
                $('#total_bayar').val(hargakubikasiString);
                $('#data_barang').prop('checked', false);
                $('#kubikasi').prop('checked', true);
                uangkembali()
            });
            $("#nilai_barang").keyup(function(e) {
                let nilai_barang = $(this).val();
                let asuransi = formatRupiah(nilai_barang.toString(), '');
                $('#asuransi').val(asuransi);
            });
            $("#uang_bayar").keyup(function(e) {
                // format rupiah
                let uang_bayar = $(this).val();
                let uangbayar = formatRupiah(uang_bayar.toString(), '');
                uangkembali()

            });

            $("#cmbsales").select2({
                placeholder: '--- Pilih ' + "Jenis Sales" + ' ---',
                width: '100%'
            });
            $("#cmbjenispembayaran").select2({
                width: '100%'
            });
            $("#cmbjenislayanan").select2({
                placeholder: '--- Pilih ' + "Jenis Layanan" + ' ---',
                width: '100%'
            });
            $("#cmbjenistagihan").select2({
                placeholder: '--- Pilih ' + "Jenis Layanan" + ' ---',
                width: '100%'
            });
            $("#cmbmetodepembayaran").select2({
                placeholder: '--- Pilih ' + "Metode Pembayaran" + ' ---',
                width: '100%'
            });
            $("#cmbbank").select2({
                placeholder: '--- Pilih ' + "Bank" + ' ---',
                width: '100%'
            });
            $("#cmbbank").on("change", function(e) {
                $('#btnSimpan').prop("disabled", false);
            });


            $("#cmbmetodepembayaran").on("change", function(e) {
                $("#cmbmetodepembayaran").removeClass("is-invalid");
                $("#textcmbmetodepembayaran").html("");
                let id = $(this).val();
                let url = "{{ route('get-metode-bayar', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        const {
                            id,
                            bank,
                            nama,
                        } = data;
                        // masukan data bank ke cmbbank
                        $("#cmbbank").empty();
                        $("#cmbbank").append($('<option>', {
                            value: '',
                            text: '--- Pilih Bank ---'
                        }));

                        if (nama === 'Cash') {
                            $("#form_uang_bayar").show();
                            $("#form_uang_kembali").show();
                            $('#btnSimpan').prop("disabled", true);

                        } else {
                            $("#form_uang_bayar").hide();
                            $("#form_uang_kembali").hide();
                            if (bank.length > 0) {
                                $('#btnSimpan').prop("disabled", true);
                            } else {
                                $('#btnSimpan').prop("disabled", false);
                            }
                        }
                        $.each(bank, function(key, value) {
                            $("#cmbbank").append($('<option>', {
                                value: value.id,
                                text: value.nama
                            }));
                        });



                    },
                    error: function(data) {

                    }
                });
            });

            $("#cmbjenispembayaran").on("change", function(e) {
                $("#cmbjenispembayaran").removeClass("is-invalid");
                $("#textcmbjenispembayaran").html("");
                let id = $(this).val();
                let url = "{{ route('get-jenis-pembayaran', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        const {
                            id,
                            nama,
                            include_akun_kas,
                        } = data;

                        if (include_akun_kas != 'ya') {
                            $("#cmbmetodepembayaran").val(null).trigger("change");
                            $("#cmbakunkas").val(null).trigger("change");
                            $("#cmbbank").val(null).trigger("change");
                        }
                        if (nama === 'CASH') {
                            $('.cash').show();
                            $('#btnSimpan').prop("disabled", true);

                        } else {
                            $('.cash').hide();
                            $('#btnSimpan').prop("disabled", false);
                        }

                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });

            // berat keypres

            $('#berat').on('keyup', function() {
                let berat = $(this).val();
                let min_berat = $('#min_berat').val();
                if (berat < min_berat) {
                    $('#berat').addClass('is-invalid');
                    $('#textBeratDanger').html('Berat tidak boleh kurang dari ' + min_berat);
                    $("#textBeratDanger").show();
                } else {
                    $('#berat').removeClass('is-invalid');
                    $('#textBeratDanger').html('');
                    $("#textBeratDanger").hide();
                }

                let id = $("#cmbharga").val();
                let url = "{{ route('get-harga') }}";
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        id: id,
                        berat
                    },
                    success: function(data) {
                        const {
                            id,
                            harga,

                        } = data;
                        console.log(data);
                        // triger asal_kota_id
                        if (harga != null) {
                            let newharga = formatRupiah(harga.toString(), '');
                            $('#harga_berat').val(newharga);
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });

                let harga_berat = $('#harga_berat').val();
                let qty_berat = $('#qty_berat').val();
                // hilangkan titik
                harga_berat = harga_berat.replace(/\./g, '');
                let harga = berat * harga_berat * qty_berat;
                let hargajadi = formatRupiah(harga.toString(), '');
                $('#total_harga_berat').val(hargajadi);
                $(
                    '#total_bayar').val(hargajadi);
                $('#data_barang').prop('checked', true);
                $('#kubikasi')
                    .prop('checked', false);
                uangkembali()
            });


            $('#qty_berat').on('keyup', function() {
                let berat = $('#berat').val();
                let harga_berat = $('#harga_berat').val();
                let qty_berat = $(this).val();
                // hilangkan titik
                harga_berat = harga_berat.replace(/\./g, '');
                let harga = berat * harga_berat * qty_berat;
                let hargajadi = formatRupiah(harga.toString(), '');
                $('#total_bayar').val(hargajadi);
                $('#total_harga_berat').val(hargajadi);

                uangkembali()
            });
            $('#diskon').on('keyup', function() {
                let diskon = $(this).val();
                // jika diskon lebih dari 100 maka 100
                if (diskon > 100) {
                    $(this).val(100);
                }
                uangkembali()
            });
            $('#data_barang').prop('checked', true);
            // cheked
            $('#kubikasi').change(function() {

                // jika kubikasi di ceklis
                if ($(this).prop('checked')) {
                    $('#data_barang').prop('checked', false);
                    let hargakubikasiString = $('#total_harga_kubikasi').val();
                    $('#total_bayar').val(hargakubikasiString);
                } else {
                    $('#data_barang').prop('checked', true);
                    let hargajadi = $('#total_harga_berat').val();
                    $('#total_bayar').val(hargajadi);
                }
                uangkembali()
            });
            $('#data_barang').click(function() {
                if ($(this).prop('checked')) {
                    $('#kubikasi').prop('checked', false);
                    let hargajadi = $('#total_harga_berat').val();
                    $('#total_bayar').val(hargajadi);

                } else {
                    $('#kubikasi').prop('checked', true);
                    let hargakubikasiString = $('#total_harga_kubikasi').val();
                    $('#total_bayar').val(hargakubikasiString);
                }

                uangkembali()

            });

            function uangkembali() {
                let total = $('#total_bayar').val();
                let total_bayar = total.replace(/\./g, '');
                let diskon = $('#diskon').val();
                let diskon_bayar = diskon.replace(/\./g, '');
                let uang_bayar = $('#uang_bayar').val();
                let uangbayar = uang_bayar.replace(/\./g, '');

                // kembalian
                let totalDiskon = diskon_bayar / 100 * total_bayar;
                let grandtotal = total_bayar - totalDiskon;
                $('#grandtotal').val(formatRupiah(grandtotal.toString(), ''));
                let kembalian = uangbayar - grandtotal;
                let kembalianjadi = formatRupiah(kembalian.toString(), '');


                if (parseInt(uangbayar) >= parseInt(grandtotal)) {
                    $('#btnSimpan').prop("disabled", false);
                    $('#textUangDanger').html('');
                    $("#textUangDanger").hide();
                    $('#uang_bayar').removeClass('is-invalid');

                    $('#uang_kembali').val(formatRupiah(kembalian.toString(), ''));
                    $('#uang_kembali').val(kembalianjadi);
                } else {
                    $('#btnSimpan').prop("disabled", true);
                    $('#uang_bayar').addClass('is-invalid');

                    $('#textUangDanger').html('Uang Bayar masih kurang');
                    $("#textUangDanger").show();
                }
            }

        });
    </script>
@endpush
