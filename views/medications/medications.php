<?php

namespace Medications;

use Models\MedicationModel;

require_once('models/MedicationModel.php');

$medicationsList = [];
$model = null;

$model = new MedicationModel();
$medicationsList = $model->getAllSubstances();

$page_title = 'Médicaments';
?>
<?php include('./includes/partials/pagetitle.php') ?>
<div class="scale-transition" id="loader">
    <?php include('./includes/partials/loader.php') ?>
</div>
<div style="margin:20px">
    <div class="scale-transition scale-out hidden" id="wait-loader">
        <div style="width:100%">
            <ul class="collapsible" style="display:grid; border-color: transparent">
                <li class="active">
                    <div class="collapsible-header waves-effect waves-light blue" style="background: #2196f3;border-color: transparent;">
                        <i class="material-icons">search</i> Rechercher
                    </div>
                    <div class="collapsible-body" style="border-color: transparent;">
                        <div class="input-field col s12">
                            <input id="name" type="text" class="validate">
                            <label for="name">Nom de la substance à rechercher</label>
                        </div>
                        <div class="input-field col s12">
                            <select class="validate blue">
                                <option class="blue" value="" disabled selected>Choisissez un type</option>
                                <option class="blue" value="1">Anticonvulsivant</option>
                                <option class="blue" value="2">Neuroleptique</option>
                                <option class="blue" value="3">Somnifère</option>
                            </select>
                            <label>Type de substance</label>
                        </div>
                        <h5>Par état</h5>
                        <div class="row center-align">
                            <div class="col s4 center-align">
                                <button style="outline: none;border: none;background: #424242; white-space: nowrap; padding: 10px 20px" class="waves-effect waves-dark">
                                    <i class="material-icons white-text" style="padding: 10px">sentiment_very_satisfied</i>
                                    <p>Très bien</p>
                                </button>
                            </div>
                            <div class="col s4 center-align">
                                <button style="outline: none;border: none;background: #424242; white-space: nowrap; padding: 10px 20px" class="waves-effect waves-dark">
                                    <i class="material-icons white-text" style="padding: 10px">sentiment_satisfied</i>
                                    <p>Bien</p>
                                </button>
                            </div>
                            <div class="col s4 center-align">
                                <button style="outline: none;border: none;background: #424242; white-space: nowrap; padding: 10px 20px" class="waves-effect waves-dark">
                                    <i class="material-icons white-text" style="padding: 10px">sentiment_neutral</i>
                                    <p>Neutre</p>
                                </button>
                            </div>
                            <div class="col s4 center-align">
                                <button style="outline: none;border: none;background: #424242; white-space: nowrap; padding: 10px 20px" class="waves-effect waves-dark">
                                    <i class="material-icons white-text" style="padding: 10px">mood_bad</i>
                                    <p>Mal</p>
                                </button>
                            </div>
                            <div class="col s4 center-align">
                                <button style="outline: none;border: none;background: #424242; white-space: nowrap; padding: 10px 20px" class="waves-effect waves-dark">
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
        <div class="row">
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
</div>