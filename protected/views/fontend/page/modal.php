<div class="modal fade" id="download-ebook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <i class="muaban muaban-btn_close" data-dismiss="modal"></i>
            <div class="tabbar">                
                <div class="logo"><i class="muaban muaban-logo"></i></div>
            </div>

            <div class="modal-body">
                <form id="dangkynhansach" action="" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <p class='info'><?php echo $this->t(5, 'heading_text', 'page') ?></p>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-8">
                            <input type="text" name="name" placeholder="<?php echo CHtml::encode($this->t(5, 'name_placeholder', 'page')) ?>" class="form-control">
                        </div>
                        <div class="col-sm-2">&nbsp;</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-8">
                            <input type="text" name="email" placeholder="<?php echo CHtml::encode($this->t(5, 'email_placeholder', 'page')) ?>" class="form-control">
                        </div>
                        <div class="col-sm-2">&nbsp;</div>
                    </div>
                    <div class="form-group">
                        <div class="btnwp">
                            <input type="submit" class="btn" value="<?php echo CHtml::encode($this->t(5, 'btn_text', 'page')) ?>" />
                        </div>
                        <?php
                        $btn_desc = $this->t(5, 'btn_desc', 'page');
                        if (!empty(($btn_desc))) {
                            echo '<p class="text_desc">' . $btn_desc . '</p>';
                        }
                        ?>

                    </div>
                </form>
            </div>

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
        OpenInNewTab(openURL.subscribe);
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