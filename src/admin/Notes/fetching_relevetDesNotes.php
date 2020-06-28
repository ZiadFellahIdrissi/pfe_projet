<?php
if (isset($_GET["cin"])) {
    include_once '../../../core/init.php';
    $db = DB::getInstance();
    include_once '../../etudiant/fonctions/tools.function.php';
    $id = $_GET["cin"];
?>
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
                        <?php echo 'CNE: ' . $resultStudentInfo->first()->cne ?>
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
                <?php echo 'Inscrit en: ' . '<b>' . $resultStudentInfo->first()->nom_filiere . '</b>' ?>
            </p>
            <p>
                <?php echo 'a obtenu les notes suivants :' ?>
            </p>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover">
                <thead class="thead-dark" style="text-align: center">
                    <tr>
                        <th>Module</th>
                        <!-- <th>Controles</th> -->
                        <!-- <th>Exame Finale</th> -->
                        <th>Moyenne Generale</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db->query(sqlStatment('1ere Semestre'), [$id]);
                    ?>
                    <tr style="background: rgba(0, 0, 0, 0.1); font-weight: bold; font-size:large;">
                        <td colspan=2>1ère Semestre</td>
                    </tr>
                    <?php
                    $countModule = 0;
                    $examCount = 0;
                    foreach ($db->results() as $row) {
                        // coefficients
                        $results_coeff = getCoiffissient($row->id_module);
                        $coeff_controle = $results_coeff->coeff_controle;
                        $coeff_examen = $results_coeff->coeff_examen;
                        // controles
                        $markcontrole = getMarks('controle', $row->id_module, $id);
                        $controleCount = count($markcontrole);
                        $sommeControle = 0;
                        foreach ($markcontrole as $obj) {
                            $sommeControle += $obj->note;
                        }
                        // examens
                        $noteExamFinale = -1;
                        $markFinale = getMarks('finale', $row->id_module, $id);
                        foreach ($markFinale as $roww) {
                            $noteExamFinale = $roww->note;
                        }
                    ?>
                        <tr>
                            <td><?php echo $row->intitule ?></td>

                            <!-- hado khelithom f 7alat ma bghiti trej3 l examens finale yban o l controls -->
                            <!-- Controles --> 
                            <!-- <td style="font-weight:bold; text-align: center">
                                <?php
                                
                                if($controleCount != 0)
                                    echo ($sommeControle / $controleCount) * $coeff_controle;
                                ?>
                            </td> -->

                            <!-- Examen Final -->
                            <!-- <td id='bold'>
                                <?php
                                    echo $noteExamFinale;
                                ?>
                            </td> -->

                            <!-- Moyenne Genrale -->
                            <td id='bold' style="text-align: center">
                                <?php
                                    $countModule++;
                                    if ($noteExamFinale != -1) {
                                        if($controleCount != 0)
                                            $moyModule = ($noteExamFinale * $coeff_examen + ($sommeControle / $controleCount) * $coeff_controle);
                                        else
                                            $moyModule = $noteExamFinale;
                                        
                                        $examCount++;
                                        echo $moyModule;
                                    }
                                ?>
                            </td>
                        </tr>
                        
                    <?php
                    }
                        if($countModule && $examCount == $countModule){
                    ?>
                        <!-- l moyenne dyl semestre 1 -->
                        <tr>
                            <td class="float-right">Moyenne Generale dyl semestre 1: <?php echo $moySem1=$moyModule/$countModule ?></td>
                        </tr>
                    <?php
                        }
                    $se = getSemestre()->date_fin;
                    if (date('yy/m/d', time()) < $se) {
                    echo '</tbody>';
                echo '</table>';
                    } else {
                        $db->query(sqlStatment('2eme Semestre'), [$id]);
                    ?>
                        <tr style="background: rgba(0, 0, 0, 0.1); font-weight: bold; font-size:large;">
                            <td colspan=2>2ème Semestre</td>
                        </tr>
                        <?php
                        $countModule = 0;
                        $examCount = 0;
                        foreach ($db->results() as $row0) {
                            // coefficients
                            $results_coeff = getCoiffissient($row0->id_module);
                            $coeff_controle = $results_coeff->coeff_controle;
                            $coeff_examen = $results_coeff->coeff_examen;
                            // controles
                            $markcontrole = getMarks('controle', $row0->id_module, $id); //db hada tableau dyl les objets!
                            $controleCount = count($markcontrole);
                            $sommeControle = 0;
                            foreach ($markcontrole as $obj) {
                                $sommeControle += $obj->note;
                            }
                            // examens
                            $noteExamFinale = -1;
                            $markFinale = getMarks('finale', $row0->id_module, $id);
                            foreach ($markFinale as $roww) {
                                $noteExamFinale = $roww->note;
                            }
                        ?>
                            <tr>
                                <td><?php echo $row0->intitule ?></td>

                                <!-- Controles -->
                                <!-- <td style="font-weight:bold; text-align: center">
                                    <?php
                                        if($sommeControle!=0)
                                        echo ($sommeControle / $controleCount) * $coeff_controle;
                                    ?>
                                </td> -->

                                <!-- Examen Final -->
                                <!-- <td id='bold'>
                                    <?php
                                        echo $noteExamFinale;
                                    ?>
                                </td> -->

                                <!-- Moyenne Genrale -->
                                <td id='bold'  style="text-align: center">
                                    <?php
                                        $countModule++;
                                        if ($noteExamFinale != -1) {
                                            if($controleCount != 0)
                                                $moyModule = ($noteExamFinale * $coeff_examen + ($sommeControle / $controleCount) * $coeff_controle);
                                            else
                                                $moyModule = $noteExamFinale;

                                            $examCount++;
                                            echo $moyModule;
                                        }
                                    ?>
                                </td>
                            </tr>
                    <?php
                        }
                        if($countModule && $examCount == $countModule){
                    ?>
                        <!-- l moyenne dyl semestre 2 -->
                        <tr>
                            <td class="float-right">Moyenne Generale dyl semestre 2: <?php echo $moySem2=$moyModule/$countModule ?></td>
                        </tr>
                    <?php
                        }
                    }
                    if(isset($moySem1) && isset($moySem2)){
                    ?>
                        <!-- l moyenne dyl 3am kaml -->
                        <div class="float-right"><?php echo "Moyenne Generale Dyl 3am: ".($moySem1+$moySem2)/2 ?></div>
                    <?php
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