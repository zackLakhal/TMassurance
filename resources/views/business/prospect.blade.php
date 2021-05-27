@extends('layouts.appback')

@section('content')

<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List des Prospects</h4>

                <table id="datatable" class="table text-center table-bordered dt-responsive  nowrap w-100">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nom Complet</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Provenance</th>
                            <th>état de Confirmation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id='bodytab'>


                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

<!-- /.modal 1-->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modalhead">

            </div>
            <div class="modal-body">
                <div class="form-group" id="err-email">
                    <label for="email" class="control-label"><b>Email:</b></label>
                    <input type="email" class="form-control" id="email" name="email">
                    <small class="invalid-feedback"> </small>
                </div>
                <div class="form-group" id="err-password">
                    <label for="password" class="control-label"><b>Mot de passe:</b></label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="invalid-feedback"> </small>
                </div>
                <div class="form-group" id="err-nom">
                    <label for="nom" class="control-label"><b>nom:</b></label>
                    <input type="text" class="form-control" id="nom" name="nom">
                    <small class="invalid-feedback"> </small>
                </div>
                <div class="form-group" id="err-prenom">
                    <label for="prenom" class="control-label"><b>Prénom:</b></label>
                    <input type="text" class="form-control" id="prenom" name="prenom">
                    <small class="invalid-feedback"> </small>
                </div>
                <div class="form-group" id="err-sexe">
                    <label for="sexe" class="control-label"><b>Sexe:</b></label>
                    <select class="form-control custom-select selectpicker " name="sexe" id="sexe" é>
                        <option selected>Male</option>
                        <option>Femlle</option>
                    </select>
                    <small class="invalid-feedback"> </small>
                </div>
                <div class="form-group" id="err-role">
                    <label for="role" class="control-label"><b>Role:</b></label>
                    <select class="form-control custom-select selectpicker " name="role" id="role">

                    </select>
                    <small class="invalid-feedback"> </small>
                </div>
                <div class="form-group" id="err-groupe">
                    <label for="groupe" class="control-label"><b>groupe:</b></label>
                    <select class="form-control custom-select selectpicker " name="groupe" id="groupe">

                    </select>
                    <small class="invalid-feedback"> </small>
                </div>

                <div class="form-group" id="err-tel">
                    <label for="tel" class="control-label"><b>tel:</b></label>
                    <input type="text" class="form-control" id="tel" name="tel">
                    <small class="invalid-feedback"> </small>
                </div>
            </div>
            <div class="modal-footer" id="modalfooter">
                <button type="button" class="btn btn-info" id="save">Enregistrer</button>
            </div>
        </div>
    </div>
</div> -->
<!-- /.modal 1 -->

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

<!-- /.user details-->
<div class="modal fade" id="userdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="detail_head">
                <h4 class="modal-title">Details Prospect</h4>
            </div>
            <div class="modal-body card" id="detail_body">


            </div>
            <div class="modal-footer" id="detail_footer">
                <button type="button" class="btn btn-info">Terminer</button>
            </div>
        </div>
    </div>
</div>
<!-- /.user details -->

<!-- /.modal confirmation-->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modalhead">
                <h4 class="modal-title">Type du projet</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="project_type" class="control-label"><b>type de projet:</b></label>
                    <select class="form-control custom-select selectpicker " name="project_type" id="project_type">
                        <option value="santé" selected>santé</option>
                        <option value="prévoyanace">prévoyanace</option>
                        <option value="auto">auto</option>
                        <option value="habitation">habitation</option>

                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="confirm">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal confirmation -->
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
        init()
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

    function init() {

        var buttonacive;
        var buttonconfirm;
        var StringData = $.ajax({
            url: "prospect/index",
            dataType: "json",
            type: "GET",
            async: false,
        }).responseText;
        jsonData = JSON.parse(StringData);
        console.log(jsonData)
        var parcourir = ""
        $('#bodytab').html("");
        for (let ind = 0; ind < jsonData.length; ind++) {
            if (jsonData[ind].deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData[ind].id + "," + ind + ")\">restorer</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData[ind].id + "," + ind + ")\">supprimer</button>"
            }
            if (jsonData[ind].is_confirmed == 0) {
                buttonconfirm = "<button  class=\"btn btn-dark\" style=\"margin: 10px\"  onclick=\"confirm(" + jsonData[ind].id + "," + ind + ")\">Confirmer</button>"
                parcourir = ""
            } else {
                buttonconfirm = " <a class=\"btn btn-outline-dark waves-effect waves-light \" style=\"color:green\" type=\"button\"><i class=\"bx bx-check label-icon\"></i>confirmé</a>"
                parcourir = "<a  class=\"btn btn-success\" style=\"margin: 10px\" href=\"/prospect/projet/"+jsonData[ind].id+"\" >Parcourir</a>"
            }
            $('#bodytab').append(`<tr id="row${ind}">
                                        <td id="id${ind}">
                                        ${jsonData[ind].id}
                                        </td>
                                        <td id="nom_prenom${ind}">${jsonData[ind].nom}  ${jsonData[ind].prenom}</td>
                                        
                                        <td id="email${ind}">${jsonData[ind].email}</td>
                                        <td id="tel${ind}">${jsonData[ind].tel}</td>
                                        <td id="provenance${ind}">${jsonData[ind].provenance.nom}</td>
                                        <td  id="is_confirmed${ind}"> ${buttonconfirm}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            ${parcourir}
                                            
                                                                                         ${buttonacive}
                                            </div>
                                        </td>
                                    </tr>`);

        }



        $("#datatable").DataTable();


    }


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
        var parcourir = ""
        if (jsonData.prospect.is_confirmed == 0) {
            buttonconfirm = "<button  class=\"btn btn-dark\" style=\"margin: 10px\"  onclick=\"confirm(" + jsonData.prospect.id + "," + ind + ")\">Confirmer</button>"
            parcourir = ""
        } else {
            parcourir = `<a  class="btn btn-success" style="margin: 10px" href="/prospect/projet/${jsonData.prospect.id}" >Parcourir</a>`
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
                                            
                                                ${parcourir}
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
        var parcourir = ""
        if (jsonData.prospect.is_confirmed == 0) {
            buttonconfirm = "<button  class=\"btn btn-dark\" style=\"margin: 10px\"  onclick=\"confirm(" + jsonData.prospect.id + "," + ind + ")\">Confirmer</button>"
            parcourir = ""
        } else {
            parcourir = `<a  class="btn btn-success" style="margin: 10px" href="/prospect/projet/${jsonData.prospect.id}" >Parcourir</a>`
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
                                            
                                            ${parcourir}
                                                ${buttonacive}
                                            </div>
                                        </td>`);
        $("#datatable").DataTable();
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
            var parcourir = ""
            if (jsonData.prospect.is_confirmed == 0) {
                buttonconfirm = "<button  class=\"btn btn-dark\" style=\"margin: 10px\"  onclick=\"confirm(" + jsonData.prospect.id + "," + ind + ")\">Confirmer</button>"
                parcourir = ""
            } else {
                parcourir = `<a  class="btn btn-success" style="margin: 10px" href="/prospect/projet/${jsonData.prospect.id}" >Parcourir</a>`
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
                                            
                                            ${parcourir}
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