
<div class="row">
    <div class="col-md-4"></div>
    <div class="btn-group btn-group-lg col-md-4">
        <button type="button" class="btn btn-success btn-lg  waves-effect waves-light" onclick="init_histo()">Actualiser l'historique</button>
    </div>
    <div class="col-md-4"></div>
</div>
<div class=" row">
    <div class="col-lg-12">
        <div class="">
            <div class="table-responsive">
                <table id="histo_dataTable" class="table text-center table-bordered dt-responsive  nowrap w-100">

                    <thead class="table-light">
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">L'action</th>
                            <th scope="col">Composante</th>
                            <th scope="col">responsable</th>
                        </tr>
                    </thead>
                    <tbody id="histo_body">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end row -->