<div class="top">
    <div class="colorful">
        <div class="color1"></div>
        <div class="color2"></div>
        <div class="color3"></div>
        <div class="color4"></div>
        <div class="color5"></div>
        <div class="color6"></div>
        <div class="color7"></div>
        <div class="color8"></div>
    </div>
    <div class="clearfix"></div>
    <div class="logo-nav">
        <div class="grid-container">
            <div class="top-logo">
                <a href="<?php echo $this->createUrl('index/index') ?>" title="Monkey Junior">
                    <img src="/monkeyweb/images/new/logo.png" alt="Monkey Junior">
                </a>
            </div>
            <?php
            $ctl = Yii::app()->controller->id;
            if ($ctl == 'agent') {
                $this->renderPartial('//agent/menu');
            } else {
                $this->renderPartial('//layouts/monkeyjunior/main_menu');
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('.language').click(function () {
            $('.pricing-language_popup').slideToggle();
        });
    });
</script>