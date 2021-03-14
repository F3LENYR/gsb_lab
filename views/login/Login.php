<?php

namespace Views;

class Login
{

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
    <form id="loginForm" method="post">
        <div class="row">
            <div class="input-field col s12">
                <input id="input-email" name="email" type="text" class="validate" required>
                <label for="email">Email *</label>
            </div>
            <div class="input-field col s12">
                <input id="input-password" type="password" class="validate" required>
                <label for="password">Mot de passe *</label>
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