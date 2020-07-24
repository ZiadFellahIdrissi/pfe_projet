<?php
class User_Etudiant
{
    private $_db,
        $_data,
        $_sessionName,
        $_isLoggedIn;

    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
        if (!$user) {
            if (Session::exists(($this->_sessionName))) {
                $user = Session::get($this->_sessionName);
                if ($this->find($user)) {
                    $this->_isLoggedIn = true;
                } else {
                    // process logout
                }
            }
        } else {
            $this->find($user);
        }
    }


    public function find($username = null)
    {
        if ($username) {
            $sql = "SELECT *
            FROM Etudiant JOIN Utilisateur ON Etudiant.id = Utilisateur.id 
            WHERE Utilisateur.username = ?";
            $resultat = $this->_db->query($sql, [$username]);
            if ($resultat->count()) {
                $this->_data = $resultat->first();
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $password = null)
    {
        $user = $this->find($username);
        if ($user) {
            if (password_verify($password, $this->data()->password)) {
                Session::put($this->_sessionName, $this->data()->username);
                return true;
            }
        }
        return false;
    }


    public function data()
    {
        return $this->_data;
    }

    public function logout()
    {
        Session::delete($this->_sessionName);
    }


    public function isLoggedIn()
    {
        return $this->_isLoggedIn;
    }
}
