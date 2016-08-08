<div class="clearfix"></div>
<div class="zbg dangkyform">
    <a name="download-ebook"></a>
    <div class="llight"></div>
    <div class="rlight"></div>
    <div style="padding: 50px 0px;">
        <div class="col-xs-12">
            <form id="dangkynhansach" action="" method="POST">
                <div class="form-group">
                    <p class="lead text-center"><strong><?php echo $this->t(5, 'heading_text', 'page') ?></strong></p>
                </div>
                <div class="form-group">
                    <input type="text" name="name"
                           placeholder="<?php echo CHtml::encode($this->t(5, 'name_placeholder', 'page')) ?>"
                           class="form-control input-lg">
                </div>
                <div class="form-group">
                    <input type="text" name="email"
                           placeholder="<?php echo CHtml::encode($this->t(5, 'email_placeholder', 'page')) ?>"
                           class="form-control input-lg">
                </div>
                <div class="form-group text-center">
                    <button type="submit"
                            class="btn btn-lg btn-block mybtn input-lg"><?php echo CHtml::encode($this->t(5, 'btn_text', 'page')) ?></button>
                    <?php
                    $btn_desc = $this->t(5, 'btn_desc', 'page');
                    if (!empty(($btn_desc))) {
                        echo '<p class="lead text-center" style="padding-top: 10px">' . $btn_desc . '</p>';
                    }
                    ?>

                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {

        $("#dangkynhansach").validate({
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
                submitDangKyNhanSach();
                $('#download-ebook').modal('hide');
            }
        });


    });
    function submitDangKyNhanSach() {
        OpenInNewTab(openURLMobile.subscribe);
        $.ajax({
            url: '<?php echo $this->createUrl('index/subscribe') ?>',
            type: 'POST',
            data: $("#dangkynhansach").serialize(),
            success: function (data) {
                var json = $.parseJSON(data);
            }
        });
    }
</script>