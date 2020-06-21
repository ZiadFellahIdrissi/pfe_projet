<?php
if (isset($_GET["cin"])) {
    include_once '../../../core/init.php';
    $db = DB::getInstance();
    include_once '../../etudiant/fonctions/tools.function.php';
    $id = $_GET["cin"];
    echo $date = date('yy/m/d h:i', time()); ?>
    <div class=" notes " style="border-radius:5%;">
        <?php
        function sqlStatment($semester)
        {
            $sql = "SELECT Module.id_module,intitule
                FROM Module
                JOIN dispose_de ON Module.id_module = dispose_de.id_module
                JOIN Semestre ON Module.id_semestre = Semestre.id_semestre
                WHERE Semestre.semestre='$semester'
                AND dispose_de.id_filiere = (SELECT id_filiere 
                                              FROM Etudiant 
                                              WHERE id = ?      )";
            return $sql;
        }
        ?>
        <div class="header" style="padding: 1%; border: 1px solid block; background: rgba(0, 0, 0, 0.2); font-weight:bold;border-radius:5px; text-align:center">
            <h3>RELEVE DE NOTES ET RESULTATS</h3>
        </div>
        <div class="info" style="padding:8px;">
            <?php
            $resultsInfo = getPersonInfo($id);
            $resultStudentInfo = getStudentsInfo($id);
            ?>
            <h4>
                <?php echo ' ' . strtoupper($resultsInfo->nom) . ' ' . $resultsInfo->prenom; ?>
            </h4>
            <div class="row">
                <div class="col-md-2">
                    <p>
                        <?php echo 'CIN: ' . $resultsInfo->id ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <?php echo 'CNE: ' . $resultStudentInfo->cne ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <p>
                        <?php echo 'Né le: ' . $resultsInfo->date_naissance ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <?php echo 'à: ' . 'CASABLANCA' ?>
                    </p>
                </div>
            </div>

            <p>
                <?php echo 'Inscrit en: ' . '<b>' . $resultStudentInfo->nom_filiere . '</b>' ?>
            </p>
            <p>
                <?php echo 'a obtenu les notes suivants :' ?>
            </p>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr style="text-align: center;">
                        <th>Module</th>
                        <th>Controles</th>
                        <th>Exame Finale</th>
                        <th>Moyenne Generale</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="background: rgba(0, 0, 0, 0.1); font-weight: bold; font-size:large;">
                        <td colspan=4>1ère Semestre</td>
                    </tr>
                    <?php
                    $db->query(sqlStatment('1ere Semestre'), [$id]);
                    foreach ($db->results() as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row->intitule ?></td>

                            <!-- Controles -->
                            <td style="font-weight:bold; text-align: center">
                                <?php
                                $results_coeff = getCoiffissient($row->id_module);
                                $coeff_controle = $results_coeff->coeff_controle;
                                $coeff_examen = $results_coeff->coeff_examen;

                                $markcontrole = getMarks('controle', $row->id_module, $id); //db hada tableau dyl les objets!
                                $controleCount = count($markcontrole);
                                $sommeControle = 0;
                                foreach ($markcontrole as $obj) {
                                    $sommeControle += $obj->note;
                                }
                                if($sommeControle!=0)
                                    echo ($sommeControle / $controleCount) * $coeff_controle;
                                ?>
                            </td>

                            <!-- Examen Final -->
                            <td id='bold'>
                                <?php
                                $noteExamFinale = -1;
                                $markFinale = getMarks('finale', $row->id_module, $id);
                                foreach ($markFinale as $roww) {
                                    echo $roww->note;
                                    $noteExamFinale = $roww->note;
                                }
                                ?>
                            </td>

                            <!-- Moyenne Genrale -->
                            <td id='bold'>
                                <?php

                                if ($noteExamFinale != -1) {
                                    echo ($noteExamFinale * $coeff_examen + ($sommeControle / $controleCount) * $coeff_controle);
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    $se = getSemestre()->date_fin;
                    if (date('yy/m/d', time()) < $se) {
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                    ?>
                        <tr style="background: rgba(0, 0, 0, 0.1); font-weight: bold; font-size:large;">
                            <td colspan=4>2ème Semestre</td>
                        </tr>
                        <?php
                        $db->query(sqlStatment('2eme Semestre'), [$id]);
                        foreach ($db->results() as $row0) {
                        ?>
                            <tr>
                                <td><?php echo $row0->intitule ?></td>

                                <!-- Controles -->
                                <td style="font-weight:bold; text-align: center">
                                    <?php
                                    $results_coeff = getCoiffissient($row0->id_module);
                                    $coeff_controle = $results_coeff->coeff_controle;
                                    $coeff_examen = $results_coeff->coeff_examen;

                                    $markcontrole = getMarks('controle', $row0->id_module, $id); //db hada tableau dyl les objets!
                                    $controleCount = count($markcontrole);
                                    $sommeControle = 0;
                                    foreach ($markcontrole as $obj) {
                                        $sommeControle += $obj->note;
                                    }
                                    if($sommeControle!=0)
                                    echo ($sommeControle / $controleCount) * $coeff_controle;
                                    ?>
                                </td>

                                <!-- Examen Final -->
                                <td id='bold'>
                                    <?php
                                    $noteExamFinale = -1;
                                    $markFinale = getMarks('finale', $row0->id_module, $id);
                                    foreach ($markFinale as $roww) {
                                        echo $roww->note;
                                        $noteExamFinale = $roww->note;
                                    }
                                    ?>
                                </td>

                                <!-- Moyenne Genrale -->
                                <td id='bold'>
                                    <?php
                                    if ($noteExamFinale != -1) {
                                        echo ($noteExamFinale * $coeff_examen + ($sommeControle / $controleCount) * $coeff_controle);
                                    }
                                    ?>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div style="text-align: right; margin-right:2%; margin-top:1%;">
        <button type="button" class="btn btn-outline-info imprimer "><span><i class="fa fa-print"></i></span> Imprimer </button>
    </div>
<?php
}
?>