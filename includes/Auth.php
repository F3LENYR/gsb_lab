<?php

namespace Includes;

use Includes\Database;

class Auth
{

    public function __construct()
    {
        session_start();

        $email = $_SESSION['email'];

        $db = new Database();
        $ses_sql = mysqli_query($db->getPDO(), "SELECT * FROM users WHERE email = " . $email);

        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

        $login_session = $row['email'];

        if (!isset($_SESSION['email'])) {
            header("location:login.php");
            die();
        }
    }
}
