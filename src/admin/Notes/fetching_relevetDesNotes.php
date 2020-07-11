<?php
if (isset($_GET["cin"])) {
    include_once '../../../core/init.php';
    $db = DB::getInstance();
    include_once '../../../fonctions/tools.function.php';
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
                        <th>Moyenne Generale</th>
                        <th>Resultat</th>
                        <th>Session</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $resultat = $db->query(sqlStatment('1ere Semestre'), [$id]);
                    ?>
                    <tr style="background: rgba(0, 0, 0, 0.1); font-weight: bold; font-size:large;">
                        <td colspan=4>1ère Semestre</td>
                    </tr>
                    <?php
                    $noteExamFinaleratt = -1;
                    $examCount = 0;
                    $somme_moyenne_normal = 0;
                    $somme_moyenne_ratt = 0;
                    $countModule = $resultat->count();
                    foreach ($resultat->results() as $row) {
                        //++++++++++++++++++INFORMATIONS WE NEED+++++++++++++++++++++
                        // function calculateMoyenne($noteExamen){
                        //     return 
                        // }
                        //===========================================================================================
                        //checking if there is `ratt`  _______________________  //checking if there is mark for `ratt`
                        $resultat_is_there_ratt_mark = is_there_ratt_mark_for_student($id, $row->id_module)->count();
                        $resultat_is_there_ratt_exam = is_there_ratt_exam_for_student($id, $row->id_module)->count();
                        //===========================================================================================

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

                        // examen_finale_normale
                        $markFinale = getMarks('exam_finale_normal', $row->id_module, $id);
                        foreach ($markFinale as $roww) {
                            $noteExamFinale = $roww->note;
                        }

                        // examen_finale_ratt
                        if ($resultat_is_there_ratt_mark) {
                            $markFinaleratt = getMarks('exam_finale_ratt', $row->id_module, $id);
                            foreach ($markFinaleratt as $roww) {
                                $noteExamFinaleratt = $roww->note;
                            }
                        }
                        //++++++++++++++++++INFORMATIONS WE NEED+++++++++++++++++++++
                    ?>
                        <tr>
                            <td><?php echo $row->intitule ?></td>

                            <!-- Moyenne Genrale -->
                            <td id='bold' style="text-align: center">
                                <?php
                                $moyModule = "";
                                if ($markcontrole) {
                                    if ($markFinale) {
                                        if ($resultat_is_there_ratt_exam) {
                                            if ($resultat_is_there_ratt_mark) {
                                                $noteExamen = $noteExamFinale > $noteExamFinaleratt ? $noteExamFinale : $noteExamFinaleratt;
                                                $moyModule = ($noteExamen * $coeff_examen + ($sommeControle / $controleCount) * $coeff_controle);
                                                echo $moyModule . ' / 20';
                                                $somme_moyenne_ratt += $moyModule;
                                                $examCount++;
                                            } else
                                                echo "";
                                        } else {
                                            $noteExamen = $noteExamFinale;
                                            $moyModule = ($noteExamen * $coeff_examen + ($sommeControle / $controleCount) * $coeff_controle);
                                            echo $moyModule . ' / 20';
                                            $somme_moyenne_normal += $moyModule;
                                            $examCount++;
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($markcontrole) {
                                    if ($markFinale) {
                                        if ($resultat_is_there_ratt_exam) {
                                            if ($resultat_is_there_ratt_mark)
                                                echo "V aprés RAT"; // 5asak test wache valida oula fl ratt
                                            else
                                                echo "Ratt";
                                        } else {
                                            echo "Validé";
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($markcontrole) {
                                    if ($markFinale) {
                                        if ($resultat_is_there_ratt_exam) {
                                            if ($resultat_is_there_ratt_mark)
                                                echo "S2";
                                        } else {
                                            echo "S1";
                                        }
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        if ($examCount === $countModule) {
                            $moySem1 = ($somme_moyenne_normal + $somme_moyenne_ratt) / $countModule ;
                        }
                    }
                    $se = getDatesSemestre(2)->first()->date_debut;
                    if (date('yy/m/d', time()) > $se) {
                        if ($examCount === $countModule) {
                        ?>
                            <tr>
                                <td style="font-weight: bold;">Résultat d'admission Semestre 1 : </td>
                                <td style="font-weight: bold; text-align: center;"><?php echo $moySem1. ' / 20' ?></td>
                                <td style="font-weight: bold; ">Validé</td> 
                                <!--   ghadi nchofo wache la moyenne gha i9der inja7 bihe oula la     -->
                                <td></td>
                            </tr>
                        <?php
                        }
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        $resultat = $db->query(sqlStatment('2eme Semestre'), [$id]);
                        ?>
                        <tr style="background: rgba(0, 0, 0, 0.1); font-weight: bold; font-size:large;">
                            <td colspan=4>2ème Semestre</td>
                        </tr>
                        <?php
                        $noteExamFinaleratt = -1;
                        $examCount = 0;
                        $somme_moyenne_normal = 0;
                        $somme_moyenne_ratt = 0;
                        $countModule = $resultat->count();
                        foreach ($resultat->results() as $row0) {
                            //++++++++++++++++++INFORMATION WE NEED+++++++++++++++++++++
                            //===========================================================================================
                            //checking if there is `ratt`  _______________________  //checking if there is mark for `ratt`

                            $resultat_is_there_ratt_mark = is_there_ratt_mark_for_student($id, $row0->id_module)->count();
                            $resultat_is_there_ratt_exam = is_there_ratt_exam_for_student($id, $row0->id_module)->count();
                            //===========================================================================================

                            // coefficients
                            $results_coeff = getCoiffissient($row0->id_module);
                            $coeff_controle = $results_coeff->coeff_controle;
                            $coeff_examen = $results_coeff->coeff_examen;

                            // controles
                            $markcontrole = getMarks('controle', $row0->id_module, $id);
                            $controleCount = count($markcontrole);
                            $sommeControle = 0;
                            foreach ($markcontrole as $obj) {
                                $sommeControle += $obj->note;
                            }

                            // examen_finale_normale
                            $markFinale = getMarks('exam_finale_normal', $row0->id_module, $id);
                            foreach ($markFinale as $roww) {
                                $noteExamFinale = $roww->note;
                            }

                            // examen_finale_ratt
                            if ($resultat_is_there_ratt_mark) {
                                $markFinaleratt = getMarks('exam_finale_ratt', $row0->id_module, $id);
                                foreach ($markFinaleratt as $roww) {
                                    $noteExamFinaleratt = $roww->note;
                                }
                            }
                            //++++++++++++++++++INFORMATION WE NEED+++++++++++++++++++++
                        ?>
                            <tr>
                                <td><?php echo $row0->intitule ?></td>

                                <!-- Moyenne Genrale -->
                                <td id='bold' style="text-align: center">
                                    <?php
                                    $examCount++;
                                    $moyModule = "";
                                    if ($markcontrole) {
                                        if ($markFinale) {
                                            if ($resultat_is_there_ratt_exam) {
                                                if ($resultat_is_there_ratt_mark) {
                                                    $noteExamen = $noteExamFinale > $noteExamFinaleratt ? $noteExamFinale : $noteExamFinaleratt;
                                                    $moyModule = ($noteExamen * $coeff_examen + ($sommeControle / $controleCount) * $coeff_controle);
                                                    $somme_moyenne_ratt += $moyModule;
                                                    $examCount++;
                                                    echo $moyModule;
                                                } else
                                                    echo "";
                                            } else {
                                                $noteExamen = $noteExamFinale > $noteExamFinaleratt ? $noteExamFinale : $noteExamFinaleratt;
                                                $moyModule = ($noteExamen * $coeff_examen + ($sommeControle / $controleCount) * $coeff_controle);
                                                $somme_moyenne_normal += $moyModule;
                                                $examCount++;
                                                echo $moyModule;
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php

                                    if ($markcontrole) {
                                        if ($markFinale) {
                                            if ($resultat_is_there_ratt_exam) {
                                                if ($resultat_is_there_ratt_mark)
                                                    echo "V aprés RAT";
                                                else
                                                    echo "";
                                            } else {
                                                echo "Validé";
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($markcontrole) {
                                        if ($markFinale) {
                                            if ($resultat_is_there_ratt_exam) {
                                                if ($resultat_is_there_ratt_mark)
                                                    echo "S2";
                                            } else {
                                                echo "S1";
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        if ($examCount === $countModule) {
                            $moySem2 = ($somme_moyenne_normal + $somme_moyenne_ratt) / $countModule;
                        }
                    }
                    // if (isset($moySem1) && isset($moySem2)) {
                    ?>
                    <!-- l moyenne dyl 3am kaml -->
                    <!-- <div class="float-right"><?php echo "Moyenne Generale Dyl 3am: " . ($moySem1 + $moySem2) / 2 ?></div> -->
                    <?php
                    // }
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