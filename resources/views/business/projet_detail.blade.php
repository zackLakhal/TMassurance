@extends('layouts.appback')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Status Projet</h5>

                <div class="position-relative m-4">
                    <div class="btn-group btn-group-example d-flex mb-3" role="group">
                        <button type="button" class="btn btn-primary w-100">Initation</button>
                        <button type="button" class="btn btn-outline-primary w-100">Prospection</button>
                        <button type="button" class="btn btn-outline-primary w-100">Souscription</button>
                        <button type="button" class="btn btn-outline-primary w-100">Contrat</button>
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
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
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
    });

    function message(objet, action, statut) {
        var message;
        if (statut == "done") {
            message = "votre " + objet + " est " + action + " avec succès";
        } else {
            message = "votre " + objet + " n'est pas " + action;
        }
        $('#content').html(message);
        $('#messagebox').modal('show');

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
                                        <td id="responsable_histo${ind}">${jsonData[ind].user.prenom}  ${jsonData[ind].user.enom}</td>
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
        console.log(jsonData);
        $('#doc_bodytab').html("");
        for (let ind = 0; ind < jsonData.length; ind++) {
            $('#doc_bodytab').append(`<tr id="row${ind}">
                                        <td><a href="{{asset('storage/${jsonData[ind].path}')}}" target="_blank" class="text-dark fw-medium"><i class="bx bxs-file-${jsonData[ind].ext} font-size-16 align-middle text-primary me-2"></i> <span id="nom_doc${ind}">${jsonData[ind].nom}</span></a></td>
                                        <td id="type_doc${ind}">${jsonData[ind].type}</td>
                                        <td id="size_doc${ind}">${jsonData[ind].size}</td>
                                        <td id="created_at_doc${ind}">${jsonData[ind].created_at}</td>
                                        <td>
                                        <button class="btn btn-danger"> delete</button>
                                        </td>
                                    </tr>`);
        }

        $("#doc_datatable").DataTable();

        $('#creat_doc').click(function() {
        $('#docmodale').modal('show');

        $('#doc_file').val("");
        $('#doc_type').val("");
        
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
            console.log(jsonData)
            if ($.isEmptyObject(jsonData.error)) {
               
                clearInputs(jsonData.inputs);
                $('#docmodale').modal('hide');
                message("document", "ajouté", jsonData.check);


                $('#doc_bodytab').append(`<tr id="row${jsonData.count}">
                                        <td><a href="{{asset('storage/${jsonData.document.path}')}}"  target="_blank" class="text-dark fw-medium"><i class="bx bxs-file-${jsonData.document.ext} font-size-16 align-middle text-primary me-2"></i> <span id="nom_doc${jsonData.count}">${jsonData.document.nom}</span></a></td>
                                        <td id="type_doc${jsonData.count}">${jsonData.document.type}</td>
                                        <td id="size_doc${jsonData.count}">${jsonData.document.size}</td>
                                        <td id="created_at_doc${jsonData.count}">${jsonData.document.created_at}</td>
                                        <td>
                                        <button class="btn btn-danger"> delete</button>
                                        </td>
                                    </tr>`);
            } else {
                clearInputs(jsonData.inputs);
                printErrorMsg(jsonData.error);
            }
        });

    });

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
                                                            <h5 id="tach_edit_user${ind}">${jsonData[ind].user.prenom} ${jsonData[ind].user.nom}</h5>
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
        $('#tach_head').html(`<h5 class="modal-title" id="exampleModalLabel">Ajouter une tâche</h5>
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
                    buttonacive = "<button  class=\"btn btn-success\"  onclick=\"tach_renouvler(" + jsonData.tache.id + "," + ind + ")\">renouvler</button>"
                } else {
                    buttonacive = "<button  class=\"btn btn-danger\" onclick=\"tach_terminer(" + jsonData.tache.id + "," + ind + ")\">terminer</button>"
                }
                clearInputs(jsonData.inputs);
                $('#tachmodale').modal('hide');
                message("tache", "ajouté", jsonData.check);


                $('#tach_body').append(`<div class="col-xl-4" id="tach${jsonData.count}">
                                        <div class="card border border-info">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="tach_edit_title${jsonData.count}">${jsonData.tache.titre}</h4>
                                                            <h5 id="tach_edit_user${jsonData.count}">${jsonData.tache.user.prenom} ${jsonData.tache.user.nom}</h5>
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
        $('#tach_head').html(`<h5 class="modal-title" id="exampleModalLabel">Modifier une tâche</h5>
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
            
            if ($.isEmptyObject(jsonData.error)) {
                if (jsonData.tache.deleted_at != null) {
                    buttonacive = "<button  class=\"btn btn-success\"  onclick=\"tach_renouvler(" + jsonData.tache.id + "," + ind + ")\">renouvler</button>"
                } else {
                    buttonacive = "<button  class=\"btn btn-danger\" onclick=\"tach_terminer(" + jsonData.tache.id + "," + ind + ")\">terminer</button>"
                }
                clearInputs(jsonData.inputs);
                $('#tachmodale').modal('hide');
                message("tache", "modifié", jsonData.check);

                $('#tach' + ind).html(` <div class="card border border-info">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="tach_edit_title${ind}">${jsonData.tache.titre}</h4>
                                                            <h5 id="tach_edit_user${ind}">${jsonData.tache.user.prenom} ${jsonData.tache.user.nom}</h5>
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

        message("rappel", "terminé", jsonData.check);
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
                                                            <h5 id="tach_edit_user${ind}">${jsonData.tache.user.prenom} ${jsonData.tache.user.nom}</h5>
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

        message("rappel", "renouvlé", jsonData.check);
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
                                                            <h5 id="tach_edit_user${ind}">${jsonData.tache.user.prenom} ${jsonData.tache.user.nom}</h5>
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
                                                <h5 class="card-title mt-0"id="note_edit_user${ind}">${jsonData[ind].user.prenom} ${jsonData[ind].user.nom}</h5>
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
                message("note", "ajouté", jsonData.check);


                $('#note_body').append(`<div class="col-lg-4" id="note${jsonData.count}">
                                        <div class="card border border-success">
                                            <div class="card-header bg-transparent border-success">
                                                <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i><span id="note_edit_title${jsonData.count}">${jsonData.note.titre}</span> </h5>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mt-0"id="note_edit_user${jsonData.count}">${jsonData.note.user.prenom} ${jsonData.note.user.nom}</h5>
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
                message("note", "modifié", jsonData.check);

                $('#note' + ind).html(`<div class="card border border-success">
                                            <div class="card-header bg-transparent border-success">
                                                <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i><span id="note_edit_title${ind}">${jsonData.note.titre}</span> </h5>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mt-0"id="note_edit_user${ind}">${jsonData.note.user.prenom} ${jsonData.note.user.nom}</h5>
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
                                                            <h5 id="rappel_edit_user${ind}">${jsonData[ind].user.prenom} ${jsonData[ind].user.nom}</h5>
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
                buttonacive = "<button  class=\"btn btn-success\"  onclick=\"rappel_renouvler(" + jsonData.rappel.id + "," + ind + ")\">renouvler</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" onclick=\"rappel_terminer(" + jsonData.rappel.id + "," + ind + ")\">terminer</button>"
            }

            if ($.isEmptyObject(jsonData.error)) {

                clearInputs(jsonData.inputs);
                $('#rappelmodale').modal('hide');
                message("rappel", "ajouté", jsonData.check);
                $('#rappel_body').append(`<div class="col-xl-4" id="rappel${jsonData.count}">
                                        <div class="card border border-primary">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="text-muted">
                                                            <h4 id="rappel_edit_title${jsonData.count}">${jsonData.rappel.titre}</h4>
                                                            <h5 id="rappel_edit_user${jsonData.count}">${jsonData.rappel.user.prenom} ${jsonData.rappel.user.nom}</h5>
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
                message("rappel", "modifié", jsonData.check);

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

        message("rappel", "terminé", jsonData.check);
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

        message("rappel", "renouvlé", jsonData.check);
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