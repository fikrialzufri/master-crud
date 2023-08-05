<div class="modal fade full-window-modal" id="modalSuratJalan" tabindex="-1" role="dialog"
    aria-labelledby="modalSuratJalanTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSuratJalanTitle">Daftar Manivest</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="row d-flex justify-content-between">
                        {{-- Daftar Vendor --}}
                        <div class="col-12">

                            <div class="">
                                <table id="suratJalanTable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>{{ __('No Resi')}}</th>
                                            <th>{{ __('Tanggal')}}</th>
                                            <th>{{ __('Karyawan (Driver)')}}</th>
                                            <th class="text-center">{{ __('Total Koli')}}</th>
                                            <th>{{ __('Tujuan')}}</th>
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

@push('script')
<script>

</script>
@endpush
