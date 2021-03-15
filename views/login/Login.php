<?php

namespace Views;

use Controllers\LoginController;


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

require_once('controllers/LoginController.php');

class Login
{
    public $controller = null;

    public function __construct() {
        $this->controller = new LoginController();
        // $_SESSION['email'] = $this->controller->$_SESSION['email'];
        // $_SESSION['password'] = $this->controller->$_SESSION['password'];
        // echo $this->controller->success;
    }
}
?>
<div class="gsb__page-title">
    <div style="position: absolute">
        <a onclick="window.history.back()" class="btn btn-floating waves-effect waves-light tooltipped green" data-position="bottom" data-tooltip="Revenir en arrière">
            <i class="material-icons">arrow_back</i></a>
    </div>
    <div style="margin: 0 auto">
        <h5>Connexion</h5>
    </div>
</div>
<div>
    <form id="loginForm" method="post" action="/controllers/LoginController.php">
        <div class="row">
            <div class="input-field col s12">
                <input id="input-email" name="email" type="text" class="validate" required>
                <label for="input-email">Email *</label>
            </div>
            <div class="input-field col s12">
                <input id="input-password" name="password" type="password" class="validate" required>
                <label for="input-password">Mot de passe *</label>
            </div>
        </div>
        <div style="text-align:center">
            <label>
                <input type="checkbox" class="filled-in" />
                <span>Se souvenir de moi</span>
            </label>
            <br />
            <button class="btn blue waves-effect waves-light" type="submit" style="margin-top:15px" id="login-btn">Connexion</button>
            <a href="/register" class="btn btn-flat transparent waves-effect waves-light" style="margin-top:15px">Inscription</a>
        </div>
    </form>
</div>