<?php
namespace Medications;

use Models\MedicationModel;

require_once('models/MedicationModel.php');

$model = new MedicationModel();

$substance = null;
$therapeuticalEffects = [];
$sideEffects = [];
$interactions = [];

$params = explode('/', $_SERVER['REQUEST_URI']);
$id = $params[3];

if ($id) {
    $substance = $model->getSubstanceFromId($id);
    $therapeuticalEffects = $model->getEffectsFromId($id);
    $sideEffects = $model->getSideEffectsFromId($id);
    $interactions = $model->getInteractions();
}

?>
<div class="gsb__page-title">
    <div style="position: absolute">
        <a onclick="window.history.back()" class="btn btn-floating waves-effect waves-light tooltipped green" data-position="bottom" data-tooltip="Revenir en arrière"><i class="material-icons">arrow_back</i></a>
    </div>
    <div style="margin: 0 auto">
        <h5><?= $substance['label'] ?></h5>
    </div>
</div>

<div style="text-align:center">
    <p><b><?= $substance['class'] ?></b></p>
    <p><?= $substance['raw_formule'] ?></p>
    <img src="/dist/img/<?= $substance['chem_formule'] ?>" style="height: auto; width: 150px; filter: invert(1);margin:20px">
    <p><?= $substance['content'] ?></p>
</div>

<div class="row" style="margin-top:20px">
    <div class="col s12">
        <ul class="tabs">
            <li class="tab col s3"><a href="#effects" class="active">Effets thérapeutiques</a></li>
            <li class="tab col s3"><a href="#sideEffects">Effets secondaires</a></li>
            <li class="tab col s3"><a href="#interactions">Interactions</a></li>
        </ul>
    </div>
    <div id="effects" class="col s12">
        <div style="margin:20px">
            <?php foreach ($therapeuticalEffects as $effect) : ?>
                <div class="chip">
                    <?= $effect['label'] ?>
                    <?php if ($effect['explaination']) : ?>
                        <i class="material-icons tooltipped align-icons-chip" data-position="bottom" data-tooltip="<?= $effect['explaination'] ?>">help</i>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="sideEffects" class="col s12">
        <div style="margin:20px">
            <?php foreach ($sideEffects as $effect) : ?>
                <div class="chip">
                    <?= $effect['label'] ?>
                    <?php if ($effect['explaination']) : ?>
                        <i class="material-icons tooltipped align-icons-chip" data-position="bottom" data-tooltip="<?= $effect['explaination'] ?>">help</i>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="interactions" class="col s12">
        <div style="margin:10px">
            <ul class="collection gsb__list z-depth-3">
                <?php foreach ($interactions as $interaction) : ?>
                    <li class="collection-item gsb__list-chem">
                        <div style="width:fit-content;margin-right:15px" class="hide-on-small-only">
                            <img src="/dist/img/<?= $interaction['chem_formule'] ?>" style="max-width: 50px;transform: scale(1.5);">
                        </div>
                        <div style="width:100%">
                            <div style="    width: fit-content;
    display: inline-block;">
                                <b class="title" style="font-size:large"><?= $interaction['label'] ?></b>
                                <p style="font-size:small"><?= $interaction['raw_formule'] ?></p>
                                <p style="font-size:small;font-weight:bold"><?= $interaction['class'] ?></p>
                            </div>
                            <div style="    display: inline-block;
    text-align: right;
    float: right;
    align-items: center;">
                                <div style="text-align:right">
                                    <a href="/medications/view/<?= $interaction['medication_id'] ?>" class="secondary-content btn btn-floating waves-effect waves-light btn-flat green tooltipped" data-position="left" data-tooltip="Voir ce médicament">
                                        <i class="material-icons">visibility</i></a>
                                </div>
                            </div>

                            <div style="margin-top:15px">
                                <?php if ($interaction['dangerosity'] == 'dangerous') : ?>
                                    <div class="chip red lighten-1">
                                        <i class="material-icons align-icons-chip">dangerous</i> Dangereux
                                    </div>
                                <?php endif; ?>
                                <?php if ($interaction['dangerosity'] == 'warning') : ?>
                                    <div class="chip orange lighten-1">
                                        <i class="material-icons align-icons-chip">warning</i> Précautions
                                    </div>
                                <?php endif; ?>
                                <?php if ($interaction['dangerosity'] == 'safe') : ?>
                                    <div class="chip green lightn-1">
                                        <i class="material-icons align-icons-chip">check_circle</i> Sans risque
                                    </div>
                                <?php endif; ?>
                                <ul class="collapsible" style="    border-color: transparent">
                                    <li>
                                        <div class="collapsible-header waves-effect waves-light" style="    background: #2196f3;
    border-color: transparent;">
                                            <i class="material-icons">help</i> Voir l'explication
                                        </div>
                                        <div class="collapsible-body" style="    border-color: transparent;">
                                            <?php if (isset($interaction['explaination'])) : ?>
                                                <p><?= $interaction['explaination'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>