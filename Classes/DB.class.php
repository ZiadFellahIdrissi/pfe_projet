<?php
class DB{
    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_results='',
            $_count=0;

    private function __construct(){
        try{
            $dsn ="mysql:host=" . Config::get('mysql/host'). ";dbname=" . Config::get('mysql/db');
            $this->_pdo = new PDO($dsn, Config::get('mysql/username'), Config::get('mysql/password'));
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }  
    
    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance=new DB();
        }
        return self::$_instance;
    }
    public function query($sql,$params=array()){
        $this->_error = false;
        if($this->_query=$this->_pdo->prepare($sql)){
            $x = 1;
            if(count($params)){
                foreach($params as $param){
                    $this->_query->bindvalue($x,$param);
                    $x++;
                }
            }
            if($this->_query->execute()){
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count=$this->_query->rowCount();
            }
            else{
                $this->_error = true;
            }
        }
        return $this;
    }

    // gets
    public function error(){
        return $this->_error;
    }
    public function count(){
        return $this->_count;
    }
    public function results(){
        return $this->_results;
    }
    public function first(){
        return $this->results()[0];
    }
    

}