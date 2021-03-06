@extends('layouts.appback')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Status Projet</h5>

                <div class="position-relative m-4">
                    <div class="btn-group btn-group-example d-flex mb-3" id="state_gestion" role="group">
                        <button type="button" class="btn btn-primary w-100" id="Initiation">Initiation</button>
                        <button type="button" class="btn btn-outline-primary w-100" id="Prospection">Prospection</button>
                        <button type="button" class="btn btn-outline-primary w-100" id="Souscription">Souscription</button>
                        <button type="button" class="btn btn-outline-primary w-100" id="Contrat">Contrat</button>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 25%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#projet" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">projet</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#contrat" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">contrat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#document" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">document</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tache" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">tache</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#rendez-vous" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">rendez-vous</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#note" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">note</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#historique" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">historique</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="projet" role="tabpanel">

                        @include('business.tabs.projet')

                    </div>
                    <div class="tab-pane" id="contrat" role="tabpanel">

                        @include('business.tabs.contrat')

                    </div>
                    <div class="tab-pane" id="document" role="tabpanel">

                        @include('business.tabs.document')


                    </div>
                    <div class="tab-pane" id="tache" role="tabpanel">
                        @include('business.tabs.tache')
                    </div>
                    <div class="tab-pane" id="rendez-vous" role="tabpanel">
                        @include('business.tabs.rendez_vous')
                    </div>
                    <div class="tab-pane" id="note" role="tabpanel">
                        @include('business.tabs.note')
                    </div>
                    <div class="tab-pane" id="historique" role="tabpanel">
                        @include('business.tabs.historique')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal 2-->
<div class="modal fade bs-example-modal-sm" id="messagebox" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Message</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">??</button>
            </div>
            <div class="modal-body" id="content"> content will be here </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal 2 -->

@endsection
@section('script')
<script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('libs/dropzone/min/dropzone.min.js') }}"></script>
<script>
    $(document).ready(function() {
        init_tach()
        init_note()
        init_rappel()
        init_histo()
        init_doc()
        init_projet()
        init_contrat()
    });

    function message(objet, action, statut) {
        var message;
        if (statut == "done") {
            message = "votre " + objet + " est " + action + " avec succ??s";
        } else {
            message = "votre " + objet + " n'est pas " + action;
        }
        $('#content').html(message);
        $('#messagebox').modal('show');

    }
