<?php
require_once '../../../core/init.php';
require '../../../lib/fpdf/fpdf.php';
include_once '../../../fonctions/tools.function.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $db = DB::getInstance();
    if (demandeCheck($id, 'attestation', 1)) {
        $type = 'une attestation de scolarité';
        $sql = "UPDATE Demandes
        SET etat = ?
        WHERE id_etudiant = ?
        AND type = ?";
        $db->query($sql, [2,$id, $type]);

        class myPDF extends FPDF
        {
            function header()
            {
                $this->SetFont('Arial', '8', 12);
                $this->cell(50, 5, 'ROYAUME DU MAROC', 0, 1, 'L'); 
                $this->SetFont('Times', '', 8);
                $this->cell(50, 5, 'FORMATION CONTINUE DE CASABLANCA', 0, 1, 'L'); 
                $this->SetFont('Times', '', 10);
                $this->cell(50, 10, 'Service des Affaires Estudiantines', 0, 1, 'L'); 
                $this->Line(11,27,67,27);
                $this->Ln(12);
                $this->SetFont('Arial', '8', 17);
                $this->cell(190, 10, "ATTESTATION D'INSCRIPTION", 0, 1, 'C'); 
                $this->Ln(12);


            }
            function Student_information($id)
            {
                $this->SetFont('Times', '', 10);
                $resultsInfo = getPersonInfo($id);
                $resultStudentInfo = getStudentsInfo($id);
                $nom_prenom = strtoupper($resultsInfo->nom) . ' ' . $resultsInfo->prenom;
                $cne =$resultStudentInfo->first()->cne;
                $filiere = $resultStudentInfo->first()->nom_filiere;
                $date_naissance = $resultsInfo->date_naissance;
                $annee= getDatesSemestre(2)->first()->date_fin;

                $this->cell(10, 5, '' , 0, 0, 'C');
                $this->cell(160, 5, "LE DOYEN DE LA FORMATION CONTINUE DU CASABLANCA (FCC) atteste que l'etudiant:", 0, 1, 'L');
                $this->cell(10, 5, '' , 0, 0, 'C');
                $this->cell(15, 5, 'Monsieur ', 0, 0, 'L');
                $this->SetFont('Arial', '8', 11);
                $this->cell(190, 5,  $nom_prenom, 0, 0, 'L');
                $this->Ln(10);
                $this->SetFont('Times', '', 10);

                $this->cell(10, 5, '' , 0, 0, 'C');
                $this->cell(57, 5, "Numere de la cart d'identite national : ", 0, 0, 'L');
                $this->cell(190, 5, $id , 0, 0, 'L');
                $this->Ln(10);

                $this->cell(10, 5, '' , 0, 0, 'C');
                $this->cell(50, 5, "Code national de l'etudiant : ", 0, 0, 'L');
                $this->cell(190, 5,$cne  , 0, 0, 'L');
                $this->Ln(10);

                $this->cell(10, 5, '' , 0, 0, 'C');
                $this->cell(50, 5, 'ne le '.$date_naissance.' a CASABLANCA (MAROC)', 0, 0, 'L');
                $this->Ln(10);

                $this->cell(10, 5, '' , 0, 0, 'C');
                $this->cell(160, 5, "est regilierement inscrit a la formation continue du casablanca (FCC):", 0, 1, 'L');
                $this->Ln(6);

                $this->SetFont('Arial', '8', 11);
                $this->cell(10, 5, '' , 0, 0, 'C');
                $this->cell(160, 5, "Diplome :", 0, 1, 'L');
                $this->Ln(10);

            }
            function footer()
            {
                $this->SetY(-140);
                $this->SetFont('Times', '', 11);
                $this->cell(170, 10, 'Fait a Casablanca, le '.date('d F Y', time()) , 0, 1, 'R');
                $this->cell(190, 10, 'LE DOYEN DE LA FORMATION CONTINUE DU CASABLANCA  ' , 0, 1, 'R');
                $this->Line(11,185,200,185);
                $this->Ln();
                $this->SetFont('Arial', '8', 11);
                $this->cell(20, 7, 'Adresse : ' , 0, 0, 'L');
                $this->SetFont('Times', '', 11);
                $this->cell(190, 7, "Km 8 Route d'El Jadida" , 0, 1, 'L');
                $this->cell(20, 7, '' , 0, 0, 'L');
                $this->cell(190, 7, "BP: 5366 Maarif Casablanca" , 0, 1, 'L');
                $this->cell(20, 7, '' , 0, 0, 'L');
                $this->cell(190, 7, "Tel: 022-23-06-80 FAX: 022-23-06-98" , 0, 1, 'L');
                $this->Line(11,210,200,210);
                $this->SetY(-80);
                $this->SetFont('Arial', '8', 11);
                $this->cell(190, 5, "Le resent document n'est delivre qu'un seul exemplaire", 0, 1, 'C'); 
                $this->cell(190, 5, "Il apparient a l'etudiant d'en faire des photocopier certifiees conformes", 0, 1, 'C');
                $this->Ln(2);
            }
            
        }

        $pdf = new myPDF();
        $pdf->SetFillColor(230,230,230);
        $pdf->AliasNbPages();
        $pdf->AddPage('P', 'A4', 0);
        $pdf->Student_information($id);
        $pdf->Output();
    } else
        header("Location: ../404/");
} else
    header("Location: ../404/");
