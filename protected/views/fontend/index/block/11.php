<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="lightbox">
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="overview multigame grid-container-1100 box">
        <div class="title">
            <h2><?php echo $this->t($block, 'heading') ?></h2>
            <img src="/monkeyweb/images/new/sample_line.png"/>
        </div>
        <div class="clearfix"></div>
        <div class="content">
            <p class="tl">
                <?php echo nl2br($this->t($block, 'desc')) ?>
            </p>
            <p class="list">
                <?php echo nl2br($this->t($block, 'list')) ?>
            </p>
        </div>

    </div>
    <div class="clearfix"></div>
</div>