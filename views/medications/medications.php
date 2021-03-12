<?php
namespace Medications;

use Models\MedicationModel;

require_once('models/MedicationModel.php');

$medicationsList = [];
$model = null;

$model = new MedicationModel();
$medicationsList = $model->getAllSubstances();

?>
<div class="gsb__page-title">
    <div style="position: absolute">
        <a onclick="window.history.back()" class="btn btn-floating waves-effect waves-light tooltipped green" data-position="bottom" data-tooltip="Revenir en arrière">
            <i class="material-icons">arrow_back</i></a>
    </div>
    <div style="margin: 0 auto">
        <h5>Nos médicaments</h5>
    </div>
</div>
<div>
    <div>
        <!-- TODO: search form -->
        <form action="">
            <div class="input-field">
                <a class="btn btn-floating prefix waves-effect waves-light green">
                    <i class="material-icons" style="color: #fff;">search</i>
                </a>
                <input id="first_name" type="text" class="validate">
                <label for="first_name">Rechercher</label>
            </div>
        </form>
    </div>
    <div class="row">
        <ul class="collection gsb__list z-depth-3">
            <?php foreach ($medicationsList as $medication) : ?>
                <li class="collection-item gsb__list-chem">
                    <div style="width:fit-content;margin-right:15px">
                        <img src="/public/assets/img/<?= $medication['chem_formule'] ?>" style="max-width: 50px;transform: scale(1.5);">
                    </div>
                    <div style="width:100%">
                        <b class="title" style="font-size:large"><?= $medication['label'] ?></b>
                        <p style="font-size:small"><?= $medication['raw_formule'] ?></p>
                        <p style="font-size:small;font-weight:bold"><?= $medication['class'] ?></p>
                    </div>
                    <div style="text-align:right">
                        <a href="/medications/view/<?= $medication['medication_id'] ?>" class="secondary-content btn btn-floating waves-effect waves-light btn-flat green tooltipped" data-position="left" data-tooltip="Voir ce médicament">
                            <i class="material-icons">visibility</i></a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>