<?php
namespace Controllers;

use PDO;

class MedicationsController
{

    public $database;


    public function __construct()
    {
        $this->data['medicationsList'] = $this->getMedicationsList();
    }


    public function getMedicationsList()
    {
        $database = new PDO('mysql:host=localhost;dbname=gsb;charset=UTF8', 'root', '');
        $req = $database->query("SELECT * FROM medications");
        return $req->fetchAll();
    }
}
