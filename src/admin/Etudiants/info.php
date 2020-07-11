<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$id = $_GET["cin"];
$info = getInfos($id);
?>
<div class="modal-body">
    <div class="container">
        <div class="row">
            <div class="col col-sm-3">
                <div class="form-group d-flex justify-content-center">
                    <div class="image img-cir img-120">
                        <img src="../../../img/profiles/<?php echo $info->imagepath; ?>" />
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <div class="form-group">
                        <h4 class="text" style="text-align: center"><?php echo '<b>' . strtoupper($info->nom) . ' ' . $info->prenom . '</b>' ?></h4>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-top: 40px">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            Cne: <?php echo '<b>' . $info->cne . '</b>'; ?>
                        </div>
                    </div>
                    <div class="col ">
                        <div class="form-group float-left">
                            Cin: <?php echo '<b>' . $info->id . '</b>'; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            Date Naissance: <?php echo '<b>' . $info->date_naissance . '</b>'; ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            Telephone: <?php echo '<b>' . $info->telephone . '</b>'; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            Filière: <?php echo '<b>' . $info->nom_filiere . '</b>'; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php if (ActiveCompte::isAlreadyActivated($info->id)) { ?>
                        <div class="col">
                            <div class="form-group">
                                Email: <?php echo '<b>' . $info->email . '</b>'; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer d-flex justify-content-between">
    <?php
    if (!ActiveCompte::isAlreadyActivated($info->id)) { ?>
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
