<?php
    $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($fullurl, "del")) {
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
                    Les <strong>Notes</strong> ont été supprimé avec succès.
                </div>
            </div>
        </div>

<?php
    }
?>
