<button type="button" id="creat_rappel" class="btn btn-warning btn-sm btn-rounded waves-effect waves-light mb-3">Ajouter un rappel</button>
<div class="row" id="rappel_body">
    
</div>

<!-- modal-notes -->
<div class="modal fade" id="rappelmodale" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" id="rappel_head">

            </div>
            <div class="modal-body">
                <div class="form-group" id="err-rappel_titre">
                    <label for="rappel_titre">Titre</label>
                    <input type="text" class="form-control" id="rappel_titre" name="rappel_titre" required>
                </div>
                <div class="form-group" id="err-rappel_date_rappel">
                    <label for="rappel_date_rappel">Date de Rappel</label>
                    <input type="date" class="form-control" id="rappel_date_rappel" name="rappel_date_rappel" required>
                </div>
                <div class="row">
                    <div class="form-group" id="err-rappel_sujet">
                        <label for="rappel_sujet">Sujet</label>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <textarea name="rappel_sujet" id="rappel_sujet" rows="5" style="width:100%;" required></textarea>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="rappel_footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->