<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="lightbox block5" style="padding-top: 0px">
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="about_block5">
        <div class="inner grid-container-1100">
            <a name="contact"></a>
            <h3><?php echo $this->t($block, 'form_caption', 'about') ?></h3>

            <div class="form">
                <div class="container">
                    <ol></ol>
                </div>
                <form id="contact_form" name="" action="<?php echo $this->createUrl('about/submitcontact') ?>" method="POST">
                    <div class="row1">
                        <input name="name" type="text"
                               placeholder="<?php echo CHtml::encode($this->t($block, 'name', 'about')) ?>">
                        <input name="email" type="text"
                               placeholder="<?php echo CHtml::encode($this->t($block, 'email', 'about')) ?>">
                    </div>
                    <div class="row2">
                        <input name="subject" type="text"
                               placeholder="<?php echo CHtml::encode($this->t($block, 'subject', 'about')) ?>">
                    </div>
                    <div class="row3">
                        <textarea name="message"
                                  placeholder="<?php echo CHtml::encode($this->t($block, 'message', 'about')) ?>"></textarea>
                    </div>
                    <div style="width: 304px; margin: 0px auto">
                        <div class="g-recaptcha" data-sitekey="6LeuoyETAAAAABocBU6xUaMa0HuAIuSNceK_UjM7"></div>
                    </div>
                    <div class="row4">
                        <input type="submit" value="" class="about about-btn-submit">
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
<script type="text/javascript">
    $(function () {
        var container = $('div.container');
        $("#contact_form").validate({
            errorContainer: container,
            errorLabelContainer: $("ol", container),
            wrapper: 'li',
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