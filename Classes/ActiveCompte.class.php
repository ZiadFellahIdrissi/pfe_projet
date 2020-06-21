<?php
    class ActiveCompte{
        private $_query,
                $_error = false,
                $_results = '',
                $_count = 0;
        
        public function checkStudentExistence($cin = null, $date = null, $cne = null){
            if($cin && $date && $cne){
                $dataPas=$this->_db->getPDO()->query("SELECT Etudiant.id, Utilisateur.date_naissance, Utilisateur.telephone
                                                    FROM Etudiant
                                                    JOIN Utilisateur ON Utilisateur.id = Etudiant.id
                                                    WHERE Etudiant.id = '$cin'
                                                    AND Etudiant.cne = '$cne'
                                                    AND Utilisateur.date_naissance = '$date'"); 
                if(!empty($dataPas->fetch(PDO::FETCH_OBJ)))
                    return true;
            }
            return false;
        }

        public function checkProfExistence($cin = null, $date = null, $Som = null){
            if($cin && $date && $Som){
                $dataPas=$this->_db->getPDO()->query("SELECT Etudiant.id, Utilisateur.date_naissance, Utilisateur.telephone
                                                    FROM personnel
                                                    JOIN Utilisateur ON Utilisateur.id = Etudiant.id
                                                    WHERE Personnel.id = '$cin'
                                                    AND Personnel.som = '$Som'
                                                    AND Utilisateur.date_naissance = '$date'"); 
                if(!empty($dataPas->fetch(PDO::FETCH_OBJ)))
                    return true;
            }
            return false;
        }

        public function checkEmail($cin, $email){
            if($cin && $email){
                $dataPas=$this->_db->getPDO()->query("SELECT id
                                                    FROM Utilisateur
                                                    WHERE id != '$cin'
                                                    AND email = '$email'"); 
                if(!empty($dataPas->fetch(PDO::FETCH_OBJ)))
                    return true;
            }
            return false;
        }

        public function checkUserEmail($cin, $email){
            if($cin && $email){
                $dataPas=$this->_db->getPDO()->query("SELECT id
                                                    FROM Utilisateur
                                                    WHERE id = '$cin'
                                                    AND email = '$email'"); 
                if(!empty($dataPas->fetch(PDO::FETCH_OBJ)))
                    return true;
            }
            return false;
        }

        public function isAlreadyActivated($cin){
            if($cin){
                $dataPas=$this->_db->getPDO()->query("SELECT id
                                                    FROM Utilisateur
                                                    WHERE id = '$cin'
                                                    AND password is not null"); 
                if(!empty($dataPas->fetch(PDO::FETCH_OBJ)))
                    return true;
            }
            return false;
        }

        public function signup($cin, $email, $username, $password){
            if($cin && $email && $username && $password){
                $data=$this->_db->query("UPDATE Utilisateur
                                            SET username = ?,
                                                `password` = ?,
                                                email = ?
                                            WHERE id = ?",array($username,$password,$email,$cin));

            return($data->error());
            }
        }
        //end signup

        public function setPassword($cin, $password){
            if($cin && $password){
                $data=$this->_db->query("UPDATE Utilisateur
                                            SET `password` = ?
                                            WHERE id = ?",array($password,$cin));
                return($data->error());
            }
        }
    }
