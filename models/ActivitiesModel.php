<?php

namespace Models;

use Includes\Database;

require_once('includes/database.php');

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
}
