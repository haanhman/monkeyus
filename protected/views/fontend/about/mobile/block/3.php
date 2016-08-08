<?php
$arr = explode('/', __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="about_block3 ptop">
        <div class="title text-center">
            <h2>
                <span><?php echo $this->t($block, 'heading_1', 'about') ?></span>
                <br />
                <?php echo $this->t($block, 'heading_2', 'about') ?>
            </h2>
            <img src="/monkeyweb/mobile/images/line.png">
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12 lead">
            <?php echo nl2br($this->t($block, 'text', 'about')) ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12 form">
            <form id="subscribe_form2" name="" action="" method="POST">
                <input type="hidden" name="block" value="<?php echo $block ?>" />
                <input type="hidden" name="ref_url" value="<?php echo CHtml::encode($this->current_url) ?>" />
                <div class="form-group">
                    <input name="name" type="text" placeholder="<?php echo CHtml::encode($this->t($block, 'name_placeholder', 'about')) ?>" class="form-control input-lg">
                </div>
                <div class="form-group">
                    <input name="email" type="text" placeholder="<?php echo CHtml::encode($this->t($block, 'email_placeholder', 'about')) ?>" class="form-control input-lg">
                </div>

                <div class="form-group text-center">
                    <button type="submit"
                            class="btn btn-lg btn-block mybtn input-lg"><?php echo $this->t($block, 'btn_text', 'about') ?></button>
                </div>

            </form>
            <p class="text-center lead"><?php echo $this->t($block, 'form_desc', 'about') ?></p>
        </div>
        <div class="clearfix"></div>
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
        OpenInNewTab(openURLMobile.update);
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