</script>
<script>
    function init_projet() {

        let projet_link = window.location.href.split('/')[5];

        var StringData = $.ajax({
            url: '/projet/detail',
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false,
            data: {
                projet_link: projet_link
            }
        }).responseText;
        jsonData = JSON.parse(StringData);

        //info general
        $('#projet_fiche').val(jsonData.projet.id);
        $('#projet_fournisseur').val(jsonData.fournisseur.nom);
        $('#projet_commercial').val(jsonData.prospet.user != null ? jsonData.prospet.user.email : 'utilisateur indisponible');
        $('#projet_provenance').val(jsonData.prospet.provenance.nom);
        $('#projet_statut_gestion').val(jsonData.projet.status_gestion);
        $('#projet_statut_gestion_dup').val(jsonData.projet.status_gestion);

        $('#state_gestion > button.btn-primary').addClass("btn-outline-primary").removeClass("btn-primary")
        $('#' + jsonData.projet.status_gestion).addClass("btn-primary").removeClass("btn-outline-primary")

        $('#projet_statut').html("<option></option>");
        $('#projet_statut_dup').html("<option></option>");
        for (let ind = 0; ind < jsonData.statuts.length; ind++) {
            $('#projet_statut').append(`<option value="${jsonData.statuts[ind].id}">${jsonData.statuts[ind].crmStatut}</option>`);
            $('#projet_statut_dup').append(`<option value="${jsonData.statuts[ind].id}">${jsonData.statuts[ind].crmStatut}</option>`);

        }
        $('#assure_body').html("");
        var deletbutton
        var colordelet
        for (let ind = 0; ind < jsonData.projet.assures.length; ind++) {
            if (jsonData.projet.assures[ind].deleted_at == null) {
                deletbutton = "<button  class=\"btn btn-link text-danger p-1\"  onclick=\"assure_delet(" + jsonData.projet.assures[ind].id + "," + ind + ")\"><i class=\"bx bx-trash\"></i></button>"
                colordelet = ''
            } else {
                deletbutton = "<button  class=\"btn btn-link text-warning p-1\"  onclick=\"assure_restore(" + jsonData.projet.assures[ind].id + "," + ind + ")\"><i class=\"bx bx-revision\"></i></button>"
                colordelet = 'table-danger'
            }
            $('#assure_body').append(`<tr id="assure${ind}" class="${colordelet}">
                                        <td id="assure_nomComplet${ind}">${jsonData.projet.assures[ind].nom} ${jsonData.projet.assures[ind].prenom}</td>
                                        <td id="assure_affiliate${ind}">${jsonData.projet.assures[ind].affiliate}</td>
                                        <td id="assure_civilite${ind}">${jsonData.projet.assures[ind].civilite}</td>
                                        <td id="assure_codeOrd${ind}">${jsonData.projet.assures[ind].codeOrg}</td>
                                        <td id="assure_securiteNbr${ind}">${jsonData.projet.assures[ind].securityNumb}</td>
                                        <td id="assure_dateNaissance${ind}">${jsonData.projet.assures[ind].dateNaissance}</td>
                                        <td id="assure_rigime${ind}">${jsonData.projet.assures[ind].regime}</td>
                                        <td><ul class="list-inline mb-0 font-size-16">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-link text-success p-1" onclick="edit_assure(${jsonData.projet.assures[ind].id},${ind})"><i class="bx bxs-edit-alt"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    ${deletbutton}
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>`)
        }
        $("#assure_datatable").DataTable();


        $('#prospect_name').html(`Prospect: ${jsonData.prospet.nom} ${jsonData.prospet.prenom}`)
        $('#projet_statut').val(jsonData.projet.statut.id);
        $('#projet_statut_dup').val(jsonData.projet.statut.id);
        $('#projet_typeAssurance').val(jsonData.projet.type);
        $('#projet_created_at').val(jsonData.projet.created_at.split(' ')[0]);
        // rensegnement
        $('#projet_intertcomp').val(jsonData.prospet.wishes);
        $('#projet_dispo').val(jsonData.prospet.disponibilite);
        $('#projet_nom').val(jsonData.prospet.nom);
        $('#projet_prenom').val(jsonData.prospet.prenom);
        $('#projet_sexe').val(jsonData.prospet.sexe);
        $('#projet_situation').val(jsonData.prospet.situation);
        $('#projet_regime').val(jsonData.prospet.regime);
        $('#projet_datenaissance').val(jsonData.prospet.dateNaissance);
        $('#projet_adress').val(jsonData.prospet.adress);
        $('#projet_codepostale').val(jsonData.prospet.codePostale);
        $('#projet_email').val(jsonData.prospet.email);
        $('#projet_ville').val(jsonData.prospet.ville);
        $('#projet_telport').val(jsonData.prospet.tel);
        $('#projet_activite').val(jsonData.prospet.activite);
        $('#projet_tel2').val(jsonData.prospet.tel2);
        $('#projet_categorieprof').val(jsonData.prospet.categoryProf);
        $('#projet_nbrEnfance').val(jsonData.prospet.nbreEnfant);

        $('#save_projet').click(function() {
            var inputs = {
                'statut_dup': $('#projet_statut_dup').val(),
                'statut_gestion_dup': $('#projet_statut_gestion_dup').val(),
                'typeAssurance': $('#projet_typeAssurance').val(),
                'intertcomp': $('#projet_intertcomp').val(),
                'dispo': $('#projet_dispo').val(),
                'nom': $('#projet_nom').val(),
                'prenom': $('#projet_prenom').val(),
                'sexe': $('#projet_sexe').val(),
                'situation': $('#projet_situation').val(),
                'regime': $('#projet_regime').val(),
                'datenaissance': $('#projet_datenaissance').val(),
                'adress': $('#projet_adress').val(),
                'codepostale': $('#projet_codepostale').val(),
                'email': $('#projet_email').val(),
                'ville': $('#projet_ville').val(),
                'telport': $('#projet_telport').val(),
                'activite': $('#projet_activite').val(),
                'tel2': $('#projet_tel2').val(),
                'categorieprof': $('#projet_categorieprof').val(),
                'nbrEnfant': $('#projet_nbrEnfance').val()
            };

            var StringData1 = $.ajax({
                url: '/projet/edit/' + window.location.href.split('/')[5],
                dataType: "json",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                async: false,
                data: inputs
            }).responseText;
            jsonData1 = JSON.parse(StringData1);
            // console.log(jsonData1)
            message("fiche", "modifi??", jsonData1.check);
            $('#projet_fiche').val(jsonData1.projet.id);
            $('#projet_commercial').val(jsonData1.prospet.user != null ? jsonData1.prospet.user.email : 'utilisateur indisponible');
            $('#projet_provenance').val(jsonData1.prospet.provenance.nom);
            $('#projet_statut_gestion').val(jsonData1.projet.status_gestion);
            $('#projet_statut_gestion_dup').val(jsonData1.projet.status_gestion);

            $('#state_gestion > button.btn-primary').addClass("btn-outline-primary").removeClass("btn-primary")
            $('#' + jsonData1.projet.status_gestion).addClass("btn-primary").removeClass("btn-outline-primary")

            $('#projet_statut').html("<option></option>");
            $('#projet_statut_dup').html("<option></option>");
            for (let ind = 0; ind < jsonData1.statuts.length; ind++) {
                $('#projet_statut').append(`<option value="${jsonData1.statuts[ind].id}">${jsonData1.statuts[ind].crmStatut}</option>`);
                $('#projet_statut_dup').append(`<option value="${jsonData1.statuts[ind].id}">${jsonData1.statuts[ind].crmStatut}</option>`);

            }
            $('#prospect_name').html(`Prospect: ${jsonData1.prospet.nom} ${jsonData1.prospet.prenom}`)
            $('#projet_statut').val(jsonData1.projet.statut.id);
            $('#projet_statut_dup').val(jsonData1.projet.statut.id);
            $('#projet_typeAssurance').val(jsonData1.projet.type);
            $('#projet_created_at').val(jsonData1.projet.created_at.split(' ')[0]);
            // rensegnement
            $('#projet_intertcomp').val(jsonData1.prospet.wishes);
            $('#projet_dispo').val(jsonData1.prospet.disponibilite);
            $('#projet_nom').val(jsonData1.prospet.nom);
            $('#projet_prenom').val(jsonData1.prospet.prenom);
            $('#projet_sexe').val(jsonData1.prospet.sexe);
            $('#projet_situation').val(jsonData1.prospet.situation);
            $('#projet_regime').val(jsonData1.prospet.regime);
            $('#projet_datenaissance').val(jsonData1.prospet.dateNaissance);
            $('#projet_adress').val(jsonData1.prospet.adress);
            $('#projet_codepostale').val(jsonData1.prospet.codePostale);
            $('#projet_email').val(jsonData1.prospet.email);
            $('#projet_ville').val(jsonData1.prospet.ville);
            $('#projet_telport').val(jsonData1.prospet.tel);
            $('#projet_activite').val(jsonData1.prospet.activite);
            $('#projet_tel2').val(jsonData1.prospet.tel2);
            $('#projet_categorieprof').val(jsonData1.prospet.categoryProf);
            $('#projet_nbrEnfance').val(jsonData1.prospet.nbreEnfant);
        })
    }

    $('#ajouter_assure').click(function() {

        $('#assure_head').html(`<h5 class="modal-title" id="exampleModalLabel">Ajouter un assur??</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>`);
        $('#assure_footer').html(`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button class="btn btn-success" id="assure_save">Enregistrer</button>`);
        $('#assuremodale').modal('show');

        $('#assure_save').click(function() {
            var inputs = {
                'nom': $('#assure_nom').val(),
                'prenom': $('#assure_prenom').val(),
                'affiliate': $('#assure_affiliate').val(),
                'civilite': $('#assure_civilite').val(),
                'regime': $('#assure_regime').val(),
                'dateNaissance': $('#assure_dateNaissance').val(),
                'codeOrg': $('#assure_codeOrg').val(),
                'securityNumb': $('#assure_securityNumb').val(),
                'project_id': window.location.href.split('/')[5]
            };

            var StringData = $.ajax({
                url: '/assure/store',
                dataType: "json",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                async: false,
                data: inputs
            }).responseText;
            jsonData = JSON.parse(StringData);
          
            if ($.isEmptyObject(jsonData.error)) {
                console.log("here")
                assure_clearInputs(jsonData.inputs);
                $('#assuremodale').modal('hide');
                message("assur??", "ajout??", jsonData.check);
                if (jsonData.assure.deleted_at == null) {
                    deletbutton = "<button  class=\"btn btn-link text-danger p-1\"  onclick=\"assure_delet(" + jsonData.assure.id + "," + jsonData.count + ")\"><i class=\"bx bx-trash\"></i></button>"
                } else {
                    deletbutton = "<button  class=\"btn btn-link text-warning p-1\"  onclick=\"assure_restore(" + jsonData.assure.id + "," + jsonData.count + ")\"><i class=\"bx bx-revision\"></i></button>"
                }

                $('#assure_body').append(`<tr class="table-success" id="assure${jsonData.count}">
                                        <td id="assure_nomComplet${jsonData.count}">${jsonData.assure.nom} ${jsonData.assure.prenom}</td>
                                        <td id="assure_affiliate${jsonData.count}">${jsonData.assure.affiliate}</td>
                                        <td id="assure_civilite${jsonData.count}">${jsonData.assure.civilite}</td>
                                        <td id="assure_codeOrd${jsonData.count}">${jsonData.assure.codeOrg}</td>
                                        <td id="assure_securiteNbr${jsonData.count}">${jsonData.assure.securityNumb}</td>
                                        <td id="assure_dateNaissance${jsonData.count}">${jsonData.assure.dateNaissance}</td>
                                        <td id="assure_rigime${jsonData.count}">${jsonData.assure.regime}</td>
                                        <td><ul class="list-inline mb-0 font-size-16">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-link text-success p-1" onclick="edit_assure(${jsonData.assure.id},${jsonData.count})"><i class="bx bxs-edit-alt"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    ${deletbutton}
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>`)
                $("#assure_datatable").DataTable();
            } else {
                // console.log(jsonData.error)
                assure_clearInputs(jsonData.inputs);
                assure_printErrorMsg(jsonData.error);
            }
        })



    });

    function assure_delet(id, ind) {

        var StringData = $.ajax({
            url: '/assure/delete/' + id,
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false
        }).responseText;
        jsonData = JSON.parse(StringData);
        // console.log(jsonData)
        message("assur??", "d??sactiv??", jsonData.check);
        if (jsonData.assure.deleted_at == null) {
            deletbutton = "<button  class=\"btn btn-link text-danger p-1\"  onclick=\"assure_delet(" + jsonData.assure.id + "," + ind + ")\"><i class=\"bx bx-trash\"></i></button>"
        } else {
            deletbutton = "<button  class=\"btn btn-link text-warning p-1\"  onclick=\"assure_restore(" + jsonData.assure.id + "," + ind + ")\"><i class=\"bx bx-revision\"></i></button>"
        }
        $('#assure' + ind).attr('class', 'table-danger')
        $('#assure' + ind).html(`   <td id="assure_nomComplet${ind}">${jsonData.assure.nom} ${jsonData.assure.prenom}</td>
                                        <td id="assure_affiliate${ind}">${jsonData.assure.affiliate}</td>
                                        <td id="assure_civilite${ind}">${jsonData.assure.civilite}</td>
                                        <td id="assure_codeOrd${ind}">${jsonData.assure.codeOrg}</td>
                                        <td id="assure_securiteNbr${ind}">${jsonData.assure.securityNumb}</td>
                                        <td id="assure_dateNaissance${ind}">${jsonData.assure.dateNaissance}</td>
                                        <td id="assure_rigime${ind}">${jsonData.assure.regime}</td>
                                        <td><ul class="list-inline mb-0 font-size-16">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-link text-success p-1" onclick="edit_assure(${jsonData.assure.id},${ind})"><i class="bx bxs-edit-alt"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    ${deletbutton}
                                                </li>
                                            </ul>
                                        </td>`)
        $("#assure_datatable").DataTable();

    }

    function assure_restore(id, ind) {

        var StringData = $.ajax({
            url: '/assure/restore/' + id,
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false
        }).responseText;
        jsonData = JSON.parse(StringData);

        message("assur??", "restor??", jsonData.check);
        if (jsonData.assure.deleted_at == null) {
            deletbutton = "<button  class=\"btn btn-link text-danger p-1\"  onclick=\"assure_delet(" + jsonData.assure.id + "," + ind + ")\"><i class=\"bx bx-trash\"></i></button>"
        } else {
            deletbutton = "<button  class=\"btn btn-link text-warning p-1\"  onclick=\"assure_restore(" + jsonData.assure.id + "," + ind + ")\"><i class=\"bx bx-revision\"></i></button>"
        }
        $('#assure' + ind).attr('class', '')
        $('#assure' + ind).html(`   <td id="assure_nomComplet${ind}">${jsonData.assure.nom} ${jsonData.assure.prenom}</td>
                                <td id="assure_affiliate${ind}">${jsonData.assure.affiliate}</td>
                                <td id="assure_civilite${ind}">${jsonData.assure.civilite}</td>
                                <td id="assure_codeOrd${ind}">${jsonData.assure.codeOrg}</td>
                                <td id="assure_securiteNbr${ind}">${jsonData.assure.securityNumb}</td>
                                <td id="assure_dateNaissance${ind}">${jsonData.assure.dateNaissance}</td>
                                <td id="assure_rigime${ind}">${jsonData.assure.regime}</td>
                                <td><ul class="list-inline mb-0 font-size-16">
                                        <li class="list-inline-item">
                                            <button class="btn btn-link text-success p-1" onclick="edit_assure(${jsonData.assure.id},${ind})"><i class="bx bxs-edit-alt"></i></button>
                                        </li>
                                        <li class="list-inline-item">
                                            ${deletbutton}
                                        </li>
                                    </ul>
                                </td>`)
        $("#assure_datatable").DataTable();

    }

    function edit_assure(id, ind) {


        $('#assure_nom').val($('#assure_nomComplet' + ind).html().split(" ")[0]);
        $('#assure_prenom').val($('#assure_nomComplet' + ind).html().split(" ")[1]);
        $('#assure_affiliate').val($('#assure_affiliate' + ind).html());
        $('#assure_civilite').val($('#assure_civilite' + ind).html());
        $('#assure_regime').val($('#assure_rigime' + ind).html());
        $('#assure_dateNaissance').val($('#assure_dateNaissance' + ind).html());
        $('#assure_codeOrg').val($('#assure_codeOrd' + ind).html());
        $('#assure_securityNumb').val($('#assure_securiteNbr' + ind).html());

        $('#assure_head').html(`<h5 class="modal-title" id="exampleModalLabel">modifier un assur??</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>`);
        $('#assure_footer').html(`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button class="btn btn-success" id="assure_edit">Enregistrer</button>`);
        $('#assuremodale').modal('show');

        $('#assure_edit').click(function() {
            var inputs = {
                'nom': $('#assure_nom').val(),
                'prenom': $('#assure_prenom').val(),
                'affiliate': $('#assure_affiliate').val(),
                'civilite': $('#assure_civilite').val(),
                'regime': $('#assure_regime').val(),
                'dateNaissance': $('#assure_dateNaissance').val(),
                'codeOrg': $('#assure_codeOrg').val(),
                'securityNumb': $('#assure_securityNumb').val()
            };

            var StringData = $.ajax({
                url: '/assure/edit/' + id,
                dataType: "json",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                async: false,
                data: inputs
            }).responseText;
            jsonData = JSON.parse(StringData);
            // console.log(jsonData)
            $('#assuremodale').modal('hide');
            message("assur??", "modifi??", jsonData.check);
            $('#assure' + ind).attr('class', 'table-success')
            if (jsonData.assure.deleted_at == null) {
                deletbutton = "<button  class=\"btn btn-link text-danger p-1\"  onclick=\"assure_delet(" + jsonData.assure.id + "," + ind + ")\"><i class=\"bx bx-trash\"></i></button>"
            } else {
                deletbutton = "<button  class=\"btn btn-link text-warning p-1\"  onclick=\"assure_restore(" + jsonData.assure.id + "," + ind + ")\"><i class=\"bx bx-revision\"></i></button>"
            }
            $('#assure' + ind).html(`   <td id="assure_nomComplet${ind}">${jsonData.assure.nom} ${jsonData.assure.prenom}</td>
                                <td id="assure_affiliate${ind}">${jsonData.assure.affiliate}</td>
                                <td id="assure_civilite${ind}">${jsonData.assure.civilite}</td>
                                <td id="assure_codeOrd${ind}">${jsonData.assure.codeOrg}</td>
                                <td id="assure_securiteNbr${ind}">${jsonData.assure.securityNumb}</td>
                                <td id="assure_dateNaissance${ind}">${jsonData.assure.dateNaissance}</td>
                                <td id="assure_rigime${ind}">${jsonData.assure.regime}</td>
                                <td><ul class="list-inline mb-0 font-size-16">
                                        <li class="list-inline-item">
                                            <button class="btn btn-link text-success p-1" onclick="edit_assure(${jsonData.assure.id},${ind})"><i class="bx bxs-edit-alt"></i></button>
                                        </li>
                                        <li class="list-inline-item">
                                            ${deletbutton}
                                        </li>
                                    </ul>
                                </td>`)
            $("#assure_datatable").DataTable();
        })

    }

    function assure_printErrorMsg(msg) {


        $.each(msg, function(key, value) {

            $("#err-assure_" + key).find("input").addClass('is-invalid');
            $("#err-assure_" + key).find("small").html(value);

        });

    }

    function assure_clearInputs(msg) {


        $.each(msg, function(key, value) {

            $("#err-assure_" + key).find("input").removeClass('is-invalid');
            $("#err-assure_" + key).find("small").html("");

        });

    }
