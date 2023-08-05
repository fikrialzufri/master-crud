@if (!isset($item['input']))
    <input type="text" name="{{ $item['name'] }}" placeholder="{{ $item['alias'] }}"
        class="form-control {{ $errors->has($item['name']) ? 'is-invalid' : '' }}"
        value="{{ $hasilSearch[$item['name']] }}">
@else
    @if ($item['input'] == 'combo')
        <select name="{{ $item['name'] }}"
            class="selected2 form-control {{ $errors->has($item['name']) ? 'is-invalid' : '' }}"
            id="cmb{{ $item['name'] }}">
            <option value="">--Pilih {{ $item['alias'] }}--</option>
            @if (isset($item['value']))
                @foreach ($item['value'] as $key => $val)
                    @if (isset($val['id']))
                        <option value="">--Pilih {{ $item['alias'] }}--</option>
                        <option value="{{ $val['id'] }}"
                            {{ $hasilSearch[$item['name']] == $val['id'] ? 'selected' : '' }}>
                            @if (isset($val['value']))
                                {{ ucfirst($val['value']) }}
                            @else
                                Array salah harus menggunakan value
                            @endif
                        </option>
                    @else
                        <option value="{{ $val }}"
                            {{ $hasilSearch[$item['name']] == $val ? 'selected' : '' }}>
                            {{ ucfirst($val) }}
                        </option>
                    @endif
                @endforeach
            @endif
        </select>
    @endif
    @if ($item['input'] == 'year')
        <input type="text" id="year" name="{{ $item['name'] }}" value="{{ $hasilSearch[$item['name']] }}"
            class="form-control">
    @endif
    @if ($item['input'] == 'hidden')
        <input type="hidden" name="{{ $item['name'] }}" value="{{ $hasilSearch[$item['name']] }}">
    @endif
    @if ($item['input'] == 'daterange')
        <input type="text" id="daterange" name="{{ $item['name'] }}" value="{{ $hasilSearch[$item['name']] }}"
            class="form-control">
    @endif
    @if ($item['input'] == 'text' ||
        $item['input'] == 'number' ||
        $item['input'] == 'date' ||
        $item['input'] == 'email' ||
        $item['input'] == 'password')
        <input type="{{ $item['input'] }}" name="{{ $item['name'] }}" placeholder="{{ $item['alias'] }}"
            class="form-control {{ $errors->has($item['name']) ? 'is-invalid' : '' }}"
            value="{{ $hasilSearch[$item['name']] }}">
    @endif
    @if ($item['input'] == 'rupiah')
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">Rp.</div>
        </div>

        <input type="{{ $item['input'] }}" id="{{ $item['name'] }}" name="{{ $item['name'] }}" placeholder="{{ $item['alias'] }}"
            class="form-control {{ $errors->has($item['name']) ? 'is-invalid' : '' }} rupiah"
            value="{{ $hasilSearch[$item['name']] }}">
    </div>


    @endif
@endif

@push('head')
    @if (isset($item['input']))
    @if ($item['input'] == 'daterange')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @endif
    @if ($item['input'] == 'year')
        <link href="{{ asset('dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    @endif
    @endif
@endpush

@push('script')
    <script script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <script>
        @if (isset($item['input']))
            @if ($item['input'] == 'combo')
                $(function() {
                    var cmbName = `#cmb{{ $item['name'] }}`;
                    var aliasName = `{{ $item['alias'] }}`;
                    $(cmbName).select2({
                        placeholder: '--- Pilih ' + aliasName + ' ---',
                        width: '100%'
                    });

                });
            @endif
            @if ($item['input'] == 'rupiah')
                let rupiah = document.getElementsByClassName('rupiah');
                $('#{{ $item['name'] }}').on("input", function() {
                    let val = formatRupiah(this.value, '');
                    $('#{{ $item['name'] }}').val(val);
                });

                /* Fungsi formatRupiah */

            @endif
        @endif
    </script>
    @if (isset($item['input']))
    @if ($item['input'] == 'daterange')
        {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('dist/js/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('dist/js/daterangepicker.min.js') }}"></script>
        @if (!$hasilSearch[$item['name']])
            <script type="text/javascript">
                $(document).ready(function() {
                    let start = moment().startOf('month')
                    let end = moment().endOf('month')
                    $('#daterange').daterangepicker({
                        startDate: start,
                        endDate: end,
                    })
                })
            </script>
        @else
            <script type="text/javascript">
                $('#daterange').daterangepicker()
            </script>
        @endif
    @endif

    @if ($item['input'] == 'year')
        <script type="text/javascript" src="{{ asset('dist/js/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('dist/js/bootstrap-datepicker.js') }}"></script>


        <script type="text/javascript">
            $(document).ready(function() {

                $("#year").datepicker({
                    format: " yyyy", // Notice the Extra space at the beginning
                    viewMode: "years",
                    minViewMode: "years"
                });
            })
        </script>
    @endif
    @endif
@endpush
