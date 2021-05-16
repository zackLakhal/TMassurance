@extends('layouts.appback')

@section('content')


<div class="row" id="info_elements">
  
</div>
<!-- end row -->



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
        let compagnie_link = window.location.href.split('/')[4];
        
        var StringData = $.ajax({
            url: 'products/index',
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false,
            data: {
                compagnie_id: compagnie_link
            }
        }).responseText;
        jsonData = JSON.parse(StringData);
        console.log(jsonData);
         $('#info_elements').html("");
        var active_compagnie;
        if (jsonData.compagnie.deleted_at != null) {
                active_compagnie = "<button  class=\"btn btn-success\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.compagnie.id + ", -1)\">restorer</button>"
            } else {
                active_compagnie = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.compagnie.id + ", -1)\">supprimer</button>"
            }
            $('#info_elements').html(`<div class="col-xl-4">
                                    <div class="card">
                                        <img class="card-img-top img-fluid" style="border-radius: 10px;" src="{{ asset('${jsonData.compagnie.logo}') }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Information de la Compagnie</h4>
                                            <div class="table-responsive">
                                                <table class="table table-nowrap mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Nom :</th>
                                                            <td>${jsonData.compagnie.nom}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email :</th>
                                                            <td>${jsonData.compagnie.email}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tel :</th>
                                                            <td>${jsonData.compagnie.tel}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Adress :</th>
                                                            <td>${jsonData.compagnie.adresse}</td>
                                                        </tr>             
                                                    </tbody>
                                                </table>                   
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>

                                <div class="col-xl-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">List des Produit de La compagnie</h4>
                                            <table id="datatable" class="table text-center table-bordered dt-responsive  nowrap w-100">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nom</th>
                                                        <th>prix</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="bodytable">
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>`);

        var buttonactive;
        for (let ind = 0; ind < jsonData.produits.length; ind++) {
            if (jsonData.produits[ind].deleted_at != null) {
                buttonactive = "<button  class=\"btn btn-success\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.produits[ind].id + "," + ind + ")\">restorer</button>"
            } else {
                buttonactive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.produits[ind].id + "," + ind + ")\">supprimer</button>"
            }
            $('#bodytable').append(`<tr>
                                        <td>
                                            <div>
                                                <img class="rounded-circle avatar-xs" src="{{ asset('${jsonData.produits[ind].logo}') }}" alt="">
                                            </div>
                                        </td>
                                        <td>${jsonData.produits[ind].nom}</td>
                                        <td>${jsonData.produits[ind].prix}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <button  class="btn btn-primary" style="margin: 10px">détail</button>
                                                ${buttonactive}
                                            </div>
                                        </td>
                                    </tr>`);
        }

        $("#datatable").DataTable();
    }


    function restor(id, ind) {
        var StringData = $.ajax({
            url: "role/restore/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("role", "activé", jsonData.check);
        if (jsonData.role.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-secondary\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.role.id + "," + ind + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.role.id + "," + ind + ")\">supprimer</button>"
        }
        $('#row' + ind).html(
            "<th >" + jsonData.role.id + "</th>" +
            " <td id=\"value" + ind + "\">" + jsonData.role.value + "</td>" +
            "<td>" +

            "<button class=\"btn btn-warning\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.role.id + "," + ind + ")\">modifier</button>" +
            buttonacive +
            "</td>");
        $("#datatable").DataTable();
    }

    function delet(id, ind) {
        var StringData = $.ajax({
            url: "role/delete/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("role", "désactivé", jsonData.check);
        if (jsonData.role.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-secondary\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.role.id + "," + ind + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.role.id + "," + ind + ")\">supprimer</button>"
        }
        $('#row' + ind).html(
            "<th >" + jsonData.role.id + "</th>" +
            " <td id=\"value" + ind + "\">" + jsonData.role.value + "</td>" +
            "<td>" +

            "<button class=\"btn btn-warning\"style=\"margin: 10px\" onclick=\"edit(" + jsonData.role.id + "," + ind + ")\">modifier</button>" +
            buttonacive +
            "</td>");
        $("#datatable").DataTable();
    }
</script>
@endsection