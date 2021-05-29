<?php

use Includes\App;

define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);
require_once(__ROOT__ . '/includes/App.php');

$app = new App();

$app->removeSlashFromUrl();

$currentRoute = $app->getNav();

$page_title = '';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        switch ($currentRoute) {
            case 'home':
                echo "Accueil";
                break;
            case 'medications':
                echo "Nos médicaments";
                break;
            case 'activities':
                echo "Nos activités";
                break;
            case 'login':
                echo "Connexion";
                break;
            default:
                echo $page_title;
                break;
        }
        ?>
    </title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper blue darken-3">
                <a href="javascript:void(0)" data-target="slide-out" class="brand-logo center sidenav-trigger" style="margin: 0">
                    <img style="width: 40px; height: 40px; margin: 10px;" src="/dist/app/img/Logo%20GSB.png"></a>
                <a href="javascript:void(0)" data-target="slide-out" class="brand-logo center sidenav-trigger" style="display: block;margin: 0">
                    <img style="width: 40px; height: 40px; margin: 10px;" src="/dist/app/img/Logo%20GSB.png"></a>
            </div>
        </nav>
    </div>

    <ul id="slide-out" class="sidenav">
        <a href="/" style="margin:20px">
            <div style="text-align:center">
                <img style="width: 100px; height: 100px;" src="/dist/app/img/Logo%20GSB.png">
                <h5 style="color:#fff">GSB</h5>
            </div>
        </a>
        <li>
            <a href="/" class="waves-effect waves-light <?= $currentRoute == 'home' ? 'active' : '' ?>"><i class="material-icons">home</i> Accueil</a>
        </li>
        <li>
            <a href="/medications" class="waves-effect waves-light <?= $currentRoute == 'medications' ? 'active' : '' ?>">
                <i class="material-icons">medication</i> Médicaments
            </a>
        </li>
        <li>
            <a href="/activities" class="waves-effect waves-light <?= $currentRoute == 'activities' ? 'active' : '' ?>">
                <i class="material-icons">local_activity</i> Activités
            </a>
        </li>
    </ul>

    <div class="container">
        <div class="row">
            <div class="col s12" style="margin-top:25px">
                <div class="card">
                    <div class="card-content">
                        <?php
                        $app->getRouting();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/dist/app/js/app.min.js"></script>
</body>

</html>