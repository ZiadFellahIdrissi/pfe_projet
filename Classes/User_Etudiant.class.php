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
        if($username){
            if($password){
                $dataPas=$this->_db->query("SELECT *
                                            FROM etudiant JOIN utilisateur 
                                            ON etudiant.id=utilisateur.id 
                                            WHERE username = ? 
                                            AND utilisateur.password=?",array($username,$password)); 
                if($dataPas->count()){
                    $this->_data=$dataPas->first();
                    return true;
                }
                return false;
            }
            return false;

        }
    }

    public function find($username = null){
        if($username){
            $data=$this->_db->query("SELECT *
                                    FROM etudiant JOIN utilisateur 
                                    ON etudiant.id=utilisateur.id 
                                    WHERE etudiant.id = ? ",array($username));
                if($data->count()){
                    $this->_data=$data->first();
                    return true;
                }
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
        $userPas =$this->checkPassword($username,$password);
            if($userPas){
            Session::put($this->_sessionName, $this->data()->id);
            return true;
            }
        return false;
    }
    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }
    
}