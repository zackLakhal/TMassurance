<button type="button" name="action" id="tâches" class="btn btn-warning btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#tachmodale">Ajouter un Tâche</button>
<div class="row">
    <div class="col-lg-12">
        <div class="">
            <div class="table-responsive">
                <table id="tach_dataTable" class="table text-center table-bordered dt-responsive  nowrap w-100">

                    <thead>
                        <tr>
                            <th scope="col" style="width: 100px">#</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Attribué à</th>
                            <th scope="col">Date d'échéance</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tach_body">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<!-- Modal tache -->
<div id="tachmodale" class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <form class="custom-validation" method="POST" action="ajout_taches.php">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un tâche</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="tach_titre">Titre</label>
                        <input type="text" class="form-control" id="tach_titre" name="tach_titre">
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tach_user">Attribué à</label>
                                <select id="tach_user" name="tach_user" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tach_echeance">Date d'échéance</label>
                                <input type="date" id="tach_echeance" name="tach_echeance" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tach_status">Statut</label>
                                <select id="tach_status" name="tach_status" class="form-control">
                                    <option selected>...</option>
                                    <option>En attente</option>
                                    <option>En attente</option>
                                    <option>En attente</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tach_description">Description</label>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <textarea name="tach_description" id="tach_description" rows="5" style="width:100%;"></textarea>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-success" id="tach_save">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
