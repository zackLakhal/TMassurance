<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-md-2 col-form-label">Date de signature</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Souscripteur</label>
                        <div class="col-md-10">
                            <select class="form-control">
                                <option>Select</option>
                                <option>Large select</option>
                                <option>Small select</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Gestionnaire</label>
                        <div class="col-md-10">
                            <select class="form-control">
                                <option>Select</option>
                                <option>Large select</option>
                                <option>Small select</option>
                            </select>
                        </div>
                        <button type="button"  class="btn btn-success w-lg waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">Crée le contrat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- end col -->


<!--modal contrat-->
<div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Contrat</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Formule</h4>
                                <p class="card-title-desc"></p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Compagnie</label>
                                            <select class="form-control select2">
                                                <option value="">Selectionner</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="control-label">Produit</label>
                                            <select class="form-control select2-search-disable">
                                                <option value="">Selectionner</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group ajax-select mt-3 mt-lg-0">
                                            <label class="control-label">Formule</label>
                                            <select class="form-control select2-ajax">
                                                <option value="">Selectionner</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-0 templating-select">
                                            <label class="control-label">Option & niveaux de garantie</label>
                                            <select class="form-control select2-templating">
                                                <option value="">Selectionner</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end select2 -->
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Conditions contractuelles</h4>
                                <p class="card-title-desc"></p>
                                <div class="input-group mb-3">
                                    <label class="control-label">Prime brute mensuelle &nbsp </label>
                                    <div class="input-group-prepend">

                                        <input type="text" class="form-control docs-date" name="date" placeholder="0.00" autocomplete="off">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled>
                                                <i class="fa fa-euro-sign" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="docs-datepicker-container">&nbsp &nbsp &nbsp(TTC)</div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="control-label">Prime brute annuelle &nbsp &nbsp &nbsp </label>
                                    <div class="input-group-prepend">

                                        <input type="text" class="form-control docs-date" name="date" placeholder="0.00" autocomplete="off">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled>
                                                <i class="fa fa-euro-sign" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="docs-datepicker-container">&nbsp &nbsp &nbsp(TTC)</div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="control-label">Frais de dossier &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label>
                                    <div class="input-group-prepend">

                                        <input type="text" class="form-control docs-date" name="date" placeholder="0.00" autocomplete="off">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled>
                                                <i class="fa fa-euro-sign" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="docs-datepicker-container"></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Mois gratuits 1ére année</label>
                                            <select class="form-control select2">
                                                <option value="">Aucun(e)</option>
                                                <option value=""></option>
                                            </select>

                                        </div>


                                        <div class="form-group mb-0">
                                            <label class="control-label">Mois gratuits 2éme année</label>
                                            <select class="form-control select2-search-disable">
                                                <option value="">Aucun(e)</option>
                                                <option value=""></option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group ajax-select mt-3 mt-lg-0">
                                            <label class="control-label">Mois gratuits 3éme année</label>
                                            <select class="form-control select2-ajax">
                                                <option value="">Aucun(e)</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-0 templating-select">
                                            <label class="control-label">Fractionnement</label>
                                            <select class="form-control select2-templating">
                                                <option value="">Aucun(e)</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end select2 -->
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Informations bancaires</h4>
                                <p class="card-title-desc"></p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>IBAN de prélévement</label>
                                            <input type="text" class="colorpicker-default form-control">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label>IBAN de remboursement</label>
                                            <input type="text" class="colorpicker-rgba form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group ajax-select mt-3 mt-lg-0">
                                            <label>BIC de prélévement</label>
                                            <input type="text" class="colorpicker-rgba form-control">
                                        </div>
                                        <div class="form-group mb-0 templating-select">
                                            <label>BIC de remboursement</label>

                                            <input type="text" class="colorpicker-rgba form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Gestion</h4>
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-primary" data-method="getDate" data-target="#putDate">N° contrat</button>
                                            </div>
                                            <input type="text" class="form-control" id="putDate">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="mt-4 mt-sm-0">

                                            <div class="docs-options">

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="option-format">Début d'effet</span>
                                                    </div>
                                                    <input type="date" class="form-control" name="format" value="" aria-describedby="option-format" placeholder="jj/mm/aaaa">
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-xl-3 col-sm-6">
                                        <div class="mt-4 mt-sm-0">

                                            <div class="docs-options">

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="option-format">Date d'échéance</span>
                                                    </div>
                                                    <input type="date" class="form-control" name="format" value="" aria-describedby="option-format" placeholder="jj/mm">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="option-startView">Contrat responsable</span>
                                            </div>
                                            <select class="form-control" id="option-startView" name="startView">
                                                <option value="OUI" selected>OUI</option>
                                                <option value="NON">NON</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-xl-3 col-sm-6">
                                        <div class="mt-4 mt-sm-0">

                                            <div class="form-group">
                                                <label class="control-label">Type de commisionnement</label>
                                                <select class="form-control select2">
                                                    <option value="selectionner">selectionner</option>
                                                    <option value=""></option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-xl-3 col-sm-6">
                                        <div class="mt-4 mt-sm-0">

                                            <label class="control-label">Commisionnement 1ére année </label>
                                            <div class="input-group-prepend">

                                                <input type="text" class="form-control docs-date" name="date" placeholder="0" autocomplete="off">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled>
                                                        <i class="fa fa-percent" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="docs-datepicker-container"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="mt-4 mt-sm-0">

                                            <label class="control-label">Commisionnement années suivantes </label>
                                            <div class="input-group-prepend">

                                                <input type="text" class="form-control docs-date" name="date" placeholder="0" autocomplete="off">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled>
                                                        <i class="fa fa-percent" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="docs-datepicker-container"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-xl-3 col-sm-6">
                                        <div class="input-group mb-3">
                                            <label class="control-label">Prime nette mensuenelle(HT) </label>
                                            <div class="input-group-prepend">

                                                <input type="text" class="form-control docs-date" name="date" placeholder="0.00" autocomplete="off">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled>
                                                        <i class="fa fa-euro-sign" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="docs-datepicker-container"></div>
                                        </div>
                                    </div>



                                    <div class="col-xl-3 col-sm-6">
                                        <div class="input-group mb-3">
                                            <label class="control-label">Prime nette annuelle (HT) </label>
                                            <div class="input-group-prepend">

                                                <input type="text" class="form-control docs-date" name="date" placeholder="0.00" autocomplete="off">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled>
                                                        <i class="fa fa-euro-sign" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="docs-datepicker-container"></div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <form class="outer-repeater">
                                <div data-repeater-list="outer-group" class="outer">
                                    <div data-repeater-item class="outer">

                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Assuré principal</h4>
                                        <form class="repeater" enctype="multipart/form-data">
                                            <div data-repeater-list="group-a">
                                                <div data-repeater-item class="row">
                                                    <div class="form-group col-lg-2">
                                                        <label for="prenom_p">prenom</label>
                                                        <input type="text" id="prenom_p" name="untyped-input" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-lg-2">
                                                        <label for="name_p">Nom</label>
                                                        <input type="text" id="name_p" name="untyped-input" class="form-control" />
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label for="date_p">Date de naissance</label>
                                                        <input type="date" id="date_p" class="form-control" />
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label for="code_organisme_p">Code organisme</label>
                                                        <input type="text" id="code_organisme_p" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-lg-2">
                                                        <label for="Nsécurité_p">N° sécurité</label>
                                                        <input type="text" id="Nsécurité_p" class="form-control" />
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label for="resume">Civilité </label>
                                                        <select class="form-control select2">
                                                            <option value="selectionner">selectionner</option>
                                                            <option value=""></option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label for="message">Régime</label>
                                                        <select class="form-control select2-search-disable">
                                                            <option value="">Selectionner</option>
                                                            <option value=""></option>

                                                        </select>
                                                    </div>

                                                    <div class="col-lg-2 align-self-center">
                                                        <input data-repeater-delete type="button" class="btn btn-danger btn-block" value="Supprimer" />
                                                    </div>
                                                </div>

                                            </div>
                                            <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Ajouter" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Crée un nouvel conjoint</h4>
                                        <form class="repeater" enctype="multipart/form-data">
                                            <div data-repeater-list="group-a">
                                                <div data-repeater-item class="row">
                                                    <div class="form-group col-lg-2">
                                                        <label for="prenom_c">prenom</label>
                                                        <input type="text" id="prenom_c" name="untyped-input" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-lg-2">
                                                        <label for="name_c">Nom</label>
                                                        <input type="text" id="name_c" name="untyped-input" class="form-control" />
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label for="date_c">Date de naissance</label>
                                                        <input type="date" id="date_c" class="form-control" />
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label for="code_organisme_c">Code organisme</label>
                                                        <input type="text" id="code_organisme_c" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-lg-2">
                                                        <label for="Nsécurité_c">N° sécurité</label>
                                                        <input type="text" id="Nsécurité_c" class="form-control" />
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label for="resume">Civilité </label>
                                                        <select class="form-control select2">
                                                            <option value="selectionner">selectionner</option>
                                                            <option value=""></option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label for="message">Régime</label>
                                                        <select class="form-control select2-search-disable">
                                                            <option value="">Selectionner</option>
                                                            <option value=""></option>

                                                        </select>
                                                    </div>

                                                    <div class="col-lg-2 align-self-center">
                                                        <input data-repeater-delete type="button" class="btn btn-danger btn-block" value="Supprimer" />
                                                    </div>
                                                </div>

                                            </div>
                                            <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Ajouter" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Crée un nouvel enfant</h4>
                                        <form class="repeater" enctype="multipart/form-data">
                                            <div data-repeater-list="group-a">
                                                <div data-repeater-item class="row">
                                                    <div class="form-group col-lg-2">
                                                        <label for="prenom_e">prenom</label>
                                                        <input type="text" id="prenom_e" name="untyped-input" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-lg-2">
                                                        <label for="name_e">Nom</label>
                                                        <input type="text" id="name_e" name="untyped-input" class="form-control" />
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label for="date_e">Date de naissance</label>
                                                        <input type="date" id="date_e" class="form-control" />
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label for="code_organisme_e">Code organisme</label>
                                                        <input type="text" id="code_organisme_e" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-lg-2">
                                                        <label for="Nsécurité_e">N° sécurité</label>
                                                        <input type="text" id="Nsécurité_e" class="form-control" />
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label for="resume">Civilité </label>
                                                        <select class="form-control select2">
                                                            <option value="selectionner">selectionner</option>
                                                            <option value=""></option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label for="message">Régime</label>
                                                        <select class="form-control select2-search-disable">
                                                            <option value="">Selectionner</option>
                                                            <option value=""></option>

                                                        </select>
                                                    </div>

                                                    <div class="col-lg-2 align-self-center">
                                                        <input data-repeater-delete type="button" class="btn btn-danger btn-block" value="Supprimer" />
                                                    </div>
                                                </div>

                                            </div>
                                            <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Ajouter" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermé</button>
                <button type="button" class="btn btn-warning"><i class="bx bx-smile font-size-16 align-middle mr-2"></i> Enregistrer</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->