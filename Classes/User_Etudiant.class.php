<?php
class User_Prof{
    private $_db,
            $_data,
            $_sessionName,
            $_isLoggedIn;

    public function __construct($user = null){
        $this->_db=DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');

    }
}