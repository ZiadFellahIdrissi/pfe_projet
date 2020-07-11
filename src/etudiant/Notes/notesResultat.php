<?php
require_once '../../../fonctions/tools.function.php';

function isTherefianleExam($filiere)
{
    $db = DB::getInstance();
    $sql = "SELECT id_controle from Controle 
                join dispose_de on Controle.id_module=dispose_de.id_module 
                where dispose_de.id_filiere=? 
                and Controle.type=?";
    $resultat = $db->query($sql, [$filiere, 'exam_finale_normal']);
    return $resultat;
}

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
        <button type="button" class="btn btn-outline-dark" onclick="location.href=''">
            <span><i class="fa fa-download"></i></span> Télécharger le relevé de notes.
        </button>
    </div>
<?php
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
                WHERE Semestre.semestre='$semester'
                AND dispose_de.id_filiere = (SELECT id_filiere
                                              FROM Etudiant
                                              WHERE id = ?      )";
        return $sql;
    }
    ?>
    <div class="table-responsive-sm">
        <?php
        $se = getSemestre()->date_fin;
        if (date('yy/m/d', time()) > $se) { ?>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr style="text-align: center;">
                        <th>Module</th>
                        <th>Controles</th>
                        <?php if (isTherefianleExam(getStudentsInfo($id)->first()->id_filiere)->count()) { ?>
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
                    foreach ($db->results() as $row) {
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
                                    if (!isTherefianleExam(getStudentsInfo($id)->first()->id_filiere)->count()) {
                                        echo '<tr>';
                                        for ($i = 1; $i <= $controleCount; $i++) {
                                            echo "<th>Controle $i</th>";
                                        }
                                        echo '</tr>';
                                        echo '<tr>';
                                        foreach ($markcontrole as $obj) {
                                            echo "<td id='bold'>$obj->note</td>";
                                            $sommeControle += $obj->note;
                                        }
                                        echo '</tr>';
                                    } else {
                                        foreach ($markcontrole as $obj) {
                                            $sommeControle += $obj->note;
                                        }
                                        $results = getCoiffissient($row->id_module);
                                        $coeff_controle = $results->coeff_controle;
                                        if ($sommeControle)
                                            echo ($sommeControle / $controleCount) * $coeff_controle;
                                    }

                                    ?>
                                </table>
                            </td>
                            <?php if (isTherefianleExam(getStudentsInfo($id)->first()->id_filiere)->count()) { ?>
                                <!-- Examen Final -->
                                <td id='bold'>
                                    <?php
                                    if ($markcontrole) {
                                        $noteExamFinale = -1;
                                        $markFinale = getMarks('exam_finale_normal', $row->id_module, $id);
                                        foreach ($markFinale as $roww) {
                                            echo $roww->note;
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
                                        $noteExamFinaleRatt = -1;
                                        $markFinale = getMarks('exam_finale_ratt', $row->id_module, $id);
                                        foreach ($markFinale as $roww) {
                                            echo $roww->note;
                                            $noteExamFinaleRatt = $roww->note;
                                        }
                                    }
                                    ?>
                                </td>


                                <!-- Moyenne Genrale -->
                                <td id='bold'>

                                    <?php
                                    // $results = getCoiffissient($row->id_module);
                                    // $coeff_controle = $results->coeff_controle;
                                    // $coeff_examen = $results->coeff_examen;
                                    // if ($noteExamFinaleRatt != -1) {
                                    //     echo ($noteExamFinale * $coeff_examen + ($sommeControle / $controleCount) * $coeff_controle);
                                    // }
                                    ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php
                    }
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    ?>
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr style="text-align: center;">
                                <th>Module</th>
                                <th>Controles</th>
                                <?php if (isTherefianleExam(getStudentsInfo($id)->first()->id_filiere)->count()) { ?>
                                    <th>Exame Finale S1</th>
                                    <th>resultat</th>
                                    <th>Exame Finale s2</th>
                                    <th>Moyenne Generale</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background: rgba(0, 0, 0, 0.16); font-weight: bold; font-size:large;">
                                <td colspan=7>2ème Semestre</td>
                            </tr>
                            <?php
                            $db->query(sqlStatment('2eme Semestre'), [$id]);
                            foreach ($db->results() as $row0) {
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
                                            if (!isTherefianleExam(getStudentsInfo($id)->first()->id_filiere)->count()) {
                                                echo '<tr>';
                                                for ($i = 1; $i <= $controleCount; $i++) {
                                                    echo "<th>Controle $i</th>";
                                                }
                                                echo '</tr>';
                                                echo '<tr>';
                                                foreach ($markcontrole as $obj) {
                                                    echo "<td id='bold'>$obj->note</td>";
                                                    $sommeControle += $obj->note;
                                                }
                                                echo '</tr>';
                                            } else {
                                                foreach ($markcontrole as $obj) {
                                                    $sommeControle += $obj->note;
                                                }
                                                $results = getCoiffissient($row0->id_module);
                                                $coeff_controle = $results->coeff_controle;
                                                if ($sommeControle)
                                                    echo ($sommeControle / $controleCount) * $coeff_controle;
                                            }

                                            ?>
                                        </table>
                                    </td>
                                    <?php if (isTherefianleExam(getStudentsInfo($id)->first()->id_filiere)->count()) { ?>
                                        <!-- Examen Final -->
                                        <td id='bold'>
                                            <?php
                                            if ($markcontrole) {
                                                $noteExamFinale = -1;
                                                $markFinale = getMarks('exam_finale_normal', $row0->id_module, $id);
                                                foreach ($markFinale as $roww) {
                                                    echo $roww->note;
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
                                                $noteExamFinaleRatt = -1;
                                                $markFinale = getMarks('exam_finale_ratt', $row0->id_module, $id);
                                                foreach ($markFinale as $roww) {
                                                    echo $roww->note;
                                                    $noteExamFinaleRatt = $roww->note;
                                                }
                                            }
                                            ?>
                                        </td>


                                        <!-- Moyenne Genrale -->
                                        <td id='bold'>

                                            <?php
                                            // $results = getCoiffissient($row0->id_module);
                                            // $coeff_controle = $results->coeff_controle;
                                            // $coeff_examen = $results->coeff_examen;
                                            // if ($noteExamFinaleRatt != -1) {
                                            //     echo ($noteExamFinale * $coeff_examen + ($sommeControle / $controleCount) * $coeff_controle);
                                            // }
                                            ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
    </div>
</div>