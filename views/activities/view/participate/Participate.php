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
        <h5>Participer à "<?= $activity['label'] ?>"</h5>
    </div>
</div>

<div style="margin:20px">
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