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

    public function getInteractionsFromId($id)
    {
        $req = $this->instance->query("SELECT * FROM `interactions` INNER JOIN `medications` WHERE medications.medication_id != $id AND interactions.interaction_id = $id");
        return $req->fetchAll();
    }
}
