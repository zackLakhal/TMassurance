

@extends('layouts.appback')

@section('content')
<?php
ob_start();
?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="chat-leftsidebar-nav  ">
                    <ul class="nav nav-pills bg-light ">
                        <li class="nav-item">

                            <a href="#sante" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                <i class="bx bx-chat  fa fa-heartbeatfont-size-20 d-sm-none"></i>



                                <span class="d-none d-sm-block"> <span class="fa fa-heartbeat"></span> &nbsp Mutuelle individuelle</span>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="#obs" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="bx bx-group font-size-20 d-sm-none"></i>
                                <span class="d-none d-sm-block"><span class="fa fa-cloud"></span>&nbsp Assurance obséques</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#gav" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="bx bx-book-content font-size-20 d-sm-none"></i>
                                <span class="d-none d-sm-block"><span class="fas fa-user-injured"></span> &nbsp Garantie accident de la vie</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#dep" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="bx bx-book-content font-size-20 d-sm-none"></i>
                                <span class="d-none d-sm-block"><span class="fa fa-wheelchair"></span>&nbsp Dépendance</span>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="#ijh" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="bx bx-book-content font-size-20 d-sm-none"></i>
                                <span class="d-none d-sm-block"><span class="far fa-hospital"></span> &nbsp Indemnités journaliéres Hospitaliéres</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content pt-1 ">
                        <div class="tab-pane show active" id="sante">
                            <div id="produit_sante" class="row" style="margin-left:1px;margin-right:-1px">

                                <div class=" col-lg-5 bg-primary">

                                    hhh

                                </div>
                                <div class=" col-lg-7 ">

                                    <div class="row">
                                        <div class="col-lg-6 bg-warning">


                                            <div style="border-bottom:1px solid lightgrey ;margin-left:-12px;margin-right:-12px">
                                                <h5><i class="fa fa-shopping-cart "> Panier Prouit</i></h5>
                                            </div>


                                        </div>

                                        <div class="col-lg-6 bg-success">ffff</div>

                                    </div>
                                </div>
                            </div>


                            <div style="box-shadow: 10px 10px 5px red;" class="shadow-lg p-3 mb-3 rounded" style="border-radius:7px">
                                <h5 class="font-size-15 mb-3" style=" text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"> Filtre /Compagnies</h5>
                                <div class="d-flex" id="choices">




                                    <div class="custom-control custom-checkbox custom-checkbox-outline custom-checkbox-primary  mt-2 mr-3">

                                        <!--custom-checkbox-outline custom-checkbox-primary-->
                                        <input type="checkbox" class="custom-control-input active" onclick="filterSelection('all')" id="tc" name="tc" value="toutes">
                                        <label class="custom-control-label" for="tc">toutes les compagnies</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-checkbox-outline custom-checkbox-primary mt-2 mr-3">


                                        <input type="checkbox" class="custom-control-input" onclick="filterSelection('NEOLIANE INITIAL PLUS')" id="nip" name="nip" value="NEOLIANE INITIAL PLUS">
                                        <label class="custom-control-label" for="nip">NEOLIANE
                                        </label>

                                    </div>



                                </div>
                                <!-- <div class="d-flex">
											 <div class="custom-control custom-checkbox mt-2  mr-3">
                                                <input type="checkbox" class="custom-control-input">
                                                <label class="custom-control-label" for="productdiscountCheck1">Less than 10%</label>
                                            </div>
											 </div>-->


                            </div>
                            <div style="padding-left:7px">
                                <!--sante hidden-->
                                <input type="hidden" value="" name="compt" id="compt">

                                <input type="hidden" value="0" name="pas" id="pas">
                                <div class="row " id="row1">

                                    <div class="col-lg-3 bg-light " style="border-radius:7px;border:solid 2px white;">
                                        <div style="text-align:center" class="pt-5">
                                            <p style="font-size:18px;">Page</p>
                                            <ul class="pagination pagination-rounded justify-content-center mt-4">
                                                <li class="page-item ">
                                                    <a href="#" id="suiv" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item">
                                                    <div class="font-size-16 m-1 d-flex">
                                                        <p id="nbcomp">1</p>
                                                        <p>/</p>
                                                        <p id="nb"></p>
                                                    </div>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" id="suiv_s" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                            <a href="#" data-toggle="modal" data-target=".bs-example-modal-center">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="fas fa-list"></i> &nbsp AFFINER LES RESULTATS</p>
                                            </a>
                                            <a href="devis_pdf.php">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="fa fa-trophy"></i> &nbsp COMPARER LES FORMULES</p>
                                            </a>
                                            <a href="envoyer_devis.php">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="mdi mdi-email-check-outline mr-2"></i> &nbsp Envoyer </p>
                                            </a>

                                        </div>
                                        <div style="padding:4px;border-top:solid 1px lightgrey;border-bottom:solid 1px lightgrey;margin-top:102px;margin-left:-12px;margin-right:-12px;">
                                            Hospitalisation
                                        </div>
                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p style="color:#4169E1;font-size:12px;font-weight:bold" class="modal-title mt-0" id="exampleModalScrollableTitle"><i class="fas fa-list"></i> &nbsp AFFINER LES RESULTATS</p>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="font-size:12px;font-weight:bold">€ Budget Maximum</p>
                                                        <p> De 5 a 300+ €</p>

                                                        <input type="range" min="5" class="form-control-range" id="formControlRange">

                                                        <label class="form-label" for="customRange2">Example range</label>
                                                        <div class="range">
                                                            <input type="range" class="form-range" min="0" max="5" id="customRange2" />
                                                        </div>
                                                        <div class="slider-price d-flex align-items-center my-4">
                                                            <span class="font-weight-normal small text-muted mr-2">$0</span>
                                                            <form class="multi-range-field w-100 mb-1">
                                                                <input id="multi" class="multi-range" type="range" />
                                                            </form>
                                                            <span class="font-weight-normal small text-muted ml-2">$100</span>
                                                        </div>


                                                    </div>


                                                    <div class="modal-footer d-flex">
                                                        <div> <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermé</button></div>
                                                        <div> <button type="button" class="btn btn-primary">Terminé</button></div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


                                    </div>






                                    <!--fin-->
                                </div>
                            </div>


                        </div>




                        <div class="tab-pane" id="obs">
                            <input type="hidden" value="" name="compt_obs" id="compt_obs">

                            <input type="hidden" value="" name="pas_obs" id="pas_obs">
                            <div style="box-shadow: 10px 10px 5px red;" class="shadow-lg p-3 mb-3 rounded" style="border-radius:7px">
                                <h5 class="font-size-15 mb-3" style=" text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"> Filtre /Compagnies</h5>
                                <div class="d-flex" id="choicesob">
                                    <div class="custom-control custom-checkbox custom-checkbox-outline custom-checkbox-primary  mt-2 mr-3">

                                        <!--custom-checkbox-outline custom-checkbox-primary-->
                                        <input type="checkbox" class="custom-control-input active" onclick="filterSelection('all')" id="tcomp" name="tcomp" value="">
                                        <label class="custom-control-label" for="tcomp"> Toutes les compagnies</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-checkbox-outline custom-checkbox-primary mt-2 mr-3">
                                        <input type="checkbox" class="custom-control-input" onclick="filterSelection('NEOLIANE INITIAL PLUS')" id="nob" name="nob" value="Néoliane Obsèques">
                                        <label class="custom-control-label" for="nob">Néoliane</label>

                                    </div>
                                </div>

                            </div>
                            <div style="padding-left:7px">

                                <div class="row " id="row_obs">

                                    <div class="col-lg-3 bg-light " style="border-radius:7px;border:solid 2px white;">
                                        <div style="text-align:center" class="pt-5">
                                            <p style="font-size:18px;">Page</p>
                                            <ul class="pagination pagination-rounded justify-content-center mt-4">
                                                <li class="page-item ">
                                                    <a href="#" id="prec_obs" onclick="prec()" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item">
                                                    <div class="font-size-16 m-1 d-flex">
                                                        <p id="nbcomp_obs">1</p>
                                                        <p>/</p>
                                                        <p id="nb_obs"></p>
                                                    </div>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" id="suiv_obs" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                            <a href="#" data-toggle="modal" data-target=".bs-example-modal-center">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="fas fa-list"></i> &nbsp AFFINER LES RESULTATS</p>
                                            </a>
                                            <a href="devis_pdf.php">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="fa fa-trophy"></i> &nbsp COMPARER LES FORMULES</p>
                                            </a>
                                            <a href="envoyer_devis.php">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="mdi mdi-email-check-outline mr-2"></i> &nbsp Envoyer </p>
                                            </a>

                                        </div>
                                        <div style="padding:4px;border-top:solid 1px lightgrey;border-bottom:solid 1px lightgrey;margin-top:102px;margin-left:-12px;margin-right:-12px;">
                                            Hospitalisation
                                        </div>

                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p style="color:#4169E1;font-size:12px;font-weight:bold" class="modal-title mt-0" id="exampleModalScrollableTitle"><i class="fas fa-list"></i> &nbsp AFFINER LES RESULTATS</p>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="font-size:12px;font-weight:bold">€ Budget Maximum</p>
                                                        <p> De 5 a 300+ €</p>

                                                        <input type="range" min="5" class="form-control-range" id="formControlRange">

                                                        <label class="form-label" for="customRange2">Example range</label>
                                                        <div class="range">
                                                            <input type="range" class="form-range" min="0" max="5" id="customRange2" />
                                                        </div>
                                                        <div class="slider-price d-flex align-items-center my-4">
                                                            <span class="font-weight-normal small text-muted mr-2">$0</span>
                                                            <form class="multi-range-field w-100 mb-1">
                                                                <input id="multi" class="multi-range" type="range" />
                                                            </form>
                                                            <span class="font-weight-normal small text-muted ml-2">$100</span>
                                                        </div>


                                                    </div>


                                                    <div class="modal-footer d-flex">
                                                        <div> <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermé</button></div>
                                                        <div> <button type="button" class="btn btn-primary">Terminé</button></div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


                                    </div>






                                    <!--fin-->
                                </div>
                            </div>



                        </div>

                        <div class="tab-pane" id="gav">
                            <input type="hidden" value="" name="compt_gav" id="compt_gav">

                            <input type="hidden" value="" name="pas_gav" id="pas_gav">
                            <div style="box-shadow: 10px 10px 5px red;" class="shadow-lg p-3 mb-3 rounded" style="border-radius:7px">
                                <h5 class="font-size-15 mb-3" style=" text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"> Filtre /Compagnies</h5>
                                <div class="d-flex" id="choicesob">
                                    <div class="custom-control custom-checkbox custom-checkbox-outline custom-checkbox-primary  mt-2 mr-3">

                                        <!--custom-checkbox-outline custom-checkbox-primary-->
                                        <input type="checkbox" class="custom-control-input active" onclick="filterSelection('all')" id="tcomp" name="tcomp" value="toutes">
                                        <label class="custom-control-label" for="tcomp">toutes les compagnies</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-checkbox-outline custom-checkbox-primary mt-2 mr-3">
                                        <input type="checkbox" class="custom-control-input" onclick="filterSelection('NEOLIANE INITIAL PLUS')" id="ng" name="ng" value="Neoliane GAV">
                                        <label class="custom-control-label" for="ng">Neoliane</label>

                                    </div>
                                </div>

                            </div>
                            <div style="padding-left:7px">

                                <div class="row " id="row_gav">

                                    <div class="col-lg-3 bg-light " style="border-radius:7px;border:solid 2px white;">
                                        <div style="text-align:center" class="pt-5">
                                            <p style="font-size:18px;">Page</p>
                                            <ul class="pagination pagination-rounded justify-content-center mt-4">
                                                <li class="page-item ">
                                                    <a href="#" id="prec_gav" onclick="prec()" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item">
                                                    <div class="font-size-16 m-1 d-flex">
                                                        <p id="nbcomp_gav">1</p>
                                                        <p>/</p>
                                                        <p id="nb_gav"></p>
                                                    </div>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" id="suiv_gav" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                            <a href="#" data-toggle="modal" data-target=".bs-example-modal-center">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="fas fa-list"></i> &nbsp AFFINER LES RESULTATS</p>
                                            </a>
                                            <a href="devis_pdf.php">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="fa fa-trophy"></i> &nbsp COMPARER LES FORMULES</p>
                                            </a>
                                            <a href="envoyer_devis.php">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="mdi mdi-email-check-outline mr-2"></i> &nbsp Envoyer </p>
                                            </a>
                                        </div>
                                        <div style="padding:4px;border-top:solid 1px lightgrey;border-bottom:solid 1px lightgrey;margin-top:102px;margin-left:-12px;margin-right:-12px;">
                                            Hospitalisation
                                        </div>
                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p style="color:#4169E1;font-size:12px;font-weight:bold" class="modal-title mt-0" id="exampleModalScrollableTitle"><i class="fas fa-list"></i> &nbsp AFFINER LES RESULTATS</p>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="font-size:12px;font-weight:bold">€ Budget Maximum</p>
                                                        <p> De 5 a 300+ €</p>

                                                        <input type="range" min="5" class="form-control-range" id="formControlRange">

                                                        <label class="form-label" for="customRange2">Example range</label>
                                                        <div class="range">
                                                            <input type="range" class="form-range" min="0" max="5" id="customRange2" />
                                                        </div>
                                                        <div class="slider-price d-flex align-items-center my-4">
                                                            <span class="font-weight-normal small text-muted mr-2">$0</span>
                                                            <form class="multi-range-field w-100 mb-1">
                                                                <input id="multi" class="multi-range" type="range" />
                                                            </form>
                                                            <span class="font-weight-normal small text-muted ml-2">$100</span>
                                                        </div>


                                                    </div>


                                                    <div class="modal-footer d-flex">
                                                        <div> <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermé</button></div>
                                                        <div> <button type="button" class="btn btn-primary">Terminé</button></div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


                                    </div>






                                    <!--fin-->
                                </div>
                            </div>



                        </div>

                        <div class="tab-pane" id="dep">
                            <div style="box-shadow: 10px 10px 5px red;" class="shadow-lg p-3 mb-3 rounded" style="border-radius:7px">
                                <h5 class="font-size-15 mb-3" style=" text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"> Filtre /Compagnies</h5>
                                <div class="d-flex" id="choicesob">
                                    <div class="custom-control custom-checkbox custom-checkbox-outline custom-checkbox-primary  mt-2 mr-3">

                                        <!--custom-checkbox-outline custom-checkbox-primary-->
                                        <input type="checkbox" class="custom-control-input active" onclick="filterSelection('all')" id="tcomp" name="tcomp" value="toutes">
                                        <label class="custom-control-label" for="tcomp">toutes les compagnies</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-checkbox-outline custom-checkbox-primary mt-2 mr-3">
                                        <input type="checkbox" class="custom-control-input" onclick="filterSelection('NEOLIANE INITIAL PLUS')" id="ndep" name="ndep" value="NEOLIANE">
                                        <label class="custom-control-label" for="ndep">NEOLIANE</label>

                                    </div>
                                </div>

                            </div>
                            <div style="padding-left:7px">

                                <div class="row " id="row_dep">

                                    <div class="col-lg-3 bg-light " style="border-radius:7px;border:solid 2px white;">
                                        <div style="text-align:center" class="pt-5">
                                            <p style="font-size:18px;">Page</p>
                                            <ul class="pagination pagination-rounded justify-content-center mt-4">
                                                <li class="page-item ">
                                                    <a href="#" id="prec2" onclick="prec()" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item">
                                                    <div class="font-size-16 m-1 d-flex">
                                                        <p id="nbcomp_dep">1</p>
                                                        <p>/</p>
                                                        <p id="nb_dep"></p>
                                                    </div>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                            <a href="#" data-toggle="modal" data-target=".bs-example-modal-center">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="fas fa-list"></i> &nbsp AFFINER LES RESULTATS</p>
                                            </a>
                                            <a href="devis_pdf.php">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="fa fa-trophy"></i> &nbsp COMPARER LES FORMULES</p>
                                            </a>
                                            <a href="envoyer_devis.php">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="mdi mdi-email-check-outline mr-2"></i> &nbsp Envoyer </p>
                                            </a>

                                        </div>
                                        <div style="padding:4px;border-top:solid 1px lightgrey;border-bottom:solid 1px lightgrey;margin-top:102px;margin-left:-12px;margin-right:-12px;">
                                            Hospitalisation
                                        </div>

                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p style="color:#4169E1;font-size:12px;font-weight:bold" class="modal-title mt-0" id="exampleModalScrollableTitle"><i class="fas fa-list"></i> &nbsp AFFINER LES RESULTATS</p>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="font-size:12px;font-weight:bold">€ Budget Maximum</p>
                                                        <p> De 5 a 300+ €</p>

                                                        <input type="range" min="5" class="form-control-range" id="formControlRange">

                                                        <label class="form-label" for="customRange2">Example range</label>
                                                        <div class="range">
                                                            <input type="range" class="form-range" min="0" max="5" id="customRange2" />
                                                        </div>
                                                        <div class="slider-price d-flex align-items-center my-4">
                                                            <span class="font-weight-normal small text-muted mr-2">$0</span>
                                                            <form class="multi-range-field w-100 mb-1">
                                                                <input id="multi" class="multi-range" type="range" />
                                                            </form>
                                                            <span class="font-weight-normal small text-muted ml-2">$100</span>
                                                        </div>


                                                    </div>


                                                    <div class="modal-footer d-flex">
                                                        <div> <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermé</button></div>
                                                        <div> <button type="button" class="btn btn-primary">Terminé</button></div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


                                    </div>






                                    <!--fin-->
                                </div>
                            </div>



                        </div>


                        <div class="tab-pane" id="ijh">
                            <input type="hidden" value="" name="compt_ijh" id="compt_ijh">

                            <input type="hidden" value="" name="pas_ijh" id="pas_ijh">

                            <div style="box-shadow: 10px 10px 5px red;" class="shadow-lg p-3 mb-3 rounded" style="border-radius:7px">
                                <h5 class="font-size-15 mb-3" style=" text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"> Filtre /Compagnies</h5>
                                <div class="d-flex" id="choicesob">
                                    <div class="custom-control custom-checkbox custom-checkbox-outline custom-checkbox-primary  mt-2 mr-3">

                                        <!--custom-checkbox-outline custom-checkbox-primary-->
                                        <input type="checkbox" class="custom-control-input active" onclick="filterSelection('all')" id="tcomp" name="tcomp" value="toutes">
                                        <label class="custom-control-label" for="tcomp">toutes les compagnies</label>
                                    </div>

                                    <div class="custom-control custom-checkbox custom-checkbox-outline custom-checkbox-primary mt-2 mr-3">
                                        <input type="checkbox" class="custom-control-input" onclick="filterSelection('NEOLIANE INITIAL PLUS')" id="nspip" name="nspip" value="NEOLIANE SANTE ET PREVOYANCE IJH (P)">
                                        <label class="custom-control-label" for="nspip">NEOLIANE</label>

                                    </div>







                                </div>

                            </div>
                            <div style="padding-left:7px">

                                <div class="row " id="row_ijh">

                                    <div class="col-lg-3 bg-light " style="border-radius:7px;border:solid 2px white;">
                                        <div style="text-align:center" class="pt-5">
                                            <p style="font-size:18px;">Page</p>
                                            <ul class="pagination pagination-rounded justify-content-center mt-4">
                                                <li class="page-item ">
                                                    <a href="#" id="prec_ijh" onclick="prec()" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item">
                                                    <div class="font-size-16 m-1 d-flex">
                                                        <p id="nbcomp_ijh">1</p>
                                                        <p>/</p>
                                                        <p id="nb_ijh"></p>
                                                    </div>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" id="suiv_ijh" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                            <a href="#" data-toggle="modal" data-target=".bs-example-modal-center">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="fas fa-list"></i> &nbsp AFFINER LES RESULTATS</p>
                                            </a>
                                            <a href="devis_pdf.php">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="fa fa-trophy"></i> &nbsp COMPARER LES FORMULES</p>
                                            </a>
                                            <a href="envoyer_devis.php">
                                                <p style="color:#4169E1;font-size:12px;font-weight:bold"><i class="mdi mdi-email-check-outline mr-2"></i> &nbsp Envoyer </p>
                                            </a>

                                        </div>
                                        <div style="padding:4px;border-top:solid 1px lightgrey;border-bottom:solid 1px lightgrey;margin-top:102px;margin-left:-12px;margin-right:-12px;">
                                            Hospitalisation
                                        </div>
                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p style="color:#4169E1;font-size:12px;font-weight:bold" class="modal-title mt-0" id="exampleModalScrollableTitle"><i class="fas fa-list"></i> &nbsp AFFINER LES RESULTATS</p>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="font-size:12px;font-weight:bold">€ Budget Maximum</p>
                                                        <p> De 5 a 300+ €</p>

                                                        <input type="range" min="5" class="form-control-range" id="formControlRange">

                                                        <label class="form-label" for="customRange2">Example range</label>
                                                        <div class="range">
                                                            <input type="range" class="form-range" min="0" max="5" id="customRange2" />
                                                        </div>
                                                        <input type="hidden" id="nbload" value="0">
                                                        <div class="slider-price d-flex align-items-center my-4">
                                                            <span class="font-weight-normal small text-muted mr-2">$0</span>
                                                            <form class="multi-range-field w-100 mb-1">
                                                                <input id="multi" class="multi-range" type="range" />
                                                            </form>
                                                            <span class="font-weight-normal small text-muted ml-2">$100</span>
                                                        </div>


                                                    </div>


                                                    <div class="modal-footer d-flex">
                                                        <div> <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermé</button></div>
                                                        <div> <button type="button" class="btn btn-primary">Terminé</button></div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


                                    </div>






                                    <!--fin-->
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?php
$curl = curl_init();

