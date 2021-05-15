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

$page_title = "Participer à \"" . $activity['label'] . "\"";
?>
<?php include('./includes/partials/pagetitle.php') ?>
<div class="scale-transition" id="loader">
    <?php include('./includes/partials/loader.php') ?>
</div>

<div style="margin:20px" class="scale-transition scale-out hidden" id="wait-loader">
    <form name="participate">
        <input id="activity-id" type="hidden" hidden value="<?= $id ?>">
        <div class="input-field col s6">
            <input id="name" type="text" class="validate" required>
            <label for="name">Votre nom</label>
        </div>
        <div class="input-field col s6">
            <input id="surname" type="text" class="validate" required>
            <label for="surname">Votre prénom</label>
        </div>
    </form>

    <button type="submit" class="btn blue waves-effect waves-light" id="participate-event">Participer</button>
</div>