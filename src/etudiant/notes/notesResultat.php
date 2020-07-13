<?php
require_once '../../../fonctions/tools.function.php';

if (!demandeCheck($id, 'releve', -1) && !demandeCheck($id, 'releve', 1)) {
?>
    <div style="text-align: right; margin-bottom: 1%">
        <?php
        if (demandeCheck($id, 'releve', 0)) {
        ?>
            <span style="color: red">Votre demande précédent a été refusé.</span>
        <?php
        }
        ?>
        <button type="button" class="btn btn-outline-dark" onclick="location.href='../demander.php?type=releve&id=<?php echo $id ?>'">
            <span><i class="fa fa-print"></i></span> Demander le relevé de notes
        </button>
    </div>
<?php
}
if (demandeCheck($id, 'releve', -1) && !demandeCheck($id, 'releve', 1)) {
?>
    <div style="text-align: right; margin-bottom: 1%">
        Demande envoyé.
    </div>
<?php
}
if (demandeCheck($id, 'releve', 1)) {
?>
    <div style="text-align: right; margin-bottom: 1%">
        <button type="button" class="btn btn-outline-dark" onclick="location.href='../relevtnotepdf/relvenoteS1/?id=<?php echo $id ?>'">
            <span><i class="fa fa-download"></i></span> Télécharger le relevé de notes S1.
        </button>
    </div>
    <?php
    $se = getDatesSemestre(2)->first()->date_debut;
    if (date('yy-m-d', time()) > $se) {
    ?>
        <div style="text-align: right; margin-bottom: 1%">
            <button type="button" class="btn btn-outline-dark" onclick="location.href='../relevtnotepdf/relvenoteS2/?id=<?php echo $id ?>'">
                <span><i class="fa fa-download"></i></span> Télécharger le relevé de notes S2.
            </button>
        </div>
<?php
    }
}
?>

