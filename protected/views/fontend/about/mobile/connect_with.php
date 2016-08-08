<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="about_block6 ptop">
        <div class="col-xs-12 text-center">
            <div class="title">
                <h3><?php echo $this->t(3, 'heading', 'global') ?></h3>
            </div>
            <ul class="list-inline">
                <li><a title="Early Start on Facebook" target="_blank" href="<?php echo FACEPAGE ?>">
                        <img src="/monkeyweb/mobile/images/fb.png" alt=""/>
                    </a></li>
                <li><a title="Early Start on Twitter" target="_blank" href="https://twitter.com/earlystartedu">
                        <img src="/monkeyweb/mobile/images/tw.png" alt=""/>
                    </a></li>
                <li><a title="Early Start on Youtube" target="_blank"
                       href="https://www.youtube.com/user/monkeyjuniorapps">
                        <img src="/monkeyweb/mobile/images/yt.png" alt=""/>
                    </a></li>
            </ul>

            <div class="heading">
                <p><?php echo $this->t(3, 'title', 'global') ?></p>
                <img src="/monkeyweb/mobile/images/line.png">
            </div>


            <div class="grid-container-1100 form">
                <form id="connect_form" name="" action="" method="POST">
                    <p><?php echo $this->t(3, 'desc', 'global') ?></p>
                    <input type="hidden" name="block" value="0"/>
                    <input type="hidden" name="ref_url" value="<?php echo CHtml::encode($this->current_url) ?>"/>

                    <div class="form-group">
                        <input name="name" type="text"
                               placeholder="<?php echo CHtml::encode($this->t(3, 'name_placeholder', 'global')) ?>"
                               class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <input name="email" type="text"
                               placeholder="<?php echo CHtml::encode($this->t(3, 'email_placeholder', 'global')) ?>"
                               class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="<?php echo CHtml::encode($this->t(3, 'btn_text', 'global')) ?>"
                               class="btn btn-lg btn-block mybtn_red input-lg">
                    </div>
                </form>

            </div>
            <div class="clearfix"></div>
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
        OpenInNewTab(openURLMobile.update);
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