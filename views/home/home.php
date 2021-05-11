<?php

use Includes\App;

require_once('includes/App.php');

$app = new App();
?>
<div class="gsb__page-title">
    <div style="margin: 0 auto">
        <h5>Accueil</h5>
    </div>
</div>
<div class="carousel carousel-slider center">
    <div class="carousel-fixed-item center">
        <div style="text-align:center">
            <a href="/medications/" class="btn btn-flat waves-effect waves-light blue">Voir nos médicaments</a>
            <br />
            <br />
            <a href="/activities/" class="btn btn-flat waves-effect waves-light blue">Voir nos activités</a>
        </div>
    </div>
    <div class="carousel-item white-text" style="background:url('/dist/app/img/slide-02.jpg'); background-repeat: no-repeat; background-size: cover" href="#one!">
        <h2>First Panel</h2>
        <p class="white-text">This is your first panel</p>
    </div>
    <div class="carousel-item amber white-text" href="#two!">
        <h2>Second Panel</h2>
        <p class="white-text">This is your second panel</p>
    </div>
    <div class="carousel-item green white-text" href="#three!">
        <h2>Third Panel</h2>
        <p class="white-text">This is your third panel</p>
    </div>
    <div class="carousel-item blue white-text" href="#four!">
        <h2>Fourth Panel</h2>
        <p class="white-text">This is your fourth panel</p>
    </div>
</div>