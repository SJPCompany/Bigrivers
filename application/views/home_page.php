<div class="container body-content">
    <div class="row ">

        <?php foreach($widgets as $widget) {
        if($widget->active == '1') { ?>
        <div class="Button col-xs-6 col-sm-4 col-md-3">
            <a href="/Home/Events/17" target="_self">
                <img class="ButtonImg" src="https://upload.wikimedia.org/wikipedia/commons/c/c4/PM5544_with_non-PAL_signals.png">
                <p class="ButtonTitle"><?=$widget->title?></p>
            </a>
            <img class="ButtonBackground" src="<?php echo base_url("backend/image/checkImage/polaroid.png/200/100")?>">
        </div>
        <?php
            } else {} }
        ?>
    </div>
</div>