@extends('layouts.appback')

@section('content')

<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Fournisseur des provenances</h4>

                <table class="table  table-bordered text-center dt-responsive  nowrap w-100">
                    <thead class="table-light">
                        <tr>
                            
                            <th>nom</th>
                            <th>token</th>
                            <th>email</th>
                            <th>Description</th>
                        </tr>
                    </thead>

                    <tbody id='fournisseur'>
                       
                        @if($fournisseur->deleted_at == null)
                        <tr class="">
                            <td> {{$fournisseur->nom}} </td>
                            <td> {{$fournisseur->token}}</td>
                            <td> {{$fournisseur->email}}</td>
                            <td> {{$fournisseur->description}}</td>
                        </tr>
                        @else
                        <tr class="table-danger">
                            <td> {{$fournisseur->nom}} </td>
                            <td> {{$fournisseur->token}}</td>
                            <td> {{$fournisseur->email}}</td>
                            <td> {{$fournisseur->description}}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<button type="button" id="creat_provenance" class="btn btn-success btn-sm btn-rounded waves-effect waves-light mb-3">Ajouter une provenance</button>

<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List des Provenances</h4>

                <table id="datatable" class="table text-center table-bordered dt-responsive  nowrap w-100">

                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>nom</th>
                            <th>Clé</th>
                            <th>Prix</th>
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

