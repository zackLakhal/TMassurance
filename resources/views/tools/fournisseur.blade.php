@extends('layouts.appback')

@section('content')
<button type="button" id="creat_fournisseur" class="btn btn-warning btn-sm btn-rounded waves-effect waves-light mb-3">Ajouter un fournisseur</button>

<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List des Fournisseur</h4>

                <table id="datatable" class="table text-center table-bordered dt-responsive  nowrap w-100">

                    <thead class="table-light">
                        <tr>
                            
                            <th>nom</th>
                            <th>token</th>
                            <th>email</th>
                            <th>Description</th>
                            <th>Actions</th>
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
<div class="modal fade bs-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>List des Provenances</h5>
            </div>
            <div class="modal-body">
                <table id="provenance_datatable" class="table text-center table-bordered dt-responsive  nowrap w-100">

                    <thead class="table-light">
                        <tr>
                            <th>nom</th>
                            <th>prix</th>
                            <th>cle</th>
                            <th>description</th>

                        </tr>
                    </thead>
                    <tbody id='provenance_bodytab'>

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="provenanceedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="edit_head">
                <h4 class="modal-title">edit fournisseur</h4>
            </div>
            <div class="modal-body card" id="edit_body">


            </div>
            <div class="modal-footer" id="edit_footer">
            </div>
        </div>
    </div>
</div>
<!-- /.user details -->

