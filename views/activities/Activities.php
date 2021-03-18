<?php

namespace Activites;

use Models\ActivitiesModel;
use Includes\App;

require_once('includes/App.php');
require_once('models/ActivitiesModel.php');

session_start();

$activities = [];
$model = null;
$isParticipating = false;

$model = new ActivitiesModel();
$app = new App();

$activities = $model->getAllActivities();
?>
<div class="gsb__page-title">
    <div style="position: absolute">
        <a onclick="window.history.back()" class="btn btn-floating waves-effect waves-light tooltipped green" data-position="bottom" data-tooltip="Revenir en arrière">
            <i class="material-icons">arrow_back</i></a>
    </div>
    <div style="margin: 0 auto">
        <h5>Activités</h5>
        <div class="row">
            <ul class="collection gsb__list z-depth-3">
                <?php foreach ($activities as $activity) : ?>
                    <li class="collection-item gsb__list-chem">
                        <div style="width:fit-content;margin-right:15px">
                            <img src="/dist/app/img/<?= $activity['illustration'] ?>" style="max-width: 50px;transform: scale(1.5);">
                        </div>
                        <div style="width:100%">
                            <b class="title" style="font-size:large"><?= $activity['label'] ?></b>
                            <i class="material-icons align-icons">query_builder</i> <?= $app->time_elapsed_string($activity['created_at']) ?>
                        </div>

                        <!-- TODO: check if user -->
                        <!-- <div>
                            <button class="btn waves-effect waves-light blue" id="participate-event">Participer</button>
                        </div> -->
                        <div style="text-align:right">
                            <a href="/activities/view/<?= $activity['activity_id'] ?>/participate" class="secondary-content btn btn-floating waves-effect waves-light btn-flat transparent tooltipped" data-position="left" data-tooltip="Participer">
                                <i class="material-icons">check</i></a>
                            <a href="/activities/view/<?= $activity['activity_id'] ?>" class="secondary-content btn btn-floating waves-effect waves-light btn-flat green tooltipped" data-position="left" data-tooltip="Voir cette activité">
                                <i class="material-icons">visibility</i></a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>