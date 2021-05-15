<?php

use Includes\App;

require_once('includes/App.php');

$app = new App();
?>
<div style="margin:20px">
    <div class="scale-transition" id="loader">
        <?php include('./includes/partials/loader.php') ?>
    </div>
    <div class="scale-transition scale-out hidden" id="wait-loader">
        <div class="carousel carousel-slider center">
            <div class="carousel-fixed-item center">
                <img src="/dist/app/img/Logo GSB.png" style="width:150px;height:150px">
                <h5>Laboratoires GSB</h5>
                <div style="text-align:center; margin-top: 25px">
                    <a href="/medications/" class="btn btn-flat waves-effect waves-light blue">Voir nos médicaments</a>
                    <br />
                    <br />
                    <a href="/activities/" class="btn btn-flat waves-effect waves-light green">Voir nos activités</a>
                </div>
            </div>
            <div class="carousel-item white-text" style="background:url('/dist/app/img/slide-02.jpg'); background-repeat: no-repeat; background-size: cover" href="#one!"></div>
            <div class="carousel-item white-text" style="background:url('/dist/app/img/slide-03.jpg'); background-repeat: no-repeat; background-size: cover" href="#two!"></div>
        </div>
    </div>
</div>