<!-- /Right-bar -->
<div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" id="modalhead">

            </div>
            <div class="modal-body">

                
                <div class="form-group" id="err-nom">
                    <label for="nom" class="control-label"><b>nom:</b></label>
                    <input type="text" class="form-control" id="nom" name="nom">
                    <small class="invalid-feedback"> </small>
                </div>
                <div class="form-group" id="err-email">
                    <label for="email" class="control-label"><b>email:</b></label>
                    <input type="text" class="form-control" id="email" name="email">
                    <small class="invalid-feedback"> </small>
                </div>
                <div class="form-group" id="err-description">
                    <label for="description" class="control-label"><b>description:</b></label>
                    <input type="text" class="form-control" id="description" name="description">
                    <small class="invalid-feedback"> </small>
                </div>


            </div>
            <div class="modal-footer" id="modalfooter">
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
        var StringData = $.ajax({
            url: "fournisseur/index",
            dataType: "json",
            type: "GET",
            async: false,
        }).responseText;
        jsonData = JSON.parse(StringData);

        $('#bodytab').html("");
        for (let ind = 0; ind < jsonData.length; ind++) {
            if (jsonData[ind].deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData[ind].id + "," + ind + ")\">restorer</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData[ind].id + "," + ind + ")\">supprimer</button>"
            }
            $('#bodytab').append("<tr id=\"row" + ind + "\">" +
                " <td id=\"nom" + ind + "\">" + jsonData[ind].nom + "</td>" +
                " <td id=\"token" + ind + "\">" + jsonData[ind].token + "</td>" +
                " <td id=\"email" + ind + "\">" + jsonData[ind].email + "</td>" +
                " <td id=\"description" + ind + "\">" + jsonData[ind].description + "</td>" +
                "<td>" +

                "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData[ind].id + "," + ind + ")\" >modifier</button>" +
                "<button class=\"btn btn-success\"style=\"margin: 10px\" onclick=\"listprovenance(" + jsonData[ind].id + "," + ind + ")\" >List des provenances</button>" +
                buttonacive +
                "</td>" +
                "</tr>");
        }
        $("#datatable").DataTable();
    }

    $('#creat_fournisseur').click(function() {
        $('#modalhead').html("<h4 class=\"modal-title\" >Nouveau fournisseur</h4>" +
            "<button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>");
        $('#modalfooter').html("<button type=\"button\" class=\"btn btn-info\" id=\"save\">Enregistrer</button>");


        $('#nom').val("");
        $('#email').val("");
        $('#description').val("");

        $('#storeModal').modal('show');
        $('#save').click(function() {
            var inputs = {
                "nom": $("#nom").val(),
                "email": $("#email").val(),
                "description": $("#description").val(),

            };

            var StringData = $.ajax({
                url: "fournisseur/store",
                type: "POST",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: inputs
            }).responseText;
            jsonData = JSON.parse(StringData);

            console.log(jsonData)


            $('#storeModal').modal('hide');
            message("fournisseur", "ajouté", jsonData.check);
            if (jsonData.fournisseur.deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.fournisseur.id + "," + jsonData.count + ")\">restorer</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.fournisseur.id + "," + jsonData.count + ")\">supprimer</button>"
            }
            $('#bodytab').append("<tr id=\"row" + jsonData.count + "\">" +
                
                " <td id=\"nom" + jsonData.count + "\">" + jsonData.fournisseur.nom + "</td>" +
                " <td id=\"token" + jsonData.count + "\">" + jsonData.fournisseur.token + "</td>" +
                " <td id=\"email" + jsonData.count + "\">" + jsonData.fournisseur.email + "</td>" +
                " <td id=\"description" + jsonData.count + "\">" + jsonData.fournisseur.description + "</td>" +
                "<td>" +
                "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.fournisseur.id + "," + jsonData.count + ")\" >modifier</button>" +
                "<button class=\"btn btn-success\"style=\"margin: 10px\" onclick=\"listprovenance(" + jsonData.fournisseur.id + "," + jsonData.count + ")\" >List des fournisseurs</button>" +
                buttonacive +
                "</td>" +
                "</tr>");
        });
        $("#datatable").DataTable();
    });

    function edit(id, ind) {
        $('#modalhead').html("<h4 class=\"modal-title\" >modifier fournisseur</h4>" +
            "<button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>");
        $('#modalfooter').html("<button type=\"button\" class=\"btn btn-info\" id=\"edit\">Enregistrer</button>");


        $('#nom').val($('#nom' + ind).html());
        $('#email').val($('#email' + ind).html());
        $('#description').val($('#description' + ind).html());

        $('#storeModal').modal('show');
        $('#edit').click(function() {
            var inputs = {
                "nom": $("#nom").val(),
                "email": $("#email").val(),
                "description": $("#description").val(),
            };
            var StringData = $.ajax({
                url: "fournisseur/edit/" + id,
                type: "POST",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: inputs
            }).responseText;
            jsonData = JSON.parse(StringData);

            $('#storeModal').modal('hide');
            message("fournisseur", "modifié", jsonData.check);
            if (jsonData.fournisseur.deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.fournisseur.id + "," + ind + ")\">restorer</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.fournisseur.id + "," + ind + ")\">supprimer</button>"
            }
            $('#row' + ind).html(
                
                " <td id=\"nom" + ind + "\">" + jsonData.fournisseur.nom + "</td>" +
                " <td id=\"token" + ind + "\">" + jsonData.fournisseur.token + "</td>" +
                " <td id=\"email" + ind + "\">" + jsonData.fournisseur.email + "</td>" +
                " <td id=\"description" + ind + "\">" + jsonData.fournisseur.description + "</td>" +
                "<td>" +

                "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.fournisseur.id + "," + ind + ")\" >modifier</button>" +
                "<button class=\"btn btn-success\"style=\"margin: 10px\" onclick=\"listprovenance(" + jsonData.fournisseur.id + "," + ind + ") \">List des fournisseurs</button>" +
                buttonacive +
                "</td>");
            $("#datatable").DataTable();


        });
    }




    function restor(id, ind) {
        var StringData = $.ajax({
            url: "fournisseur/restore/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("fournisseur", "activé", jsonData.check);
        if (jsonData.fournisseur.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.fournisseur.id + "," + ind + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.fournisseur.id + "," + ind + ")\">supprimer</button>"
        }
        $('#row' + ind).html(
            
            " <td id=\"nom" + ind + "\">" + jsonData.fournisseur.nom + "</td>" +
            " <td id=\"token" + ind + "\">" + jsonData.fournisseur.token + "</td>" +
            " <td id=\"email" + ind + "\">" + jsonData.fournisseur.email + "</td>" +
            " <td id=\"description" + ind + "\">" + jsonData.fournisseur.description + "</td>" +
            "<td>" +

            "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.fournisseur.id + "," + ind + ")\" >modifier</button>" +
            "<button class=\"btn btn-success\"style=\"margin: 10px\" onclick=\"listprovenance(" + jsonData.fournisseur.id + "," + ind + ") \">List des fournisseurs</button>" +
            buttonacive +
            "</td>");
        $("#datatable").DataTable();
    }

    function delet(id, ind) {
        var StringData = $.ajax({
            url: "fournisseur/delete/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("fournisseur", "désactivé", jsonData.check);
        if (jsonData.fournisseur.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.fournisseur.id + "," + ind + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.fournisseur.id + "," + ind + ")\">supprimer</button>"
        }
        $('#row' + ind).html(
            
            " <td id=\"nom" + ind + "\">" + jsonData.fournisseur.nom + "</td>" +
            " <td id=\"token" + ind + "\">" + jsonData.fournisseur.token + "</td>" +
            " <td id=\"email" + ind + "\">" + jsonData.fournisseur.email + "</td>" +
            " <td id=\"description" + ind + "\">" + jsonData.fournisseur.description + "</td>" +
            "<td>" +

            "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.fournisseur.id + "," + ind + ")\" >modifier</button>" +
            "<button class=\"btn btn-success\"style=\"margin: 10px\" onclick=\"listprovenance(" + jsonData.fournisseur.id + "," + ind + ") \">List des fournisseurs</button>" +
            buttonacive +
            "</td>");
        $("#datatable").DataTable();
    }

    function listprovenance(id, ind) {
        var StringData = $.ajax({
            url: "fournisseur/list/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);
        console.log(jsonData)
        $('#provenance_bodytab').html("")
        for (let ind = 0; ind < jsonData.length; ind++) {

            $('#provenance_bodytab').append("<tr>" +
                " <td >" + jsonData[ind].nom + "</td>" +
                " <td >" + jsonData[ind].prix + "</td>" +
                " <td >" + jsonData[ind].cle + "</td>" +
                " <td >" + jsonData[ind].description + "</td>" +
                "</tr>");
        }

        $("#provenance_datatable").DataTable();
        $('#exampleModal').modal('show');

    }



    function printErrorMsg(msg) {


        $.each(msg, function(key, value) {

            $("#err-" + key).addClass('has-danger');
            $("#err-" + key).find("small").html(value);

        });

    }

    function clearInputs(msg) {


        $.each(msg, function(key, value) {

            $("#err-" + key).removeClass('has-danger');
            $("#err-" + key).find("small").html("");

        });

    }
</script>
@endsection