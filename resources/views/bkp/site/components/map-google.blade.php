
<!-- Modal -->
<div class="modal fade model-quote" id="googleMapsModal" tabindex="-1" role="dialog" aria-labelledby="googleMapsModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <div class="model-icon">
                    <i class="lnr lnr-map"></i>
                </div>
                <div class="model-divider">
                    <div class="model-title">
                        <p class="mb-0">{{ trans('footer.visit')}}</p>
                        <h2>{{ trans('footer.location')}}</h2>
                    </div>
                </div>
            </div>
            <!-- .model-header end -->
            <div class="modal-body">
                <section class="google-maps pb-0 pt-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 pr-0 pl-0">
                                <div id="googleMapModal" style="width:100%;height:600px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- .model-body end -->
        </div>
    </div>
</div>