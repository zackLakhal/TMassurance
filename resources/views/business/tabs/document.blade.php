<style>
    .files input {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        padding: 120px 0px 85px 35%;
        text-align: center !important;
        margin: 0;
        width: 100% !important;
    }

    .files input:focus {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        border: 1px solid #92b0b3;
    }

    .files {
        position: relative
    }

    .files:after {
        pointer-events: none;
        position: absolute;
        top: 60px;
        left: 0;
        width: 50px;
        right: 0;
        height: 56px;
        content: "";
        background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
        display: block;
        margin: 0 auto;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    .color input {
        background-color: #f1f1f1;
    }

    .files:before {
        position: absolute;
        bottom: 10px;
        left: 0;
        pointer-events: none;
        width: 100%;
        right: 0;
        height: 57px;
        content: " ou Drag and drop ici ";
        display: block;
        margin: 0 auto;
        color: #2ea591;
        font-weight: 600;
        text-transform: capitalize;
        text-align: center;
    }
</style>
<div class="row">
    <div class="col-md-4"></div>
    <div class="btn-group btn-group-lg col-md-4">
        <button id="creat_doc" type="button" class="btn btn-success btn-lg  waves-effect waves-light" >Ajouter un fichier</button>
    </div>
    <div class="col-md-4"></div>
</div>
<div class=" row">
    <div class="col-lg-12">
        <div class="">
            <div class="table-responsive">
                <table id="doc_datatable" class="table text-center table-bordered dt-responsive  nowrap w-100">

                    <thead class="table-light">
                        <tr>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Taille</th>
                            <th>Date de création</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody id='doc_bodytab'>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal-notes -->
<div class="modal fade" id="docmodale" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" id="ndoc_head">
                <h5>Ajouter un ficher</h5>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group files">
                                    <label>Upload fichier </label>
                                    <input type="file" id="doc_file" name="doc_file" class="form-control" multiple="">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <div class="form-group" id="err-doc_type">
                    <label for="doc_type" class="control-label"><b>Type:</b></label>
                    <select class="form-control " name="doc_type" id="doc_type">
                    <option selected >pdf</option>
                    <option>image</option>
                    <option>word</option>
                    <option>excel</option>
                    <option>html</option>
                    <option>css</option>
                    <option>javascript</option>
                    <option>autre</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer" id="ndoc_footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-success" id="doc_save">Enregistrer</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->