</script>
<script>
    function init_contrat() {

        let projet_link = window.location.href.split('/')[5];

        var StringData = $.ajax({
            url: '/contrat/detail',
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false,
            data: {
                projet_link: projet_link
            }
        }).responseText;
        jsonData = JSON.parse(StringData);
        // console.log(jsonData)
        $('#contrat_compagnie').html("<option value=\"0\">selectionner</option>")
        $('#contrat_formule').html("<option value=\"0\">selectionner</option>")
        for (let ind = 0; ind < jsonData.compagnies.length; ind++) {
            $('#contrat_compagnie').append(`<option value="${jsonData.compagnies[ind].id}">${jsonData.compagnies[ind].nom}</option>`);
        }
        for (let ind = 0; ind < jsonData.produits.length; ind++) {
            $('#contrat_formule').append(`<option value="${jsonData.produits[ind].id}">${jsonData.produits[ind].nom}</option>`);
        }

        $('#contrat_compagnie').change(function() {

            var StringData = $.ajax({
                url: '/compagnie/filtred_index',
                dataType: "json",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                async: false,
                data: {
                    compagnie_id: $(this).val()
                }
            }).responseText;
            jsonData = JSON.parse(StringData);

            $('#contrat_formule').html("<option value=\"0\">selectionner</option>")
            for (let ind = 0; ind < jsonData.length; ind++) {
                $('#contrat_formule').append(`<option value="${jsonData[ind].id}">${jsonData[ind].nom}</option>`);
            }
        })


        if (jsonData.contrat == null) {
            $('#etat_contrat').html("<span class=\"text-danger\" id=\"CT_val\">??tat : non contract??</span>")
            $('#save_contrat').html('cr??er le contrat')
            if ('{!! auth()->user()->role_id !!}' == 2 || '{!! auth()->user()->role_id !!}' == 4) {
                $('.ctr_role').hide()
            }
        } else {

            $('#etat_contrat').html("<span class=\"text-success\" id=\"CT_val\">??tat : contract??</span>")
            $('#save_contrat').html('modifier le contrat')
            $('#contrat_type').val(jsonData.contrat.type);
            $('#contrat_compagnie').val(jsonData.contrat.produit.compagnie_id);
            $('#contrat_formule').val(jsonData.contrat.produit_id);
            $('#contrat_dateSignature').val(jsonData.contrat.souscription.dateSignature);
            $('#contrat_effet').val(jsonData.contrat.souscription.dateEffet);
            $('#contrat_nbClient').val(jsonData.contrat.souscription.numClient);
            $('#contrat_nbContrat').val(jsonData.contrat.numero);
            $('#contrat_nbAffiliation').val(jsonData.contrat.souscription.numAffiliate);
            $('#contrat_nbSecurite').val(jsonData.contrat.souscription.numSs);
            $('#contrat_cotisation').val(jsonData.contrat.souscription.cotisationTotal);
            $('#contrat_aide_lois').val(jsonData.contrat.souscription.aide_lois);
            $('#contrat_cBanque').val(jsonData.contrat.souscription.cBanque);
            $('#contrat_cAgence').val(jsonData.contrat.souscription.cAgence);
            $('#contrat_nbCompte').val(jsonData.contrat.souscription.numCompte);
            $('#contrat_cle').val(jsonData.contrat.souscription.cle);
            $('#contrat_banque').val(jsonData.contrat.souscription.banque);
            $('#contrat_adress').val(jsonData.contrat.souscription.adresse);
            $('#contrat_iban').val(jsonData.contrat.souscription.iban);
            $('#contrat_bic').val(jsonData.contrat.souscription.bic);
            $('#contrat_modePaiement').val(jsonData.contrat.souscription.modePaiement);
            $('#contrat_typePaiement').val(jsonData.contrat.souscription.typePaiement);
            $('#contrat_compagnieGT').val(jsonData.contrat.souscription.gratuiteCompagnie);
            $('#contrat_fraisDossier').val(jsonData.contrat.souscription.fraisDoss);
            $('#contrat_paiementCB').val(jsonData.contrat.souscription.paiementCb);
            $('#contrat_remise').val(jsonData.contrat.souscription.remise);
            if ('{!! auth()->user()->role_id !!}' == 2 || '{!! auth()->user()->role_id !!}' == 4) {
                $('.ctr_role').show()
            }
        }
        $('#save_contrat').click(function() {
            var inputs = {
                'type': $('#contrat_type').val(),
                'compagnie': $('#contrat_compagnie').val(),
                'formule': $('#contrat_formule').val(),
                'dateSignature': $('#contrat_dateSignature').val(),
                'effet': $('#contrat_effet').val(),
                'nbClient': $('#contrat_nbClient').val(),
                'nbContrat': $('#contrat_nbContrat').val(),
                'nbAffiliation': $('#contrat_nbAffiliation').val(),
                'nbSecurite': $('#contrat_nbSecurite').val(),
                'cotisation': $('#contrat_cotisation').val(),
                'aide_lois': $('#contrat_aide_lois').val(),
                'cBanque': $('#contrat_cBanque').val(),
                'cAgence': $('#contrat_cAgence').val(),
                'nbCompte': $('#contrat_nbCompte').val(),
                'cle': $('#contrat_cle').val(),
                'banque': $('#contrat_banque').val(),
                'adress': $('#contrat_adress').val(),
                'iban': $('#contrat_iban').val(),
                'bic': $('#contrat_bic').val(),
                'modePaiement': $('#contrat_modePaiement').val(),
                'typePaiement': $('#contrat_typePaiement').val(),
                'compagnieGT': $('#contrat_compagnieGT').val(),
                'fraisDossier': $('#contrat_fraisDossier').val(),
                'paiementCB': $('#contrat_paiementCB').val(),
                'remise': $('#contrat_remise').val(),
                'etat_creation': $('#CT_val').html()
            };

            console.log(inputs)


            var StringData1 = $.ajax({
                url: '/contrat/edit/' + window.location.href.split('/')[5],
                dataType: "json",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                async: false,
                data: inputs
            }).responseText;
            jsonData1 = JSON.parse(StringData1);
            // console.log(jsonData1)
            message("contrat", "modifi??", jsonData1.check);

            if (jsonData1.contrat == null) {
                $('#etat_contrat').html("<span class=\"text-danger\" id=\"CT_val\">??tat : non contract??</span>")
            } else {
                $('#etat_contrat').html("<span class=\"text-success\" id=\"CT_val\">??tat : contract??</span>")

                $('#contrat_type').val(jsonData1.contrat.type);
                $('#contrat_compagnie').val(jsonData1.contrat.produit.compagnie_id);
                $('#contrat_formule').val(jsonData1.contrat.produit_id);
                $('#contrat_dateSignature').val(jsonData1.contrat.souscription.dateSignature);
                $('#contrat_effet').val(jsonData1.contrat.souscription.dateEffet);
                $('#contrat_nbClient').val(jsonData1.contrat.souscription.numClient);
                $('#contrat_nbContrat').val(jsonData1.contrat.numero);
                $('#contrat_nbAffiliation').val(jsonData1.contrat.souscription.numAffiliate);
                $('#contrat_nbSecurite').val(jsonData1.contrat.souscription.numSs);
                $('#contrat_cotisation').val(jsonData1.contrat.souscription.cotisationTotal);
                $('#contrat_aide_lois').val(jsonData1.contrat.souscription.aide_lois);
                $('#contrat_cBanque').val(jsonData1.contrat.souscription.cBanque);
                $('#contrat_cAgence').val(jsonData1.contrat.souscription.cAgence);
                $('#contrat_nbCompte').val(jsonData1.contrat.souscription.numCompte);
                $('#contrat_cle').val(jsonData1.contrat.souscription.cle);
                $('#contrat_banque').val(jsonData1.contrat.souscription.banque);
                $('#contrat_adress').val(jsonData1.contrat.souscription.adresse);
                $('#contrat_iban').val(jsonData1.contrat.souscription.iban);
                $('#contrat_bic').val(jsonData1.contrat.souscription.bic);
                $('#contrat_modePaiement').val(jsonData1.contrat.souscription.modePaiement);
                $('#contrat_typePaiement').val(jsonData1.contrat.souscription.typePaiement);
                $('#contrat_compagnieGT').val(jsonData1.contrat.souscription.gratuiteCompagnie);
                $('#contrat_fraisDossier').val(jsonData1.contrat.souscription.fraisDoss);
                $('#contrat_paiementCB').val(jsonData1.contrat.souscription.paiementCb);
                $('#contrat_remise').val(jsonData1.contrat.souscription.remise);
            }
        })
    }
