<?php
class Database {
    
    private static $_instance = null;
    private $_stmt;
    private $dbhost;
  
    public function __construct(){
      try {
        $this->dbhost = new PDO('mysql:host=localhost;dbname=gsb;username=root;password=;');
      } catch(PDOException $e){
        $this->error = $e->getMessage();
      }
    }
  
    public static function getInstance() {
      if(!isset(self::$_instance)) {
        self::$_instance = new Database();
      }
  
      return self::$_instance;
    }
  
    public function query($query) {
      $this->_stmt = $this->dbhost->query($query);
    }
  
    public function bind($param, $value, $type = null) {
      if (is_null($type)) {
        switch (true) {
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
          $type = PDO::PARAM_STR;
        }
      }
      $this->_stmt->bindValue($param, $value, $type);
    }
  
    public function execute() {
      return $this->_stmt->execute();
    }
  
    public function resultSet() {
      $this->execute();
      return $this->_stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    public function rowCount() {
      return $this->_stmt->rowCount();
    }
  
    public function single() {
      $this->execute();
      return $this->_stmt->fetch(PDO::FETCH_ASSOC);
    }
}