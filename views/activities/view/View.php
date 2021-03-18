<?php

namespace Activites;

use Models\ActivitiesModel;

require_once('models/ActivitiesModel.php');

$model = new ActivitiesModel();

$activity = null;

$params = explode('/', $_SERVER['REQUEST_URI']);
$id = $params[3];

if ($id) {
    $activity = $model->getActivityFromId($id);
}
?>

<div class="gsb__page-title">
    <div style="position: absolute">
        <a onclick="window.history.back()" class="btn btn-floating waves-effect waves-light tooltipped green" data-position="bottom" data-tooltip="Revenir en arrière"><i class="material-icons">arrow_back</i></a>
    </div>
    <div style="margin: 0 auto">
        <h5><?= $activity['label'] ?></h5>
    </div>
</div>

<div style="text-align:center">
    <img src="/dist/app/img/<?= $activity['illustration'] ?>" style="height: auto; width: 150px; filter: invert(1);margin:20px">
    <p><?= $activity['content'] ?></p>
    <a class="btn" href="/activities/view/<?= $activity['activity_id'] ?>/participate">Participer à cette activité</a>
</div>