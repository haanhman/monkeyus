<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="about_block2">
    <div class="grid-container-1100 <?php if ($this->is_vn) echo 'bg_vn'; ?>">
        <div class="form">
            <strong><?php echo $this->t($block, 'form_catipon', 'about') ?></strong>
            <form id="subscribe_form1" name="" action="" method="POST">
                <input type="hidden" name="block" value="<?php echo $block ?>"/>
                <input type="hidden" name="ref_url" value="<?php echo CHtml::encode($this->current_url) ?>"/>
                <input type="text" name="name"
                       placeholder="<?php echo CHtml::encode($this->t($block, 'name_placeholder', 'about')) ?>"
                       class="about about-input-bg input">
                <input type="text" name="email"
                       placeholder="<?php echo CHtml::encode($this->t($block, 'email_placeholder', 'about')) ?>"
                       class="about about-input-bg input">
                <input type="submit" value="<?php echo CHtml::encode($this->t($block, 'btn_text', 'about')) ?>"
                       class="btn">
            </form>
        </div>
        <div class="inner">
            <?php
            echo nl2br($this->t($block, 'right_text', 'about'));
            ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#subscribe_form1").validate({
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
            data: $("#subscribe_form1").serialize(),
            success: function (data) {
                var json = $.parseJSON(data);
            }
        });
    }
</script>