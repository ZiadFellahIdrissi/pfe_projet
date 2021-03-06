<?php
    $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($fullurl, "err")) {
    ?>
        <div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; right: 3%;  min-height: 200px; ">
            <div class="toast" style=" width:700px; background-color:#d63031; color:white;">
                <div class="toast-header">
                    <strong class="mr-auto">Modification</strong>
                    <small>Just now</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    if (strpos($fullurl, "name")) { ?>
                        <div class="toast-body">
                            <strong>Filière</strong> déjà existe.
                        </div>
                <?php
                    }
                    if (strpos($fullurl, "resp")) { ?>
                        <div class="toast-body">
                            <strong>Enseignant</strong> déjà en charge d'une autre filière.
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    <?php
    }
    if (strpos($fullurl, "inserted")) {
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
                    <strong>Filière</strong> ajouté avec succès.
                </div>
            </div>
        </div>

    <?php
    }
    if (strpos($fullurl, "deleted")) {
    ?>
        <div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; right: 3%;  min-height: 200px; ">
            <div class="toast" style=" width:700px; background-color:#55efc4;">
                <div class="toast-header">
                    <strong class="mr-auto">Suppression</strong>
                    <small>Just now</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <strong>Filière</strong> supprimé avec succès.
                </div>
            </div>
        </div>
    <?php
    }
    if (strpos($fullurl, "updated")) {
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
                    <strong>Filière</strong> modifié avec succès.
                </div>
            </div>
        </div>
    <?php
    }
    if (strpos($fullurl, "act")) {
    ?>
        <div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; right: 3%;  min-height: 200px; ">
            <div class="toast" style=" width:700px; background-color:#55efc4;">
                <div class="toast-header">
                    <strong class="mr-auto">Activation</strong>
                    <small>Just now</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <strong>Filière</strong> activée avec succès.
                </div>
            </div>
        </div>
    <?php
    }
    if (strpos($fullurl, "desact")) {
    ?>
        <div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; right: 3%;  min-height: 200px; ">
            <div class="toast" style=" width:700px; background-color:#55efc4;">
                <div class="toast-header">
                    <strong class="mr-auto">Désactivation</strong>
                    <small>Just now</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <strong>Filière</strong> désactivée avec succès.
                </div>
            </div>
        </div>
    <?php
    }
?>