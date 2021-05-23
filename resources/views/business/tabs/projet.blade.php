<form action="conf.php" method="POST">

    <div class="row" style="background-color:#85B4E4; padding-top:10px;">
        <div class="col-lg-2" style="padding-top:10px">

            <label for="basicpill-pancard-input">Fiche :</label>


        </div>


        <div class="col-lg-2">
            <div class="form-group">
                <input type="text" class="form-control" style="height:30px" value="" name="fiche" id="fiche">
            </div>
        </div>


        <div class="col-lg-2" style="padding-top:10px">

            <label for="basicpill-pancard-input">Agence :</label>

        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <input type="text" class="form-control" style="height:30px" value="" name="agence" id="agence">
            </div>
        </div>



        <div class="col-lg-2" style="padding-top:10px">

            <label for="basicpill-pancard-input"> Fournisseur :</label>

        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <input type="text" class="form-control" style="height:30px" name="fournisseur" value="" id="fournisseur">
            </div>
        </div>


    </div>
    <div class="row" style="background-color:#85B4E4;margin-top:-13px">

        <div class="col-lg-2" style="padding-top:10px;">

            <label for="basicpill-pancard-input">Statut :</label>

        </div>


        <div class="col-lg-2">
            <div class="form-group;">
                <input type="text" style="height:30px" class="form-control" name="statut" value="" id="statut">
            </div>
        </div>


        <div class="col-lg-2" style="padding-top:10px">

            <label for="basicpill-pancard-input">Commercial :</label>

        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <input type="text" class="form-control" style="height:30px" name="commercial" value="" id="commercial">
            </div>
        </div>

        <div class="col-lg-2" style="padding-top:10px">

            <label for="basicpill-pancard-input"> Provenance :</label>

        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <input type="text" class="form-control" style="height:30px" name="provenance" value="" id="provenance">
            </div>
        </div>

    </div>
    <div class="row" style="background-color:#85B4E4;margin-top:-13px">
        <div class="col-lg-2" style="padding-top:10px">

            <label for="basicpill-pancard-input">Statut de gestion :</label>

        </div>


        <div class="col-lg-2">
            <div class="form-group">
                <input type="text" class="form-control" style="height:30px" name="satgest" value="" id="satgest">
            </div>
        </div>


        <div class="col-lg-2" style="padding-top:10px">

            <label for="basicpill-pancard-input">Gestionnaire </label>

        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <input type="text" class="form-control" style="height:30px" name="gestionnaire" value="" id="gestionnaire">
            </div>
        </div>

        <div class="col-lg-2" style="padding-top:10px">

            <label for="basicpill-pancard-input">Type Assurance :</label>

        </div>
        <div class="col-lg-2">
           {{-- <input type="text" class="form-control" style="height:30px" id="tpa1" name="tpa1" value="">--}}
            <select class="form-control" style="height:30px" name="tpa1" id="tpa1">
            <option value="">---</option>
            <option value="Assurance 1">Assurance 1</option>
                  <option value="Assurance 2">Assurance 2</option>
                  <option value="Assurance 3">Assurance 3</option>
                  <option value="Assurance 4">Assurance 4</option> 
                  </select> 

        </div>
        <div class="col-lg-2" style="padding-top:10px;">
            Crée le :<script>
                document.write(new Date().toLocaleDateString());
            </script>
            <input type="hidden" name="datenow" id="datenow">
        </div>
    </div>
    <br><br>


    <div>
        <h4 class="mb-0 font-size-18" style="color:#85B4E4;margin-left:22px;margin-top:-20px">Renseignement</h4>
    </div>

    <div class="row" style="background-color:#F5F5F5;padding-top:20px;border:2 solid #F5F5F5;border:solid 1px #F5F5F5">

        <div class="col-lg-3">


            <div class="form-group">
                <label for="basicpill-email-input">Interet par la compagnie</label>
                <input type="text" class="form-control" name="intertcomp" value="" id="intertcomp">

                </select>

            </div>


        </div>
        <div class="col-lg-3"></div>

        <div class="col-lg-3">

            <div class="form-group">
                <label for="basicpill-email-input">Disponibilite</label>
                <select class="custom-select" name="dispo1" id="dispo1">

                    <option value=""></option></option>
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
        <div class="col-lg-6">Prospect: </div>

        <div class="col-lg-6">Conjoint:
            <input type="hidden" id="x" value="0">
            <input type="checkbox" value="valider" id="ch1" onclick="afficher()">
            <div id="div1"></br></br></br></div>
        </div>




    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-phoneno-input">Nom</label>
                                <input type="text" class="form-control" name="nom1" id="nom1" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-email-input">Prenom</label>
                                <input type="text" class="form-control" name="prenom1" id="prenom1" value="">
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="basicpill-email-input">Sexe</label>

                                <select class="custom-select" name="sexe1" id="sexe1">
                                    <option value=""></option>
                                    <option value="Femme">Femme</option>
                                    <option value="Homme">Homme</option>
                                </select>

                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-email-input">Situation</label>

                                <select class="custom-select" id="situation1" name="situation1">

                                    <option value=""></option>
                                    <option value="marié(e)">marié(e)</option>
                                    <option value="veuf(ve)">veuf(ve)</option>
                                    <option value="divorcé(e)">divorcé(e)</option>
                                    <option value="celibataire">célibataire</option>

                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-phoneno-input">Regime</label>
                                <input type="text" class="form-control" name="regime1" value="" id="regime1">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-email-input">Date Naissance</label>
                                <input type="date" class="form-control" name="datenais1" value="" id="datenais1">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-address-input">Adresse</label>
                                <textarea id="adr11" name="adr11" class="form-control" value=""></textarea>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-address-input">Adresse 2</label>
                                <textarea id="adr21" name="adr21" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-phoneno-input">Code postale</label>
                                <input type="text" name="codepostale1" value="" id="codepostale1" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-email-input">Email</label>
                                <input type="email" class="form-control" name="email1" value="" id="email1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-phoneno-input">Ville</label>
                                <input type="text" class="form-control" name="ville1" value="" id="ville1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-email-input">Tél/Port</label>
                                <input type="text" name="telport1" id="telport1" value="" class="form-control" id="basicpill-email-input">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-phoneno-input">Activité</label>
                                <input type="text" class="form-control" name="activite1" value="" id="activite1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-email-input">Tél 2</label>
                                <input type="text" name="tel21" value="" id="tel21" class="form-control" id="basicpill-email-input">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-email-input">Categorie professionelle</label>
                               {{-- <input type="text" name="categorieprof1" value="" id="categorieprof1" class="form-control" id="basicpill-email-input">--}}
                               <select class="custom-select" id="categorieprof1" name="categorieprof1">

                                <option value=""></option>
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


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicpill-address-input">Complement</label>
                                <textarea id="comp1" name="comp1" class="form-control" rows="2"></textarea>
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
                    <h4 class="card-title mb-4"></h4>
                    <form class="outer-repeater">
                        <div data-repeater-list="outer-group" class="outer">
                            <div data-repeater-item class="outer">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="basicpill-email-input">Nombre d'Enfant</label>


                                            <input type="text" class="form-control" value="">



                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicpill-address-input">Numero de securite</label>
                                            <input type="text" class="form-control" value="" disabled="true" name="numsec1" id="numsec1">
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
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
                    <h4 class="card-title mb-4">Ajouter enfants</h4>
                    <form class="repeater" enctype="multipart/form-data">
                        <div data-repeater-list="group-a">
                            <div data-repeater-item class="row">
                                <div class="form-group col-lg-2">
                                    <label for="name">Nom</label>
                                    <input type="text" id="name" name="untyped-input" class="form-control" />
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" id="prenom" name="untyped-input" class="form-control" />
                                </div>

                                <div class="form-group col-lg-2">
                                    <label for="date">Date de naissance</label>
                                    <input type="date" id="date" class="form-control" />
                                </div>

                                <div class="form-group col-lg-2">
                                    <label for="code">Code organisme</label>
                                    <input type="text" id="code organisme" class="form-control" />
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="N° sécurité">N° sécurité</label>
                                    <input type="text" id="N° sécurité" class="form-control" />
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
                                        <option value="">---</option>
                                        <option value="Salarié(e)">Salarié(e)</option>
                                        <option value="TNS">TNS</option>
                                        <option value="Alsace-moselle">Alsace-moselle</option>
                                        <option value="Salarié(e) agricole">Salarié(e) agricole</option>
                                        <option value="Retraité(e)salarié(e)">Retraité(e)salarié(e)</option>
                                        <option value="Retraité(e) TNS">Retraité(e) TNS</option>
                                        <option value="Retraité(e) Alsace Moselle">Retraité(e) Alsace Moselle</option>
                                        <option value="Fonction publique">Fonction publique</option>
                                        <option value="Etudiant(e)">Etudiant(e)</option>

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


    <div>
        <h4 class="mb-0 font-size-18" style="color:#85B4E4;margin-left:22px;margin-top:-20px">Actions</h4>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">STATUT DE LA FICHE:</h4>

                    <label class="control-label">Libelé</label>
                    <select class="form-control select2">
                        <option value=""></option>
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
                    <label class="control-label">Raison</label>
                    <select class="form-control select2">
                        <option>---</option>

                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ETAT DE GESTION </h4>


                    <label class="control-label">Libelé</label>
                    <select class="form-control select2">
                        <option>---</option>

                    </select>
                    <label class="control-label">Raison</label>
                    <select class="form-control select2">
                        <option>---</option>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group mb-0">
            <div>
                <button type="submit" name="confirmer1" class="btn btn-warning waves-effect waves-light mr-1">
                    Modifier
                </button>
                <button type="reset" class="btn btn-secondary waves-effect">
                    Annuler
                </button>


            </div>
        </div>
    </div>
</form>
</br>
<a href="comparateur.php">*
    <button type="submit" class="btn btn-dark waves-effect waves-light ">

        <i class="bx bx-hourglass bx-spin font-size-16 align-middle mr-2"></i>
        Lancer comparateur
    </button>
</a>