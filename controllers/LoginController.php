<?php
namespace Controllers;

use Models\LoginModel;

class LoginController {
    
    public function __construct()
    {
        if ($_POST['loginForm']) {
            $this->executeLogin($_POST['loginForm']);
        }
    }

    public function executeLogin($form) {
        $model = new LoginModel();
        if ($model->checkCredentials($form['username'], $form['password'])) {
            header('/');
        } else {
            header('/error');
        }
    }

}