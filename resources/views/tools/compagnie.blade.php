@extends('layouts.appback')
@section('content')


<button type="button" id="creat_compagnie" class="btn btn-success btn-sm btn-rounded waves-effect waves-light mb-3">Ajouter une compagnie</button>

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
<div class="modal fade" id="compagnieedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="edit_head">
                <h4 class="modal-title">edit Compagnie</h4>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" id="modalhead">

            </div>
            <div class="modal-body">

                <div class="form-group" id="err-email">
                    <label for="email" class="control-label"><b>Email:</b></label>
                    <input type="email" class="form-control" id="email" name="email">
                    <small class="invalid-feedback"> </small>
                </div>
                <div class="form-group" id="err-nom">
                    <label for="nom" class="control-label"><b>nom:</b></label>
                    <input type="text" class="form-control" id="nom" name="nom">
                    <small class="invalid-feedback"> </small>
                </div>
                <div class="form-group" id="err-tel">
                    <label for="tel" class="control-label"><b>tel:</b></label>
                    <input type="text" class="form-control" id="tel" name="tel">
                    <small class="invalid-feedback"> </small>
                </div>
                <div class="form-group" id="err-adresse">
                    <label for="adresse" class="control-label"><b>adresse:</b></label>
                    <input type="text" class="form-control" id="adresse" name="adresse">
                    <small class="invalid-feedback"> </small>
                </div>


            </div>
            <div class="modal-footer" id="modalfooter">
            </div>
        </div>
    </div>
