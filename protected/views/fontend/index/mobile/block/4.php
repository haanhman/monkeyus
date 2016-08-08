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
            <div class="img">
                <img src="monkeyweb/mobile/images/overview_bg.png" alt=""/>
            </div>
            <div class="clearfix"></div>
            <p class="tl">
                <?php echo nl2br($this->t($block, 'desc')) ?>
            </p>
            <ul class="list-unstyled">

                <?php
                $arr = explode("\n", $this->t($block, 'list'));
                $arr = array_filter($arr);
                foreach ($arr as $item) {
                    echo '<li>' . $item . '</li>';
                }
                ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>