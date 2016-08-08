<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="lightbox">
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="systematic grid-container-1100 box">
        <div class="title">
            <h2><?php echo $this->t($block, 'heading') ?></h2>
            <img src="/monkeyweb/images/new/sample_line.png"/>
        </div>
        <div class="clearfix"></div>
        <p>
            <?php echo nl2br($this->t($block, 'desc')) ?>
        </p>

        <img src="/monkeyweb/images/new/dog_bg.png"/>

    </div>
    <div class="clearfix"></div>
</div>