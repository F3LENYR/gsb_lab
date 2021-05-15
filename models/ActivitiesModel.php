<?php

namespace Models;

use Includes\Database;
use PDO;

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
        $req = $this->instance->prepare("SELECT * FROM `participants` WHERE `activity_id` = " . $activityId . " AND `name` = " . $name . " AND `surname` = " . $surname . "");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        return $req->fetch();
    }

    public function addParticipant(int $activityId, String $name, String $surname)
    {
        if ($this->getParticipant($activityId, $name, $surname) == true) {
            return false;
        } else {
            $req = $this->instance->prepare("INSERT INTO `participants` VALUES(0, :activity_id, :name, :surname)");
            $req->bindParam(':activity_id', $activityId);
            $req->bindParam(':name', $name);
            $req->bindParam(':surname', $surname);
            return $req->execute();
        }
    }
}
