<?php
$arr = explode('/', __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="overview ptop">
        <div class="col-xs-12 text-center">
            <div class="title">
                <h2><?php echo $this->t($block, 'heading') ?></h2>
                <img src="/monkeyweb/mobile/images/line.png"/>
            </div>
            <div class="clearfix"></div>
            <p class="lead">
                <?php echo nl2br($this->t($block, 'desc')) ?>
            </p>

            <p class="list">
                <?php echo nl2br($this->t($block, 'list')) ?>
            </p>

            <img src="/monkeyweb/mobile/images/multigame.png"/>
        </div>

        <div class="clearfix"></div>
    </div>

</div>