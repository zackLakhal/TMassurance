<button type="button" id="creat_note" class="btn btn-warning btn-sm btn-rounded waves-effect waves-light mb-3" >Ajouter une note</button>

<div class="row" id="note_body">
    
</div>
<!-- end row -->

<!-- modal-notes -->
<div class="modal fade" id="notemodale" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" id="note_head">
                
            </div>
            <div class="modal-body">
                <div class="form-group" id="err-note_titre">
                    <label for="note_titre">Titre</label>
                    <input type="text" class="form-control" id="note_titre" name="note_titre" required>
                </div>
                <div class="row">

                    <div class="form-group" id="err-note_description">
                        <label for="note_description">Description</label>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <textarea name="note_description" id="note_description" rows="5" style="width:100%;" required></textarea>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="note_footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->