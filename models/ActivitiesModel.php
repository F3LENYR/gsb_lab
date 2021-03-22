<?php

namespace Models;

use Includes\Database;

require_once(__ROOT__ . '/includes/Database.php');

class ActivitiesModel
{
    public $database;
    public $instance;

    public function __construct()
    {
        $this->database = new Database();
        $this->instance = $this->database->getPDO();
    }

    public function getAllActivities()
    {
        $req = $this->instance->query("SELECT * FROM `activities`");
        return $req->fetchAll();
    }

    public function getActivityFromId($id)
    {
        $req = $this->instance->query("SELECT * FROM `activities` WHERE `activity_id` = " . $id);
        return $req->fetch();
    }

    public function getParticipant(int $activityId, String $name, String $surname)
    {
        $req = $this->instance->query("SELECT * FROM `participants` WHERE `activity_id` = " . $activityId . " AND `name` = " . $name . " AND `surname` = " . $surname);
        return $req;
    }
}
