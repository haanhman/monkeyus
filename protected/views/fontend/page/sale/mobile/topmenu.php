<div class="logo-nav" style="background-color: #CDDC39;">
    <div class="pagesale grid-container">
        <div class="top-logo">
            <a href="<?php echo $this->createUrl('index/index') ?>" title="Monkey Junior">
                <img src="/images/sale/logo.png" alt="Monkey Junior">
            </a>
        </div>
        <div class="topmenu">
            <?php
            $this->renderPartial('//layouts/monkeyjunior/menu_sale');
            ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>