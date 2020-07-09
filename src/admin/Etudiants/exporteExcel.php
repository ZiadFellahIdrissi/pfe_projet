<?php
include_once '../../../fonctions/tools.function.php';
include_once '../../../core/init.php';
$db = DB::getInstance();
if (isset($_GET["print-excel"]) && isset($_GET["id_filiere"])) {
    $id_filiere = $_GET['id_filiere'];
    $output = '';
    $sql = "SELECT Utilisateur.id cin, Etudiant.cne, Utilisateur.nom, Utilisateur.prenom,
                Utilisateur.telephone, Utilisateur.email, Utilisateur.date_naissance,
                Etudiant.id_filiere, Filiere.nom_filiere filiere
        FROM Utilisateur 
        join Etudiant ON Etudiant.id = Utilisateur.id
        join Filiere on Etudiant.id_filiere=Filiere.id_filiere
        WHERE Etudiant.id_filiere = $id_filiere";
    $results = $db->query($sql, [$id_filiere]);
    if ($results->count()) {
        $output .= '<table class="table" bordered="1">
                    <thead style="background: rgba(0, 0, 0, 0.16);">
                    <tr>
                        <th>CIN</th>
                        <th>CNE</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date naissance</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Filiere</th>
                    </tr>
                    </thead>';
        foreach ($results->results() as $row) {
            $nomfiliere = $row->filiere;
            $output .= '
                    <tr>
                        <td>' . $row->cin . '</td>
                        <td>' . $row->cne . '</td>
                        <td>' . $row->nom  . '</td>
                        <td>' . $row->prenom  . '</td>
                        <td>' . $row->date_naissance  . '</td>
                        <td>' . $row->telephone  . '</td>
                        <td>' . $row->email  . '</td>
                        <td>' . $row->filiere  . '</td>
                    </tr>';
        }
    }
    $output .= '</table>';
    header("Content-Type: application/xls");
    header("Content-Disposition:attachment; filename=Etudiants_" . $nomfiliere . "_" . date('yy/m/d h:m', time()) . ".xls");
    echo $output;
}
