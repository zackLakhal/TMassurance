@extends('layouts.appback')

@section('content')
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



<!-- /.modal 2-->
<div class="modal fade bs-example-modal-sm" id="messagebox" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData[ind].id + "," + ind + ")\">supprimer</button>"
            }
            $('#bodytab').append("<tr id=\"row" + ind + "\">" +
                "<th >" + jsonData[ind].id + "</th>" +
                " <td id=\"nom" + ind + "\">" + jsonData[ind].nom + "</td>" +
                " <td id=\"cle" + ind + "\">" + jsonData[ind].cle + "</td>" +
                " <td id=\"prix" + ind + "\">" + jsonData[ind].prix + "</td>" +
                " <td id=\"description" + ind + "\">" + jsonData[ind].description + "</td>" +
                "<td>" +

                "<button class=\"btn btn-primary\"style=\"margin: 10px\" >List des Prospects</button>" +
                "<button class=\"btn btn-success\"style=\"margin: 10px\" >List des fournisseurs</button>" +
                buttonacive +
                "</td>" +
                "</tr>");
        }
        $("#datatable").DataTable();
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
        $('#row' + ind).html(
            "<th >" + jsonData.provenance.id + "</th>" +
            " <td id=\"nom" + ind + "\">" + jsonData.provenance.nom + "</td>" +
            " <td id=\"cle" + ind + "\">" + jsonData.provenance.cle + "</td>" +
            " <td id=\"prix" + ind + "\">" + jsonData.provenance.prix + "</td>" +
            " <td id=\"description" + ind + "\">" + jsonData.provenance.description + "</td>" +
            "<td>" +

            "<button class=\"btn btn-primary\"style=\"margin: 10px\" >List des Prospects</button>" +
            "<button class=\"btn btn-success\"style=\"margin: 10px\" >List des fournisseurs</button>" +
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
        $('#row' + ind).html(
            "<th >" + jsonData.provenance.id + "</th>" +
            " <td id=\"nom" + ind + "\">" + jsonData.provenance.nom + "</td>" +
            " <td id=\"cle" + ind + "\">" + jsonData.provenance.cle + "</td>" +
            " <td id=\"prix" + ind + "\">" + jsonData.provenance.prix + "</td>" +
            " <td id=\"description" + ind + "\">" + jsonData.provenance.description + "</td>" +
            "<td>" +

            "<button class=\"btn btn-primary\"style=\"margin: 10px\" >List des Prospects</button>" +
            "<button class=\"btn btn-success\"style=\"margin: 10px\" >List des fournisseurs</button>" +
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