</script>
<script>
    function init_histo() {

        let projet_link = window.location.href.split('/')[5];

        var StringData = $.ajax({
            url: '/historique/index',
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false,
            data: {
                projet_link: projet_link
            }
        }).responseText;
        jsonData = JSON.parse(StringData);

        $('#histo_body').html("");
        for (let ind = 0; ind < jsonData.length; ind++) {
            $('#histo_body').append(`<tr id="row${ind}">
                                        <td id="date_histo${ind}">${jsonData[ind].created_at}</td>
                                        <td id="action_histo${ind}">${jsonData[ind].action}</td>
                                        <td id="composante_histo${ind}">${jsonData[ind].composante}</td>
                                        <td id="responsable_histo${ind}">${jsonData[ind].user != null ? jsonData[ind].user.nom : ''}  
                                        ${ jsonData[ind].user != null ? jsonData[ind].user.prenom : 'utilisateur indisponible'}</td>
                                    </tr>`);
        }

        $("#histo_dataTable").DataTable();

    }
</script>
<script>
    function init_doc() {

        let projet_link = window.location.href.split('/')[5];

        var StringData = $.ajax({
            url: '/document/index',
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false,
            data: {
                projet_link: projet_link
            }
        }).responseText;
        jsonData = JSON.parse(StringData);

        $('#doc_bodytab').html("");
        for (let ind = 0; ind < jsonData.length; ind++) {
            $('#doc_bodytab').append(`<tr id="row${ind}">
                                        <td><a href="{{asset('storage/${jsonData[ind].path}')}}" target="_blank" class="text-dark fw-medium"><i class="bx bxs-file-${jsonData[ind].ext} font-size-16 align-middle text-primary me-2"></i> <span id="nom_doc${ind}">${jsonData[ind].nom}</span></a></td>
                                        <td id="type_doc${ind}">${jsonData[ind].type}</td>
                                        <td id="size_doc${ind}">${jsonData[ind].size}</td>
                                        <td id="created_at_doc${ind}">${jsonData[ind].created_at}</td>
                                        <td>
                                        <button class="btn btn-danger" onclick="doc_delet(${jsonData[ind].id},${ind})"> supprimer</button>
                                        </td>
                                    </tr>`);
        }

        $("#doc_datatable").DataTable();

        $('#creat_doc').click(function() {


            $('#doc_file').val("");

            $('#docmodale').modal('show');

            $('#doc_save').click(function() {
                form_data = new FormData();
                form_data.append("doc_type", $("#doc_type").val());
                form_data.append("doc_project_id", projet_link);
                form_data.append("doc_file", $("#doc_file")[0].files[0]);



                var StringData = $.ajax({
                    url: "/document/store",
                    dataType: "json",
                    type: "POST",
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: form_data,
                    processData: false,
                    contentType: false,
                }).responseText;
                jsonData = JSON.parse(StringData);
                // console.log(jsonData)
                if ($.isEmptyObject(jsonData.error)) {

                    clearInputs(jsonData.inputs);
                    $('#docmodale').modal('hide');
                    message("document", "ajout??", jsonData.check);


                    $('#doc_bodytab').append(`<tr id="row${jsonData.count}">
                                        <td><a href="{{asset('storage/${jsonData.document.path}')}}"  target="_blank" class="text-dark fw-medium"><i class="bx bxs-file-${jsonData.document.ext} font-size-16 align-middle text-primary me-2"></i> <span id="nom_doc${jsonData.count}">${jsonData.document.nom}</span></a></td>
                                        <td id="type_doc${jsonData.count}">${jsonData.document.type}</td>
                                        <td id="size_doc${jsonData.count}">${jsonData.document.size}</td>
                                        <td id="created_at_doc${jsonData.count}">${jsonData.document.created_at}</td>
                                        <td>
                                        <button class="btn btn-danger" onclick="doc_delet(${jsonData[ind].id},${jsonData.count})"> supprimer</button>
                                        </td>
                                    </tr>`);
                    $("#doc_datatable").DataTable();
                } else {
                    clearInputs(jsonData.inputs);
                    printErrorMsg(jsonData.error);
                }
            });

        });

    }

    function doc_delet(id, ind) {
        let projet_link = window.location.href.split('/')[5];
        var StringData = $.ajax({
            url: '/document/delete/' + id,
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false,
            data: {
                projet_link: projet_link
            }
        }).responseText;
        jsonData = JSON.parse(StringData);
        // console.log(jsonData)
        message("document", "supprim??", jsonData.check);
        $('#row' + ind).remove()
        $("#doc_datatable").DataTable();

    }
