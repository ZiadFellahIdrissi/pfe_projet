<?php
    class User_Etudiant{
        private $_db,
                $_data,
                $_sessionName,
                $_isLoggedIn;

        public function __construct($user = null){
            $this->_db=DB::getInstance();
            $this->_sessionName = Config::get('session/session_name');
            if(!$user){
                if(Session::exists(($this->_sessionName))){
                    $user=Session::get($this->_sessionName);
                    if($this->find($user)){
                        $this->_isLoggedIn=true;
                    }else{
                        // process logout
                    }

                }
            }else{
                $this->find($user);
            }

        }
        public function checkPassword($username = null ,$password=null ){
            if($username && $password){
                $dataPas=$this->_db->getPDO()->query("SELECT Etudiant.id
                                                    FROM Etudiant JOIN Utilisateur ON Etudiant.id = Utilisateur.id 
                                                    WHERE Utilisateur.username = '$username' 
                                                    AND Utilisateur.password = '$password'"); 
                if(!empty($dataPas->fetch(PDO::FETCH_OBJ)))
                    return true;
            }
            return false;
        }

        public function find($username = null){
            if($username){
                $data=$this->_db->getPDO()->query("SELECT *
                                                   FROM Etudiant
                                                   JOIN Utilisateur ON Etudiant.id = Utilisateur.id 
                                                   WHERE Utilisateur.username = '$username' ");
                if(!empty($this->_data=$data->fetch(PDO::FETCH_OBJ)))
                    return true;
            }
            return false;
        }

        public function login($username = null , $password = null){
            $user = $this->find($username);
            $userPas =$this->checkPassword($username,$password);
            if($user){
                if($userPas){
                Session::put($this->_sessionName, $this->data()->username);
                return true;
                }
            }
            return false;
        }

        // signup
        public function checkUserExistence($cin = null, $date = null, $cne = null){
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

        public function isAlreadyActivated($cin){
            if($cin){
                $dataPas=$this->_db->getPDO()->query("SELECT id
                                                      FROM Utilisateur
                                                      WHERE id = '$cin'
                                                      AND `password` is not null"); 
                if(!empty($dataPas->fetch(PDO::FETCH_OBJ)))
                    return true;
            }
            return false;
        }

        public function signup($cin, $email, $username, $password){
            if($cin && $email && $username && $password){
                $data=$this->_db->getPDO()->query("UPDATE Utilisateur
                                                    SET username = '$username',
                                                        password = '$password',
                                                        email = '$email'
                                                    WHERE id = '$cin'");
            }
        }
        //end signup

        public function data(){
            return $this->_data;
        }

        public function logout(){
            Session::delete($this->_sessionName);
        }


        public function isLoggedIn(){
            return $this->_isLoggedIn;
        }
    
}