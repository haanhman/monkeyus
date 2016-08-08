<?php
$arr = explode('/', __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="about_block1 ptop">
        <div class="col-xs-12 text-center">
            <h1>
                <?php echo $this->t($block, 'heading', 'about') ?>
                <br />
                <span><?php echo $this->t($block, 'heading_2', 'about') ?></span>
            </h1>
            <img src="/monkeyweb/mobile/images/line.png">
        </div>
        <div class="clearfix"></div>
    </div>
</div>
