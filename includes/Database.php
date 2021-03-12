<?php
namespace Includes;

use PDO;
use PDOException;

class Database {

    private $database;

    public function __construct() {
        $this->database = new PDO('mysql:host=localhost;dbname=gsb;charset=UTF8', 'root', '');
    }

    public function getPDO() {
        return $this->database; 
    }

}