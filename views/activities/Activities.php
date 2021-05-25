<?php

namespace Activites;

use Models\ActivitiesModel;
use Includes\App;

require_once('includes/App.php');
require_once('models/ActivitiesModel.php');

session_start();
$isParticipating = false;
$model = new ActivitiesModel();
$app = new App();

$activities = $model->getAllActivities();

$page_title = 'Nos activités';
?>
<?php include('./includes/partials/pagetitle.php') ?>
<div class="scale-transition" id="loader">
    <?php include('./includes/partials/loader.php') ?>
</div>

<div style="margin: 20px" class="scale-transition scale-out hidden" id="wait-loader">
    <div class="row">
        <ul class="collection z-depth-3">
            <?php foreach ($activities as $activity) : ?>
                <li class="collection-item avatar">
                    <img class="circle" src="/dist/app/img/<?= $activity['illustration'] ?>" style="transform: scale(2); margin-right: 50px">
                    <div style="margin-left: 80px">
                        <b class="title" style="font-size:large"><?= $activity['label'] ?></b>
                        <p><i class="material-icons align-icons">query_builder</i> <?= $app->time_elapsed_string($activity['created_at']) ?></p>
                    </div>

                    <div class="secondary-content">
                        <a href="/activities/view/<?= $activity['activity_id'] ?>/participate" class="secondary-content btn btn-floating waves-effect waves-light btn-flat green tooltipped" data-position="left" data-tooltip="Participer">
                            <i class="material-icons">check</i></a>
                        <a href="/activities/view/<?= $activity['activity_id'] ?>" class="secondary-content btn btn-floating waves-effect waves-light btn-flat green tooltipped" data-position="left" data-tooltip="Voir cette activité">
                            <i class="material-icons">visibility</i></a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>