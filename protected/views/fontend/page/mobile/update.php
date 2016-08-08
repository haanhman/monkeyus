<?php $this->renderPartial('mobile/countdown'); ?>

<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div style="padding: 50px 0px;">
        <div class="col-xs-12">
            <div class="text-center">
                <img src="/monkeyweb/mobile/images/monkey_1.png" alt="monkey junior">
            </div>
            <div class="desc">
                <h1><?php echo nl2br($this->t(4, 'heading', 'page')) ?></h1>
            </div>
            <div class="clearfix"></div>

            <div class="content">
                <?php echo nl2br($this->t(4, 'html_content', 'page')) ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>