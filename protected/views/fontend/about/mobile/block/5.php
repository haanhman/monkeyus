<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
$arr = explode('/', __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="about_block5 ptop">
        <div class="col-xs-12">
            <a name="contact"></a>

            <div class="title text-center">
                <h3><?php echo $this->t($block, 'form_caption', 'about') ?></h3>
            </div>

            <div class="form">
                <form id="contact_form" name="" action="" method="POST">
                    <div class="form-group">
                        <input class="form-control input-lg" name="name" type="text"
                                                     placeholder="<?php echo CHtml::encode($this->t($block, 'name', 'about')) ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" name="email" type="text"
                               placeholder="<?php echo CHtml::encode($this->t($block, 'email', 'about')) ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" name="subject" type="text"
                               placeholder="<?php echo CHtml::encode($this->t($block, 'subject', 'about')) ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" name="message"
                                  placeholder="<?php echo CHtml::encode($this->t($block, 'message', 'about')) ?>"></textarea>
                    </div>
                    <div class="form-group" style="width: 304px; margin: 0px auto">
                        <div class="g-recaptcha" data-sitekey="6LeuoyETAAAAABocBU6xUaMa0HuAIuSNceK_UjM7"></div>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn_submit" type="submit"><?php echo $this->is_vn == 1 ? 'Gửi' : 'Submit'; ?></button>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        var container = $('div.container');
        $("#contact_form").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                subject: {
                    required: true
                },
                message: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: mes[lang_code].empty_name,
                },
                email: {
                    required: mes[lang_code].empty_email,
                    email: mes[lang_code].not_email
                },
                subject: {
                    required: mes[lang_code].empty_subject
                },
                message: {
                    required: mes[lang_code].empty_message
                }
            },
            submitHandler: function () {
                submitFormContact();
            }
        });


        function submitFormContact() {
            $.ajax({
                url: '<?php echo $this->createUrl('about/submitcontact') ?>',
                type: 'POST',
                data: $("#contact_form").serialize(),
                success: function (data) {
                    var json = $.parseJSON(data);
                    if (json.status == 1) {
                        <?php
                        if ($this->is_vn) {
                            echo "alert('Cảm ơn bạn đã liên lạc với chúng tôi. Chúng tôi sẽ trả lời bạn trong thời gian sớm nhất.');";
                        } else {
                            echo "alert('Thank you very much for contacting us. We will get back to you as soon as possible.');";
                        }
                        ?>
                        window.location.reload();
                    }if (json.status == 0) {
                        <?php
                        if ($this->is_vn) {
                            echo "alert('Vui lòng xác thực ');";
                        } else {
                            echo "alert('Please confirm captcha.');";
                        }
                        ?>
                    }
                }
            });
        }

    });

</script>