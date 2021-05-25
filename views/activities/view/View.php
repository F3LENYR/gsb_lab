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

$page_title = $activity['label'];
?>

<?php include('./includes/partials/pagetitle.php') ?>
<div class="scale-transition" id="loader">
    <?php include('./includes/partials/loader.php') ?>
</div>

<div class="scale-transition scale-out hidden" id="wait-loader">
    <div class="center-align">
    <img src="/dist/app/img/<?= $activity['illustration'] ?>" style="height: auto; width: 300px;margin:20px">
    <p style="margin: 20px"><?= $activity['content'] ?></p>
    <a class="btn btn-flat blue waves-effect waves-light" href="/activities/view/<?= $activity['activity_id'] ?>/participate">Participer à cette activité</a>
    </div>
</div>