<div class="au-card notes shadow-lg bg-white rounded" style="padding: 0;">
    <?php
    function sqlStatment($semester)
    {
        $sql = "SELECT Module.id_module,intitule
                FROM Module
                JOIN dispose_de ON Module.id_module = dispose_de.id_module
                JOIN Semestre ON Module.id_semestre = Semestre.id_semestre
                WHERE Semestre.semestre = '$semester'
                AND dispose_de.id_filiere = (SELECT id_filiere
                                             FROM Etudiant
                                             WHERE id = ?     )";
        return $sql;
    }

    $is_there_finale_Exame_s1 = isTherefianleExam(getStudentsInfo($id)->first()->id_filiere, 1)->count();
    $is_there_finale_Exame_s2 = isTherefianleExam(getStudentsInfo($id)->first()->id_filiere, 2)->count();
    ?>
    <div class="table-responsive-sm">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr style="text-align: center;">
                    <th>Module</th>
                    <th>Controles</th>
                    <?php if ($is_there_finale_Exame_s1) { ?>
                        <th>Exame Finale S1</th>
                        <th>resultat</th>
                        <th>Exame Finale s2</th>
                        <th>Moyenne Generale</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <tr style="background: rgba(0, 0, 0, 0.16); font-weight: bold; font-size:large;">
                    <td colspan=7>1ère Semestre</td>
                </tr>
                <?php
                $db->query(sqlStatment('1ere Semestre'), [$id]);
                $examCount = 0;
                $countModule = $resultat->count();
                $somme_moyenne_normal = 0;
                $somme_moyenne_ratt = 0;

                foreach ($db->results() as $row) {
                    //===========================================================================================
                    //checking if there is `ratt`  _______________________  //checking if there is mark for `ratt`
                    $resultat_is_there_ratt_mark = is_there_ratt_mark_for_student($id, $row->id_module)->count();
                    $resultat_is_there_ratt_exam = is_there_ratt_exam_for_student($id, $row->id_module)->count();
                    //===========================================================================================

                    // coefficients
                    $results_coeff = getCoiffissient($row->id_module);
                    $coeff_controle = $results_coeff->coeff_controle;
                    $coeff_examen = $results_coeff->coeff_examen;
                ?>
                    <tr>
                        <td><?php echo $row->intitule ?></td>

                        <!-- Controles -->
                        <td id='bold'>
                            <table class="table">
                                <?php
                                $markcontrole = getMarks('controle', $row->id_module, $id);
                                $controleCount = count($markcontrole);
                                $sommeControle = 0;
                                if (!$is_there_finale_Exame_s1) {
                                    echo '<tr>';
                                    for ($i = 1; $i <= $controleCount; $i++) {
                                        echo "<th>Controle $i</th>";
                                    }
                                    echo '</tr>';
                                    echo '<tr>';
                                    foreach ($markcontrole as $obj) {
                                        echo "<td id='bold'>$obj->note /20 </td>";
                                        $sommeControle += $obj->note;
                                    }
                                    echo '</tr>';
                                } else {
                                    foreach ($markcontrole as $obj) {
                                        $sommeControle += $obj->note;
                                    }
                                    if ($sommeControle) {
                                        $moyenne_Contorle = ($sommeControle / $controleCount) * $coeff_controle;
                                        echo $moyenne_Contorle . ' / 20';
                                    }
                                }

                                ?>
                            </table>
                        </td>
                        <?php if ($is_there_finale_Exame_s1) { ?>
                            <!-- Examen Final -->
                            <td id='bold'>
                                <?php
                                if ($markcontrole) {
                                    $noteExamFinale = -1;
                                    $markFinale = getMarks('exam_finale_normal', $row->id_module, $id);
                                    foreach ($markFinale as $roww) {
                                        echo $roww->note . ' / 20';
                                        $noteExamFinale = $roww->note;
                                    }
                                }
                                ?>
                            </td>
                            <td id='bold'>
                                <?php
                                if ($markcontrole) {
                                    if (getMarks('exam_finale_normal', $row->id_module, $id))
                                        echo $noteExamFinale >= 12 ? 'Validé' : 'Rattrapage';
                                }
                                ?>

                            </td>
                            <td id='bold'>
                                <?php
                                if ($markcontrole) {
                                    if ($markFinale) {
                                        $noteExamFinaleratt = -1;
                                        $markFinaleRatt = getMarks('exam_finale_ratt', $row->id_module, $id);
                                        if ($markFinaleRatt) {
                                            foreach ($markFinaleRatt as $roww) {
                                                echo $roww->note . '/ 20';
                                                $noteExamFinaleratt = $roww->note;
                                            }
                                        }
                                    }
                                }
                                ?>
                            </td>

                            <!-- Moyenne Genrale -->
                            <td id='bold'>
                                <?php
                                if ($markcontrole) {
                                    if ($markFinale) {
                                        if ($resultat_is_there_ratt_exam) {
                                            if ($resultat_is_there_ratt_mark) {
                                                $noteExamen = $noteExamFinale > $noteExamFinaleratt ? $noteExamFinale : $noteExamFinaleratt;
                                                $moyModule = ($noteExamen * $coeff_examen + $moyenne_Contorle);
                                                echo $moyModule . ' / 20';
                                                $somme_moyenne_ratt += $moyModule;
                                                $examCount++;
                                            } else
                                                echo "";
                                        } else {
                                            $noteExamen = $noteExamFinale;
                                            $moyModule = ($noteExamen * $coeff_examen + $moyenne_Contorle);
                                            echo $moyModule . ' / 20';
                                            $somme_moyenne_normal += $moyModule;
                                            $examCount++;
                                        }
                                    }
                                }
                                ?>
                            </td>
                        <?php }
                        ?>
                    </tr>
                <?php
                }
                $se = getDatesSemestre(2)->first()->date_debut;
                // if (date('yy/m/d', time()) < $se) {
                if ($examCount === $countModule) {
                    $moySem1 = ($somme_moyenne_normal + $somme_moyenne_ratt) / $countModule;
                ?>
                    <tr>
                        <td style="font-weight: bold;" colspan=5>Résultat d'admission Semestre 1 : </td>
                        <td style="font-weight: bold; text-align: center; color: green;"><?php echo $moySem1 . ' / 20' ?></td>
                    </tr>
                <?php
                }
                // }
                echo '</tbody>';
                echo '</table>';
                if (date('yy-m-d', time()) < $se) {
                    echo "";
                } else {
                ?>
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr style="text-align: center;">
                                <th>Module</th>
                                <th>Controles</th>
                                <?php if ($is_there_finale_Exame_s2) { ?>
                                    <th>Exame Finale S1</th>
                                    <th>resultat</th>
                                    <th>Exame Finale s2</th>
                                    <th>Moyenne Generale</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background: rgba(0, 0, 0, 0.16); font-weight: bold; font-size:large;">
                                <td colspan=7>2ère Semestre</td>
                            </tr>
                            <?php
                            $resultat = $db->query(sqlStatment('2eme Semestre'), [$id]);
                            $examCount = 0;
                            $countModule = $resultat->count();
                            $somme_moyenne_normal = 0;
                            $somme_moyenne_ratt = 0;

                            foreach ($resultat->results() as $row0) {
                                //===========================================================================================
                                //checking if there is `ratt`  _______________________  //checking if there is mark for `ratt`
                                $resultat_is_there_ratt_mark = is_there_ratt_mark_for_student($id, $row0->id_module)->count();
                                $resultat_is_there_ratt_exam = is_there_ratt_exam_for_student($id, $row0->id_module)->count();
                                //===========================================================================================

                                // coefficients
                                $results_coeff = getCoiffissient($row0->id_module);
                                $coeff_controle = $results_coeff->coeff_controle;
                                $coeff_examen = $results_coeff->coeff_examen;
                            ?>
                                <tr>
                                    <td><?php echo $row0->intitule ?></td>

                                    <!-- Controles -->
                                    <td id='bold'>
                                        <table class="table">
                                            <?php
                                            $markcontrole = getMarks('controle', $row0->id_module, $id);
                                            $controleCount = count($markcontrole);
                                            $sommeControle = 0;
                                            if (!$is_there_finale_Exame_s2) {
                                                echo '<tr>';
                                                for ($i = 1; $i <= $controleCount; $i++) {
                                                    echo "<th>Controle $i</th>";
                                                }
                                                echo '</tr>';
                                                echo '<tr>';
                                                foreach ($markcontrole as $obj) {
                                                    echo "<td id='bold'>$obj->note /20 </td>";
                                                    $sommeControle += $obj->note;
                                                }
                                                echo '</tr>';
                                            } else {
                                                foreach ($markcontrole as $obj) {
                                                    $sommeControle += $obj->note;
                                                }
                                                if ($sommeControle) {
                                                    $moyenne_Contorle = ($sommeControle / $controleCount) * $coeff_controle;
                                                    echo $moyenne_Contorle . ' / 20';
                                                }
                                            }

                                            ?>
                                        </table>
                                    </td>
                                    <?php if ($is_there_finale_Exame_s2) { ?>
                                        <!-- Examen Final -->
                                        <td id='bold'>
                                            <?php
                                            if ($markcontrole) {
                                                $noteExamFinale = -1;
                                                $markFinale = getMarks('exam_finale_normal', $row0->id_module, $id);
                                                foreach ($markFinale as $roww) {
                                                    echo $roww->note . ' / 20';
                                                    $noteExamFinale = $roww->note;
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td id='bold'>
                                            <?php
                                            if ($markcontrole) {
                                                if (getMarks('exam_finale_normal', $row0->id_module, $id))
                                                    echo $noteExamFinale >= 12 ? 'Validé' : 'Rattrapage';
                                            }
                                            ?>

                                        </td>
                                        <td id='bold'>
                                            <?php
                                            if ($markcontrole) {
                                                if ($markFinale) {
                                                    $noteExamFinaleratt = -1;
                                                    $markFinaleRatt = getMarks('exam_finale_ratt', $row0->id_module, $id);
                                                    if ($markFinaleRatt) {
                                                        foreach ($markFinaleRatt as $roww) {
                                                            echo $roww->note . '/ 20';
                                                            $noteExamFinaleratt = $roww->note;
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>

                                        <!-- Moyenne Genrale -->
                                        <td id='bold'>
                                            <?php
                                            if ($markcontrole) {
                                                if ($markFinale) {
                                                    if ($resultat_is_there_ratt_exam) {
                                                        if ($resultat_is_there_ratt_mark) {
                                                            $noteExamen = $noteExamFinale > $noteExamFinaleratt ? $noteExamFinale : $noteExamFinaleratt;
                                                            $moyModule = ($noteExamen * $coeff_examen + $moyenne_Contorle);
                                                            echo $moyModule . ' / 20';
                                                            $somme_moyenne_ratt += $moyModule;
                                                            $examCount++;
                                                        } else
                                                            echo "";
                                                    } else {
                                                        $noteExamen = $noteExamFinale;
                                                        $moyModule = ($noteExamen * $coeff_examen + $moyenne_Contorle);
                                                        echo $moyModule . ' / 20';
                                                        $somme_moyenne_normal += $moyModule;
                                                        $examCount++;
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                    <?php }
                                    ?>
                                </tr>
                            <?php
                            }
                            if ($examCount === $countModule) {
                                $moySem2 = ($somme_moyenne_normal + $somme_moyenne_ratt) / $countModule;
                            ?>
                                <tr>
                                    <td style="font-weight: bold;" colspan=5>Résultat d'admission Semestre 2 : </td>
                                    <td style="font-weight: bold; text-align: center; color: green;"><?php echo $moySem2 . ' / 20' ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php } ?>
    </div>
</div>
<br>
<?php
// $moySem2=15.2;
if (isset($moySem1) && isset($moySem2)) {
?>
    <table class="table table-striped" style="width: 40%; float:right;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Semster</th>
                <th scope="col">Note</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1<sup>ere</sup>Semester</td>
                <td style="font-weight: bold;"><?php echo $moySem1 . ' / 20' ?></td>
            </tr>
            <tr>
                <td>2<sup>eme</sup>Semester</td>
                <td style="font-weight: bold;"><?php echo $moySem2 . ' / 20' ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">MOY. GENERALE</td>
                <td style="font-weight: bold;"><?php echo ($moySem1 + $moySem2) / 2 . ' / 20' ?></td>
            </tr>

        </tbody>
    </table>
    <br><br><br><br><br><br>
    <br><br>
<?php
}
?>
</table>