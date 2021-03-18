<?php

namespace Controllers;

class ActivitesController
{

    public function __construct()
    {
        if (isset($_POST['activity_id']) && isset($_POST['name']) && isset($_POST['surname'])) {
            return $this->participateTo($_POST['activity_id']);
        }
    }

    //     // TODO: check if user
    public function participateTo(int $activityId)
    {
        echo var_dump($_POST);
        return $activityId;
    }
}
?>
test