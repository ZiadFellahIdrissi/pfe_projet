<?php
$fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullurl, "modifie_Avec_Succes")) {
?>
    <div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; right: 3%;  min-height: 200px; ">
        <div class="toast" style=" width:700px; background-color:#55efc4;">
            <div class="toast-header">
                <strong class="mr-auto">Modification</strong>
                <small>Just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                La <strong>Salle</strong> est modifié Avec Succes.
            </div>
        </div>
    </div>

<?php
}
if (strpos($fullurl, "ajoute_Avec_Succes")) {
?>
    <div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; right: 3%;  min-height: 200px; ">
        <div class="toast" style=" width:700px; background-color:#55efc4;">
            <div class="toast-header">
                <strong class="mr-auto">Insertion</strong>
                <small>Just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                La <strong>Salle</strong> est ajouté Avec Succes.
            </div>
        </div>
    </div>

<?php
}
if (strpos($fullurl, "dejeExist")) {
?>
    <div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; right: 3%;  min-height: 200px; ">
        <div class="toast" style=" width:700px; background-color:#d63031; color:white;">
            <div class="toast-header">
                <strong class="mr-auto">Error</strong>
                <small>Just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                La <strong>Salle</strong> est déjà existe.
            </div>
        </div>
    </div>
<?php
}
if (strpos($fullurl, "pas_autorise")) {
?>
    <div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; right: 3%;  min-height: 200px; ">
        <div class="toast" style=" width:700px; background-color:#d63031; color:white;">
            <div class="toast-header">
                <strong class="mr-auto">Error</strong>
                <small>Just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                La <strong>Salle</strong> est déjà utilisé.
            </div>
        </div>
    </div>
<?php
}
if (strpos($fullurl, "supprimie_Avec_Succes")) {
?>
<div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; right: 3%;  min-height: 200px; ">
        <div class="toast" style=" width:700px; background-color:#55efc4;">
            <div class="toast-header">
                <strong class="mr-auto">suppression</strong>
                <small>Just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                La <strong>Salle</strong> est supprimé Avec Succes.
            </div>
        </div>
    </div>

<?php
}

?>