<?php
include_once '../../../fonctions/tools.function.php';
include_once '../../../core/init.php';
$id = $_GET["cin"];

$allInfos = getPersonInfo($id);
?>
<div class="modal-body">
    <div class="account d-flex justify-content-center">
        <div class="image img-cir img-120">
            <img src="../../../img/profiles/<?php echo $allInfos->imagepath; ?>" />
        </div>
    </div>
    <br>
    <div class="row d-flex justify-content-center">
        <div class="form-group">
            <h4 class="text"><?php echo '<b>'.strtoupper($allInfos->nom).' '.$allInfos->prenom.'</b>' ?></h4>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    Numéro de SOM: 
                    <?php $pers = getPersonnelInfo($id); echo '<b>'.$pers->first()->som.'</b>'; ?>
                </div>
            </div>
            <div class="col ">
                <div class="form-group float-left">
                    Cin: <?php echo '<b>'.$allInfos->id.'</b>'; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    Date Naissance: <?php echo '<b>'.$allInfos->date_naissance.'</b>'; ?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    Telephone: <?php echo '<b>'.$allInfos->telephone.'</b>'; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if (ActiveCompte::isAlreadyActivated($allInfos->id)) { ?>
                <div class="col">
                    <div class="form-group">
                        Email: <?php echo '<b>'.$allInfos->email.'</b>'; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="modal-footer d-flex justify-content-between">
    <?php
        if (!ActiveCompte::isAlreadyActivated($allInfos->id)) { ?>
            <span style="color: red">*Compte pas encore activé.</span>
    <?php
        } else {
    ?>
            <span></span>
    <?php
        }
    ?>
        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Close</button>
    </div>