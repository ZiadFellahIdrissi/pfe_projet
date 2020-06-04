<?php
include_once '../../core/init.php';
include '../connection.php';
if (isset($_POST["logindirect"])) {
    $User_Etudiant = new User_Etudiant();
    $loginEtudiant = $User_Etudiant->login($_POST["user"], $_POST["pass"]);
    $cin=$_POST["cin"];
  
    //===================charge l'image====================================
    $file = $_FILES['file']; // t9adre tchoufe l file kamle chno fihe b print_r($file);
    $fileName = $_FILES['file']['name'];
    $filetmp = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    //===================end charging==========================================

    //===================traitement de fiche===================================

    $fileExt = explode('.', $fileName); // bache N9dare n3rafe l extention dyal fichie li gha i3tini 
    $fileActualExt = strtolower(end($fileExt));  // 5ase darori l extention tkone MINIUSCULE bache ma ytra ta chi ghalat
    $allowedExtensions = array("jpg", "jpeg", "png", "gif", "bmp"); // l'fichie li n9dare nsma7 lihom idozo fl form 
    if ($fileName != '') {
        if (in_array($fileActualExt, $allowedExtensions)) { // kanteste wache l'extention dyal l fichie li 3tani wahda mane hadok li ana baghi
            if ($fileError === 0) {  // kantetste bli makayne hta error fl upload  ==//== ila kante égale à 1 rahe kayne mochkile
                if ($fileSize < 50000000) {
                    $filenewname = uniqid('', true).".".$fileActualExt;
                    // 3tito smmiya 5ra bache ila bgha ida5le liya file b nafse smiya maytrache mochkil
                    $fileDistination = "../../img/profiles/$filenewname";
                    move_uploaded_file($filetmp, $fileDistination); //returns 1 if success
                    // hna sf l9adiya mzyana ou tswira t uploadat donc n9dare 
                    //nsifto l espace dyalo ou insere l image f la base
                    $sql="UPDATE Utilisateur
                            SET `imagepath`='$filenewname'
                          WHERE id=".$cin;
                    mysqli_query($conn, $sql);
                    header("Location: ../etudiant/");

                } else {
                    header("Location: ./welcome.php?uploadSize=Notgood");
                }
            } else {
                header("Location: ./welcome.php?uploadError=true");
            }
        } else {
            header("Location: ./welcome.php?uploadext=notAlowed");
        }
    } else {
        $sql="UPDATE Utilisateur
                    SET `imagepath` = 'avatar.svg'
                    WHERE id=".$cin;
        mysqli_query($conn, $sql);
    }
    header("Location: ../etudiant/");
        
}