</script>
<script>
    function init_tach() {

        var buttonacive;
        var buttonconfirm;
        let projet_link = window.location.href.split('/')[5];

        var StringData = $.ajax({
            url: '/tach/index',
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false,
            data: {
                projet_link: projet_link
            }
        }).responseText;
        jsonData = JSON.parse(StringData);

        $('#tach_body').html("");
        for (let ind = 0; ind < jsonData.length; ind++) {
            if (jsonData[ind].deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-success\"  onclick=\"tach_renouvler(" + jsonData[ind].id + "," + ind + ")\">renouvler</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" onclick=\"tach_terminer(" + jsonData[ind].id + "," + ind + ")\">terminer</button>"
            }

            $('#tach_body').append(`<div class="col-xl-4" id="tach${ind}">
                                        <div class="card border border-info">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="tach_edit_title${ind}">${jsonData[ind].titre}</h4>
                                                            <h5 id="tach_edit_user${ind}">${jsonData[ind].user != null ? jsonData[ind].user.prenom : 'utilisateur indisponible'}
                                                             ${jsonData[ind].user != null ? jsonData[ind].user.nom : ''}</h5>
                                                            <br><p class="mb-0" id="rappel_edit_description${ind}">${jsonData[ind].description}</p>
                                                        </div>

                                                    </div>
                                                    <div class="dropdown ml-2 text-center">
                                                       <h5>Expir : <span style="color: green;" id="tach_edit_dateEcheance${ind}">${jsonData[ind].dateEcheance.split(' ')[0]}</span></h5>
                                                       <h5>Statut : <span style="color: green;" id="tach_edit_statut${ind}">${jsonData[ind].statut}</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body border-top">
                                                <p class="text-muted mb-4"></p>
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                <button  class="btn btn-primary" onclick="edit_tach(${jsonData[ind].id},${ind})">Modifier</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                ${buttonacive}
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`);

        }



    }
    $('#creat_tache').click(function() {
        $('#tach_head').html(`<h5 class="modal-title" id="exampleModalLabel">Ajouter une t??che</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`);
        $('#tach_footer').html(`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-success" id="tach_save">Enregistrer</button>`);
        $('#statut_tach').hide();
        $('#tachmodale').modal('show');

        $('#tach_titre').val("");
        $('#tach_echeance').val("");
        $('#tach_description').val("");
        $('#tach_save').click(function() {
            var inputs = {
                "tach_titre": $("#tach_titre").val(),
                "tach_echeance": $("#tach_echeance").val(),
                "tach_description": $("#tach_description").val(),
                "tach_project_id": window.location.href.split('/')[5]
            };

            var StringData = $.ajax({
                url: "/tach/store",
                type: "POST",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: inputs
            }).responseText;
            jsonData = JSON.parse(StringData);

            if ($.isEmptyObject(jsonData.error)) {
                if (jsonData.tache.deleted_at != null) {
                    buttonacive = "<button  class=\"btn btn-success\"  onclick=\"tach_renouvler(" + jsonData.tache.id + "," + jsonData.count + ")\">renouvler</button>"
                } else {
                    buttonacive = "<button  class=\"btn btn-danger\" onclick=\"tach_terminer(" + jsonData.tache.id + "," + jsonData.count + ")\">terminer</button>"
                }
                clearInputs(jsonData.inputs);
                $('#tachmodale').modal('hide');
                message("tache", "ajout??", jsonData.check);


                $('#tach_body').append(`<div class="col-xl-4" id="tach${jsonData.count}">
                                        <div class="card border border-info">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="tach_edit_title${jsonData.count}">${jsonData.tache.titre}</h4>
                                                            <h5 id="tach_edit_user${jsonData.count}">${jsonData.tache.user != null ? jsonData.tache.user.prenom : 'utilisateur indisponible'} 
                                                            ${jsonData.tache.user != null ? jsonData.tache.user.nom : ''}</h5>
                                                            <br><p class="mb-0" id="rappel_edit_description${jsonData.count}">${jsonData.tache.description}</p>
                                                        </div>

                                                    </div>
                                                    <div class="dropdown ml-2 text-center">
                                                       <h5>Expir : <span style="color: green;" id="tach_edit_dateEcheance${jsonData.count}">${jsonData.tache.dateEcheance.split(' ')[0]}</span></h5>
                                                       <h5>Statut : <span style="color: green;" id="tach_edit_statut${jsonData.count}">${jsonData.tache.statut}</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body border-top">
                                                <p class="text-muted mb-4"></p>
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                <button  class="btn btn-primary" onclick="edit_tach(${jsonData.tache.id},${jsonData.count})">Modifier</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                ${buttonacive}
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`);
            } else {
                clearInputs(jsonData.inputs);
                printErrorMsg(jsonData.error);
            }
        });

    });



    function edit_tach(id, ind) {
        var buttonacive;
        $('#tach_head').html(`<h5 class="modal-title" id="exampleModalLabel">Modifier une t??che</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`);
        $('#tach_footer').html(`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-success" id="tach_edit">Enregistrer</button>`);
        $('#statut_tach').show();
        $('#tachmodale').modal('show');

        $('#tach_titre').val($('#tach_edit_title' + ind).html());
        $('#tach_echeance').val($('#tach_edit_dateEcheance' + ind).html());
        $('#tach_description').val($('#rappel_edit_description' + ind).html());
        $('#tach_status').val($('#tach_edit_statut' + ind).html());


        $('#tach_edit').click(function() {
            form_data = new FormData();
            form_data.append("tach_titre", $("#tach_titre").val());
            form_data.append("tach_echeance", $("#tach_echeance").val());
            form_data.append("tach_description", $("#tach_description").val());
            form_data.append("tach_status", $("#tach_status").val());

            console.log(form_data)
            var StringData = $.ajax({
                url: "/tach/edit/" + id,
                dataType: "json",
                type: "POST",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: form_data,
                processData: false,
                contentType: false,
            }).responseText;
            jsonData = JSON.parse(StringData);
            // console.log(jsonData)
            if ($.isEmptyObject(jsonData.error)) {
                if (jsonData.tache.deleted_at != null) {
                    buttonacive = "<button  class=\"btn btn-success\"  onclick=\"tach_renouvler(" + jsonData.tache.id + "," + ind + ")\">renouvler</button>"
                } else {
                    buttonacive = "<button  class=\"btn btn-danger\" onclick=\"tach_terminer(" + jsonData.tache.id + "," + ind + ")\">terminer</button>"
                }
                clearInputs(jsonData.inputs);
                $('#tachmodale').modal('hide');
                message("tache", "modifi??", jsonData.check);

                $('#tach' + ind).html(` <div class="card border border-info">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="tach_edit_title${ind}">${jsonData.tache.titre}</h4>
                                                            <h5 id="tach_edit_user${ind}">${jsonData.tache.user != null ? jsonData.tache.user.prenom : 'utilisateur indisponible'} 
                                                            ${jsonData.tache.user != null ? jsonData.tache.user.nom : ''}</h5>
                                                            <br><p class="mb-0" id="rappel_edit_description${ind}">${jsonData.tache.description}</p>
                                                        </div>

                                                    </div>
                                                    <div class="dropdown ml-2 text-center">
                                                       <h5>Expir : <span style="color: green;" id="tach_edit_dateEcheance${ind}">${jsonData.tache.dateEcheance.split(' ')[0]}</span></h5>
                                                       <h5>Statut : <span style="color: green;" id="tach_edit_statut${ind}">${jsonData.tache.statut}</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body border-top">
                                                <p class="text-muted mb-4"></p>
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                <button  class="btn btn-primary" onclick="edit_tach(${jsonData.tache.id},${ind})">Modifier</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                ${buttonacive}
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`);
            } else {
                clearEditInputs(jsonData.inputs);
                printEditErrorMsg(jsonData.error);
            }
        });
    }

    function printErrorMsg(msg) {


        $.each(msg, function(key, value) {
            $("#err-" + key).find("input").addClass('is-invalid');
            $("#err-" + key).find("small").html(value);

        });

    }

    function clearInputs(msg) {


        $.each(msg, function(key, value) {

            $("#err-" + key).find("input").removeClass('is-invalid');
            $("#err-" + key).find("small").html("");

        });

    }

    function tach_terminer(id, ind) {
        var buttonactive;
        var StringData = $.ajax({
            url: "/tach/delete/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("rappel", "termin??", jsonData.check);
        if (jsonData.tache.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-success\"  onclick=\"tach_renouvler(" + jsonData.tache.id + "," + ind + ")\">renouvler</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" onclick=\"tach_terminer(" + jsonData.tache.id + "," + ind + ")\">terminer</button>"
        }

        $('#tach' + ind).html(` <div class="card border border-info">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="tach_edit_title${ind}">${jsonData.tache.titre}</h4>
                                                            <h5 id="tach_edit_user${ind}">${jsonData.tache.user != null ? jsonData.tache.user.prenom : 'utilisateur indisponible'} 
                                                            ${jsonData.tache.user != null ? jsonData.tache.user.nom : ''}</h5>
                                                            <br><p class="mb-0" id="rappel_edit_description${ind}">${jsonData.tache.description}</p>
                                                        </div>

                                                    </div>
                                                    <div class="dropdown ml-2 text-center">
                                                       <h5>Expir : <span style="color: green;" id="tach_edit_dateEcheance${ind}">${jsonData.tache.dateEcheance.split(' ')[0]}</span></h5>
                                                       <h5>Statut : <span style="color: green;" id="tach_edit_statut${ind}">${jsonData.tache.statut}</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body border-top">
                                                <p class="text-muted mb-4"></p>
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                <button  class="btn btn-primary" onclick="edit_tach(${jsonData.tache.id},${ind})">Modifier</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                ${buttonacive}
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`);
    }

    function tach_renouvler(id, ind) {
        var buttonactive;
        var StringData = $.ajax({
            url: "/tach/restore/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("rappel", "renouvl??", jsonData.check);
        if (jsonData.tache.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-success\"  onclick=\"tach_renouvler(" + jsonData.tache.id + "," + ind + ")\">renouvler</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" onclick=\"tach_terminer(" + jsonData.tache.id + "," + ind + ")\">terminer</button>"
        }

        $('#tach' + ind).html(` <div class="card border border-info">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="tach_edit_title${ind}">${jsonData.tache.titre}</h4>
                                                            <h5 id="tach_edit_user${ind}">${jsonData.tache.user != null ? jsonData.tache.user.prenom : 'utilisateur indisponible'} 
                                                            ${jsonData.tache.user != null ? jsonData.tache.user.nom : ''}</h5>
                                                            <br><p class="mb-0" id="rappel_edit_description${ind}">${jsonData.tache.description}</p>
                                                        </div>

                                                    </div>
                                                    <div class="dropdown ml-2 text-center">
                                                       <h5>Expir : <span style="color: green;" id="tach_edit_dateEcheance${ind}">${jsonData.tache.dateEcheance.split(' ')[0]}</span></h5>
                                                       <h5>Statut : <span style="color: green;" id="tach_edit_statut${ind}">${jsonData.tache.statut}</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body border-top">
                                                <p class="text-muted mb-4"></p>
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                <button  class="btn btn-primary" onclick="edit_tach(${jsonData.tache.id},${ind})">Modifier</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                ${buttonacive}
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`);
    }
</script>

<script>
    function init_note() {

        var buttonacive;
        var buttonconfirm;
        let projet_link = window.location.href.split('/')[5];

        var StringData = $.ajax({
            url: '/note/index',
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false,
            data: {
                projet_link: projet_link
            }
        }).responseText;
        jsonData = JSON.parse(StringData);

        $('#note_body').html("");
        for (let ind = 0; ind < jsonData.length; ind++) {

            $('#note_body').append(`<div class="col-lg-4" id="note${ind}">
                                        <div class="card border border-success">
                                            <div class="card-header bg-transparent border-success">
                                                <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i><span id="note_edit_title${ind}">${jsonData[ind].titre}</span> </h5>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mt-0"id="note_edit_user${ind}">${jsonData[ind].user != null ? jsonData[ind].user.prenom : 'utilisateur indisponible'} 
                                                            ${jsonData[ind].user != null ? jsonData[ind].user.nom : ''}</h5>
                                                <p class="card-text" id="note_edit_description${ind}">${jsonData[ind].note}</p>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                <button  class="btn btn-primary" style="margin: 10px" onclick="edit_note(${jsonData[ind].id},${ind})">Modifier</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`);

        }

    }
    $('#creat_note').click(function() {
        $('#note_head').html(`<h5 class="modal-title" id="exampleModalLabel">Ajouter une note</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`);
        $('#note_footer').html(`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-success" id="note_save">Enregistrer</button>`);
        $('#notemodale').modal('show');

        $('#note_titre').val("");
        $('#note_description').val("");
        $('#note_save').click(function() {
            var inputs = {
                "note_titre": $("#note_titre").val(),
                "note_description": $("#note_description").val(),
                "note_project_id": window.location.href.split('/')[5]
            };

            var StringData = $.ajax({
                url: "/note/store",
                type: "POST",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: inputs
            }).responseText;
            jsonData = JSON.parse(StringData);

            if ($.isEmptyObject(jsonData.error)) {

                clearInputs(jsonData.inputs);
                $('#notemodale').modal('hide');
                message("note", "ajout??", jsonData.check);


                $('#note_body').append(`<div class="col-lg-4" id="note${jsonData.count}">
                                        <div class="card border border-success">
                                            <div class="card-header bg-transparent border-success">
                                                <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i><span id="note_edit_title${jsonData.count}">${jsonData.note.titre}</span> </h5>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mt-0"id="note_edit_user${jsonData.count}">${jsonData.note.user != null ? jsonData.note.user.prenom : 'utilisateur indisponible'} 
                                                            ${jsonData.note.user != null ? jsonData.note.user.nom : ''}</h5>
                                                <p class="card-text" id="note_edit_description${jsonData.count}">${jsonData.note.note}</p>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                <button  class="btn btn-primary" style="margin: 10px" onclick="edit_note(${jsonData.note.id},${ind})">Modifier</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`);
            } else {
                clearInputs(jsonData.inputs);
                printErrorMsg(jsonData.error);
            }
        });

    });



    function edit_note(id, ind) {

        $('#note_head').html(`<h5 class="modal-title" id="exampleModalLabel">Modifier une note</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`);
        $('#note_footer').html(`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-success" id="note_edit">Enregistrer</button>`);
        $('#notemodale').modal('show');

        $('#note_titre').val($('#note_edit_title' + ind).html());
        $('#note_description').val($('#note_edit_description' + ind).html());


        $('#note_edit').click(function() {
            form_data = new FormData();
            form_data.append("note_titre", $("#note_titre").val());
            form_data.append("note_description", $("#note_description").val());

            console.log(form_data)
            var StringData3 = $.ajax({
                url: "/note/edit/" + id,
                dataType: "json",
                type: "POST",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: form_data,
                processData: false,
                contentType: false,
            }).responseText;
            jsonData = JSON.parse(StringData3);

            if ($.isEmptyObject(jsonData.error)) {

                clearInputs(jsonData.inputs);
                $('#notemodale').modal('hide');
                message("note", "modifi??", jsonData.check);

                $('#note' + ind).html(`<div class="card border border-success">
                                            <div class="card-header bg-transparent border-success">
                                                <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i><span id="note_edit_title${ind}">${jsonData.note.titre}</span> </h5>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mt-0"id="note_edit_user${ind}">${jsonData.note.user != null ? jsonData.note.user.prenom : 'utilisateur indisponible'} 
                                                            ${jsonData.note.user != null ? jsonData.note.user.nom : ''}</h5>
                                                <p class="card-text" id="note_edit_description${ind}">${jsonData.note.note}</p>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                <button  class="btn btn-primary" style="margin: 10px" onclick="edit_note(${jsonData.note.id},${ind})">Modifier</button>
                                                </div>
                                            </div>
                                        </div>`);

            } else {
                clearEditInputs(jsonData.inputs);
                printEditErrorMsg(jsonData.error);
            }
        });
    }

    function printErrorMsg(msg) {


        $.each(msg, function(key, value) {
            $("#err-" + key).find("input").addClass('is-invalid');
            $("#err-" + key).find("small").html(value);

        });

    }

    function clearInputs(msg) {


        $.each(msg, function(key, value) {

            $("#err-" + key).find("input").removeClass('is-invalid');
            $("#err-" + key).find("small").html("");

        });

    }
</script>

<script>
    function init_rappel() {

        var buttonacive;
        var buttonconfirm;
        let projet_link = window.location.href.split('/')[5];

        var StringData = $.ajax({
            url: '/rappel/index',
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false,
            data: {
                projet_link: projet_link
            }
        }).responseText;
        jsonData = JSON.parse(StringData);

        $('#rappel_body').html("");
        for (let ind = 0; ind < jsonData.length; ind++) {
            if (jsonData[ind].deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-success\"  onclick=\"rappel_renouvler(" + jsonData[ind].id + "," + ind + ")\">renouvler</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" onclick=\"rappel_terminer(" + jsonData[ind].id + "," + ind + ")\">terminer</button>"
            }

            $('#rappel_body').append(`<div class="col-xl-4" id="rappel${ind}">
                                        <div class="card border border-primary">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="rappel_edit_title${ind}">${jsonData[ind].titre}</h4>
                                                            <h5 id="rappel_edit_user${ind}">${jsonData[ind].user != null ? jsonData[ind].user.prenom : 'utilisateur indisponible'} 
                                                            ${jsonData[ind].user != null ? jsonData[ind].user.nom : ''}</h5>
                                                            <p class="mb-0" id="rappel_edit_sujet${ind}">${jsonData[ind].sujet}</p>
                                                        </div>

                                                    </div>
                                                    <div class="dropdown ml-2">
                                                        Rappel :<h5 style="color: green;" id="rappel_edit_dateRappel${ind}">${jsonData[ind].dateRappel}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <p class="text-muted mb-4"></p>
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                <button  class="btn btn-secondary" onclick="edit_rappel(${jsonData[ind].id},${ind})">Modifier</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                    ${buttonacive}
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`);

        }

    }
    $('#creat_rappel').click(function() {
        $('#rappel_head').html(`<h5 class="modal-title" id="exampleModalLabel">Ajouter un rappel</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`);
        $('#rappel_footer').html(`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-success" id="rappel_save">Enregistrer</button>`);
        $('#rappelmodale').modal('show');

        $('#rappel_titre').val("");
        $('#rappel_sujet').val("");
        $('#rappel_date_rappel').val("");
        $('#rappel_save').click(function() {
            var inputs = {
                "rappel_titre": $("#rappel_titre").val(),
                "rappel_sujet": $("#rappel_sujet").val(),
                "rappel_date_rappel": $("#rappel_date_rappel").val(),
                "rappel_project_id": window.location.href.split('/')[5]
            };

            var StringData = $.ajax({
                url: "/rappel/store",
                type: "POST",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: inputs
            }).responseText;
            jsonData = JSON.parse(StringData);
            if (jsonData.rappel.deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-success\"  onclick=\"rappel_renouvler(" + jsonData.rappel.id + "," + jsonData.count + ")\">renouvler</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" onclick=\"rappel_terminer(" + jsonData.rappel.id + "," + jsonData.count + ")\">terminer</button>"
            }

            if ($.isEmptyObject(jsonData.error)) {

                clearInputs(jsonData.inputs);
                $('#rappelmodale').modal('hide');
                message("rappel", "ajout??", jsonData.check);
                $('#rappel_body').append(`<div class="col-xl-4" id="rappel${jsonData.count}">
                                        <div class="card border border-primary">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="rappel_edit_title${jsonData.count}">${jsonData.rappel.titre}</h4>
                                                            <h5 id="rappel_edit_user${jsonData.count}">${jsonData.rappel.user != null ? jsonData.rappel.user.prenom : 'utilisateur indisponible'} 
                                                            ${jsonData.rappel.user != null ? jsonData.rappel.user.nom : ''}</h5>
                                                            <p class="mb-0" id="rappel_edit_sujet${jsonData.count}">${jsonData.rappel.sujet}</p>
                                                        </div>

                                                    </div>
                                                    <div class="dropdown ml-2">
                                                        Rappel :<h5 style="color: green;" id="rappel_edit_dateRappel${jsonData.count}">${jsonData.rappel.dateRappel}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <p class="text-muted mb-4"></p>
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                <button  class="btn btn-secondary" onclick="edit_rappel(${jsonData.rappel.id},${jsonData.count})">Modifier</button>                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                ${buttonacive}
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`);
            } else {
                clearInputs(jsonData.inputs);
                printErrorMsg(jsonData.error);
            }
        });

    });



    function edit_rappel(id, ind) {

        $('#rappel_head').html(`<h5 class="modal-title" id="exampleModalLabel">Modifier un rappel</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`);
        $('#rappel_footer').html(`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-success" id="rappel_edit">Enregistrer</button>`);
        $('#rappelmodale').modal('show');

        $('#rappel_titre').val($('#rappel_edit_title' + ind).html());
        $('#rappel_sujet').val($('#rappel_edit_sujet' + ind).html());
        $('#rappel_date_rappel').val($('#rappel_edit_dateRappel' + ind).html());


        $('#rappel_edit').click(function() {
            form_data = new FormData();
            form_data.append("rappel_titre", $("#rappel_titre").val());
            form_data.append("rappel_sujet", $("#rappel_sujet").val());
            form_data.append("rappel_date_rappel", $("#rappel_date_rappel").val());



            var StringData = $.ajax({
                url: "/rappel/edit/" + id,
                dataType: "json",
                type: "POST",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: form_data,
                processData: false,
                contentType: false,
            }).responseText;
            jsonData = JSON.parse(StringData);
            if (jsonData.rappel.deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-success\"  onclick=\"rappel_renouvler(" + jsonData.rappel.id + "," + ind + ")\">renouvler</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" onclick=\"rappel_terminer(" + jsonData.rappel.id + "," + ind + ")\">terminer</button>"
            }

            if ($.isEmptyObject(jsonData.error)) {

                clearInputs(jsonData.inputs);
                $('#rappelmodale').modal('hide');
                message("rappel", "modifi??", jsonData.check);

                $('#rappel' + ind).html(` <div class="card border border-primary">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="rappel_edit_title${ind}">${jsonData.rappel.titre}</h4>
                                                            <h5 id="rappel_edit_user${ind}">${jsonData.rappel.user != null ? jsonData.rappel.user.prenom : 'utilisateur indisponible'} 
                                                            ${jsonData.rappel.user != null ? jsonData.rappel.user.nom : ''}</h5>
                                                            <p class="mb-0" id="rappel_edit_sujet${ind}">${jsonData.rappel.sujet}</p>
                                                        </div>

                                                    </div>
                                                    <div class="dropdown ml-2">
                                                        Rappel :<h5 style="color: green;" id="rappel_edit_dateRappel${ind}">${jsonData.rappel.dateRappel}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <p class="text-muted mb-4"></p>
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                <button  class="btn btn-secondary" onclick="edit_rappel(${jsonData.rappel.id},${ind})">Modifier</button>                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                    ${buttonacive}
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`);

            } else {
                clearEditInputs(jsonData.inputs);
                printEditErrorMsg(jsonData.error);
            }
        });
    }

    function rappel_terminer(id, ind) {
        var buttonactive;
        var StringData = $.ajax({
            url: "/rappel/delete/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("rappel", "termin??", jsonData.check);
        if (jsonData.rappel.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-success\"  onclick=\"rappel_renouvler(" + jsonData.rappel.id + "," + ind + ")\">renouvler</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" onclick=\"rappel_terminer(" + jsonData.rappel.id + "," + ind + ")\">terminer</button>"
        }

        $('#rappel' + ind).html(` <div class="card border border-primary">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="rappel_edit_title${ind}">${jsonData.rappel.titre}</h4>
                                                            <h5 id="rappel_edit_user${ind}">${jsonData.rappel.user.prenom} ${jsonData.rappel.user.nom}</h5>
                                                            <p class="mb-0" id="rappel_edit_sujet${ind}">${jsonData.rappel.sujet}</p>
                                                        </div>

                                                    </div>
                                                    <div class="dropdown ml-2">
                                                        Rappel :<h5 style="color: green;" id="rappel_edit_dateRappel${ind}">${jsonData.rappel.dateRappel}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <p class="text-muted mb-4"></p>
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                <button  class="btn btn-secondary" onclick="edit_rappel(${jsonData.rappel.id},${ind})">Modifier</button>                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                    ${buttonacive}
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`);
    }

    function rappel_renouvler(id, ind) {
        var buttonactive;
        var StringData = $.ajax({
            url: "/rappel/restore/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("rappel", "renouvl??", jsonData.check);
        if (jsonData.rappel.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-success\"  onclick=\"rappel_renouvler(" + jsonData.rappel.id + "," + ind + ")\">renouvler</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" onclick=\"rappel_terminer(" + jsonData.rappel.id + "," + ind + ")\">terminer</button>"
        }

        $('#rappel' + ind).html(` <div class="card border border-primary">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="rappel_edit_title${ind}">${jsonData.rappel.titre}</h4>
                                                            <h5 id="rappel_edit_user${ind}">${jsonData.rappel.user.prenom} ${jsonData.rappel.user.nom}</h5>
                                                            <p class="mb-0" id="rappel_edit_sujet${ind}">${jsonData.rappel.sujet}</p>
                                                        </div>

                                                    </div>
                                                    <div class="dropdown ml-2">
                                                        Rappel :<h5 style="color: green;" id="rappel_edit_dateRappel${ind}">${jsonData.rappel.dateRappel}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <p class="text-muted mb-4"></p>
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                <button  class="btn btn-secondary" onclick="edit_rappel(${jsonData.rappel.id},${ind})">Modifier</button>                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <div >
                                                                    ${buttonacive}
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`);
    }

    function printErrorMsg(msg) {


        $.each(msg, function(key, value) {
            $("#err-" + key).find("input").addClass('is-invalid');
            $("#err-" + key).find("small").html(value);

        });

    }

    function clearInputs(msg) {


        $.each(msg, function(key, value) {

            $("#err-" + key).find("input").removeClass('is-invalid');
            $("#err-" + key).find("small").html("");

        });

    }
</script>

@endsection

@yield('tabs_script')