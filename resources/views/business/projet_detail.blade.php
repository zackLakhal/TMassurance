@extends('layouts.appback')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Status Projet</h5>

                <div class="position-relative m-4">
                    <div class="btn-group btn-group-example d-flex mb-3" role="group">
                        <button type="button" class="btn btn-primary w-100">step 1</button>
                        <button type="button" class="btn btn-outline-primary w-100">Step 2</button>
                        <button type="button" class="btn btn-outline-primary w-100">Step 3</button>
                        <button type="button" class="btn btn-outline-primary w-100">Step 4</button>
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
<script>
    $(document).ready(function() {
        init_tach()
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

    function init_tach() {

        var buttonacive;
        var buttonconfirm;
        let projet_link = window.location.href.split('/')[5];
        console.log(projet_link)
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
        console.log(jsonData)
        $('#tach_body').html("");
        for (let ind = 0; ind < jsonData.length; ind++) {
            if (jsonData[ind].deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData[ind].id + "," + ind + ")\">restorer</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData[ind].id + "," + ind + ")\">supprimer</button>"
            }
            $('#tach_body').append(`<tr id="row${ind}">
                                <td id="id${ind}">
                                ${jsonData[ind].id}
                                </td>
                                <td id="titre${ind}">${jsonData[ind].titre}</td>
                                
                                <td id="user${ind}">${jsonData[ind].user.nom} ${jsonData[ind].user.prenom}</td>
                                <td id="dateEcheance${ind}">${jsonData[ind].dateEcheance}</td>
                                <td id="statut${ind}">${jsonData[ind].statut}</td>
                                <td  id="description${ind}">${jsonData[ind].description}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-secondary"style="margin: 10px" onclick="edit(${jsonData[ind].id},${ind})">modifier</button>
                                        ${buttonacive}
                                    </div>
                                </td>
                            </tr>`);

        }



        $("#tach_dataTable").DataTable();
        // $('#role').html("")
        // var StringData2 = $.ajax({
        //     url: "role/active_index",
        //     dataType: "json",
        //     type: "GET",
        //     async: false,
        // }).responseText;
        // jsonData2 = JSON.parse(StringData2);

        // for (let ind = 0; ind < jsonData2.length; ind++) {
        //     $('#role').append("<option value=\"" + jsonData2[ind].id + "\">" + jsonData2[ind].value + "</option>");
        // }

        // $('#group').html("")
        // var StringData3 = $.ajax({
        //     url: "group/active_index",
        //     dataType: "json",
        //     type: "GET",
        //     async: false,
        // }).responseText;
        // jsonData3 = JSON.parse(StringData3);

        // for (let ind = 0; ind < jsonData3.length; ind++) {
        //     $('#group').append("<option value=\"" + jsonData3[ind].id + "\">" + jsonData3[ind].nom + "</option>");
        // }

    }
    // $('#newmodal').click(function() {
    //     $('#modalhead').html("<h4 class=\"modal-title\" >Nouvelle Utilisateur</h4>" +
    //         "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>");
    //     $('#modalfooter').html("<button type=\"button\" class=\"btn btn-info\" id=\"save\">Enregistrer</button>");
    //     $('#exampleModal').modal('show');

    //     $('#sexe').val("");
    //     $('#nom').val("");
    //     $('#prenom').val("");
    //     $('#email').val("");
    //     $('#tel').val("");
    //     $('#password').val("");
    //     $('#role').val("");
    //     $('#group').val("");
    //     $('#save').click(function() {
    //         var inputs = {
    //             "sexe": $("#sexe").val(),
    //             "nom": $("#nom").val(),
    //             "prenom": $("#prenom").val(),
    //             "email": $("#email").val(),
    //             "tel": $("#tel").val(),
    //             "group": $("#group").val(),
    //             "password": $("#password").val(),
    //             "role": $("#role").val(),
    //         };

    //         var StringData = $.ajax({
    //             url: "user/store",
    //             type: "POST",
    //             async: false,
    //             headers: {
    //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //             },
    //             data: inputs
    //         }).responseText;
    //         jsonData = JSON.parse(StringData);

    //         if ($.isEmptyObject(jsonData.error)) {

    //             clearInputs(jsonData.inputs);
    //             $('#exampleModal').modal('hide');
    //             message("utilisateur", "ajouté", jsonData.check);

    //             if (jsonData.user.deleted_at != null) {
    //                 buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.user.id + "," + jsonData.count + ")\">restorer</button>"
    //             } else {
    //                 buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.user.id + "," + jsonData.count + ")\">supprimer</button>"
    //             }
    //             $('#bodytab').append(`<tr id="row${jsonData.count}">
    //                                     <td id="photo${jsonData.count}">
    //                                         <div>
    //                                             <img class="rounded-circle avatar-xs" src="{{ asset('storage/${jsonData.user.photo}') }}" alt="">
    //                                         </div>
    //                                     </td>
    //                                     <td id="nom_prenom${jsonData.count}">${jsonData.user.nom}  ${jsonData.user.prenom}</td>

    //                                     <td id="email${jsonData.count}">${jsonData.user.email}</td>
    //                                     <td id="role${jsonData.count}">${jsonData.user.role.value}</td>
    //                                     <td id="group${jsonData.count}">${jsonData.user.group.nom}</td>
    //                                     <td>
    //                                         <div class="btn-group" role="group" aria-label="Basic example">
    //                                         
    //                                         <a  class="btn btn-success" style="margin: 10px" href="/prospect/projet/${jsonData.user.id}" >Parcourir</a>
    //                                         <button class="btn btn-secondary"style="margin: 10px" onclick="edit(${jsonData.user.id},${jsonData.count})">modifier</button>
    //                                             ${buttonacive}
    //                                         </div>
    //                                     </td>
    //                                 </tr>`);
    //         } else {
    //             clearInputs(jsonData.inputs);
    //             printErrorMsg(jsonData.error);
    //         }
    //     });
    //     $("#datatable").DataTable();
    // });

    function restor(id, ind) {
        var StringData = $.ajax({
            url: "prospect/restore/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("prospect", "activé", jsonData.check);

        if (jsonData.prospect.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.prospect.id + "," + ind + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.prospect.id + "," + ind + ")\">supprimer</button>"
        }
        if (jsonData.prospect.is_confirmed == 0) {
            buttonconfirm = "<button  class=\"btn btn-dark\" style=\"margin: 10px\"  onclick=\"confirm(" + jsonData.prospect.id + "," + ind + ")\">Confirmer</button>"
        } else {
            buttonconfirm = " <a class=\"btn btn-outline-dark waves-effect waves-light \" style=\"color:green\" type=\"button\"><i class=\"bx bx-check label-icon\"></i>confirmé</a>"
        }
        $('#row' + ind).html(`<td id="id${ind}">
                                        ${jsonData.prospect.id}
                                        </td>
                                        <td id="nom_prenom${ind}">${jsonData.prospect.nom}  ${jsonData.prospect.prenom}</td>
                                        
                                        <td id="email${ind}">${jsonData.prospect.email}</td>
                                        <td id="tel${ind}">${jsonData.prospect.tel}</td>
                                        <td id="provenance${ind}">${jsonData.prospect.provenance.nom}</td>
                                        <td  id="is_confirmed${ind}"> ${buttonconfirm}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            
                                            <a  class="btn btn-success" style="margin: 10px" href="/prospect/projet/${jsonData.prospect.id}" >Parcourir</a>
                                            <button class="btn btn-secondary"style="margin: 10px" onclick="edit(${jsonData.prospect.id},${ind})">modifier</button>
                                                ${buttonacive}
                                            </div>
                                        </td>`);
        $("#datatable").DataTable();
    }

    function delet(id, ind) {
        var StringData = $.ajax({
            url: "prospect/delete/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);
        console.log(jsonData)
        message("prospect", "désactivé", jsonData.check);
        if (jsonData.prospect.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.prospect.id + "," + ind + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.prospect.id + "," + ind + ")\">supprimer</button>"
        }
        if (jsonData.prospect.is_confirmed == 0) {
            buttonconfirm = "<button  class=\"btn btn-dark\" style=\"margin: 10px\"  onclick=\"confirm(" + jsonData.prospect.id + "," + ind + ")\">Confirmer</button>"
        } else {
            buttonconfirm = " <a class=\"btn btn-outline-dark waves-effect waves-light \" style=\"color:green\" type=\"button\"><i class=\"bx bx-check label-icon\"></i>confirmé</a>"
        }
        $('#row' + ind).html(`<td id="id${ind}">
                                        ${jsonData.prospect.id}
                                        </td>
                                        <td id="nom_prenom${ind}">${jsonData.prospect.nom}  ${jsonData.prospect.prenom}</td>
                                        
                                        <td id="email${ind}">${jsonData.prospect.email}</td>
                                        <td id="tel${ind}">${jsonData.prospect.tel}</td>
                                        <td id="provenance${ind}">${jsonData.prospect.provenance.nom}</td>
                                        <td  id="is_confirmed${ind}"> ${buttonconfirm}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            
                                            <a  class="btn btn-success" style="margin: 10px" href="/prospect/projet/${jsonData.prospect.id}" >Parcourir</a>
                                            <button class="btn btn-secondary"style="margin: 10px" onclick="edit(${jsonData.prospect.id},${ind})">modifier</button>
                                                ${buttonacive}
                                            </div>
                                        </td>`);
        $("#datatable").DataTable();
    }

    function edit(id, ind) {

        $('#detail_head').html("<h4 class=\"modal-title\" >Modifier Utilisateur</h4>" +
            "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>");
        $('#detail_footer').html("<button type=\"button\" class=\"btn btn-info\" id=\"edit\">Enregistrer</button>");

        var StringData1 = $.ajax({
            url: "user/detail/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData1 = JSON.parse(StringData1);

        $('#detail_body').html(`<div class="mx-auto d-block" style="width: 14rem;">
                                    <img class="card-img-top" id="avatar_display" src="{{ asset('storage/${jsonData1.photo}') }}" alt="">
                                    <div class="form-group" id="err-edit-photo">
                                        <input type="file" class="form-control" id="edit-photo" name="edit-photo">
                                        <small class="invalid-feedback"> </small>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">nom:</th>
                                                    <td>
                                                        <div class="form-group" id="err-edit-nom">
                                                            <input type="text" class="form-control" id="edit-nom" name="edit-nom" value="${jsonData1.nom}">
                                                            <small class="invalid-feedback"> </small>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">prénom:</th>
                                                    <td>
                                                        <div class="form-group" id="err-edit-prenom">
                                                            <input type="text" class="form-control" id="edit-prenom" name="edit-prenom" value="${jsonData1.prenom}">
                                                            <small class="invalid-feedback"> </small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Sexe :</th>
                                                    <td>
                                                        <div class="form-group" id="err-edit-sexe">
                                                            <select class="form-control custom-select selectpicker " name="edit-sexe" id="edit-sexe" value="${jsonData1.sexe}">
                                                                <option>Male</option>
                                                                <option>Femlle</option>
                                                            </select>
                                                            <small class="invalid-feedback"> </small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Role :</th>
                                                    <td>
                                                        <div class="form-group" id="err-edit-role">
                                                            <select class="form-control custom-select selectpicker " name="edit-role" id="edit-role">

                                                            </select>
                                                            <small class="invalid-feedback"> </small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Role :</th>
                                                    <td>
                                                        <div class="form-group" id="err-edit-group">
                                                            <select class="form-control custom-select selectpicker " name="edit-group" id="edit-group">

                                                            </select>
                                                            <small class="invalid-feedback"> </small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email :</th>
                                                    <td>
                                                        <div class="form-group" id="err-edit-email">
                                                            <input type="text" class="form-control" id="edit-email" name="edit-email" value="${jsonData1.email}">
                                                            <small class="invalid-feedback"> </small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Tel :</th>
                                                    <td>
                                                        <div class="form-group" id="err-edit-tel">
                                                            <input type="text" class="form-control" id="edit-tel" name="edit-tel" value="${jsonData1.tel}">
                                                            <small class="invalid-feedback"> </small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Adresse :</th>
                                                    <td>
                                                        <div class="form-group" id="err-edit-adresse">
                                                            <input type="text" class="form-control" id="edit-adresse" name="edit-adresse" value="${jsonData1.adresse}">
                                                            <small class="invalid-feedback"> </small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Date de naissance :</th>
                                                    <td>
                                                        <div class="form-group" id="err-edit-dateNaissance">
                                                            <input type="date" class="form-control" id="edit-dateNaissance" name="edit-dateNaissance" value="${jsonData1.dateNaissance}">
                                                            <small class="invalid-feedback"> </small>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>`);

        $('#edit-role').html("")
        var StringData2 = $.ajax({
            url: "role/active_index",
            dataType: "json",
            type: "GET",
            async: false,
        }).responseText;
        jsonData2 = JSON.parse(StringData2);
        for (let ind = 0; ind < jsonData2.length; ind++) {
            if (jsonData2[ind].id == jsonData1.role.id) {
                $('#edit-role').append("<option selected value=\"" + jsonData2[ind].id + "\">" + jsonData2[ind].value + "</option>");

            } else {
                $('#edit-role').append("<option value=\"" + jsonData2[ind].id + "\">" + jsonData2[ind].value + "</option>");

            }
        }

        $('#edit-group').html("")
        var StringData2 = $.ajax({
            url: "group/active_index",
            dataType: "json",
            type: "GET",
            async: false,
        }).responseText;
        jsonData2 = JSON.parse(StringData2);
        for (let ind = 0; ind < jsonData2.length; ind++) {
            if (jsonData2[ind].id == jsonData1.group.id) {
                $('#edit-group').append("<option selected value=\"" + jsonData2[ind].id + "\">" + jsonData2[ind].nom + "</option>");

            } else {
                $('#edit-group').append("<option value=\"" + jsonData2[ind].id + "\">" + jsonData2[ind].nom + "</option>");

            }
        }
        $('#userdetails').modal('show');

        $('#edit').click(function() {
            form_data = new FormData();
            form_data.append("sexe", $("#edit-sexe").val());
            form_data.append("nom", $("#edit-nom").val());
            form_data.append("prenom", $("#edit-prenom").val());
            form_data.append("email", $("#edit-email").val());
            form_data.append("tel", $("#edit-tel").val());
            form_data.append("group", $("#edit-group").val());
            form_data.append("adresse", $("#edit-adresse").val());
            form_data.append("role", $("#edit-role").val());
            form_data.append("dateNaissance", $("#edit-dateNaissance").val());
            form_data.append("photo", $("#edit-photo")[0].files[0]);

            console.log(form_data)
            var StringData3 = $.ajax({
                url: "user/edit/" + id,
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
            jsonData3 = JSON.parse(StringData3);
            console.log(jsonData3)
            if ($.isEmptyObject(jsonData3.error)) {

                clearEditInputs(jsonData3.inputs);
                $('#userdetails').modal('hide');
                message("utilisateur", "modifié", jsonData3.check);
                if (jsonData3.user.deleted_at != null) {
                    buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData3.user.id + "," + ind + ")\">restorer</button>"
                } else {
                    buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData3.user.id + "," + ind + ")\">supprimer</button>"
                }
                $('#row' + ind).html(`
                                        <td id="photo${ind}">
                                            <div>
                                                <img class="rounded-circle avatar-xs" src="{{ asset('storage/${jsonData3.user.photo}') }}" alt="">
                                            </div>
                                        </td>
                                        <td id="nom_prenom${ind}">${jsonData3.user.nom}  ${jsonData3.user.prenom}</td>
                                        
                                        <td id="email${ind}">${jsonData3.user.email}</td>
                                        <td id="role${ind}">${jsonData3.user.role.value}</td>
                                        <td id="group${ind}">${jsonData3.user.group.nom}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <a  class="btn btn-success" style="margin: 10px" href="/prospect/projet/${jsonData.prospect.id}" >Parcourir</a>
                                            <button class="btn btn-secondary"style="margin: 10px" onclick="edit(${jsonData3.user.id},${ind})">modifier</button>
                                                ${buttonacive}
                                            </div>
                                        </td>`);
                $("#datatable").DataTable();
            } else {
                clearEditInputs(jsonData3.inputs);
                printEditErrorMsg(jsonData3.error);
            }
        });
        $("#datatable").DataTable();
    }

    function detail(id, ind) {
        var StringData = $.ajax({
            url: "prospect/detail/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        $('#detail_body').html(`
                                         <div class="mx-auto d-block" style="width: 14rem;">
                                                <img class="card-img-top" src="{{ asset('storage/${jsonData.photo}') }}" alt="">
                                            </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-nowrap mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">nom et prénom:</th>
                                                            <td>${jsonData.nom} ${jsonData.prenom}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th scope="row">Sexe :</th>
                                                            <td>${jsonData.sexe}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Role :</th>
                                                            <td>${jsonData.role.value}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Group :</th>
                                                            <td>${jsonData.group.nom}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email :</th>
                                                            <td>${jsonData.email}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tel :</th>
                                                            <td>${jsonData.tel}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Adresse :</th>
                                                            <td>${jsonData.adresse}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Date de naissance :</th>
                                                            <td>${jsonData.dateNaissance}</td>
                                                        </tr>
                                                                  
                                                    </tbody>
                                                </table>                   
                                            </div>
                                        </div>`);
        $('#userdetails').modal('show');
    }

    function confirm(id, ind) {

        $('#confirmationModal').modal('show');

        $('#confirm').click(function() {
            $('#confirmationModal').modal('hide');
            var StringData = $.ajax({
                url: "prospect/confirmer/" + id,
                type: "POST",
                async: false,
                data: {
                    project_type: $('#project_type').val()
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }).responseText;

            jsonData = JSON.parse(StringData);

            console.log(jsonData)
            message("prospect", "confirmé", jsonData.check);

            if (jsonData.prospect.deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.prospect.id + "," + ind + ")\">restorer</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.prospect.id + "," + ind + ")\">supprimer</button>"
            }
            if (jsonData.prospect.is_confirmed == 0) {
                buttonconfirm = "<button  class=\"btn btn-dark\" style=\"margin: 10px\"  onclick=\"confirm(" + jsonData.prospect.id + "," + ind + ")\">Confirmer</button>"
            } else {
                buttonconfirm = " <a class=\"btn btn-outline-dark waves-effect waves-light \" style=\"color:green\" type=\"button\"><i class=\"bx bx-check label-icon\"></i>confirmé</a>"
            }
            $('#row' + ind).html(`<td id="id${ind}">
                                        ${jsonData.prospect.id}
                                        </td>
                                        <td id="nom_prenom${ind}">${jsonData.prospect.nom}  ${jsonData.prospect.prenom}</td>
                                        <td id="email${ind}">${jsonData.prospect.email}</td>
                                        <td id="tel${ind}">${jsonData.prospect.tel}</td>
                                        <td id="provenance${ind}">${jsonData.prospect.provenance.nom}</td>
                                        <td  id="is_confirmed${ind}"> ${buttonconfirm}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            
                                            <a  class="btn btn-success" style="margin: 10px" href="/prospect/projet/${jsonData.prospect.id}" >Parcourir</a>
                                            <button class="btn btn-secondary"style="margin: 10px" onclick="edit(${jsonData.prospect.id},${ind})">modifier</button>
                                                ${buttonacive}
                                            </div>
                                        </td>`);
            $("#datatable").DataTable();

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

    function printEditErrorMsg(msg) {


        $.each(msg, function(key, value) {
            $("#err-edit-" + key).find("input").addClass('is-invalid');
            $("#err-edit-" + key).find("small").html(value);

        });

    }

    function clearEditInputs(msg) {


        $.each(msg, function(key, value) {

            $("#err-edit-" + key).find("input").removeClass('is-invalid');
            $("#err-edit-" + key).find("small").html("");

        });

    }
</script>
@endsection

@yield('tabs_script')