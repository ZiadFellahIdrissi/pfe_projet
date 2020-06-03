<?php
    class User_Prof{
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
                $dataPas=$this->_db->getPDO()->query("SELECT Personnel.id
                                                      FROM Personnel JOIN Utilisateur ON Personnel.id = Utilisateur.id 
                                                      WHERE Utilisateur.username = '$username' 
                                                      AND Utilisateur.password = '$password' "); 
                
                if(!empty($dataPas->fetch(PDO::FETCH_OBJ)))
                    return true;
            }
            return false;
        }

        public function find($username = null){
            if($username){
                $data=$this->_db->getPDO()->query("SELECT *
                                                   FROM Personnel
                                                   JOIN Utilisateur ON Personnel.id = Utilisateur.id 
                                                   WHERE Utilisateur.username = '$username'");

                if(!empty($this->_data=$data->fetch(PDO::FETCH_OBJ)))
                    return true;
            }
            return false;
        }

        public function data(){
            return $this->_data;
        }

        public function logout(){
            Session::delete($this->_sessionName);
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

        public function isLoggedIn(){
            return $this->_isLoggedIn;
        }
    
}