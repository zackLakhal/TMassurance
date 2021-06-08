@extends('layouts.appback')

@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List des Groups</h4>
                <button type="button" class="btn btn-primary pull-right" id="newmodal">+ nouveau group</button>

                <table id="datatable" class="table text-center table-bordered dt-responsive  nowrap w-100">

                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>nom</th>
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
</div>

<!-- /.modal 1-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modalhead">

            </div>
            <div class="modal-body">

                <div id="err-nom" class="form-group">
                    <label for="nom" class="control-label"><b>nom:</b></label>
                    <input type="text" class="form-control" id="nom" name="nom">
                    <small class="form-control-feedback"> </small>
                </div>


            </div>
            <div class="modal-footer" id="modalfooter">
                <button type="button" class="btn btn-info" id="save">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
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
            url: "group/index",
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
                "<td>" +
                "<a type=\"button\" href=\"group/"+jsonData[ind].id+"/detailGR\"  class=\"btn btn-success m-2\">afficher les utilisateurs</a>"+
       
                "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData[ind].id + "," + ind + ")\">modifier</button>" +
                buttonacive +
                "</td>" +
                "</tr>");
        }
        $("#datatable").DataTable();
    }
    $('#newmodal').click(function() {
        $('#modalhead').html("<h4 class=\"modal-title\" >Nouveau group</h4>" +
            "<button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>");
        $('#modalfooter').html("<button type=\"button\" class=\"btn btn-info\" id=\"save\">Enregistrer</button>");
        $('#exampleModal').modal('show');

        $('#nom').val("");
        $('#save').click(function() {
            var inputs = {
                "nom": $('#nom').val()
            };
            var StringData = $.ajax({
                url: "group/store",
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
                $('#exampleModal').modal('hide');
                message("group", "ajouté", jsonData.check);
                if (jsonData.group.deleted_at != null) {
                    buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.group.id + "," + jsonData.count + ")\">restorer</button>"
                    
                } else {
                    buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.group.id + "," + jsonData.count + ")\">supprimer</button>"
                    
                }
                $('#bodytab').append("<tr class=\"table-success\" id=\"row" + jsonData.count + "\">" +
                    "<th >" + jsonData.group.id + "</th>" +
                    " <td id=\"nom" + jsonData.count + "\">" + jsonData.group.nom + "</td>" +
                    "<td>" +
                    "<a type=\"button\" href=\"group/"+jsonData.group.id+"/detailGR\"  class=\"btn btn-success m-2\">afficher les utilisateurs</a>"+

                    "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.group.id + "," + jsonData.count + ")\">modifier</button>" +
                    buttonacive +
                    "</td>" +
                    "</tr>");
            } else {
                clearInputs(jsonData.inputs);
                printErrorMsg(jsonData.error);
            }
        });
        $("#datatable").DataTable();
    });

    function restor(id, ind) {
        var StringData = $.ajax({
            url: "group/restore/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("group", "activé", jsonData.check);
        if (jsonData.group.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.group.id + "," + ind + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.group.id + "," + ind + ")\">supprimer</button>"
        }
        $('#row' + ind).attr('class','')
        $('#row' + ind).html(
            "<th >" + jsonData.group.id + "</th>" +
            " <td id=\"nom" + ind + "\">" + jsonData.group.nom + "</td>" +
            "<td>" +
            "<a type=\"button\" href=\"group/"+jsonData.group.id+"/detailGR\"  class=\"btn btn-success m-2\">afficher les utilisateurs</a>"+

            "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.group.id + "," + ind + ")\">modifier</button>" +
            buttonacive +
            "</td>");
        $("#datatable").DataTable();
    }

    function delet(id, ind) {
        var StringData = $.ajax({
            url: "group/delete/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("group", "désactivé", jsonData.check);
        if (jsonData.group.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.group.id + "," + ind + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.group.id + "," + ind + ")\">supprimer</button>"
        }
        $('#row' + ind).attr('class','table-danger')
        $('#row' + ind).html(
            "<th >" + jsonData.group.id + "</th>" +
            " <td id=\"nom" + ind + "\">" + jsonData.group.nom + "</td>" +
            "<td>" +
            "<a type=\"button\" href=\"group/"+jsonData.group.id+"/detailGR\"  class=\"btn btn-success m-2\">afficher les utilisateurs</a>"+
            "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.group.id + "," + ind + ")\">modifier</button>" +
            buttonacive +
            "</td>");
        $("#datatable").DataTable();
    }

    function edit(id, ind) {

        $('#modalhead').html("<h4 class=\"modal-title\" >Modifier group</h4>" +
            "<button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>");
        $('#modalfooter').html("<button type=\"button\" class=\"btn btn-info\" id=\"edit\">Enregistrer</button>");
        $('#nom').val($('#nom' + ind).html());
        $('#exampleModal').modal('show');
        $('#edit').click(function() {
            var inputs = {
                "nom": $('#nom').val()
            };
            var StringData = $.ajax({
                url: "group/edit/" + id,
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
                $('#exampleModal').modal('hide');
                message("group", "modifié", jsonData.check);
                if (jsonData.group.deleted_at != null) {
                    buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.group.id + "," + ind + ")\">restorer</button>"
                } else {
                    buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.group.id + "," + ind + ")\">supprimer</button>"
                }
                $('#row' + ind).attr('class','table-success')
                $('#row' + ind).html(
                    "<th >" + jsonData.group.id + "</th>" +
                    " <td id=\"nom" + ind + "\">" + jsonData.group.nom + "</td>" +
                    "<td>" +
                    "<a type=\"button\" href=\"group/"+jsonData.group.id+"/detailGR\"  class=\"btn btn-success m-2\">afficher les utilisateurs</a>"+

                    "<button class=\"btn btn-secondary\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.group.id + "," + ind + ")\">modifier</button>" +
                    buttonacive +
                    "</td>");
            } else {
                clearInputs(jsonData.inputs);
                printErrorMsg(jsonData.error);
            }
        });
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