<?php
$fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullurl, "paysuccess")) {
?>
    <div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; right: 3%;  min-height: 200px; ">
        <div class="toast" style=" width:700px; background-color:#55efc4;">
            <div class="toast-header">
                <strong class="mr-auto">Paiement</strong>
                <small>Just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                La <strong>Transaction</strong> s'est deroulée avec succes.
            </div>
        </div>
    </div>
<?php
}
if (strpos($fullurl, "payfailed")) {
?>
    <div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; right: 3%;  min-height: 200px; ">
        <div class="toast" style=" width:700px; background-color:#55efc4;">
            <div class="toast-header">
                <strong class="mr-auto">Paiement</strong>
                <small>Just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                échec de <strong>Paiement</strong>.
            </div>
        </div>
    </div>
<?php
}
?>