$baseUrl = "http://wstarifs.neoliane.fr";
$api = "/price";

$requestPayload = array(
    "login" => "nr2259@neoliane.fr",
    "password" => "8bbe2b4d61289e5a987d46d93f8d8283abce3235b8df7c4fb06f312acd277d55",
    "producttype" => "sante",
    "adhesiondate" => "25/01/2021",
    "effectdate" => "02/02/2021",
    "postalcode" => "7000",
    "birthdate_adult1" => "10/01/1993",
    "regime_adult1" => "SS"
);


function post($baseUrl, $api, $method, $requestPayload, $vheader)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "$baseUrl$api");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_ENCODING, "");
    curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "$method");
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestPayload));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $vheader);
    $responseBody = curl_exec($curl);
    return $responseBody;
}

$vheader = array("accept:application/json", "content-type:application/json");

$response = post($baseUrl, $api, "POST", $requestPayload, $vheader);
$requestPayload['producttype'] = 'gav';

$res_gav = post($baseUrl, $api, "POST", $requestPayload, $vheader);
$requestPayload['producttype'] = 'obseques';
$res_obs = post($baseUrl, $api, "POST", $requestPayload, $vheader);
$requestPayload['producttype'] = 'ijh';
$res_ijh = post($baseUrl, $api, "POST", $requestPayload, $vheader);
// echo $res_gav;

