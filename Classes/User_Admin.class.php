<?php
class User_Admin{
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
                $filed = (is_numeric($username)) ? 'id' : 'username';
                $dataPas=$this->_db->query("SELECT * FROM users where $filed=? and pasword=? and letype=?",array($username,$password,'admin'));
                if($dataPas->count()){
                    return true;
                }
                return false;
            }
            return false;

        }
    }

    public function find($username = null){
        if($username){
            $filed = (is_numeric($username)) ? 'id' : 'username';
            $data=$this->_db->query("SELECT * FROM users where $filed=? and letype=?",array($username,'admin'));
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

    public function login($email = null , $password = null){
        $user = $this->find($email);
        $userPas =$this->checkPassword($email,$password);
        if($user){
            if($userPas){
            Session::put($this->_sessionName,$this->data()->id);
            return true;
            }
        }
        return false;
    }
    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }

}