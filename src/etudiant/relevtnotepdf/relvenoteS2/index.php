<?php
require_once '../../../../core/init.php';
require '../../../../lib/fpdf/fpdf.php';
include_once '../../../../fonctions/tools.function.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $db = DB::getInstance();
    if (demandeCheck($id, 'releve', 1)) {
        $type = 'un relevé de notes';
        $sql = "UPDATE Demandes
        SET etat = ?
        WHERE id_etudiant = ?
        AND type = ?";
        $db->query($sql, [2, $id, $type]);


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

        class myPDF extends FPDF
        {
            function header()
            {
                $this->SetFont('Arial', '8', 14);
                $this->cell(100, 10, 'Formation Continue du Casablanca', 0, 0, 'L');
                $this->cell(90, 10, 'FCC', 0, 0, 'R');
                $this->Ln();
                $this->cell(190, 8, 'RELVE DE NOTES ET RESULTATS', 1, 1, 'C', true);
                $this->cell(190, 8, 'SEMESTRE 2', 0, 0, 'C');
                $this->Ln(10);
            }
            function Student_information($id)
            {
                $this->SetFont('Arial', 'B', 15);
                $resultsInfo = getPersonInfo($id);
                $resultStudentInfo = getStudentsInfo($id);
                $nom_prenom = strtoupper($resultsInfo->nom) . ' ' . $resultsInfo->prenom;
                $cin = $resultsInfo->id;
                $cne = $resultStudentInfo->first()->cne;
                $date_naissane = $resultsInfo->date_naissance;
                $filiere = $resultStudentInfo->first()->nom_filiere;
                $this->cell(80, 10, $nom_prenom, 0, 0, 'L');
                $this->Ln();
                $this->SetFont('Times', '', 12);
                $this->cell(80, 7, 'CIN: ' . $cin, 0, 0, 'L');
                $this->cell(100, 7, 'CIN: ' . $cne, 0, 0, 'L');
                $this->Ln();
                $this->cell(80, 7, 'Ne le: ' . $date_naissane, 0, 0, 'L');
                $this->cell(100, 7, 'à: ' . 'CASABLANCA', 0, 0, 'L');
                $this->Ln();

                $this->cell(20, 10, 'Inscrit en: ', 0, 0, 'L');
                $this->SetFont('Arial', '8', 14);
                $this->cell(100, 10, $filiere, 0, 0, 'L');
                $this->SetFont('Times', '', 13);
                $this->Ln();
                $this->cell(80, 10, 'a obtenu les notes suivants :', 0, 0, 'L');
                $this->Ln();
            }
            function footer()
            {
                $this->SetY(-50);
                $this->SetFont('Times', '', 11);
                $this->cell(95, 10, 'Fait a Casablanca, le ' . date('d F Y', time()), 0, 1, 'R');
                $this->cell(100, 10, 'LE DOYEN DE LA FORMATION CONTINUE DU CASABLANCA  ', 0, 1, 'L');
                $this->SetY(-18);
                $this->SetFont('Arial', '8', 14);
                $this->cell(0, 10, 'Page : ' . $this->PageNo() . ' / {nb}', 0, 1, 'C');
                $this->SetFont('Arial', '8', 10);
                $this->cell(190, 5, "Avis important: Il ne peut etre delivre qu'un seul exemplaire du present releve de note. Acun duplcata ne sera fourni.", 0, 0, 'C');
                $this->Ln(2);
            }
            function headerTable()
            {
                $this->SetFont('Times', '', 11);
                $this->cell(100, 10, 'Module', 1, 0, 'C');
                $this->cell(35, 10, 'Moyenne Generale', 1, 0, 'C');
                $this->cell(25, 10, 'Resultat', 1, 0, 'C');
                $this->cell(30, 10, 'Session', 1, 0, 'C');
                $this->Ln();
            }
            function viewTable($db, $id)
            {
                $this->SetFont('Times', '', 11);
                $resultat = $db->query(sqlStatment('2eme Semestre'), [$id]);
                $countModule = $resultat->count();
                $noteExamFinaleratt = -1;
                $examCount = 0;
                $somme_moyenne_normal = 0;
                $somme_moyenne_ratt = 0;
                foreach ($resultat->results() as $row) {
                    $resultat_is_there_ratt_mark = is_there_ratt_mark_for_student($id, $row->id_module)->count();
                    $resultat_is_there_ratt_exam = is_there_ratt_exam_for_student($id, $row->id_module)->count();

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
                    if ($resultat_is_there_ratt_exam) {
                        if ($resultat_is_there_ratt_mark) {
                            $noteExamen = $noteExamFinale > $noteExamFinaleratt ? $noteExamFinale : $noteExamFinaleratt;
                            $moyModule = ($noteExamen * $coeff_examen + ($sommeControle / $controleCount) * $coeff_controle);
                            $somme_moyenne_ratt += $moyModule;
                            $examCount++;
                        } else
                            $moyModule =  "";
                    } else {
                        $noteExamen = $noteExamFinale;
                        $moyModule = ($noteExamen * $coeff_examen + ($sommeControle / $controleCount) * $coeff_controle);
                        $somme_moyenne_normal += $moyModule;
                        $examCount++;
                    }
                    if ($resultat_is_there_ratt_exam)
                        $resultatExamens = "V apres RAT"; // 5asak test wache valida oula fl ratt
                    else
                        $resultatExamens = "Valide";

                    if ($resultat_is_there_ratt_exam)
                        $SessionExamens = "S2"; // 5asak test wache valida oula fl ratt
                    else
                        $SessionExamens = "S1";

                    $this->cell(100, 10, $row->intitule, 1, 0, 'L');
                    $this->cell(35, 10, $moyModule . '15 / 20', 1, 0, 'C');
                    $this->cell(25, 10, $resultatExamens, 1, 0, 'C');
                    $this->cell(30, 10, $SessionExamens, 1, 0, 'C');
                    $this->Ln();
                }
                $moySem1 = ($somme_moyenne_normal + $somme_moyenne_ratt) / $countModule;
                $this->SetFont('Arial', '8', 13);
                $this->cell(100, 10, "Resultat d'admission Semestre 1 :", 0, 0, 'L');
                $this->cell(35, 10, $moySem1 . '15 / 20', 0, 0, 'C');
                $this->cell(25, 10, 'Valide', 0, 0, 'C');
                $this->cell(30, 10, '', 0, 0, 'C');
            }
        }

        $pdf = new myPDF();
        $pdf->SetFillColor(230, 230, 230);
        $pdf->AliasNbPages();
        $pdf->AddPage('P', 'A4', 0);
        $pdf->Student_information($id);
        $pdf->headerTable();
        $pdf->viewTable($db, $id);
        $pdf->Output();
    } else
        header("Location: ../404/");
} else
    header("Location: ../404/");
