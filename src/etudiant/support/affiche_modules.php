<?php
include_once '../../../core/init.php';
require_once '../../../fonctions/tools.function.php';
$my_id = $_GET["my_id"];
?>
<div class="table-responsive-sm">
    <?php
    $date_debut_dexieme_Semester = getDatesSemestre(2)->first()->date_debut;
    if (date('yy-m-d', time()) > $date_debut_dexieme_Semester)
        $semster = 2;
    else
        $semster = 1;
    $results = getModulesByFiliere(getStudentFiliere($my_id)->id_filiere, $semster);
    ?>
    <table class="table  table-bordered mydatatable">
        <thead class="thead-dark">
            <tr>
                <th>Module</th>
                <th>Support du cours</th>
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
                                <b>Non disponible.</b>
                                <?php
                            } else {
                                $support = explode("$", $resultat->support_cour);
                                $lien = $support[0];
                                $code = $support[1];
                                if ($code != "") {
                                ?>
                                    <button type="button" class="btn btn-outline-warning open_give_code">Obtenir le cours avec le code d'accès</button>
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