<?php

namespace Includes;

use DateTime;

class App
{
    public $request;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_URI'];
    }

    public function removeSlashFromUrl()
    {
        if (($this->request != "/") and preg_match('{/$}', $this->request)) {
            header('Location: ' . preg_replace('{/$}', '', $this->request));
            exit();
        }
    }

    public function getNav()
    {
        $params = explode('/', $this->request);

        // current route for nav links
        if (count($params) > 2) {
            switch ($this->request) {
                case '/':
                    $currentRoute = 'home';
                    break;
                case '/medications':
                    $currentRoute = 'medications';
                    break;
                case '/medications/view/' . $params[3] && $params[3]:
                    $currentRoute = 'medications';
                    break;
                case '/activities':
                    $currentRoute = 'activities';
                    break;
                default:
                    $currentRoute = '';
                    break;
            }
        } else {
            switch ($this->request) {
                case '/':
                    $currentRoute = 'home';
                    break;
                case '/medications':
                    $currentRoute = 'medications';
                    break;
                case '/activities':
                    $currentRoute = 'activities';
                    break;
                default:
                    $currentRoute = '';
                    break;
            }
        }
        return $currentRoute;
    }

    public function getRouting()
    {
        $params = explode('/', $this->request);
        if (count($params) > 2) {
            switch ($this->request) {
                case '/':
                    require_once('./views/home/Home.php');
                    break;
                case '/medications':
                    require_once('./views/medications/Medications.php');
                    break;
                case $params[3] ? '/medications/view/' . $params[3] : false:
                    require_once('./views/medications/view/View.php');
                    break;
                case '/activities':
                    require_once('./views/activities/Activities.php');
                    break;
                case '/login':
                    require_once('./views/login/Login.php');
                    break;
                default:
                    http_response_code(404);
                    require_once('./views/404.php');
                    break;
            }
        } else {
            switch ($this->request) {
                case '/':
                    require_once('./views/home/Home.php');
                    break;
                case '/medications':
                    require_once('./views/medications/Medications.php');
                    break;
                case '/activities':
                    require_once('./views/activities/Activities.php');
                    break;
                case '/login':
                    require_once('./views/login/Login.php');
                    break;
                default:
                    http_response_code(404);
                    require_once('./views/404.php');
                    break;
            }
        }
    }

    public function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'ans',
            'm' => 'mois',
            'w' => 'semaine',
            'd' => 'jour',
            'h' => 'heure',
            'i' => 'minute',
            's' => 'seconde',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ?  ' il y a ' . implode(', ', $string) : 'à l\'instant';
    }
}
