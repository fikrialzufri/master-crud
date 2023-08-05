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

                @foreach ($colomField as $index => $value)
                    <div class="col-md-12">
                        <div class="card">
                            <!-- /.card-header -->

                            <div class="card-body">
                                @foreach (array_slice($form, $value[0], $value[1]) as $key => $item)
                                    @include('template.input')
                                @endforeach
                                {{-- table untuk daftar harga detail --}}

                                <div class="form-group row">
                                    {{-- Buttonn tambah Daftar Harga --}}
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary" id="btnTambahDaftarHarga">
                                            Tambah Daftar Harga
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-12 table-responsive ">
                                        <div>
                                            <label for="" class=" form-control-label">Daftar Harga</label>
                                        </div>
                                        <table class="table table-head-fixed table-bordered " width="100%"
                                            id="tableDaftarHarga">
                                            <thead>
                                                <th width="5%">
                                                    No
                                                </th>
                                                <th width="15%">
                                                    Berat Dari
                                                </th>
                                                <th width="20%">
                                                    Harga
                                                </th>
                                                <th width="5%" class="text-center">
                                                    Aksi
                                                </th>

                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

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
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

@endsection

@push('script')
    <script script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>

    <script>
        // jquery btnn btnTambahDaftarHarga

        $(document).ready(function() {
            // jika localstroge detail harga ada data maka tambahDataDetailHarga
            if (localStorage.getItem('detail-harga')) {
                let data = JSON.parse(localStorage.getItem('detail-harga'));
                data.forEach((value, index) => {
                    tambahDataDetailHarga(value);
                });
            }
            // function tambah data detail harga
            @if ($store == 'update')
                let harga_detail = @json($data->harga_detail);

                if (harga_detail != null) {
                    harga_detail.forEach((value, index) => {
                        tambahDataDetailHarga(value);
                    });
                }

                // jika id ada maka tambah data detail harga
            @endif
            function tambahDataDetailHarga(value) {
                // periksa apakah asal kota dan tujuan kota sudah di pilih

                let nomor = $('#tableDaftarHarga tbody tr').length;
                let no = nomor + 1;
                // random id

                let html = '';
                html += '<tr>';
                html += `<td  class="nomor"> <div class="form-group">${no}</div></td>`;
                // innput required

                // td align middle and center

                html +=
                    `<td class="form-group">
                        <div class="input-group">
                            <input type="text"  name="berat_detail[]" id="berat_${value.id}" class="form-control" required placeholder="" value="${value.berat}">
                            <input type="hidden" name="harga_detail_id[]" value="${value.id}">
                            <span class="input-group-append" id="groub-berat_${value.id}">
                                <label class="input-group-text">Kg</label>
                            </span>
                        </div>
                    </td>`;


                // select2 option
                html += `<td>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-append" id="groub-harga_${value.id}">
                                <label class="input-group-text">Rp.</label>
                            </span>
                            <input type="text" name="harga_detail[]" id="harga_${value.id}" value="${value.harga}" class="form-control" required placeholder="">
                        </div>
                    </div>
                    </td>`;
                // button hapus
                html += `<td>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger btn-sm btnHapusDaftarHarga">Hapus</button>
                    </div>
                    </td>`;
                html += '</tr>';
                $('#tableDaftarHarga tbody').append(html);

                // input hanya nominal
                $('#berat_' + value.id).on("input", function(e) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                    // masukan data ke localstorage
                    let data = JSON.parse(localStorage.getItem('detail-harga'));

                    data.forEach((item, index) => {

                        if (value.id == item.id) {
                            item.berat = parseInt(this.value);
                        }
                    });
                    // push data ke localstorage
                    localStorage.setItem('detail-harga', JSON.stringify(data));
                });
                // input keypress rupiah

                $('#harga_' + value.id).on("input", function(e) {
                    let val = formatRupiah(this.value, '');
                    this.value = val;
                    // masukan data ke localstorage
                    let data = JSON.parse(localStorage.getItem('detail-harga'));
                    data.forEach((item, index) => {
                        if (value.id == item.id) {
                            item.harga = formatRupiah(this.value, '');
                        }
                    });
                    localStorage.setItem('detail-harga', JSON.stringify(data));
                });

            }

            $('#btnTambahDaftarHarga').click(function() {
                // periksa apakah asal kota dan tujuan kota sudah di pilih
                if ($('#cmbasal_kota_id').val() == '' || $('#cmbtujuan_kota_id').val() == '') {
                    alert('Asal Kota dan Tujuan Kota harus di pilih');
                    return false;
                }

                // random id
                let id = Math.floor(Math.random() * 1000);

                // get data text dari asal kota
                let asal_kota = $('#cmbasal_kota_id').find(':selected').text();
                // hapus spasi kiri dan kanan setelah text
                asal_kota = asal_kota.trim();
                // get data text dari tujuan kota
                let tujuan_kota = $('#cmbtujuan_kota_id').find(':selected').text();
                // hapus spasi kiri dan kanan setelah text
                tujuan_kota = tujuan_kota.trim();

                // get value dari asal kota
                let asal_kota_value = $('#cmbasal_kota_id').val();
                // get value dari tujuan kota
                let tujuan_kota_value = $('#cmbtujuan_kota_id').val();

                // get value dari berat dari
                let min_berat = $('#min_berat').val() ? $('#min_berat').val() : 0;
                // get value dari harga
                let harga = $('#harga').val() ? $('#harga').val() : 0;

                // simpan ke localstroge
                let data = {
                    id: id,
                    asal_kota: asal_kota,
                    tujuan_kota: tujuan_kota,
                    asal_kota_value: asal_kota_value,
                    tujuan_kota_value: tujuan_kota_value,
                    min_berat: min_berat,
                    berat: min_berat,
                    harga: harga,
                }

                // tambahkan data detail harga ke table
                tambahDataDetailHarga(data);

                // cek localstorage detail harga kalo ada tambah data
                let detailHarga = JSON.parse(localStorage.getItem('detail-harga'));
                if (detailHarga == null) {
                    localStorage.setItem('detail-harga', JSON.stringify([data]));
                } else {
                    // jadikan data array
                    detailHarga = [data, ...detailHarga];
                    localStorage.setItem('detail-harga', JSON.stringify(detailHarga));
                }

            });
            // button hapus btnHapusDaftarHarga
            $(document).on('click', '.btnHapusDaftarHarga', function() {

                $(this).closest('tr').remove();
                // nomor
                // console.log($('.nomor'));
                no = 1;
                $('.nomor').each(function() {
                    $(this).html(`<div class="form-group">${no}</div>`);
                    no++;
                });
                let id = $(this).closest('tr').find('input').attr('id');
                // cek localstorage detail harga kalo ada hapus data
                let detailHarga = JSON.parse(localStorage.getItem('detail-harga'));
                if (detailHarga != null) {
                    let index = detailHarga.findIndex(x => x.id == id);
                    detailHarga.splice(index, 1);
                    localStorage.setItem('detail-harga', JSON.stringify(detailHarga));
                }


            });


        });
    </script>
@endpush
