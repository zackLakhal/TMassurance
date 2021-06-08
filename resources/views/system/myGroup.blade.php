@extends('layouts.appback')

@section('content')

<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List des Utilisateurs du group</h4>
                <button type="button" class="btn btn-primary pull-right mb-2" onclick="attach_user(0,0)">+ attacher utilisateur</button>
                <table id="datatable" class="table text-center table-bordered dt-responsive  nowrap w-100">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nom Complet</th>
                            <th>Email</th>
                            <th>Role</th>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modalhead">

            </div>
            <div class="modal-body">
               
                <div class="form-group" id="err-user_list">
                    <label for="user_list" class="control-label"><b>list des utilisateurs:</b></label>
                    <select class="form-control  " name="user_list" id="user_list">

                    </select>
                    <small class="invalid-feedback"> </small>
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

<!-- /.user details-->
<div class="modal fade" id="userdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="detail_head">
                <h4 class="modal-title">Details Utilisateur</h4>
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
        let group_link = '{! auth()->user()->group_id !}'
        var StringData = $.ajax({
            url: 'detailGR/index',
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false,
            data: {
                group_id: group_link
            }
        }).responseText;
        jsonData = JSON.parse(StringData);
        console.log(jsonData)
        $('#bodytab').html("");
        $('#supervisor').html("");

        if (jsonData.supervisor == null) {
            $('#supervisor').html("<tr><td colspan=\"5\"><button  class=\"btn btn-link pull-right\" onclick=\"attach_sup()\">Pas de superviseur , Attacher un </button></td></tr>");
        } else {
            $('#supervisor').html(`<tr  >
                                        <td >
                                            <div>
                                                <img class="rounded-circle avatar-xs" src="{{ asset('storage/${jsonData.supervisor.photo}') }}" alt="">
                                            </div>
                                        </td>
                                        <td>${jsonData.supervisor.nom}  ${jsonData.supervisor.prenom}</td>
                                        
                                        <td>${jsonData.supervisor.email}</td>
                                        <td>${jsonData.supervisor.role.value}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <button  class="btn btn-success" style="margin: 10px" onclick="detail(${jsonData.supervisor.id},-1)">détails</button>
                                            <button class="btn btn-warning"style="margin: 10px" onclick="attach_sup()">changer superviseur</button>
                                            <button class="btn btn-danger"style="margin: 10px" onclick="dettach_sup()">détacher</button>
                                                
                                            </div>
                                        </td>
                                    </tr>`);
        }

        for (let ind = 0; ind < jsonData.users.length; ind++) {

            $('#bodytab').append(`<tr id="row${jsonData.users[ind].id}">
                                        <td id="photo${jsonData.users[ind].id}">
                                            <div>
                                                <img class="rounded-circle avatar-xs" src="{{ asset('storage/${jsonData.users[ind].photo}') }}" alt="">
                                            </div>
                                        </td>
                                        <td id="nom_prenom${jsonData.users[ind].id}">${jsonData.users[ind].nom}  ${jsonData.users[ind].prenom}</td>
                                        
                                        <td id="email${jsonData.users[ind].id}">${jsonData.users[ind].email}</td>
                                        <td id="role${jsonData.users[ind].id}">${jsonData.users[ind].role.value}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <button  class="btn btn-success" style="margin: 10px" onclick="detail(${jsonData.users[ind].id},${ind})">détails</button>
                                            <button class="btn btn-warning"style="margin: 10px" onclick="attach_user(${jsonData.users[ind].id},${ind})">changer utilisateur</button>

                                            <button class="btn btn-danger"style="margin: 10px" onclick="detach_user(${jsonData.users[ind].id},${ind})">détacher</button>
                                                
                                            </div>
                                        </td>
                                    </tr>`);

        }

        $("#datatable").DataTable();

    }

  
    function attach_user(id_user, index) {

        $('#modalhead').html("<h4 class=\"modal-title\" >Attacher utilisateur</h4>" +
            "<button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>");
        $('#modalfooter').html("<button type=\"button\" class=\"btn btn-info\" id=\"save_user\">Enregistrer</button>");
        $('#err-user_list').show()
        $('#user_list').html("");

        var StringData2 = $.ajax({
            url: "detailGR/list_user",
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false,
            data: {
                user_id: id_user
            }
        }).responseText;
        jsonData2 = JSON.parse(StringData2);
        for (let ind = 0; ind < jsonData2.length; ind++) {
            $('#user_list').append("<option value=\"" + jsonData2[ind].id + "\">" + jsonData2[ind].nom + " " + jsonData2[ind].prenom + " - " + jsonData2[ind].role.value + " </option>");
        }
        $('#err-superviseur_list').hide()
        $('#exampleModal').modal('show');

        $('#save_user').click(function() {
            var inputs = {
                "new_user": $("#user_list").val(),
                'user_id': id_user
            };

            var StringData = $.ajax({
                url: "detailGR/attach_user",
                type: "POST",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: inputs
            }).responseText;
            jsonData = JSON.parse(StringData);
            console.log(jsonData)
            if (id_user == 0) {
                $('#bodytab').append(`<tr id="row${jsonData.new_user.id}">
                                        <td id="photo${jsonData.new_user.id}">
                                            <div>
                                                <img class="rounded-circle avatar-xs" src="{{ asset('storage/${jsonData.new_user.photo}') }}" alt="">
                                            </div>
                                        </td>
                                        <td id="nom_prenom${jsonData.new_user.id}">${jsonData.new_user.nom}  ${jsonData.new_user.prenom}</td>
                                        
                                        <td id="email${jsonData.new_user.id}">${jsonData.new_user.email}</td>
                                        <td id="role${jsonData.new_user.id}">${jsonData.new_user.role.value}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <button  class="btn btn-success" style="margin: 10px" onclick="detail(${jsonData.new_user.id},${jsonData.count})">détails</button>
                                            <button class="btn btn-warning"style="margin: 10px" onclick="attach_user(${jsonData.new_user.id},${jsonData.count})">changer utilisateur</button>

                                            <button class="btn btn-danger"style="margin: 10px" onclick="detach_user(${jsonData.new_user.id},${jsonData.count})">détacher</button>
                                                
                                            </div>
                                        </td>
                                    </tr>`);
            } else {
                $('#row' + jsonData.old_user.id).html(`
                                        <td id="photo${jsonData.new_user.id}">
                                            <div>
                                                <img class="rounded-circle avatar-xs" src="{{ asset('storage/${jsonData.new_user.photo}') }}" alt="">
                                            </div>
                                        </td>
                                        <td id="nom_prenom${jsonData.new_user.id}">${jsonData.new_user.nom}  ${jsonData.new_user.prenom}</td>
                                        
                                        <td id="email${jsonData.new_user.id}">${jsonData.new_user.email}</td>
                                        <td id="role${jsonData.new_user.id}">${jsonData.new_user.role.value}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <button  class="btn btn-success" style="margin: 10px" onclick="detail(${jsonData.new_user.id},${jsonData.count})">détails</button>
                                            <button class="btn btn-warning"style="margin: 10px" onclick="attach_user(${jsonData.new_user.id},${jsonData.count})">changer utilisateur</button>

                                            <button class="btn btn-danger"style="margin: 10px" onclick="detach_user(${jsonData.new_user.id},${jsonData.count})">détacher</button>
                                                
                                            </div>
                                        </td>
                                    `);
                $('#row' + jsonData.old_user.id).attr('id', 'row' + jsonData.new_user.id)

            }
            $("#datatable").DataTable();
            $('#exampleModal').modal('hide');
        });


    }


    function detach_user(id_user, index) {

        var StringData = $.ajax({
            url: "detailGR/detach_user",
            dataType: "json",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            async: false,
            data: {
                user_id: id_user
            }
        }).responseText;
        jsonData = JSON.parse(StringData);
        
        $('#row'+jsonData.id).remove();
        $("#datatable").DataTable();
    }

    function detail(id, ind) {
        var StringData = $.ajax({
            url: "/user/detail/" + id,
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

    function printErrorMsg(msg) {


        $.each(msg, function(key, value) {
            $("#err-" + key).find("input").addClass('is-invalid');
            $("#err-" + key).find("small").html(value);

        });

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