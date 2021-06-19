<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">

                <h4 class="card-title mb-4">Contrat et Souscription</h4>
                <h3 class="card-title mb-4" id="etat_contrat"> </h3>
                @if(auth()->user()->role_id != 2 && auth()->user()->role_id != 4)
                <div class="row ">
                    <div class="col-xl-4 col-sm-6">

                        <div>
                            <h4 class="font-size-14 mb-3"></h4>
                            <div class="docs-datepicker">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Type de contrat</span>
                                    </div>
                                    <select class="form-control" id="contrat_type" name="contrat_type">
                                        <option value="Prélévement">--</option>
                                        <option value="affaire nouvelle">affaire nouvelle</option>
                                        <option value="ajout/retrait ayant droit">ajout/retrait ayant droit</option>
                                        <option value="Modification garanties">Modification garanties</option>
                                        <option value="Modification date d'effet">Modification date d'effet</option>
                                    </select>
                                </div>
                            </div>
                            <div class="docs-datepicker">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="option-startView">Compagnie</span>
                                    </div>
                                    <select class="form-control" id="contrat_compagnie" name="contrat_compagnie">

                                    </select>
                                </div>
                            </div>
                            <div class="docs-datepicker">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="option-startView">Produit</span>
                                    </div>
                                    <select class="form-control" id="contrat_formule" name="contrat_formule">

                                    </select>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="option-format">Date signature</span>
                                </div>
                                <input class="form-control" type="date" id="contrat_dateSignature" name="contrat_dateSignature">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="option-format">Date d'effet</span>
                                </div>
                                <input class="form-control" type="date" id="contrat_effet" name="contrat_effet">
                            </div>

                        </div>
                    </div>


                    <div class="col-xl-4 col-sm-6">
                        <div class="mt-4 mt-xl-0">
                            <h4 class="font-size-14 mb-3"></h4>
                            <div class="docs-actions">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-primary">N° client</button>
                                    </div>
                                    <input type="text" class="form-control" id="contrat_nbClient" name="contrat_nbClient">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-primary">N° contrat</button>
                                    </div>
                                    <input type="text" class="form-control" id="contrat_nbContrat" name="contrat_nbContrat">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-primary">N° d'affialiation</button>
                                    </div>
                                    <input type="text" class="form-control" id="contrat_nbAffiliation" name="contrat_nbAffiliation">
                                </div>


                                <div class="input-group mb-2 mr-sm-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary">N° Sécurité</button>
                                        </div>
                                        <input type="text" class="form-control" id="contrat_nbSecurite" name="contrat_nbSecurite">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="mt-4 mt-sm-0">
                            <h4 class="font-size-14 mb-3"></h4>
                            <div class="docs-options">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <input type="text" class="form-control" id="contrat_cotisation" name="contrat_cotisation" placeholder="Cotisation" autocomplete="off">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled>
                                                <i class="fa fa-euro-sign" aria-hidden="true">/mois</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="contrat_aide_lois" name="contrat_aide_lois" value="Contrat aidé" class="custom-control-input">
                                <label class="custom-control-label" for="contrat_aide_lois">Contrat aidé</label>
                            </div>
                            </br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="contrat_aide_lois" name="contrat_aide_lois" value="Loi madelin" class="custom-control-input">
                                <label class="custom-control-label" for="contrat_aide_lois">Loi madelin</label>
                            </div>
                        </div>
                    </div>

                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@if(auth()->user()->role_id != 3 )
<div class="row ctr_role">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">INFO RELEVE D'IDENTITE BANCAIRE(RIB)</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="formrow-inputCity">C.Banque</label>
                            <input type="text" class="form-control" id="contrat_cBanque" name="contrat_cBanque" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="formrow-inputZip">C.Agence</label>
                            <input type="text" class="form-control" id="contrat_cAgence" name="contrat_cAgence" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="formrow-inputZip">N°Compte</label>
                            <input type="text" class="form-control" id="contrat_nbCompte" name="contrat_nbCompte" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="formrow-inputZip">clé</label>
                            <input type="text" class="form-control" id="contrat_cle" name="contrat_cle" required>
                        </div>
                    </div>



                </div>
                <div class="form-group">
                    <label for="formrow-firstname-input">Banque</label>
                    <input type="text" class="form-control" id="contrat_banque" name="contrat_banque">
                </div>

                <div class="form-group">
                    <label for="formrow-firstname-input">Adresse</label>
                    <input type="text" class="form-control" id="contrat_adress" name="contrat_adress" required>
                </div>
                <div class="form-group">
                    <label for="formrow-firstname-input">IBAN</label>
                    <input type="text" class="form-control" id="contrat_iban" name="contrat_iban" required>
                </div>
                <div class="form-group">
                    <label for="formrow-firstname-input">BIC</label>
                    <input type="text" class="form-control" id="contrat_bic" name="contrat_bic" required>
                </div>




            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">INFO de paiment</h4>



                <div class="form-group row">
                    <label>Mode de paiment</label>
                    <div class="col-md-10">
                        <select class="form-control" id="contrat_modePaiement" name="contrat_modePaiement">
                            <option value="--">--</option>
                            <option value="Prélévement">Prélévement</option>
                            <option value="cheque">cheque</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label>Type de paiement</label>
                    <div class="col-md-10">
                        <select class="form-control" id="contrat_typePaiement" name="contrat_typePaiement">
                            <option value="--">--</option>
                            <option value="Mensuel">Mensuel</option>
                            <option value="bimestriel">bimestriel</option>
                            <option value="Trimestriell">Trimestriel</option>
                            <option value="Trimestriell">Semestriel</option>
                            <option value="Annnuel">Annnuel</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label>Gratuité compagnie</label>
                    <div class="col-md-10">
                        <select class="form-control" id="contrat_compagnieGT" name="contrat_compagnieGT">
                            <option value="non">non</option>
                            <option value="5%">5%</option>
                            <option value="10%">10%</option>
                            <option value="15%">15%</option>
                            <option value="20%">20%</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label>Frais de dossier offert</label>
                    <div class="col-md-10">
                        <select class="form-control" id="contrat_fraisDossier" name="contrat_fraisDossier">
                            <option value="non">non</option>
                            <option value="5%">5%</option>
                            <option value="10%">10%</option>
                            <option value="15%">15%</option>
                            <option value="20%">20%</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label>Paiement CB 1er mois</label>
                    <div class="col-md-10">
                        <select class="form-control" id="contrat_paiementCB" name="contrat_paiementCB">
                            <option value="non">non</option>
                            <option value="5%">5%</option>
                            <option value="10%">10%</option>
                            <option value="15%">15%</option>
                            <option value="20%">20%</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label>Remise </label>
                    <div class="col-md-10">
                        <select class="form-control" id="contrat_remise" name="contrat_remise">
                            <option value="non">non</option>
                            <option value="5%">5%</option>
                            <option value="10%">10%</option>
                            <option value="15%">15%</option>
                            <option value="20%">20%</option>
                        </select>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
@endif

<div class="row ctr_role">
    <div class="form-group mb-0">
        <div>
            <button id="save_contrat" class="btn btn-warning waves-effect waves-light mr-1">
                Modifier
            </button>

        </div>
    </div>
</div>

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

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermé</button>
                    <button type="button" class="btn btn-warning"><i class="bx bx-smile font-size-16 align-middle mr-2"></i> Enregistrer</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->