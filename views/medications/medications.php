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
    <div style="width:100%">
        <ul class="collapsible" style="display:grid; border-color: transparent">
            <li class="active">
                <div class="collapsible-header waves-effect waves-light green" style="background: #2196f3;border-color: transparent;">
                    <i class="material-icons">search</i> Rechercher
                </div>
                <div class="collapsible-body" style="border-color: transparent;">
                    <div class="input-field col s12">
                        <input id="name" type="text" class="validate">
                        <label for="name">Nom de la substance à rechercher</label>
                    </div>
                    <h5>Par sentiments</h5>
                    <div style="display: inline-flex; margin: 0 auto; text-align: center; align-items: center; width: 100%;">
                        <div style="width: 100%">
                            <button style="outline: none;border: none;padding: 10px 20px; background: #424242;" class="waves-effect waves-dark">
                                <i class="material-icons white-text" style="padding: 10px">sentiment_very_satisfied</i>
                                <p>Très bien</p>
                            </button>
                        </div>
                        <div style="width: 100%">
                            <button style="outline: none;border: none;padding: 10px 20px; background: #424242;" class="waves-effect waves-dark">
                                <i class="material-icons white-text" style="padding: 10px">sentiment_satisfied</i>
                                <p>Bien</p>
                            </button>
                        </div>
                        <div style="width: 100%">
                            <button style="outline: none;border: none;padding: 10px 20px; background: #424242;" class="waves-effect waves-dark">
                                <i class="material-icons white-text" style="padding: 10px">sentiment_neutral</i>
                                <p>Neutre</p>
                            </button>
                        </div>
                        <div style="width: 100%">
                            <button style="outline: none;border: none;padding: 10px 20px; background: #424242;" class="waves-effect waves-dark">
                                <i class="material-icons white-text" style="padding: 10px">mood_bad</i>
                                <p>Mal</p>
                            </button>
                        </div>
                        <div style="width: 100%">
                            <button style="outline: none;border: none;padding: 10px 20px; background: #424242;" class="waves-effect waves-dark">
                                <i class="material-icons white-text" style="padding: 10px">sick</i>
                                <p>Malade</p>
                            </button>
                        </div>
                    </div>
                    <div style="text-align:center;margin-top:20px">
                        <button class="btn-flat blue waves-effect waves-light">Rechercher</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="animate__animated animate__zoomOut animate__delay-2s" id="loader">
        <?php include('./includes/partials/loader.php') ?>
    </div>
    <div class="row animate__animated animate__zoomIn hidden" id="wait-loader">
        <ul class="collection gsb__list z-depth-3">
            <?php foreach ($medicationsList as $medication) : ?>
                <li class="collection-item gsb__list-chem">
                    <div style="width:fit-content;margin-right:15px">
                        <img src="/dist/app/img/<?= $medication['chem_formule'] ?>" style="max-width: 50px;transform: scale(1.5);">
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