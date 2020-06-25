<?php
include_once '../../../fonctions/tools.function.php';
include_once '../../../core/init.php';
$id = $_GET["cin"];

$allInfos =getPersonInfo($id);
?>
<div class="modal fade teacherInfo" tabindex="-1" role="dialog" aria-labelledby="teacherInfoLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content" style="background: linear-gradient(232deg, rgba(226,231,238,1) 60%, rgba(148,172,181,1) 97%);">
            <div class="modal-header">
                <h5 class="modal-title" id="teacherInfoLabel">
                    Compte: <?php
                            if (ActiveCompte::isAlreadyActivated($allInfos->id)) { ?>
                        <span class="role member">Activé</span>
                    <?php
                            } else {
                    ?>
                        <span class="role admin">Desactive</span>
                    <?php

                            }
                    ?>
                </h5>
                <button type="button" class="close " id="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div class="container"> -->
                <!-- <div class="container rounded text-white" style="background-color: #393939; width: 70%"> -->
                <br>
                <div class="account d-flex justify-content-center">
                    <div class="image img-cir img-120">
                        <img src="../../../img/profiles/<?php echo $allInfos->imagepath; ?>" />
                    </div>
                </div>
                <br>
                <div class="row d-flex justify-content-center">
                    <div class="form-group">
                        <h4 class="text"><?php echo '<b>' . strtoupper($allInfos->nom) . ' ' . $allInfos->prenom . '</b>' ?></h4>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                SOM: 
                                <?php $pers = getPersonnelInfo($id); echo '<b>' .  $pers->first()->som . '</b>'; ?>
                            </div>
                        </div>
                        <div class="col ">
                            <div class="form-group float-left">
                                Cin: <?php echo '<b>' . $allInfos->id . '</b>'; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                Date Naissance: <?php echo '<b>' . $allInfos->date_naissance . '</b>'; ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                Telephone: <?php echo '<b>' . $allInfos->telephone . '</b>'; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php if (ActiveCompte::isAlreadyActivated($allInfos->id)) { ?>
                            <div class="col">
                                <div class="form-group">
                                    Email: <?php echo '<b>' . $allInfos->email . '</b>'; ?>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="col">
                            <div class="form-group">
                                Role: <?php $pers = getPersonnelInfo($id); echo '<b>' . ucfirst($pers->first()->role) . '</b>'; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <!-- </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>