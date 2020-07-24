<?php
class ActiveCompte
{
    private $_db;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function checkStudentExistence($cin = null, $date = null, $cne = null)
    {
        if ($cin && $date && $cne) {
            $sql = "SELECT Etudiant.id, Utilisateur.date_naissance, Utilisateur.telephone
                    FROM Etudiant
                    JOIN Utilisateur ON Utilisateur.id = Etudiant.id
                    WHERE Etudiant.id = ?
                    AND Etudiant.cne = ?
                    AND Utilisateur.date_naissance = ?";
            $dataPas = $this->_db->query($sql, [$cin, $cne, $date]);
            return $dataPas->count() ? true : false;
        }
        return false;
    }

    public function checkProfExistence($cin = null, $date = null, $Som = null)
    {
        if ($cin && $date && $Som) {
            $sql = "SELECT *
                    FROM Personnel
                    JOIN Utilisateur ON Utilisateur.id = Personnel.id
                    WHERE Personnel.id = ?	
                    AND Personnel.som = ?
                    AND Utilisateur.date_naissance = ?";
            $dataPas = $this->_db->query($sql, [$cin, $Som, $date]);
            return $dataPas->count() ? true : false;
        }
        return false;
    }

    public function checkEmail($cin, $email)
    {
        if ($cin && $email) {
            $sql = "SELECT id
                    FROM Utilisateur
                    WHERE id != ?
                    AND email = ?";
            $dataPas = $this->_db->query($sql, [$cin, $email]);
            return $dataPas->count() ? true : false;
        }
        return false;
    }

    public function checkUserEmail($cin, $email)
    {
        if ($cin && $email) {
            $sql = "SELECT id
                    FROM Utilisateur
                    WHERE id = ?
                    AND email = ?";
            $dataPas = $this->_db->query($sql, [$cin, $email]);
            return $dataPas->count() ? true : false;
        }
        return false;
    }

    public static function  isAlreadyActivated($cin)
    {
        if ($cin) {
            $sql = "SELECT id
                    FROM Utilisateur
                    WHERE id = ?
                    AND `password` is not null";
            $dataPas = DB::getInstance()->query($sql, [$cin]);
            return $dataPas->count() ? true : false;
        }
        return false;
    }

    public function signup($cin, $email, $username, $password)
    {
        $hashed_password=password_hash($password,PASSWORD_DEFAULT);
        if ($cin && $email && $username && $password) {
            $data = $this->_db->query("UPDATE Utilisateur
                                            SET username = ?,
                                                `password` = ?,
                                                email = ?
                                            WHERE id = ?", array($username, $hashed_password, $email, $cin));

            return ($data->error());
        }
    }
    //end signup

    public static function setPassword($cin, $password)
    {
        $hashed_password=password_hash($password,PASSWORD_DEFAULT);
        if ($cin && $password) {
            $data = DB::getInstance()->query("UPDATE Utilisateur
                                            SET `password` = ?
                                            WHERE id = ?", array($hashed_password, $cin));
            return ($data->error());
        }
    }
}
