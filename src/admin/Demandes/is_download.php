<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';

//===================================================================================
$type = "";
$type_ = $_GET["type"];
$cin = $_GET["cin"];
switch ($type_) {
    case "un relevé de notes":
        $type = "releve";
        break;
    case "une attestation de scolarité":
        $type = "attestation";
        break;
    case "une autorisation de stage":
        $type = "stage";
        break;
    case "une attestation de réussite":
        $type = "attestationR";
        break;
}
//===================================================================================

?>

<div class="row">
    <div class="col-md-12">
        <div class="md-form mb-3">
            <?php
            if (demandeCheck($cin, $type, 2)) {
                $info=getPersonInfo($cin)
            ?>
                <div class="alert alert-warning" role="alert" style="text-align: center;">
                    <?php echo  strtoupper($info->nom .' '.$info->prenom );?> est deja telecharge <?php echo $type_; ?>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-success" role="alert" style="text-align: center;">
                    C'est la premier fois pour cette etudiant
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php if ($type == 'releve') { ?>
    <div class="row code_Acce">
        <div class="col-md-12">
            <div class="md-form mb-1" style="text-align: center;">
                <a href="../Notes/" class="btn btn-outline-dark " role="button" aria-pressed="true">Avoir le relevt de note</a>
            </div>
        </div>
    <?php } ?>