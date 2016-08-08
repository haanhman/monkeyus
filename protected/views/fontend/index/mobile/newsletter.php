<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="newsletter ptop">
        <div class="col-xs-12" style="float: none">
            <div class="title text-center">
                <h3><?php echo $this->t(1, 'heading', 'global') ?></h3>
                <div class="clearfix"></div>
                <img src="/monkeyweb/mobile/images/line.png"/>

                <p class="lead"><?php echo $this->t(1, 'desc', 'global') ?></p>
            </div>
            <div class="form">
                <form id="subscribe_form" name="" action="" method="POST" class="col-xs-12">
                    <input type="hidden" name="block" value="<?php echo $block ?>" />
                    <input type="hidden" name="ref_url" value="<?php echo CHtml::encode($this->current_url) ?>" />
                    <div class="form-group">
                        <input type="text" name="name" placeholder="<?php echo CHtml::encode($this->t(1, 'name_placeholder', 'global')) ?>" class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" placeholder="<?php echo CHtml::encode($this->t(1, 'email_placeholder', 'global')) ?>" class="form-control input-lg">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn mybtn btn-success btn-lg"><?php echo $this->t(1, 'btn_free_update', 'global') ?></button>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="social">
            <div class="grid-container-1100" style="text-align: left">
                <i class="floow_bg"><?php echo $this->t(1, 'txt_follow_us', 'global') ?></i>
                <a title="Early Start on Facebook" target="_blank" href="<?php echo FACEPAGE ?>">
                    <img src="/monkeyweb/mobile/images/social_fb.png" alt="" />
                </a>
                <a title="Early Start on Twitter" target="_blank" href="https://twitter.com/earlystartedu">
                    <img src="/monkeyweb/mobile/images/social_tw.png" alt="" />
                </a>
                <a title="Early Start on Youtube" target="_blank" href="https://www.youtube.com/user/monkeyjuniorapps">
                    <img src="/monkeyweb/mobile/images/social_youtube.png" alt="" />
                </a>
            </div>

        </div>
    </div>
</div>

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
        OpenInNewTab(openURLMobile.update);
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