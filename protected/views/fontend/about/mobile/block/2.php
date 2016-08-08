<?php
$arr = explode('/', __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>

<div class="clearfix"></div>
<div class="zbg">
    <div class="about_block2 ptop">
        <div class="col-xs-12">
            <p class="text-center">
                <img src="/monkeyweb/mobile/images/about_monkey.png" alt="" />
            </p>
            <p class="lead">
                <?php
                echo nl2br($this->t($block, 'right_text', 'about'));
                ?>
            </p>
        </div>
    </div>
</div>