$content = ob_get_clean();


?>



<!-- Modal -->
<div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comparer les formules</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="table-responsive">
                    <table class="table table-centered table-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Hospitalisation non spécialisé(secteur conventionné)</th>
                                <th scope="col"> <i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></th>
                                <th scope="col"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></th>
                                <th scope="col"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Honoraires (DPTAM)</h5>
                                    </div>
                                </th>
                                <td>100%</td>
                                <td>300%</td>
                                <td>150%</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Honoraires (hors DPTAM)</h5>
                                    </div>
                                </th>
                                <td>100%</td>
                                <td>300%</td>
                                <td>150%</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Frais de séjour(etab conv)</h5>
                                    </div>
                                </th>
                                <td>Frais reéls</td>
                                <td>Frais reéls</td>
                                <td>Frais reéls</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Forfait journalier hospitalier</h5>
                                    </div>
                                </th>
                                <td>Frais reéls</td>
                                <td>Frais reéls</td>
                                <td>Frais reéls</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Chambre particuliére(maladie,chirurgie)</h5>
                                    </div>
                                </th>
                                <td>-</td>
                                <td>75£/jour</td>
                                <td>40£/jour</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Frais accompagnant</h5>
                                    </div>
                                </th>
                                <td>-</td>
                                <td>15£/jour</td>
                                <td>15£/jour</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Cobfort hospitalier</h5>
                                    </div>
                                </th>
                                <td>-</td>
                                <td>-</td>
                                <td>5£/jour</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Hospitalisation à domicile</h5>
                                    </div>
                                </th>
                                <td>100%</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Transport remboursé</h5>
                                    </div>
                                </th>
                                <td>100%</td>
                                <td>-</td>
                                <td>100%</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Médicine courante</h5>
                                    </div>
                                </th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Dentaire</h5>
                                    </div>
                                </th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Optique</h5>
                                    </div>
                                </th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Prothése médicales-auditives</h5>
                                    </div>
                                </th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Prévention-Bien-étre</h5>
                                    </div>
                                </th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Garantie complémentaires</h5>
                                    </div>
                                </th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Services +</h5>
                                    </div>
                                </th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Assistance</h5>
                                    </div>
                                </th>
                                <td>-</td>
                                <td>OUI</td>
                                <td>OUI</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Ratios compagnie</h5>
                                    </div>
                                </th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Taux de frais de gestion</h5>
                                    </div>
                                </th>
                                <td>29.20%</td>
                                <td>26.15%</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <h5 class="text-truncate font-size-14">Taux de redistribution</h5>
                                    </div>
                                </th>
                                <td>67.60%</td>
                                <td>66.16%</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermé</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


