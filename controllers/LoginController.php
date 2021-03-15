<?php

namespace Controllers;

use Includes\Database;
use Includes\Auth;
use Models\LoginModel;

class LoginController
{

    public $success = false;

    public function __construct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // // Check if username is empty
            // if(empty(trim($_POST["username"]))){
            //     $username_err = "Please enter username.";
            // } else{
            //     $username = trim($_POST["username"]);
            // }

            // // Check if password is empty
            // if(empty(trim($_POST["password"]))){
            //     $password_err = "Please enter your password.";
            // } else{
            //     $password = trim($_POST["password"]);
            // }

            // Validate credentials
            if (isset($_POST["email"]) && isset($_POST["password"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                // Prepare a select statement
                $database = new Database();
                $pdo = $database->getPDO();
                $sql = "SELECT * FROM users WHERE email = " . $email;
                " AND password = " .  $password . " LIMIT 1";
                $stmt = $pdo->prepare($sql);
                // Bind variables to the prepared statement as parameters

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Store result
                    // Check if username exists, if yes then verify password
                    // Bind result variables
                    if ($stmt->fetch()) {
                        // Password is correct, so start a new session
                        session_start();

                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = 1;
                        $_SESSION["email"] = $email;

                        session_write_close();

                        // Redirect user to welcome page
                        header("location: welcome.php");
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
            }
        }
    }

    public function executeLogin()
    {
        $model = new LoginModel();
        // if () {
        $model->checkCredentials($_POST['email'], $_POST['password']);
        session_start();
        session_regenerate_id();
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        session_write_close();
        $this->success = true;
        // } else {
        //     return $this->success;
        // }
    }
}

?>