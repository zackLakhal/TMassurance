<button type="button" name="action" id="creat_tache" class="btn btn-warning btn-sm btn-rounded waves-effect waves-light mb-3" >Ajouter une Tâche</button>
<div class="row" id="tach_body">
    
</div>
<!-- end row -->

<!-- Modal tache -->
<div id="tachmodale" class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            
                <div class="modal-header" id="tach_head">
                </div>
                <div class="modal-body">

                    <div class="form-group" id="err-tach_titre">
                        <label for="tach_titre">Titre</label>
                        <input type="text" class="form-control" id="tach_titre" name="tach_titre" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" id="err-tach_echeance">
                                <label for="tach_echeance">Date d'échéance</label>
                                <input type="date" id="tach_echeance" name="tach_echeance" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-6" id="statut_tach" >
                            <div class="form-group">
                                <label for="tach_status">Statut</label>
                                <select id="tach_status" name="tach_status" class="form-control">
                                    <option selected>En cours</option>
                                    <option>Terminée</option>
                                    <option>Expirée</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="err-tach_description">
                            <label for="tach_description">Description</label>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <textarea name="tach_description" id="tach_description" rows="5" style="width:100%;" required></textarea>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                    </div>

                </div>
                <div class="modal-footer" id="tach_footer">
                    
                </div>
           
        </div>
    </div>
</div>