<script>
    var res_gav = <?php echo $res_gav; ?>;
    var res_obs = <?php echo $res_obs; ?>;
    var res_ijh = <?php echo $res_ijh; ?>;
    var response = <?php echo $response; ?>;

    //document.getElementById("nb").innerHTML=response.value.length;
    var l = response.value.length;
    var l_gav = res_gav.value.length;
    var l_obs = res_obs.value.length;
    var l_ijh = res_ijh.value.length;
    var res = 0;

    var nbp = calc_nb_pg(l);
    document.getElementById("nb").innerHTML = nbp;
    var nbp_gav = calc_nb_pg(l_gav);
    document.getElementById("nb_gav").innerHTML = nbp_gav;
    var nbp_ijh = calc_nb_pg(l_ijh);
    document.getElementById("nb_ijh").innerHTML = nbp_ijh;
    var nbp_obs = calc_nb_pg(l_obs);
    document.getElementById("nb_obs").innerHTML = nbp_obs;
    document.getElementById("compt").value = nbp;
    document.getElementById("compt_gav").value = nbp_gav;
    document.getElementById("compt_ijh").value = nbp_ijh;
    document.getElementById("compt_obs").value = nbp_obs;


    var pas = 0;
    var compt = nbp;

    var ids_cost = "ids_cost";
    var ids_lab = "ids_lab";
    var idobs_cost = "idobs_cost";
    var idobs_lab = "idobs_lab";
    var idijh_cost = "idijh_cost";
    var idijh_lab = "idijh_lab";
    var idgav_cost = "idgav_cost";
    var idgav_lab = "idgav_lab";

    function remp(idc, idl, compt1, pasx, res, l1, rowx, idpas, idcompt) {
        var idcost = "";
        var idlab = "";
        if (compt1 == 1) {
            var i = "";

            for (i = 0; i < l1; i++) {
                idcost = idc + i.toString();
                idlab = idl + i.toString();
                creatediv(res.value[i].gamme_label, res.value[i].montant, res.value[i].formule_label, idcost, idlab, rowx);

            }
            pasx = 0;

            document.getElementById(idpas).value = pasx;


        } else if (compt1 > 1) {

            var i = "";
            for (i = 0; i < 4; i++) {
                idcost = idc + i.toString();
                idlab = idl + i.toString();
                creatediv(res.value[i].gamme_label, res.value[i].montant, res.value[i].formule_label, idcost, idlab, rowx);

            }
            pasx = 4;

            document.getElementById(idpas).value = pasx;

        }
        compt1--;
        document.getElementById(idcompt).value = compt1;


    }


    remp(ids_cost, ids_lab, compt, pas, response, l, "row1", "pas", "compt");

    var compt_gav = nbp_gav;
    var pas_gav = 0;
    var compt_obs = nbp_obs;
    var pas_obs = "";
    var compt_ijh = nbp_ijh;
    var pas_ijh = "";
    remp(idgav_cost, idgav_lab, compt_gav, pas_gav, res_gav, l_gav, "row_gav", "pas_gav", "compt_gav");
    remp(idijh_cost, idijh_lab, compt_ijh, pas_ijh, res_ijh, l_ijh, "row_ijh", "pas_ijh", "compt_ijh");
    remp(idobs_cost, idobs_lab, compt_obs, pas_obs, res_obs, l_obs, "row_obs", "pas_obs", "compt_obs");

    var nbload = document.getElementById("nbload").value;


    $("#suiv_s").click(function() {
        // alert("ok");
        var k = document.getElementById("nbcomp").innerHTML;
        compt = document.getElementById("compt").value;
        pas = document.getElementById("pas").value;

        suiv(response, compt, pas, ids_cost, ids_lab, 'row1', l, 'suiv_s', 'compt', 'pas', k, "nbcomp");

    });


    $("#suiv_gav").click(function() {
        // alert("ok");
        var k_gav = document.getElementById("nbcomp_gav").innerHTML;
        compt = document.getElementById("compt_gav").value;
        pas = document.getElementById("pas_gav").value;

        suiv(res_gav, compt_gav, pas_gav, idgav_cost, idgav_lab, 'row_gav', l_gav, 'suiv_gav', 'compt_gav', 'pas_gav', k_gav, "nbcomp_gav");

    });


    $("#suiv_obs").click(function() {
        // alert("ok");
        var k_obs = document.getElementById("nbcomp_obs").innerHTML;
        compt_obs = document.getElementById("compt_obs").value;
        pas_obs = document.getElementById("pas_obs").value;

        suiv(res_obs, compt_obs, pas_obs, idobs_cost, idobs_lab, 'row_obs', l_obs, 'suiv_obs', 'compt_obs', 'pas_obs', k_obs, "nbcomp_obs");

    });








    $('#multi').mdbRange({
        single: {
            active: true,
            multi: {
                active: true,
                rangeLength: 1
            },
        }
    });
    // filterSelection("all");
</script>

@endsection
