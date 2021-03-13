<?php

namespace Models;

use Includes\Database;

require_once('includes/database.php');


class MedicationModel
{
    public $database;
    public $instance;

    public function __construct()
    {
        $this->database = new Database();
        $this->instance = $this->database->getPDO();
    }

    public function getAllSubstances()
    {
        $req = $this->instance->query("SELECT * FROM `medications`");
        return $req->fetchAll();
    }

    public function getSubstanceFromId($id)
    {
        $req = $this->instance->query("SELECT * FROM `medications` WHERE `medication_id` = " . $id);
        return $req->fetch();
    }

    public function getEffectsFromId($id)
    {
        $req = $this->instance->query("SELECT * FROM `effects` WHERE `medication_id` = " . $id);
        return $req->fetchAll();
    }

    public function getSideEffectsFromId($id)
    {
        $req = $this->instance->query("SELECT * FROM `side_effects` WHERE `medication_id` = " . $id);
        return $req->fetchAll();
    }

    public function getInteractions()
    {
        $req = $this->instance->query("SELECT * FROM `interactions` INNER JOiN medications ON interactions.medication_id = medications.medication_id");
        return $req->fetchAll();
    }
}