</div>
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

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
            url: "compagnie/index",
            dataType: "json",
            type: "GET",
            async: false,
        }).responseText;
        jsonData = JSON.parse(StringData);
        console.log(jsonData)
        $('#bodytab').html("");
        for (let ind = 0; ind < jsonData.length; ind++) {
            if (jsonData[ind].deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData[ind].id + ")\">restorer</button>"
                coloractive = "card-body bg-danger text-white-50";
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData[ind].id + ")\">supprimer</button>"
                coloractive = "card-body";
            }
            $('#bodytab').append(`<div class="col-lg-4" id="compagnie_${jsonData[ind].id}">
                                    <div class="card" >
                                        <img class="card-img-top img-fluid" style="border-radius: 10px;" src="{{ asset('storage/${jsonData[ind].logo}') }}" alt="Card image cap">
                                        <div id="body_${jsonData[ind].id}" class="${coloractive}" >
                                            <h4 class="card-title mt-0">${jsonData[ind].nom}</h4>
                                            <ul>
                                                <li><b>Email : </b> ${jsonData[ind].email}</li>
                                                <li><b>Tel : </b>${jsonData[ind].tel}</li>
                                            </ul>
                                            <h5>Adress</h5>
                                            <p class="card-text"> ${jsonData[ind].adresse}</p>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" onclick="edit(${jsonData[ind].id})"  class="btn btn-secondary m-2">modifier</button>
                                            <a type="button" href="compagnie/${jsonData[ind].id}/products"  class="btn btn-primary m-2">afficher les produit</a>
                                            ${buttonacive}
                                        </div>
                                    </div>
                                </div>`);
        }

    }

    $('#creat_compagnie').click(function() {
        $('#modalhead').html("<h4 class=\"modal-title\" >Nouvelle compagnie</h4>" +
            "<button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>");
        $('#modalfooter').html("<button type=\"button\" class=\"btn btn-info\" id=\"save\">Enregistrer</button>");
        $('#exampleModal').modal('show');

        $('#nom').val("");
        $('#email').val("");
        $('#tel').val("");
        $('#adresse').val("");
        $('#save').click(function() {
            var inputs = {
                "nom": $("#nom").val(),
                "email": $("#email").val(),
                "tel": $("#tel").val(),
                "adresse": $("#adresse").val(),

            };

            var StringData = $.ajax({
                url: "compagnie/store",
                type: "POST",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: inputs
            }).responseText;
            jsonData = JSON.parse(StringData);

            console.log(jsonData)


            $('#exampleModal').modal('hide');
            message("Compagnie", "ajouté", jsonData.check);

            if (jsonData.compagnie.deleted_at != null) {
                buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.compagnie.id + ")\">restorer</button>"
            } else {
                buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.compagnie.id + ")\">supprimer</button>"
            }
            $('#bodytab').append(`<div class="col-lg-4" id="compagnie_${jsonData.compagnie.id}">
                                    <div class="card" >
                                        <img class="card-img-top img-fluid" style="border-radius: 10px;" src="{{ asset('storage/${jsonData.compagnie.logo}') }}" alt="Card image cap">
                                        <div id="body_${jsonData.compagnie.id}" class="card-body bg-success text-white-50" >
                                            <h4 class="card-title mt-0">${jsonData.compagnie.nom}</h4>
                                            <ul>
                                                <li><b>Email : </b> ${jsonData.compagnie.email}</li>
                                                <li><b>Tel : </b>${jsonData.compagnie.tel}</li>
                                            </ul>
                                            <h5>Adress</h5>
                                            <p class="card-text"> ${jsonData.compagnie.adresse}</p>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" onclick="edit(${jsonData.compagnie.id})"  class="btn btn-secondary m-2">modifier</button>
                                            <a type="button" href="compagnie/${jsonData.compagnie.id}/products"  class="btn btn-primary m-2">afficher les produit</a>
                                            ${buttonacive}
                                        </div>
                                    </div>
                                </div>`)

        });

    });

    function edit(id) {

        $('#edit_head').html("<h4 class=\"modal-title\" >Modifier Compagnie</h4>" +
            "<button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>");
        $('#edit_footer').html("<button type=\"button\" class=\"btn btn-info\" id=\"edit\">Enregistrer</button>");

        var StringData1 = $.ajax({
            url: "compagnie/detail/" + id,
            type: "post",
            async: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).responseText;

        jsonData1 = JSON.parse(StringData1);
        console.log(jsonData1)

        $('#edit_body').html(`<div class="mx-auto d-block" style="width: 14rem;">
                                    <img class="card-img-top" id="avatar_display" src="{{ asset('storage/${jsonData1.logo}') }}" alt="">
                                    <div class="form-group" id="err-edit-logo">
                                        <input type="file" class="form-control" id="edit-logo" name="edit-logo">
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
                    
                                    </tbody>
                                </table>
                            </div>
                        </div>`);


        $("#edit-logo").change(function() {
            readURL(this);
        });
        $('#compagnieedit').modal('show');

        $('#edit').click(function() {
            form_data = new FormData();
            form_data.append("nom", $("#edit-nom").val());
            form_data.append("email", $("#edit-email").val());
            form_data.append("tel", $("#edit-tel").val());
            form_data.append("adresse", $("#edit-adresse").val());
            form_data.append("logo", $("#edit-logo")[0].files[0]);

            console.log(form_data)
            var StringData3 = $.ajax({
                url: "compagnie/edit/" + id,
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

                $('#compagnieedit').modal('hide');
                message("compagnie", "modifié", jsonData3.check);
                if (jsonData3.compagnie.deleted_at != null) {
                    buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData3.compagnie.id + ")\">restorer</button>"
                } else {
                    buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData3.compagnie.id + ")\">supprimer</button>"
                }
                $('#compagnie_' + jsonData3.compagnie.id).html(`
                                    <div class="card" >
                                        <img class="card-img-top img-fluid" style="border-radius: 10px;" src="{{ asset('storage/${jsonData3.compagnie.logo}') }}" alt="Card image cap">
                                        <div class="card-body bg-success text-white-50" id="body_${jsonData3.compagnie.id}">
                                            <h4 class="card-title mt-0">${jsonData3.compagnie.nom}</h4>
                                            <ul>
                                                <li><b>Email : </b> ${jsonData3.compagnie.email}</li>
                                                <li><b>Tel : </b>${jsonData3.compagnie.tel}</li>
                                            </ul>
                                            <h5>Adress</h5>
                                            <p class="card-text"> ${jsonData3.compagnie.adresse}</p>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" onclick="edit(${jsonData3.compagnie.id})"  class="btn btn-secondary m-2">modifier</button>
                                            <a type="button" href="compagnie/${jsonData3.compagnie.id}/products"  class="btn btn-primary m-2">afficher les produit</a>
                                            ${buttonacive}
                                        </div>
                                    </div>`);
            
        });
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
        console.log(jsonData)
        message("compagnie", "activé", jsonData.check);
        if (jsonData.compagnie.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.compagnie.id + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.compagnie.id + ")\">supprimer</button>"
        }
        $('#compagnie_' + jsonData.compagnie.id).html(`
                                    <div class="card" >
                                        <img class="card-img-top img-fluid" style="border-radius: 10px;" src="{{ asset('storage/${jsonData.compagnie.logo}') }}" alt="Card image cap">
                                        <div class="card-body" id="body_${jsonData.compagnie.id}">
                                            <h4 class="card-title mt-0">${jsonData.compagnie.nom}</h4>
                                            <ul>
                                                <li><b>Email : </b> ${jsonData.compagnie.email}</li>
                                                <li><b>Tel : </b>${jsonData.compagnie.tel}</li>
                                            </ul>
                                            <h5>Adress</h5>
                                            <p class="card-text"> ${jsonData.compagnie.adresse}</p>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" onclick="edit(${jsonData.compagnie.id})"  class="btn btn-secondary m-2">modifier</button>
                                            <a type="button" href="compagnie/${jsonData.compagnie.id}/products"  class="btn btn-primary m-2">afficher les produit</a>
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
        console.log(jsonData)
        message("compagnie", "désactivé", jsonData.check);
        if (jsonData.compagnie.deleted_at != null) {
            buttonacive = "<button  class=\"btn btn-warning\" style=\"margin: 10px\"  onclick=\"restor(" + jsonData.compagnie.id + ")\">restorer</button>"
        } else {
            buttonacive = "<button  class=\"btn btn-danger\" style=\"margin: 10px\" onclick=\"delet(" + jsonData.compagnie.id + ")\">supprimer</button>"
        }
        $('#compagnie_' + jsonData.compagnie.id).html(`
                                    <div class="card" >
                                        <img class="card-img-top img-fluid" style="border-radius: 10px;" src="{{ asset('storage/${jsonData.compagnie.logo}') }}" alt="Card image cap">
                                        <div class="card-body bg-danger text-white-50" id="body_${jsonData.compagnie.id}">
                                            <h4 class="card-title mt-0">${jsonData.compagnie.nom}</h4>
                                            <ul>
                                                <li><b>Email : </b> ${jsonData.compagnie.email}</li>
                                                <li><b>Tel : </b>${jsonData.compagnie.tel}</li>
                                            </ul>
                                            <h5>Adress</h5>
                                            <p class="card-text"> ${jsonData.compagnie.adresse}</p>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" onclick="edit(${jsonData.compagnie.id})"  class="btn btn-secondary m-2">modifier</button>
                                            <a type="button" href="compagnie/${jsonData.compagnie.id}/products"  class="btn btn-primary m-2">afficher les produit</a>
                                            ${buttonacive}
                                        </div>
                                    </div>`);


    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#avatar_display').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>

@endsection