<?php
include_once '../../../fonctions/tools.function.php';
include_once '../../../core/init.php';
$id = $_GET["id"];
$allInfos = getModuleInfos($id);
?>
<div class="modal-body">
    <div class="container">
        <div class="row">
            <div class="col col-sm-3">
                <div class="form-group d-flex justify-content-center">
                    <div class="image img-cir img-120 d-flex justify-content-center">
                        <img src="../../../img/profiles/<?php echo $allInfos->imagepath; ?>" />
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <h4 class="text"><?php echo '<b>'.strtoupper($allInfos->nom).' '.$allInfos->prenom.'</b>' ?></h4>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col ">
                        <div class="form-group float-left">
                            Module: <?php echo '<b>'.$allInfos->intitule.'</b>'; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            Heures de la semaine: <?php echo '<b>'.$allInfos->heures_sem.'</b>'; ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            Coefficients: <?php echo "<b>".$allInfos->coeff_examen."</b>(E)<b> ".$allInfos->coeff_controle."</b>(C)"; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group" >
                            Filière: <?php echo "<b>".$allInfos->nom_filiere."</b>"; ?>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group" style="text-align: center">
                        🠐 Informations sur l'enseignant:
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            CIN: <?php echo '<b>'.$allInfos->id.'</b>'; ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            Numéro de SOM: <?php echo '<b>'.$allInfos->som.'</b>'; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            Telephone: <?php echo '<b>'.$allInfos->telephone.'</b>'; ?>
                        </div>
                    </div>
                    <?php if (ActiveCompte::isAlreadyActivated($allInfos->id)) { ?>
                        <div class="col">
                            <div class="form-group">
                                Email: <?php echo '<b>'.$allInfos->email.'</b>'; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Close</button>
    </div>
</div>