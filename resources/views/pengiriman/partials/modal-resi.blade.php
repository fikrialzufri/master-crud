<div class="modal fade full-window-modal" id="modalResi" tabindex="-1" role="dialog"
    aria-labelledby="modalResiTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalResiTitle">Daftar Resi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="row d-flex justify-content-between">
                        {{-- Daftar Vendor --}}
                        <div class="col-12">
                            <div class="row">
                                @if (auth()->user()->can('edit-cabang-pengiriman'))
                                <div class="col-md-2 col-lg-2" id="form_cmblistcabangfilterresi">
                                    <div class="form-group">
                                        <div>
                                            <label for="cmblistcabangfilterresi" class=" form-control-label">Fliter Cabang</label>
                                        </div>
                                        <select class="form-control select2" id="cmblistcabangfilterresi" name="cabang_id_filter">

                                            <option value="" disabled>Pilih Cabang
                                            </option>
                                            <option selected="selected" value="All">Semua Cabang
                                            </option>
                                            @foreach ($dataCabang as $cabang)
                                            <option value="{{ $cabang->id }}" id="cabang_{{ $cabang->id }}" {{ $cabang_id==$cabang->id ? "selected"
                                                : "" }}>
                                                {{ ucwords($cabang->nama) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-4 col-lg-4">
                                    <form class="sample-form">
                                        <div class="form-group">
                                            <label for="">Filter Kota</label>
                                            <select class="form-control select2" id="kota_filter" multiple="multiple">
                                                    <option value="" disabled>Pilih Kota
                                                    </option>
                                                    <option value="All">Semua Kota
                                                    </option>
                                                    @foreach ($dataKota as $kotaFilter)
                                                    <option value="{{ $kotaFilter->id }}"
                                                        id="kota_filter_{{ $kotaFilter->id }}">
                                                        {{ ucwords($kotaFilter->nama) }}
                                                    </option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <form class="sample-form">
                                        <div class="form-group">
                                            <label for="filter_tanggal">Filter Tanggal</label>
                                            <input type="text" id="filter_tanggal"
                                                class="form-control">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="">

                                <table id="resiTable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>{{ __('No Resi')}}</th>
                                            <th>{{ __('Tanggal')}}</th>
                                            <th>{{ __('Pengirim')}}</th>
                                            <th>{{ __('Penerima')}}</th>
                                            <th class="text-center">{{ __('Total Koli')}}</th>
                                            <th>{{ __('Tujuan')}}</th>
                                            <th>{{ __('Total Transaksi')}}</th>
                                            <th>{{ __('Total Bayar')}}</th>
                                            <th class="text-center">{{ __('Aksi')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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

@push('head')
@endpush

@push('script')

<script>
    $("#cmblistcabangfilterresi").select2({
        width:'100%'
    });
    $("#kota_filter").select2({
        width:'100%'
    });



</script>


@endpush
