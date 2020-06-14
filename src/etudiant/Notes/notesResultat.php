<?php echo $date = date('yy/m/d h:i', time()); ?>
<div class="au-card notes shadow-lg bg-white rounded" style="padding: 0;">
    <?php
    function sqlStatment($semester)
    {
        $sql = "SELECT module.id_module,intitule FROM Module
                    join dispose_de on dispose_de.id_module=Module.id_module
                    join semestre on module.id_semestre=semestre.id_semestre
                    where semestre.semestre='$semester'
                    and dispose_de.id_filiere in (select id_filiere 
                                                    from etudiant 
                                                        where id=?)";
        return $sql;
    }
    function getMarks($type, $module, $etudiant)
    {
        $db1 = DB::getInstance();
        $sql = "SELECT note FROM passe
                            join controle on controle.id_controle=passe.id_controle
                            where passe.id_etudiant=?
                            and controle.type=?
                            and controle.id_module=?
                            order by controle.date";

        $resultats = $db1->query($sql, [$etudiant, $type, $module]);
        return $resultats->results();
    }
    function getCoiffissient($module)
    {
        $db2 = DB::getInstance();
        $sql = "SELECT * from dispose_de where id_module=?";
        $resultats = $db2->query($sql, [$module]);
        return $resultats->first();
    }
    function getSemestre()
    {
        $db3 = DB::getInstance();
        $sql = "SELECT date_fin from semestre order by semestre";
        $resultats = $db3->query($sql, []);
        return $resultats->first();
    }
    ?>
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
            <tr style="background: rgba(0, 0, 0, 0.1); font-weight: bold; font-size:large;">
                <td>Semestre 1</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php
            $db->query(sqlStatment('Semestre 1'), [$id]);
            foreach ($db->results() as $row) {
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $row->intitule ?></td>

                        <!-- Controles -->
                        <td id='bold' style="padding:0px;">
                            <table class="table">
                                <?php
                                $markcontrole = getMarks('controle', $row->id_module, $id); //db hada tableau dyl les objets!
                                $controleCount = count($markcontrole);
                                $sommeControle = 0;
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
                                ?>
                            </table>
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
                            $results = getCoiffissient($row->id_module);
                            $coeff_controle = $results->coeff_controle;
                            $coeff_examen = $results->coeff_examen;
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
                        <td>Semestre 2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                    $db->query(sqlStatment('Semestre 2'), [$id]);
                    foreach ($db->results() as $row0) {
                    ?>
                        <tr>
                            <td><?php echo $row0->intitule ?></td>
                            <td id='bold' style="padding:0px;">
                                <table class="table">
                                    <?php
                                    $markcontrole = getMarks('controle', $row0->id_module, $id); //db hada tableau dyl les objets!
                                    $controleCount = count($markcontrole);
                                    $sommeControle = 0;
                                    echo '<thead>';
                                    echo '<tr>';
                                    for ($i = 1; $i <= $controleCount; $i++) {
                                        echo "<th>Controle $i</th>";
                                    }
                                    echo '</thead>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    foreach ($markcontrole as $obj) {
                                        echo "<td id='bold'>$obj->note</td>";
                                        $sommeControle += $obj->note;
                                    }
                                    echo '</tr>';
                                    ?>
                                </table>
                            </td>
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

                            <td id='bold'>
                                <?php
                                $results = getCoiffissient($row0->id_module);
                                $coeff_controle = $results->coeff_controle;
                                $coeff_examen = $results->coeff_examen;
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
<!-- btn btn-outline-success -->