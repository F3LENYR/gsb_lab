<?php

namespace Controllers;

use Models\ActivitiesModel;

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
        if ($activityModel->getParticipant($activityId, $name, $surname)) {
            $this->data = json_encode([
                "success" => true,
            ]);
        } else {
            $this->data = json_encode([
                "error" => true,
            ]);
        }
    }
}

$activity = new ActivitesController();
echo $activity->data;