<div class="modal fade" id="provenanceedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="edit_head">
                <h4 class="modal-title">edit Provenance</h4>
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
                <div class="form-group" id="err-prix">
                    <label for="prix" class="control-label"><b>prix:</b></label>
                    <input type="text" class="form-control" id="prix" name="prix">
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
        var coloractive;
        var StringData = $.ajax({
            url: "provenance/index",
            dataType: "json",
            type: "GET",
            async: false,
        }).responseText;
        jsonData = JSON.parse(StringData);
        $('#bodytab').html("");
        for (let ind = 0; ind < jsonData.length; ind++) {
            if (jsonData[ind].deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData[ind].id + "," + ind + ")\">restorer</button>"
                coloractive = "table-danger";
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData[ind].id + "," + ind + ")\">supprimer</button>"
                coloractive = "";
            }
            $('#bodytab').append("<tr class=\""+coloractive+"\" id=\"row" + ind + "\">" +
                "<th >" + jsonData[ind].id + "</th>" +
                " <td id=\"nom" + ind + "\">" + jsonData[ind].nom + "</td>" +
                " <td id=\"cle" + ind + "\">" + jsonData[ind].cle + "</td>" +
                " <td id=\"prix" + ind + "\">" + jsonData[ind].prix + "</td>" +
                " <td id=\"description" + ind + "\">" + jsonData[ind].description + "</td>" +
                "<td>" +

                "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData[ind].id + "," + ind + ")\" >modifier</button>" +
                buttonacive +
                "</td>" +
                "</tr>");
        }
        $("#datatable").DataTable();
    }

    $('#creat_provenance').click(function() {
        $('#modalhead').html("<h4 class=\"modal-title\" >Nouvelle provenance</h4>" +
            "<button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>");
        $('#modalfooter').html("<button type=\"button\" class=\"btn btn-info\" id=\"save\">Enregistrer</button>");


        $('#nom').val("");
        $('#prix').val("");
        $('#description').val("");

        $('#storeModal').modal('show');
        $('#save').click(function() {
            var inputs = {
                "nom": $("#nom").val(),
                "prix": $("#prix").val(),
                "description": $("#description").val(),

            };

            var StringData = $.ajax({
                url: "provenance/store",
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
            message("provenance", "ajouté", jsonData.check);
            if (jsonData.provenance.deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.provenance.id + "," + jsonData.count + ")\">restorer</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.provenance.id + "," + jsonData.count + ")\">supprimer</button>"
            }
            $('#bodytab').append("<tr class=\"table-success\" id=\"row" + jsonData.count + "\">" +
                "<th >" + jsonData.provenance.id + "</th>" +
                " <td id=\"nom" + jsonData.count + "\">" + jsonData.provenance.nom + "</td>" +
                " <td id=\"cle" + jsonData.count + "\">" + jsonData.provenance.cle + "</td>" +
                " <td id=\"prix" + jsonData.count + "\">" + jsonData.provenance.prix + "</td>" +
                " <td id=\"description" + jsonData.count + "\">" + jsonData.provenance.description + "</td>" +
                "<td>" +
                "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.provenance.id + "," + jsonData.count + ")\" >modifier</button>" +
                buttonacive +
                "</td>" +
                "</tr>");
        });
        $("#datatable").DataTable();
    });

    function edit(id, ind) {
        $('#modalhead').html("<h4 class=\"modal-title\" >modifier provenance</h4>" +
            "<button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>");
        $('#modalfooter').html("<button type=\"button\" class=\"btn btn-info\" id=\"edit\">Enregistrer</button>");


        $('#nom').val($('#nom' + ind).html());
        $('#cle').val($('#cle' + ind).html());
        $('#prix').val($('#prix' + ind).html());
        $('#description').val($('#description' + ind).html());

        $('#storeModal').modal('show');
        $('#edit').click(function() {
            var inputs = {
                "nom": $("#nom").val(),
                "cle": $("#cle").val(),
                "prix": $("#prix").val(),
                "description": $("#description").val(),
            };
            var StringData = $.ajax({
                url: "provenance/edit/" + id,
                type: "POST",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: inputs
            }).responseText;
            jsonData = JSON.parse(StringData);

            $('#storeModal').modal('hide');
            message("provenance", "modifié", jsonData.check);
            if (jsonData.provenance.deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.provenance.id + "," + ind + ")\">restorer</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.provenance.id + "," + ind + ")\">supprimer</button>"
            }
            $('#row' + ind).attr('class','table-success')
            $('#row' + ind).html(
                "<th >" + jsonData.provenance.id + "</th>" +
                " <td id=\"nom" + ind + "\">" + jsonData.provenance.nom + "</td>" +
                " <td id=\"cle" + ind + "\">" + jsonData.provenance.cle + "</td>" +
                " <td id=\"prix" + ind + "\">" + jsonData.provenance.prix + "</td>" +
                " <td id=\"description" + ind + "\">" + jsonData.provenance.description + "</td>" +
                "<td>" +

                "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.provenance.id + "," + ind + ")\" >modifier</button>" +
                
                buttonacive +
                "</td>");
            $("#datatable").DataTable();


        });
    }




    function restor(id, ind) {
        var StringData = $.ajax({
            url: "provenance/restore/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("provenance", "activé", jsonData.check);
        if (jsonData.provenance.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.provenance.id + "," + ind + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.provenance.id + "," + ind + ")\">supprimer</button>"
        }
        $('#row' + ind).attr('class','')
        $('#row' + ind).html(
            "<th >" + jsonData.provenance.id + "</th>" +
            " <td id=\"nom" + ind + "\">" + jsonData.provenance.nom + "</td>" +
            " <td id=\"cle" + ind + "\">" + jsonData.provenance.cle + "</td>" +
            " <td id=\"prix" + ind + "\">" + jsonData.provenance.prix + "</td>" +
            " <td id=\"description" + ind + "\">" + jsonData.provenance.description + "</td>" +
            "<td>" +

            "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.provenance.id + "," + ind + ")\" >modifier</button>" +
            
            buttonacive +
            "</td>");
        $("#datatable").DataTable();
    }

    function delet(id, ind) {
        var StringData = $.ajax({
            url: "provenance/delete/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("provenance", "désactivé", jsonData.check);
        if (jsonData.provenance.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.provenance.id + "," + ind + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.provenance.id + "," + ind + ")\">supprimer</button>"
        }
        $('#row' + ind).attr('class','table-danger')
        $('#row' + ind).html(
            "<th >" + jsonData.provenance.id + "</th>" +
            " <td id=\"nom" + ind + "\">" + jsonData.provenance.nom + "</td>" +
            " <td id=\"cle" + ind + "\">" + jsonData.provenance.cle + "</td>" +
            " <td id=\"prix" + ind + "\">" + jsonData.provenance.prix + "</td>" +
            " <td id=\"description" + ind + "\">" + jsonData.provenance.description + "</td>" +
            "<td>" +

            "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.provenance.id + "," + ind + ")\" >modifier</button>" +
            
            buttonacive +
            "</td>");
        $("#datatable").DataTable();
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