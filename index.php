<?php
if (($_SERVER['REQUEST_URI'] != "/") and preg_match('{/$}', $_SERVER['REQUEST_URI'])) {
    header('Location: ' . preg_replace('{/$}', '', $_SERVER['REQUEST_URI']));
    exit();
}


$request = $_SERVER['REQUEST_URI'];
$params = explode('/', $request);

// current route for nav links
if (count($params) > 2) {
    switch ($request) {
        case '/':
            $currentRoute = 'home';
            break;
        case '/medications':
            $currentRoute = 'medications';
            break;
        case '/medications/view/' . $params[3] && $params[3]:
            $currentRoute = 'medications';
            break;
        default:
            $currentRoute = '';
            break;
    }
} else {
    switch ($request) {
        case '/':
            $currentRoute = 'home';
            break;
        case '/medications':
            $currentRoute = 'medications';
            break;
        default:
            $currentRoute = '';
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/assets/scss/app.css">
    <link rel="stylesheet" href="/public/assets/scss/overrides.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/public/assets/js/app.js"></script>
</head>

<body>
    <nav>
        <div class="nav-wrapper blue darken-3">
            <a href="javascript:void(0)" data-target="slide-out" class="brand-logo sidenav-trigger" style="margin: 0"><img style="width: 40px; height: 40px; margin: 10px;" src="/public/assets/img/Logo%20GSB.png"></a>
            <a href="javascript:void(0)" data-target="slide-out" class="sidenav-trigger brand-logo" style="display: block;margin: 0"><img style="width: 40px; height: 40px; margin: 10px;" src="/public/assets/img/Logo%20GSB.png"></a>
        </div>
    </nav>

    <ul id="slide-out" class="sidenav">
        <a href="/" style="margin:20px">
            <div style="text-align:center">
                <img style="width: 100px; height: 100px;" src="/public/assets/img/Logo%20GSB.png">
                <h5 style="color:#000">GSB</h5>
            </div>
        </a>
        <li><a href="/" class="waves-effect waves-light <?= $currentRoute == 'home' ? 'active' : '' ?>"><i class="material-icons">home</i> Accueil</a></li>
        <li><a href="/medications" class="waves-effect waves-light <?= $currentRoute == 'medications' ? 'active' : '' ?>"><i class="material-icons">medication</i> Médicaments</a></li>
        <li><a href="/activities" class="waves-effect waves-light <?= $currentRoute == 'activities' ? 'active' : '' ?>"><i class="material-icons">local_activity</i> Activités</a></li>
    </ul>

    <div class="container">
        <div class="row">
            <div class="col s12" style="margin-top:25px">
                <div class="card">
                    <div class="card-content">
                        <?php
                        $request = $_SERVER['REQUEST_URI'];
                        $params = explode('/', $request);
                        if (count($params) > 2) {
                            switch ($request) {
                                case '/':
                                    require __DIR__ . '/views/home/home.php';
                                    break;
                                case '/medications':
                                    require __DIR__ . '/views/medications/medications.php';
                                    break;
                                case $params[3] ? '/medications/view/' . $params[3] : false:
                                    require __DIR__ . '/views/medications/view/view.php';
                                    break;
                                default:
                                    http_response_code(404);
                                    require __DIR__ . '/views/404.php';
                                    break;
                            }
                        } else {
                            switch ($request) {
                                case '/':
                                    require __DIR__ . '/views/home/home.php';
                                    break;
                                case '/medications':
                                    require __DIR__ . '/views/medications/medications.php';
                                    break;
                                default:
                                    http_response_code(404);
                                    require __DIR__ . '/views/404.php';
                                    break;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>