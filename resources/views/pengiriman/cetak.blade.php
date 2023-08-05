@extends('template.transaksi')
@section('title', ucwords(str_replace([':', '_', '-', '*'], ' ', $title)))

@push('head')
{{-- <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}"> --}}
<style>
    @page {
        size: legal;
        margin: 0;
    }

    @media print {

        html,
        body {
            width: 215mm;
            max-width: 215mm;
            height: 355mm;
            margin: 5px;
        }
    }

@media print {

    body,
    page[size="legal"] {
        background: white;
        width: 21cm;
        padding: 40px;
        height: 29.7cm;
        display: block;
        margin: 0 auto;
        font-family: "Times New Roman", serif;
        font-size: 20px;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }
}
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-7 col-lg-7 col-sm-7 col-xl-7">
        <div class="card">
            <!-- /.card-header -->

            <div class="card-body">
            </div>
        </div>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xl-5">
        <div class="card">
            <!-- /.card-header -->

            <div class="card-body">

                    <div class="row">
                        <div class="col-md-7 col-lg-7 col-sm-7 col-xl-7">
                            <div class="">
                                <table class="table" width="100%">
                                    <tr>
                                        <td>
                                            <b>Penerima</b>
                                        </td>
                                        <td>
                                            <h5>
                                                <b>{{ $data->penerima }}</b>
                                            </h5>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            No. Hp Penerima
                                        </td>
                                        <td>
                                            <h5><b>{{ $data->no_hp_penerima }}</b></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Alamat Penerima
                                        </td>
                                        <td>
                                            {{ $data->alamat_penerima }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Pengirim</b>
                                        </td>
                                        <td>
                                            <b>
                                                <h5>{{ $data->pengirim }}</h5>
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            No. Hp Pengirim
                                        </td>
                                        <td>
                                            {{ $data->no_hp_pengirim }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="text-center">
                                <div >
                                    <h4>
                                        <b>
                                            {{ $data->kode }}
                                        </b>
                                    </h4>

                                </div>
                                <div >
                                    <span id="qrcode"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-5 col-xl-5">
                            <div class="text-center">
                                <h5>
                                    <b>{{ $data->cabang }}</b>
                                </h5>
                                <span>
                                    Telp : {{ $data->no_hp_cabang }}
                                </span>
                            </div>
                            <hr>
                            <div class="">
                                <table class="table" width="100%">
                                    <tr>
                                        <td witdh="1%">Jumlah Koli</td>
                                        <td witdh="1%">:</td>
                                        <td witdh="80%">{{ format_uang($data->koli_berat) }}</td>
                                    </tr>
                                    <tr>
                                        <td witdh="1%">Berat</td>
                                        <td witdh="1%">:</td>
                                        <td witdh="80%">{{ format_uang($data->berat) }}</td>
                                    </tr>
                                    <tr>
                                        <td witdh="1%">Kubikasi</td>
                                        <td witdh="1%">:</td>
                                        <td witdh="80%">{{ format_uang($data->total_konversi) }}</td>
                                    </tr>
                                </table>
                            </div>
                            <hr>
                            <div class="text-center">
                                <b>
                                    {{ $data->jenis_pembayaran }}
                                </b>
                            </div>
                            <hr>
                            <div class="">
                                <table class="table" width="100%">
                                    <tr>
                                        <td>Biaya Kirim</td>
                                        <td>:</td>
                                        <td>{{ "Rp. ".format_uang($data->total_harga_berat + $data->total_harga_kubikasi) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Diskon</td>
                                        <td>:</td>
                                        <td>{{ "Rp. ".format_uang(abs($data->sub_total_harga_berat - $data->total_harga_berat)  + abs($data->sub_total_harga_kubikasi - $data->total_harga_kubikasi)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jemput</td>
                                        <td>:</td>
                                        <td>{{ 'Rp. ' . format_uang($data->jemput_barang) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nilai Barang</td>
                                        <td>:</td>
                                        <td>{{ 'Rp. ' . format_uang($data->nilai_barang) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Packing Barang</td>
                                        <td>:</td>
                                        <td>{{ 'Rp. ' . format_uang($data->packing_barang) }}</td>
                                    </tr>
                                </table>
                            </div>
                            <hr>
                            <div class="text-center">
                                <b>
                                    Total : {{ 'Rp. ' . format_uang($data->total_transaksi) }}
                                </b>
                            </div>
                            <hr>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
                        <button class="btn btn-primary btn-block" href="">Cetak Resi Stiker</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<page id="contentStriker" style="display: none;">
    @forelse ($checkCetak as $item)
        <h1>{{ $item->kode }}</h1>
    @empty
    @endforelse
</page>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script>
    let code = "{{ $data->kode }}";
    console.log(code);
    // let qrCode = generateQrCode(code);


    // var qrcode = new QRCode("test", {
    // text: "http://jindo.dev.naver.com/collie",
    // width: 128,
    // height: 128,
    // colorDark : "#000000",
    // colorLight : "#ffffff",
    // correctLevel : QRCode.CorrectLevel.H
    // });

    new QRCode(document.getElementById("qrcode"), {
        text: "http://jindo.dev.naver.com/collie",
        width: 200,
        height: 200,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });

    $("#qrcode > img").css({"margin":"auto"});

    // cetak PDF

    // function createPdf() {
    //     var printContents = document.getElementById('contentStriker').innerHTML;
    //     var originalContents = document.body.innerHTML;

    //     document.body.innerHTML = printContents;

    //     window.print();

    //     document.body.innerHTML = originalContents;
    // }

    // $('#cetakStiker').click(function(e) {
    //     createPdf()
    // });

</script>
@endpush

