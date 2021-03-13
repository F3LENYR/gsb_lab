<?php

namespace Activites;

use DateTime;
use Models\ActivitiesModel;
use Includes\App;

require_once('includes/App.php');
require_once('models/ActivitiesModel.php');

$activities = [];
$model = null;
$isParticipating = false;

$model = new ActivitiesModel();
$activities = $model->getAllActivities();
$app = new App();

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
                    <li class="collection-item">
                        <?= $activity['label'] ?>
                        <div>
                            <i class="material-icons align-icons">query_builder</i> <?= $app->time_elapsed_string($activity['created_at']) ?>
                        </div>
                        <div>
                            <button class="btn waves-effect waves-light blue" id="participate"><?= $isParticipating ? 'Quitter' : 'Participer' ?></button>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>