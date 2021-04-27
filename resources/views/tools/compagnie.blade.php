@extends('layouts.appback')
@section('content')


<button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
    <i class="bx bx-cog bx-filter-alt"></i>
</button>
<div class="row" id="bodytab">
    <!-- <div class="col-lg-4">
        <div class="card">
            <img class="card-img-top img-fluid" style="border-radius: 10px;" src="{{ asset('images/small/img-5.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title mt-0">Card title</h4>
                <ul>
                    <li><b>Email : </b> admin@demo.com</li>
                    <li><b>Tel : </b> 06684513548</li>
                </ul>
                <h5>Adress</h5>
                <p class="card-text"> This content is a little bit
                    longer.</p>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary">Left</button>
                <button type="button" class="btn btn-success">Middle</button>
            </div>
        </div>
    </div> -->
</div>
<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center px-3 py-4">

            <h5 class="m-0 me-2">Filtrer</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <!-- <h6 class="text-center mb-0">Choose Layouts</h6> -->

        <div class="p-4">
            <div class="mb-2">
                <img src="{{ asset('images/layouts/layout-1.jpg')}}" class="img-fluid img-thumbnail" alt="">
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="{{ asset('images/layouts/layout-2.jpg')}}" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="{{ asset('css/bootstrap-dark.min.css')}}" data-appStyle="{{ asset('css/app-dark.min.css')}}">
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="{{ asset('images/layouts/layout-3.jpg')}}" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-5">
                <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="{{ asset('css/app-rtl.min.css')}}">
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>


        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

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
            url: "compagnie/index",
            dataType: "json",
            type: "GET",
            async: false,
        }).responseText;
        jsonData = JSON.parse(StringData);

        $('#bodytab').html("");
        for (let ind = 0; ind < jsonData.length; ind++) {
            if (jsonData[ind].deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-success\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData[ind].id + ")\">restorer</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData[ind].id + ")\">supprimer</button>"
            }
            $('#bodytab').append(`<div class="col-lg-4" id="compagnie_${jsonData[ind].id}">
                                    <div class="card" >
                                        <img class="card-img-top img-fluid" style="border-radius: 10px;" src="{{ asset('${jsonData[ind].logo}') }}" alt="Card image cap">
                                        <div class="card-body" >
                                            <h4 class="card-title mt-0">${jsonData[ind].nom}</h4>
                                            <ul>
                                                <li><b>Email : </b> ${jsonData[ind].email}</li>
                                                <li><b>Tel : </b>${jsonData[ind].tel}</li>
                                            </ul>
                                            <h5>Adress</h5>
                                            <p class="card-text"> ${jsonData[ind].adresse}</p>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a type="button" href="compagnie/${jsonData[ind].id}/products" style="margin: 10px" class="btn btn-primary">afficher les produit</a>
                                            ${buttonacive}
                                        </div>
                                    </div>
                                </div>`);
        }

    }

    function restor(id) {
        var StringData = $.ajax({
            url: "compagnie/restore/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("compagnie", "activé", jsonData.check);
        if (jsonData.compagnie.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-success\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.compagnie.id + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.compagnie.id + ")\">supprimer</button>"
        }
        $('#compagnie_' + jsonData.compagnie.id).html(`
                                    <div class="card" >
                                        <img class="card-img-top img-fluid" style="border-radius: 10px;" src="{{ asset('${jsonData.compagnie.logo}') }}" alt="Card image cap">
                                        <div class="card-body" id="compagnie_${jsonData.compagnie.id}">
                                            <h4 class="card-title mt-0">${jsonData.compagnie.nom}</h4>
                                            <ul>
                                                <li><b>Email : </b> ${jsonData.compagnie.email}</li>
                                                <li><b>Tel : </b>${jsonData.compagnie.tel}</li>
                                            </ul>
                                            <h5>Adress</h5>
                                            <p class="card-text"> ${jsonData.compagnie.adresse}</p>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <a type="button" href="compagnie/${jsonData.compagnie.id}/products" style="margin: 10px" class="btn btn-primary">afficher les produit</a>
                                            ${buttonacive}
                                        </div>
                                    </div>`);

    }

    function delet(id) {
        var StringData = $.ajax({
            url: "compagnie/delete/" + id,
            type: "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData = JSON.parse(StringData);

        message("compagnie", "désactivé", jsonData.check);
        if (jsonData.compagnie.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-success\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.compagnie.id + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.compagnie.id + ")\">supprimer</button>"
        }
        $('#compagnie_' + jsonData.compagnie.id).html(`
                                    <div class="card" >
                                        <img class="card-img-top img-fluid" style="border-radius: 10px;" src="{{ asset('${jsonData.compagnie.logo}') }}" alt="Card image cap">
                                        <div class="card-body" id="compagnie_${jsonData.compagnie.id}">
                                            <h4 class="card-title mt-0">${jsonData.compagnie.nom}</h4>
                                            <ul>
                                                <li><b>Email : </b> ${jsonData.compagnie.email}</li>
                                                <li><b>Tel : </b>${jsonData.compagnie.tel}</li>
                                            </ul>
                                            <h5>Adress</h5>
                                            <p class="card-text"> ${jsonData.compagnie.adresse}</p>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <a type="button" href="compagnie/${jsonData.compagnie.id}/products" style="margin: 10px" class="btn btn-primary">afficher les produit</a>
                                            ${buttonacive}
                                        </div>
                                    </div>`);


    }
</script>

@endsection