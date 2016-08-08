<?php
$ctl = Yii::app()->controller->id;
if ($ctl == 'index') {
    ?>
    <div class="newsletter" style="padding-top: 50px">
        <div class="title">
            <em><?php echo $this->t(1, 'heading', 'global') ?></em>
            <div class="clearfix"></div>
            <img src="/monkeyweb/images/new/newsletter_line.png"/>

            <p><?php echo $this->t(1, 'desc', 'global') ?></p>
        </div>
        <div class="form grid-container-1100">
            <form id="subscribe_form" name="" action="" method="POST">
                <input type="hidden" name="block" value="<?php echo $block ?>" />
                <input type="hidden" name="ref_url" value="<?php echo CHtml::encode($this->current_url) ?>" />
                <input type="text" name="name" placeholder="<?php echo CHtml::encode($this->t(1, 'name_placeholder', 'global')) ?>" class="name">
                <input type="text" name="email" placeholder="<?php echo CHtml::encode($this->t(1, 'email_placeholder', 'global')) ?>" class="email">
                <i class="sprite sprite-footer_btn"><?php echo $this->t(1, 'btn_free_update', 'global') ?></i>
            </form>
            <div class="clearfix"></div>
        </div>
        <div class="social" style="margin-top: <?php echo $this->is_vn ? '105' : '75'; ?>px">
            <div class="grid-container-1100" style="text-align: left">
                <i class="sprite sprite-floow_bg"><?php echo $this->t(1, 'txt_follow_us', 'global') ?></i>
                <a title="Early Start on Facebook" target="_blank" href="<?php echo FACEPAGE ?>"><i class="sprite sprite-fb_icon_1"></i></a>
                <a title="Early Start on Twitter" target="_blank" href="https://twitter.com/earlystartedu"><i class="sprite sprite-tw_icon_1"></i></a>
                <a title="Early Start on Youtube" target="_blank" href="https://www.youtube.com/user/monkeyjuniorapps"><i class="sprite sprite-yt_icon_2"></i></a>
            </div>

        </div>
    </div>
    <?php
} else {
    $ctl = Yii::app()->controller->id;
    $padding_top = '50px';
    if($ctl == 'pricing') {
        $padding_top = '20px';
    }
    ?>

    <div class="lightbox blog-book" style="padding-top: 0px">
        <div class="clearfix"></div>
        <div class="light-left">&nbsp;</div>
        <div class="light-right">&nbsp;</div>
        <div class="newsletter" style="padding-top: <?php echo $padding_top ?>;">
            <div class="title">
                <em><?php echo $this->t(1, 'heading', 'global') ?></em>
                <img src="/monkeyweb/images/new/newsletter_line.png"/>

                <p><?php echo $this->t(1, 'desc', 'global') ?></p>
            </div>
            <div class="form grid-container-1100">
                <form id="subscribe_form" name="" action="" method="POST"> 
                    <input type="hidden" name="block" value="0" />
                    <input type="hidden" name="ref_url" value="<?php echo CHtml::encode($this->current_url) ?>" />
                    <input type="text" name="name" placeholder="<?php echo CHtml::encode($this->t(1, 'name_placeholder', 'global')) ?>" class="name">
                    <input type="text" name="email" placeholder="<?php echo CHtml::encode($this->t(1, 'email_placeholder', 'global')) ?>" class="email">
                    <i class="sprite sprite-footer_btn"><?php echo $this->t(1, 'btn_free_update', 'global') ?></i>
                </form>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?php
}
?>
<script type="text/javascript">
    $(function () {


        $('#subscribe_form .sprite-footer_btn').click(function () {
            $("#subscribe_form").submit();
        });



        $("#subscribe_form").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                name: {
                    required: mes[lang_code].empty_name,
                },
                email: {
                    required: mes[lang_code].empty_email,
                    email: mes[lang_code].not_email
                }
            },
            submitHandler: function () {
                submitFormSubscribe();
            }
        });



    });
    function submitFormSubscribe() {
        OpenInNewTab(openURL.update);
        $.ajax({
            url: '<?php echo $this->createUrl('index/index') ?>',
            type: 'POST',
            data: $("#subscribe_form").serialize(),
            success: function (data) {
                var json = $.parseJSON(data);
            }
        });
    }
</script>