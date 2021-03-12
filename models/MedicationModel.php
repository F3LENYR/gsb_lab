<?php
namespace Models;

use Database;

require_once('vendors/database.php');


class MedicationModel
{
    public $database = null;

    public function __construct() {
    }

    public function getMedicationList() {
        $database = Database::getInstance();
        $database->query("SELECT * FROM `medications`");
        $result = $database->resultSet();
        return $result;
    }

    // static public function getMedication(int $substanceId) {
    //     $database = Database::getInstance();
    //     $database->query("SELECT * FROM `medications` WHERE `medication_id` = :substanceId");
    //     $database->bind('substanceId', $substanceId);
    //     $result = $database->resultSet();
    //     return $result;
    // }
}
