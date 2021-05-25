<?php

namespace Controllers;

use Models\ActivitiesModel;

define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);
require_once(__ROOT__ . '/models/ActivitiesModel.php');

class ActivitesController
{
    public $data = '';

    public function __construct()
    {
        $activityId = $_POST['activity_id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $state = $_POST['state'];
        if (isset($activityId) && isset($name) && isset($surname)) {
            $this->participateTo($activityId, $name, $surname, $state);
        }
    }

    public function participateTo(int $activityId, String $name, String $surname, bool $state)
    {
        $activityModel = new ActivitiesModel();

        $exists = $activityModel->getParticipant($activityId, $name, $surname);
        $added = $activityModel->addParticipant($activityId, $name, $surname);
        if ($added == true) {
            $this->data = json_encode([
                "exists" => $exists,
                "added" => true,
                "state" => false
            ]);
        }
        else if ($added == false) {
            $this->data = json_encode([
                "exists" => $exists,
                "added" => false,
                "state" => true
            ]);
        }
    }
}

$activity = new ActivitesController();
echo $activity->data;
