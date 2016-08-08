<div class="lightbox" style="padding-top: 0px">
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="about_block6">
        <div class="inner grid-container-1100">
            <h3><?php echo $this->t(3, 'heading', 'global') ?></h3>
            <div class="clearfix"></div>
            <div class="ss">
                <ul>
                    <li><a title="Early Start on Facebook" target="_blank" href="<?php echo FACEPAGE ?>"><i class="about about-social-facebook"></i></a></li>
                    <li><a title="Early Start on Twitter" target="_blank" href="https://twitter.com/earlystartedu"><i class="about about-social-tw"></i></a></li>
                    <li><a title="Early Start on Youtube" target="_blank" href="https://www.youtube.com/user/monkeyjuniorapps"><i class="about about-social-youtube"></i></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="heading">
                <p><?php echo $this->t(3, 'title', 'global') ?></p>
                <img src="/monkeyweb/images/new/about_line_3.png">
            </div>


            <div class="grid-container-1100 form">
                <form id="connect_form" name="" action="" method="POST"> 
                    <p><?php echo $this->t(3, 'desc', 'global') ?></p>
                    <input type="hidden" name="block" value="0" />
                    <input type="hidden" name="ref_url" value="<?php echo CHtml::encode($this->current_url) ?>" />
                    <input name="name" type="text" placeholder="<?php echo CHtml::encode($this->t(3, 'name_placeholder', 'global')) ?>" class="input">
                    <input name="email" type="text" placeholder="<?php echo CHtml::encode($this->t(3, 'email_placeholder', 'global')) ?>" class="input">
                    <input type="submit" value="<?php echo CHtml::encode($this->t(3, 'btn_text', 'global')) ?>" class="btn">
                </form>

            </div>

        </div>

    </div>
</div>
<script type="text/javascript">
    $(function () {

        $("#connect_form").validate({
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
                submitFormConnect();
            }
        });



    });
    function submitFormConnect() {
        OpenInNewTab(openURL.update);
        $.ajax({
            url: '<?php echo $this->createUrl('index/index') ?>',
            type: 'POST',
            data: $("#connect_form").serialize(),
            success: function (data) {
                var json = $.parseJSON(data);
            }
        });
    }
</script>