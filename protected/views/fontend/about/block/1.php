<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="lightbox block1" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="about_block1">
        <div class="grid-container-1100">
            <div class="inner">
                <h1>
                    <?php echo $this->t($block, 'heading', 'about') ?>
                    <br />
                    <span><?php echo $this->t($block, 'heading_2', 'about') ?></span>
                </h1>

                <img src="/monkeyweb/mobile/images/line.png">
            </div>
        </div>
    </div>
</div>