<?php
require_once '../../../core/init.php';
require '../../../lib/fpdf/fpdf.php';
include_once '../../../fonctions/tools.function.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $db = DB::getInstance();
    if (demandeCheck($id, 'releve', 1)) {

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
                $this->cell(276, 5, 'RELVE DE NOTES ET RESULTATS', 0, 0, 'C');
                $this->Ln();
                $this->SetFont('Times', '', 12);
                $this->cell(276, 10, 'Session 1', 0, 0, 'C');
                $this->Ln(20);
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
                $this->cell(80, 10, 'CIN: ' . $cin, 0, 0, 'L');
                $this->cell(100, 10, 'CIN: ' . $cne, 0, 0, 'L');
                $this->Ln();
                $this->cell(80, 10, 'Ne le: ' . $date_naissane, 0, 0, 'L');
                $this->cell(100, 10, 'à: ' . 'CASABLANCA', 0, 0, 'L');
                $this->Ln();
                $this->SetFont('Arial', '8', 14);
                $this->cell(100, 10, 'Inscrit en: '  . $filiere, 0, 0, 'L');
                $this->SetFont('Times', '', 13);
                $this->Ln();
                $this->cell(80, 10, 'a obtenu les notes suivants :', 0, 0, 'L');
                $this->Ln();
            }
            function footer()
            {
                $this->SetY(-15);
                $this->SetFont('Arial', '8', 14);
                $this->cell(0, 10, 'Page' . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
            function headerTable()
            {
                $this->SetFont('Times', '', 12);
                $this->cell(120, 10, 'Module', 1, 0, 'C');
                $this->cell(50, 10, 'Moyenne Generale', 1, 0, 'C');
                $this->cell(50, 10, 'Resultat', 1, 0, 'C');
                $this->cell(55, 10, 'Session', 1, 0, 'C');
                $this->Ln();
            }
            function viewTable($db, $id)
            {
                $this->SetFont('Times', '', 12);
                $resultat = $db->query(sqlStatment('1ere Semestre'), [$id]);
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

                    $moySem1 = ($somme_moyenne_normal + $somme_moyenne_ratt) / $countModule;


                    $this->cell(120, 10, $row->intitule, 1, 0, 'L');
                    $this->cell(50, 10, $moyModule . '15 / 20', 1, 0, 'C');
                    $this->cell(50, 10, $resultatExamens, 1, 0, 'C');
                    $this->cell(55, 10, $SessionExamens, 1, 0, 'C');
                    $this->Ln();
                }
                $this->cell(120, 10, "Resultat d'admission Semestre 1 :", 0, 0, 'L');
                $this->cell(50, 10, $moySem1 . '15 / 20', 0, 0, 'C');
                $this->cell(50, 10, 'Valide', 0, 0, 'C');
                $this->cell(55, 10, '', 0, 0, 'C');
            }
        }

        $pdf = new myPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage('L', 'A4', 0);
        $pdf->Student_information($id);
        $pdf->headerTable();
        $pdf->viewTable($db, $id);
        $pdf->Output();
    } else
        header("Location: ../404/");
} else
    header("Location: ../404/");
