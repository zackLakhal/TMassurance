<button type="button" name="action" id="" class="btn btn-warning btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#rendez_vousModal">Ajouter un rappel</button>
<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">

                <div class="media">
                    <div class="mr-4">
                        <i class="mdi mdi-account-circle text-primary h1"></i>
                    </div>

                    <div class="media-body">
                        <div class="text-muted">
                            <h5>Henry Wells</h5>
                            <p class="mb-1">henrywells@abc.com</p>
                            <p class="mb-0">Id no: #SK0234</p>
                        </div>

                    </div>

                    <div class="dropdown ml-2">
                        <a class="text-muted dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body border-top">
                <p class="text-muted mb-4"></p>
                <div class="text-center">
                    <div class="row">
                        <div class="col-sm-4">
                            <div>
                                <div class="font-size-24 text-primary mb-2">
                                    <i class="bx bx-send"></i>
                                </div>


                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-sm w-md">Terminer</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mt-4 mt-sm-0">
                                <div class="font-size-24 text-primary mb-2">
                                    <i class="bx bx-import"></i>
                                </div>



                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-sm w-md">Modifier</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mt-4 mt-sm-0">
                                <div class="font-size-24 text-primary mb-2">
                                    <i class="bx bx-wallet"></i>
                                </div>


                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-sm w-md">Annuler</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--modal rappel -->
<div id="rendez_vousModal" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Ajouter rappel</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row mb-4">
                    <label class="col-form-label col-lg-2">Date rappel</label>
                    <div class="col-lg-10">
                        <div class="input-daterange input-group" data-provide="datepicker" data-date-format="jj M, aaaa" data-date-autoclose="true">
                            <input type="text" class="form-control" placeholder="Date de début" name="start" />
                            <input type="text" class="form-control" placeholder="Date fin" name="end" />
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">

                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->