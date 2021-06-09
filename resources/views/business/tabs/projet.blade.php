    <div class="row" style="background-color:#85B4E4; padding-top:10px;">
        <div class="col-lg-2" style="padding-top:10px">
            <label for="projet_fiche">Fiche :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <input type="text" disabled class="form-control" style="height:30px" name="projet_fiche" id="projet_fiche">
            </div>
        </div>
        <div class="col-lg-2" style="padding-top:10px">
            <label for="projet_fournisseur"> Fournisseur :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <input type="text" disabled class="form-control" style="height:30px" name="projet_fournisseur" id="projet_fournisseur">
            </div>
        </div>
    </div>
    <div class="row" style="background-color:#85B4E4;margin-top:-13px">

        <div class="col-lg-2" style="padding-top:10px;">

            <label for="projet_statut">Statut :</label>

        </div>


        <div class="col-lg-2">
            <div class="form-group;">
                <select class="form-control select2" id="projet_statut" disabled>
                    <option></option>
                    <option>Clients</option>
                    <option>Appels</option>
                    <option>Rappels</option>
                    <option>NRP</option>
                    <option>Promesse</option>
                    <option>Faux numéro</option>
                    <option>Réfus</option>
                    <option>Fiches frigo</option>
                    <option>Doublons</option>
                    <option>Fiches à transférées</option>
                    <option>Fiches transférées</option>
                    <option>Demande de contrat</option>
                    <option>Relance j-90(fiches)</option>
                </select>
            </div>
        </div>


        <div class="col-lg-2" style="padding-top:10px">

            <label for="projet_commercial">Commercial :</label>

        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <input type="text" disabled class="form-control" style="height:30px" name="projet_commercial" id="projet_commercial">
            </div>
        </div>

        <div class="col-lg-2" style="padding-top:10px">

            <label for="projet_provenance"> Provenance :</label>

        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <input type="text" disabled class="form-control" style="height:30px" name="projet_provenance" id="projet_provenance">
            </div>
        </div>

    </div>
    <div class="row" style="background-color:#85B4E4;margin-top:-13px">
        <div class="col-lg-2" style="padding-top:10px">

            <label for="projet_statut_gestion">Statut de gestion :</label>

        </div>


        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2" id="projet_statut_gestion" disabled>
                    <option>Initiation</option>
                    <option>Prospection</option>
                    <option>Souscription</option>
                    <option>Contrat</option>

                </select>
            </div>
        </div>

        <div class="col-lg-2" style="padding-top:10px">

            <label for="projet_typeAssurance">Type Assurance :</label>

        </div>
        <div class="col-lg-2">

            <select class="form-control" style="height:30px" name="projet_typeAssurance" id="projet_typeAssurance">
                <option value="santé" selected>santé</option>
                <option value="prévoyanace">prévoyanace</option>
                <option value="auto">auto</option>
                <option value="habitation">habitation</option>
            </select>

        </div>
        <div class="col-lg-2" style="padding-top:10px">

            <label for="projet_created_at">Date Création :</label>

        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <input type="text" disabled class="form-control" style="height:30px" name="projet_created_at" id="projet_created_at">
            </div>
        </div>

    </div>
    <br><br>


    <div>
        <h4 class="mb-0 font-size-18" style="color:#85B4E4;margin-left:22px;margin-top:-20px">Renseignement</h4>
    </div>

    <div class="row" style="background-color:#F5F5F5;padding-top:20px;border:2 solid #F5F5F5;border:solid 1px #F5F5F5">

        <div class="col-lg-3">


            <div class="form-group">
                <label for="projet_intertcomp">Interet par la compagnie</label>
                <input type="text" class="form-control" name="projet_intertcomp" id="projet_intertcomp">

                </select>

            </div>


        </div>
        <div class="col-lg-3"></div>

        <div class="col-lg-3">

            <div class="form-group">
                <label for="projet_dispo">Disponibilite</label>
                <select class="form-control" name="projet_dispo" id="projet_dispo">

                    <option></option>
                    </option>
                    <option value="indifferent">Indifferent</option>
                    <option value="En journée">En journée</option>
                    <option value="Bureau">Bureau</option>
                    <option value="le soir">Le soir</option>
                </select>

            </div>

        </div>
        <div class="col-lg-3"></div>

    </div>



    <div class="row" style="height:50px;background-color:GhostWhite;padding-top:14px;">
        <div class="col-lg-6" id="prospect_name"> </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projet_nom">Nom</label>
                                <input type="text" class="form-control" name="projet_nom" id="projet_nom">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projet_prenom">Prenom</label>
                                <input type="text" class="form-control" name="projet_prenom" id="projet_prenom">
                            </div>
                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="projet_sexe">Sexe</label>

                                <select class="form-control" name="projet_sexe" id="projet_sexe">
                                    <option></option>
                                    <option value="Femme">Femme</option>
                                    <option value="Homme">Homme</option>
                                </select>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projet_situation">Situation</label>

                                <select class="form-control" id="projet_situation" name="projet_situation">

                                    <option></option>
                                    <option value="marié(e)">marié(e)</option>
                                    <option value="veuf(ve)">veuf(ve)</option>
                                    <option value="divorcé(e)">divorcé(e)</option>
                                    <option value="celibataire">célibataire</option>

                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="projet_basicpill-phoneno-input">Regime</label>
                                <select class="form-control" id="projet_regime" name="projet_regime">

                                    <option></option>
                                    <option value="Salarié">Salarié</option>
                                    <option value="TNS">TNS</option>
                                    <option value="Alsace-moselle">Alsace-moselle</option>
                                    <option value="Exploitant agricole">Exploitant agricole</option>
                                    <option value="Salarié agricole">Salarié agricole</option>
                                    <option value="Retraité salarié">Retraité salarié</option>
                                    <option value="Retraité TNS">Retraité TNS</option>
                                    <option value="Retraité alsace-moselle">Retraité alsace-moselle</option>
                                    <option value="Fonction publique">Fonction publique</option>
                                    <option value="Etudiant">Etudiant</option>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="projet_basicpill-email-input">Date Naissance</label>
                                <input type="date" class="form-control" name="projet_datenaissance" id="projet_datenaissance">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="projet_basicpill-address-input">Adresse</label>
                                <textarea id="projet_adress" name="projet_adress" class="form-control"></textarea>
                            </div>
                        </div>


                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="projet_basicpill-address-input">Adresse 2</label>
                                <textarea id="projet_adress2" name="projet_adress2" class="form-control"></textarea>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projet_basicpill-phoneno-input">Code postale</label>
                                <input type="text" name="projet_codepostale" id="projet_codepostale" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projet_basicpill-email-input">Email</label>
                                <input type="email" class="form-control" name="projet_email" id="projet_email">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projet_basicpill-phoneno-input">Ville</label>
                                <input type="text" class="form-control" name="projet_ville" id="projet_ville">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projet_basicpill-email-input">Tél/Port</label>
                                <input type="text" name="projet_telport" id="projet_telport" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projet_basicpill-phoneno-input">Activité</label>
                                <input type="text" class="form-control" name="projet_activite" id="projet_activite">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projet_basicpill-email-input">Tél 2</label>
                                <input type="text" name="projet_tel2" id="projet_tel2" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projet_basicpill-email-input">Categorie professionelle</label>
                                <select class="form-control" id="projet_categorieprof" name="projet_categorieprof">

                                    <option></option>
                                    <option value="Salarié(e) non cadre">Salarié(e) non cadre</option>
                                    <option value="Salarié(e) cadre">Salarié(e) cadre</option>
                                    <option value="Commerçant(e)">Commerçant(e)</option>
                                    <option value="Artisan">Artisan</option>
                                    <option value="Chef d'entreprise">Chef d'entreprise</option>
                                    <option value="Exploitant agricole">Exploitant agricole</option>
                                    <option value="fonctionnaire classe A">Fonctionnaire classe A</option>
                                    <option value="Fonctionnaire hors calsse A">Fonctionnaire hors calsse A</option>
                                    <option value="Profession libérale">Profession libérale</option>
                                    <option value="Retraité(e) non cadre">Retraité(e) non cadre</option>
                                    <option value="Retraité(e) cadre">Retraité(e) cadre</option>
                                    <option value="Sans profession">Sans profession</option>

                                </select>

                            </div>

                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="projet_basicpill-email-input">Nombre d'Enfant</label>
                                <input type="number" min="0" id="projet_nbrEnfance" name="projet_nbrEnfance" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div>
        <h4 class="mb-0 font-size-18" style="color:#85B4E4;margin-left:22px;margin-top:-20px">Assurés</h4>
    </div>

    <!-- end row -->
    <div class="row mb-4">
        <div class="col-md-4"></div>
        <div class="btn-group btn-group-lg col-md-4">
            <button id="ajouter_assure" type="button" class="btn btn-success btn-lg  waves-effect waves-light">Ajouter un assuré</button>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <div class="table-responsive">
                    <table id="assure_datatable" class="table text-center table-bordered dt-responsive  nowrap w-100">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">nom complet</th>
                                <th scope="col">affiliate</th>
                                <th scope="col">civilite</th>
                                <th scope="col">code Organisation</th>
                                <th scope="col">N° sécurité</th>
                                <th scope="col">date Naissance</th>
                                <th scope="col">regime</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>


                        <tbody id="assure_body">

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->


    <div>
        <h4 class="mb-0 font-size-18" style="color:#85B4E4;margin-left:22px;margin-top:-20px">Actions</h4>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">STATUT DE LA FICHE:</h4>

                    <label class="control-label">Libelé</label>
                    <select class="form-control select2" id="projet_statut_dup" name="projet_statut">
                        <option></option>
                        <option>Clients</option>
                        <option>Appels</option>
                        <option>Rappels</option>
                        <option>NRP</option>
                        <option>Promesse</option>
                        <option>Faux numéro</option>
                        <option>Réfus</option>
                        <option>Fiches frigo</option>
                        <option>Doublons</option>
                        <option>Fiches à transférées</option>
                        <option>Fiches transférées</option>
                        <option>Demande de contrat</option>
                        <option>Relance j-90(fiches)</option>
                    </select>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ETAT DE GESTION </h4>


                    <label class="control-label">Libelé</label>
                    <select class="form-control select2" id="projet_statut_gestion_dup" name="projet_statut_gestion">
                        <option>Initiation</option>
                        <option>Prospection</option>
                        <option>Souscription</option>
                        <option>Contrat</option>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group mb-0">
            <div>
                <button id="save_projet" class="btn btn-warning waves-effect waves-light mr-1">
                    Modifier
                </button>


            </div>
        </div>
    </div>
    <!-- modal-notes -->
    <div class="modal fade" id="assuremodale" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header" id="assure_head">

                </div>
                <div class="modal-body">
                    <div class="form-group" id="err-assure_titre">
                        <label for="assure_type">Type</label>
                        <select class="form-control select2" id="assure_type" name="assure_type" required>
                            <option>conjointe</option>
                            <option>enfant</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="assure_prenom">prenom</label>
                        <input type="text" id="assure_prenom" name="assure_prenom" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="assure_nom">Nom</label>
                        <input type="text" id="assure_nom" name="assure_nom" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="assure_dateNassance">Date de naissance</label>
                        <input type="date" id="assure_dateNassance" required name="assure_dateNassance" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="assure_code_organisme">Code organisme</label>
                        <input type="text" id="assure_code_organisme" required name="assure_code_organisme" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="assure_NbSecurite">N° sécurité</label>
                        <input type="text" id="assure_NbSecurite" required name="assure_NbSecurite" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="assure_civilite">Civilité </label>
                        <select class="form-control select2" required id="assure_civilite" name="assure_civilite">
                            <option value="Madame">Madame</option>
                            <option value="Madamoizelle">Madamoizelle</option>
                            <option value="Monsieur">Monsieur</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="assure_regime">Régime</label>
                        <select class="form-control" id="assure_regime" name="assure_regime">

                            <option></option>
                            <option value="Salarié">Salarié</option>
                            <option value="TNS">TNS</option>
                            <option value="Alsace-moselle">Alsace-moselle</option>
                            <option value="Exploitant agricole">Exploitant agricole</option>
                            <option value="Salarié agricole">Salarié agricole</option>
                            <option value="Retraité salarié">Retraité salarié</option>
                            <option value="Retraité TNS">Retraité TNS</option>
                            <option value="Retraité alsace-moselle">Retraité alsace-moselle</option>
                            <option value="Fonction publique">Fonction publique</option>
                            <option value="Etudiant">Etudiant</option>

                        </select>

                    </div>

                </div>
                <div class="modal-footer" id="assure_footer">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- <button type="submit" class="btn btn-dark waves-effect waves-light ">

        <i class="bx bx-hourglass bx-spin font-size-16 align-middle mr-2"></i>
        Lancer comparateur
    </button> -->