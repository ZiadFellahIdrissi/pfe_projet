<?php
include_once '../../../core/init.php';
require_once '../../../fonctions/tools.function.php';
$my_id = $_GET["my_id"];
?>
<div class="table-responsive-sm">
    <?php
    $results = getModulesByFiliere(getStudentFiliere($my_id)->id_filiere, 2);
    ?>
    <table class="table  table-bordered mydatatable">
        <thead class="thead-dark">
            <tr>
                <th>Module</th>
                <th>support</th>
            </tr>
        </thead>
        <?php
        if ($results->count()) {
        ?>
            <tbody>
                <?php
                foreach ($results->results() as $row) {
                ?>
                    <tr>
                        <td style="font-weight: bold;"><?php echo $row->intitule ?></td>
                        <td style="text-align: center; ">

                            <?php
                            $resultat = DB::getInstance()->query("SELECT support_cour from Module where id_module = ? ", [$row->id_module])->first();
                            if ($resultat->support_cour == null) {
                            ?>
                                <a href="#" class="btn btn-outline-secondary disabled" role="button" aria-disabled="true">pas encore</a>
                                <?php
                            } else {
                                $support = explode("$", $resultat->support_cour);
                                $lien = $support[0];
                                $code = $support[1];
                                if ($code != "") {
                                ?>
                                    <button type="button" class="btn btn-outline-warning open_give_code">get Code</button>
                                    <input type="hidden" id="lien" value="<?php echo $lien; ?>">
                                    <input type="hidden" id="code" value="<?php echo $code; ?>">
                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo $lien ?>" class="btn btn-outline-success " role="button" aria-pressed="true">Telecharger</a>

                            <?php
                                }
                            } ?>

                        </td>
                    </tr>
            <?php
                }
                echo "<tbody>";
                echo "</table>";
            }
            ?>
</div>
<script>
    $(".open_give_code").click(function() {
        var lien = $("#lien").val();
        var code = $("#code").val();
        $("#set_code").val(code);
        $(".set_lien").attr("href", lien);
        $(".code_Acce").modal('show');
    });
</script>