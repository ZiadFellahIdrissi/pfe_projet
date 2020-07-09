<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
include '../../connection.php';
$email = strtolower($_POST["email"]);
$username = $_POST["username"];

$sqltest = "SELECT Utilisateur.email
            FROM Utilisateur
            WHERE Utilisateur.email = '$email'";

$numrow = mysqli_num_rows(mysqli_query($conn, $sqltest));
if ($numrow) {
    goto checkpicture;
}
$sql = "UPDATE administrateur
        SET `email` = '$email'
        WHERE username = '$username'";
mysqli_query($conn, $sql);

checkpicture: $imagepath = getAdminInfo($username)->imagepath;
//CHANGEMENT DE IMAGE
$file = $_FILES['file'];
$fileName = $_FILES['file']['name'];
$filetmp = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));
$allowedExtensions = array("jpg", "jpeg", "png", "gif", "bmp");
if ($fileName != '') {
    if (in_array($fileActualExt, $allowedExtensions)) { // kanteste wache l'extention dyal l fichie li 3tani wahda mane hadok li ana baghi
        if ($fileError === 0) {  // kantetste bli makayne hta error fl upload  ==//== ila kante égale à 1 rahe kayne mochkile
            if ($fileSize < 50000000) {
                $filenewname = uniqid('', true) . "." . $fileActualExt;
                $fileDistination = "../../../img/profiles/$filenewname";
                if (move_uploaded_file($filetmp, $fileDistination)) {

                    if ($imagepath != 'enseignant.svg') {
                        if (file_exists("../../../img/profiles/$imagepath")) {
                            unlink("../../../img/profiles/$imagepath");
                        }
                    }

                    $sql = "UPDATE administrateur
                                SET `imagepath` = '$filenewname'
                            WHERE username = '$username'";
                    mysqli_query($conn, $sql);
                    if ($numrow)
                        echo 'email';
                    else
                        echo 'good';
                }
            } else {
                echo 'taille';
            }
        } else {
            echo 'essai une autre photo ' . ' ' . $fileError;
        }
    } else {
        echo "file not allowed";
    }
} else {
    if ($numrow) {
        header("Location: ./?errmail&email=$email");
    } else
        header("Location: ./");
}
