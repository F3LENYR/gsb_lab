<?php

namespace Controllers;

use Models\ActivitiesModel;

define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);
require_once(__ROOT__ . '/models/ActivitiesModel.php');

// header('Content-type:application/json;charset=utf-8');

class ActivitesController
{
    public $data = '';

    public function __construct()
    {
        $activityId = $_POST['activity_id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        if (isset($activityId) && isset($name) && isset($surname)) {
            $this->participateTo($activityId, $name, $surname);
        }
    }

    public function participateTo(int $activityId, String $name, String $surname)
    {
        $activityModel = new ActivitiesModel();

        $success = $name != null && $surname != null ? true : false;

        if ($activityModel->getParticipant($activityId, $name, $surname) == 0) {
            $activityModel->addParticipant($activityId, $name, $surname);
            $this->data = json_encode([
                "success" => $success,
                "exists" => false,
                "added" => $activityModel->getParticipant($activityId, $name, $surname),
            ]);
        } else {
            $this->data = json_encode([
                "success" => $success,
                "exists" => true,
                "added" => $activityModel->getParticipant($activityId, $name, $surname),
            ]);
        }


    }
}

$activity = new ActivitesController();
echo $activity->data;
