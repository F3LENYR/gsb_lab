<?php

namespace Models;

use PDO;
use Includes\Database;

class LoginModel
{

    private $username = null;
    private $password = null;

    public function __construct()
    {
    }

    public function checkCredentials($username, $password)
    {
        $database = new Database();
        $pdo = $database->getPDO();
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue("username", $username, PDO::PARAM_STR);
        $stmt->bindValue("password", md5($password), PDO::PARAM_STR);
        $stmt->execute();
        $valid = $stmt->fetchColumn();
        if($valid) {
            return $valid;
        } else {
            return false;   
        }
    }
}
