<div class="modal fade bd-example-modal-lg" id="modalVendor" tabindex="-1" role="dialog"
    aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Daftar Vendor Over Via</h5>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="row d-flex justify-content-between">
                        {{-- Daftar Vendor --}}
                        <div class="col-12">

                            <div class="">
                                <table id="vendorTable" class="table table-hover table-fixed" width="100%">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Nama')}}</th>
                                            <th>{{ __('No HP')}}</th>
                                            <th>{{ __('Hutang')}}</th>
                                            <th class="text-center" widh="1px">{{ __('Aksi')}}</th>
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
