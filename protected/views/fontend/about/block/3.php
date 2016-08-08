<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="lightbox" style="padding-top: 0px">
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="about_block3">
        <div class="title box">
            <h2>
                <span><?php echo $this->t($block, 'heading_1', 'about') ?></span>
                <br/>
                <?php echo $this->t($block, 'heading_2', 'about') ?>
            </h2>
            <img src="/monkeyweb/images/new/sample_line.png"/>
        </div>
        <div class="clearfix"></div>
        <div class="grid-container-1100 inner">
            <?php echo nl2br($this->t($block, 'text', 'about')) ?>
        </div>

        <div class="grid-container-1100 form">
            <form id="subscribe_form2" name="" action="" method="POST">
                <input type="hidden" name="block" value="<?php echo $block ?>"/>
                <input type="hidden" name="ref_url" value="<?php echo CHtml::encode($this->current_url) ?>"/>
                <input name="name" type="text"
                       placeholder="<?php echo CHtml::encode($this->t($block, 'name_placeholder', 'about')) ?>"
                       class="input">
                <input name="email" type="text"
                       placeholder="<?php echo CHtml::encode($this->t($block, 'email_placeholder', 'about')) ?>"
                       class="input">
                <input type="submit" value="<?php echo CHtml::encode($this->t($block, 'btn_text', 'about')) ?>"
                       class="btn">
            </form>
            <p><?php echo $this->t($block, 'form_desc', 'about') ?></p>
        </div>

    </div>
    <div class="clearfix"></div>
</div>
<script type="text/javascript">
    $(function () {

        $("#subscribe_form2").validate({
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
                submitFormSubscribe2();
            }
        });


    });
    function submitFormSubscribe2() {
        OpenInNewTab(openURL.update);
        $.ajax({
            url: '<?php echo $this->createUrl('index/index') ?>',
            type: 'POST',
            data: $("#subscribe_form2").serialize(),
            success: function (data) {
                var json = $.parseJSON(data);
            }
        });
    }
</script>