<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', '') | Sandi Cargo</title>
    <!-- initiate head with meta tags, css and script -->
    @include('template.tr-head')
    <style>
        @media (min-width: 768px) {
            .modal-xl {
                width: 90%;
                max-width: 1200px;
            }
        }
    </style>
</head>

<body >
    <div class="wrapper">
        <!-- initiate header-->
        @include('template.tr-header')

        <div class="">

            <!-- initiate sidebar-->


            <div class="main-content">

                <div class="container-fluid">
                    @if (session('message'))
                    <div class="row pt-10" id="#success-alert">
                        <div class="container-fluid alert alert-{{ session('Class') }} alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif
                    @yield('content')
                </div>
                <!-- yeild contents here -->
            </div>
            @include('pengiriman.partials.modal-resi')
            @include('suratjalan.modal-suratjalan')
            {{-- <!-- initiate chat section-->
            @include('template.chat') --}}


            <!-- initiate footer section-->

        </div>
    </div>

    <!-- initiate modal menu section-->
    @include('template.modalmenu')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="text/javascript" src="{{ asset('dist/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/daterangepicker.min.js') }}"></script>
    <script>
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }
        let urlDaftarPengirimanBarang = "{{ route('daftar-penerima-barang') }}";
        $(document).ready(function(){
            var dataTableResi =
            $('#form_cmblistcabangfilterresi').change(function(){
                $('#resiTable').DataTable().destroy();
                let cabang_id = $('#cmblistcabangfilterresi').val();
                let kota_id = $('#kota_filter').val();
                tableResi().draw();
            });
            $('#kota_filter').change(function(e){
                let cabang_id = $('#cmblistcabangfilterresi').val();
                let kota_id = $(this).val();
                $('#resiTable').DataTable().destroy();
                // let cabang_id = $('#cmblistcabangfilterresi').val();
                tableResi().draw();
            });
            $("#btnResi").on("click", function(e) {
                let cabang_id = $('#cmblistcabangfilterresi').val();

                $('#resiTable').DataTable().destroy();
                tableResi().draw();
                $("#modalResi").modal("show");
            });

            let start = Date.now();
            let end = Date.now();
            $('#filter_tanggal').daterangepicker({
                startDate: start,
                endDate: end,
            })
            $('#filter_tanggal').on('apply.daterangepicker', function(ev, picker) {
                let cabang_id = $('#cmblistcabangfilterresi').val();
                let tangal = $('#filter_tanggal').val();
                $('#resiTable').DataTable().destroy();
                tableResi().draw();
            });

            function tableResi() {
                let cabang_id = $('#cmblistcabangfilterresi').val();
                let kota_id = $('#kota_filter').val();
                let tanggal = $('#filter_tanggal').val();

                return $('#resiTable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        'type': 'get',
                        'url': urlDaftarPengirimanBarang,
                        'data': {
                            "_token": "{{ csrf_token() }}",
                            cabang_id,
                            kota_id,
                            tanggal
                        },
                    },
                    autoWidth: false,
                    "bSort": true,
                    "bFilter": true,
                    order: [[0, 'desc']],
                    columns: [
                        { data: 'kode' },
                        {
                            data: 'tanggal_resi',
                            render: function(data, type, row, meta){
                                return tanggalIndonesiaWaktu(data)
                            }
                        },
                        { data: 'pengirim' },
                        { data: 'penerima' },
                        {
                            data: 'koli_berat',
                            render: function(data, type, row, meta){
                                return `${formatRupiah(data.toString())}`
                            },
                            className :"text-center"
                        },

                        { data: 'tujuan' },
                        {
                            data: 'total_transaksi',
                            render: function(data, type, row, meta){
                                return `Rp. ${formatRupiah(data.toString())}`
                            }
                        },
                        {
                            data: 'total_bayar',
                            render: function(data, type, row, meta){
                                return `Rp. ${formatRupiah(data.toString())}`
                            }
                        },
                        {
                            data:"id",
                            render: function(value, type, row, meta){

                                let id = value;
                                let urlPengirimEdit = "{{ route('pengiriman-barang.edit', ':id') }}";
                                let urlPengirimCetak = "{{ route('pengiriman-barang.show', ':id') }}";
                                urlPengirimEdit = urlPengirimEdit.replace(':id', id);
                                urlPengirimCetak = urlPengirimCetak.replace(':id', id);

                                return `<a href="${urlPengirimEdit}" class="btn btn-danger">
                                    Edit Resi
                                </a>

                                <span class="btn btn-warning">Lihat Resi</span>
                                <a href="${urlPengirimCetak}" class="btn btn-primary">Cetak Resi</a>`
                            },

                        }
                    ],
                    aoColumnDefs: [
                    {
                        bSortable: false,
                        aTargets: [ -1 ]
                    }
                    ]
                });
            }
        })
        $("#btnManivest").on("click", function(e) {
            $("#modalSuratJalan").modal("show");
        });
    </script>


    <script type="text/javascript">

    </script>
    <!-- initiate scripts-->
    @include('template.script')
    <script>
        function tanggalIndonesia(tanggal) {
            var date = new Date(tanggal);
            var tahun = date.getFullYear();
            var bulan = date.getMonth();
            var tanggal = date.getDate();
            var hari = date.getDay();
            var jam = date.getHours();
            var menit = date.getMinutes();
            var detik = date.getSeconds();
            switch(hari) {
            case 0: hari = "Minggu"; break;
            case 1: hari = "Senin"; break;
            case 2: hari = "Selasa"; break;
            case 3: hari = "Rabu"; break;
            case 4: hari = "Kamis"; break;
            case 5: hari = "Jum'at"; break;
            case 6: hari = "Sabtu"; break;
            }
            switch(bulan) {
            case 0: bulan = "Januari"; break;
            case 1: bulan = "Februari"; break;
            case 2: bulan = "Maret"; break;
            case 3: bulan = "April"; break;
            case 4: bulan = "Mei"; break;
            case 5: bulan = "Juni"; break;
            case 6: bulan = "Juli"; break;
            case 7: bulan = "Agustus"; break;
            case 8: bulan = "September"; break;
            case 9: bulan = "Oktober"; break;
            case 10: bulan = "November"; break;
            case 11: bulan = "Desember"; break;
            }

            return hari + ", " + tanggal + " " + bulan + " " + tahun;
        }
        function tanggalIndonesiaWaktu(tanggal) {
            var date = new Date(tanggal);
            var tahun = date.getFullYear();
            var bulan = date.getMonth();
            var tanggal = date.getDate();
            var hari = date.getDay();
            var jam = date.getHours();
            var menit = date.getMinutes();
            var detik = date.getSeconds();
            switch(hari) {
            case 0: hari = "Minggu"; break;
            case 1: hari = "Senin"; break;
            case 2: hari = "Selasa"; break;
            case 3: hari = "Rabu"; break;
            case 4: hari = "Kamis"; break;
            case 5: hari = "Jum'at"; break;
            case 6: hari = "Sabtu"; break;
            }
            switch(bulan) {
            case 0: bulan = "Januari"; break;
            case 1: bulan = "Februari"; break;
            case 2: bulan = "Maret"; break;
            case 3: bulan = "April"; break;
            case 4: bulan = "Mei"; break;
            case 5: bulan = "Juni"; break;
            case 6: bulan = "Juli"; break;
            case 7: bulan = "Agustus"; break;
            case 8: bulan = "September"; break;
            case 9: bulan = "Oktober"; break;
            case 10: bulan = "November"; break;
            case 11: bulan = "Desember"; break;
            }

            return hari + ", " + tanggal + " " + bulan + " " + tahun + " " + jam + ":" + menit + ":" + detik;
        }
    </script>
</body>

</html>
