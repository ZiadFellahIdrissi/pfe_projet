<?php
    function DMLCommentator($name)
    {
        $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($fullurl, "insert=failed")) {
            echo '<div class="alert alert-danger col-lg-4 col-lg-push-3 " style="text-align:center;">
                        Cet <strong>'.ucfirst($name).'</strong> deja existe!
                    </div>';
        }
        if (strpos($fullurl, "$name=inserted")) {
            echo '<div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                        <strong>'.ucfirst($name).'</strong> ajouté avec succes.
                    </div>';
        }
        if (strpos($fullurl, "$name=deleted")) {
            echo '<div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                        <strong>'.ucfirst($name).'</strong> supprimé avec succes.
                    </div>';
        }
        if (strpos($fullurl, "$name=updated")) {
            echo '<div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                        <strong>'.ucfirst($name).'</strong> modifié avec succes.
                    </div>';
        }
    }
?>