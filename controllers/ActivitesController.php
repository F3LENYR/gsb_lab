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
        if ($activityModel->getParticipant($activityId, $name, $surname) == false) {
            $this->data = json_encode([
                "success" => true,
                "result" => $activityModel->getParticipant($activityId, $name, $surname)
            ]);
        } else {
            $this->data = json_encode([
                "success" => true,
                "result" => $activityModel->getParticipant($activityId, $name, $surname)
            ]);
        }
        // if ($query->array_column()->ob_get_length > 0) {
        //     $this->data = json_encode([
        //         "success" => true,
        //     ]);
        // } else {
            // $this->data = json_encode([
            //     "error" => true,
            // ]);
        // }
    }
}

$activity = new ActivitesController();
echo $activity->data;