<?php
if (Yii::app()->controller->action->id == 'sale') {
    echo '<a name="lienhe"></a>';
}
?>
<div class="lightbox blog-book" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="faqintro">
        <div class="grid-container-1100">

            <?php
            if (Yii::app()->controller->action->id == 'sale') {
                ?>
                <div class="support-img">
                    <img src="/images/sale/support.png" alt=""/>
                </div>
                <?php
            }
            ?>

            <a name="faq"></a>
            <h3><?php echo $this->t(2, 'heading', 'pricing') ?></h3>
            <div class="text-center">
                <img src="/images/sale/line.png" alt=""/>
            </div>
            <?php
            foreach ($data['faq'] as $item) {
                ?>
                <div class="items">
                    <div class="anser">
                        <i class="pricing pricing-icon_tamgiac_2-png"></i>
                        <a><?php echo $item['title'] ?></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="question"><?php echo filterContentImage($item['content']) ?></div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('.faqintro .anser').click(function () {
            if ($(this).parent().hasClass('active')) {
                $(this).parent().removeClass('active');
                $(this).find('i').removeClass('pricing-icon_tamgiac_1').addClass('pricing-icon_tamgiac_2-png');
                $(this).next().slideUp();
                return;
            } else {
                $('.faqintro .items').removeClass('active');
                $(this).parent().addClass('active');
                $('.anser i').removeClass('pricing-icon_tamgiac_1').addClass('pricing-icon_tamgiac_2-png');
                $(this).find('i').removeClass('pricing-icon_tamgiac_2-png').addClass('pricing-icon_tamgiac_1');
                $(this).next().slideDown();
            }
        });
    });
</script>