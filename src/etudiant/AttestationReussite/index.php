<?php
require_once '../../../core/init.php';
require '../../../lib/fpdf/fpdf.php';
include_once '../../../fonctions/tools.function.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $db = DB::getInstance();
    // if (demandeCheck($id, 'releve', 1)) {

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
                $this->cell(190, 8, 'ATTESTATION DE REUSSITE AU DIPLOME', 1, 1, 'C',true);
                $this->Ln(10);
            }
            function Student_information($id)
            {
                $this->SetFont('Times', '', 12);
                $resultsInfo = getPersonInfo($id);
                $resultStudentInfo = getStudentsInfo($id);
                $nom_prenom = strtoupper($resultsInfo->nom . ' ' . $resultsInfo->prenom);
                $filiere = $resultStudentInfo->first()->nom_filiere;
                $annee= getDatesSemestre(2)->first()->date_fin;
                $this->cell(190, 7, 'LE DOYEN DE LA FORMATION CONTINUE DU CASABLANCA (FCC) atteste que', 0, 0, 'C');
                $this->Ln();

                $this->SetFont('Arial', 'B', 12);
                $this->cell(190, 7, 'LE Diplome de la formation continue a la filiere '.$filiere, 0, 0, 'C');
                $this->Ln();

                $this->SetFont('Times', '', 12);
                $this->cell(190, 7, 'a ete decerne a', 0, 0, 'C');
                $this->Ln();$this->Ln();

                $this->SetFont('Arial', 'B', 12);
                $this->cell(190, 7, 'Monsieur '. $nom_prenom , 0, 0, 'C');
                $this->Ln();

                $this->SetFont('Times', '', 12);
                $this->cell(190, 7, 'ne le 16 juin 1999 a CASABLANCA' , 0, 0, 'C');
                $this->Ln();$this->Ln();

                $this->cell(190, 7, "au titre de l'annee $annee avec la mention " , 0, 0, 'C');
                $this->Ln();
                $this->Line(160,100,50,100);

            }
            function footer()
            {
                $this->SetY(-50);
                $this->SetFont('Times', '', 11);
                $this->cell(95, 10, 'Fait a Casablanca, le '.date('d F Y', time()) , 0, 1, 'R');
                $this->cell(100, 10, 'LE DOYEN DE LA FORMATION CONTINUE DU CASABLANCA  ' , 0, 1, 'L');
                $this->SetY(-18);
                $this->SetFont('Arial', '8', 10);
                $this->cell(190, 5, "Avis important: Il ne peut etre delivre qu'un seul exemplaire du present releve de note. Acun duplcata ne sera fourni.", 0, 0, 'C');
                $this->Ln(2);
            }
            
        }

        $pdf = new myPDF();
        $pdf->SetFillColor(230,230,230);
        $pdf->AliasNbPages();
        $pdf->AddPage('P', 'A4', 0);
        $pdf->Student_information($id);
        $pdf->Output();
    // } else
    //     header("Location: ../404/");
} else
    header("Location: ../404/");
