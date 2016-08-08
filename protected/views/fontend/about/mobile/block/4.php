<?php
$arr = explode('/', __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="lightbox team">
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="about_block4 grid-container-1100">
        <div class="inner">
            <div class="heading">
                <p><?php echo $this->t($block, 'about', 'about') ?>
                    <span><?php echo $this->t($block, 'author', 'about') ?></span></p>
                <img src="/monkeyweb/images/new/about_line_2.png">
            </div>

            <div class="avatar">
                <img src="/monkeyweb/images/new/avatar.png">
                <strong>Đào Xuân Hoàng</strong>
            </div>

            <div class="content">
                <?php echo nl2br($this->t($block, 'text', 'about')) ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>