<?php

namespace Models;

use PDO;
use Includes\Database;

class LoginModel
{

    private $email = null;
    private $password = null;

    public function __construct()
    {
    }

    public function checkCredentials($email, $password)
    {
        $database = new Database();
        $pdo = $database->getPDO();
        $sql = "SELECT * FROM users WHERE email = " . $email ; " AND password = " .  $password . " LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $valid = $stmt->fetch();
        return $valid;
    }
}
