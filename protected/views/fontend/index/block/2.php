<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="lightbox">
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="home-subscribe">
        <div class="avaiable">
            <div class="inner">
                <em><?php echo $this->t($block, 'learn_now') ?></em>
                <ul>
                    <?php
                    foreach ($this->active_language as $lang) {
                        $class = 'sprite sprite-img_flag_' . $lang['code'];
                        if($lang['code'] == 'vn') {
                            $class = 'pricing flag pricing-lang_vn tooltipstered';
                        }
                        echo '<li><i title="' . getLanguageTitle($lang, $this->is_vn) . '" class="tooltip '.$class.'"></i></li>';
                    }
                    ?>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="coming">
            <em><?php echo $this->t($block, 'coming_soon') ?></em>
            <ul>
                <?php
                foreach ($this->comingsoon_language as $lang) {
                    if($lang['code'] == 'taybannha') {
                        $lang['code'] = 'tbn';
                    }
                    echo '<li><i title="' . getLanguageTitle($lang, $this->is_vn) . '" class="tooltip pricing flag pricing-lang_' . $lang['code'] . '"></i></li>';
                }
                ?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>

        <!-- form -->
        <div class="home-subscribe-form sprite sprite-subscribe_bg">
            <p><?php echo $this->t($block, 'form_caption') ?></p>

            <form id="index_form1" name="" action="" method="POST">
                <input type="hidden" name="block" value="<?php echo $block ?>"/>
                <input type="hidden" name="ref_url" value="<?php echo CHtml::encode($this->current_url) ?>"/>
                <input type="text" name="email" class="sprite sprite-subscribe_input"
                       placeholder="<?php echo CHtml::encode($this->t($block, 'text_placeholder')) ?>">
                <i class="sprite sprite-subscribe_button form1_submit"><?php echo $this->t($block, 'btn_title') ?></i>
            </form>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('.form1_submit').click(function () {
            $("#index_form1").submit();
        });

        $("#index_form1").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: mes[lang_code].empty_email,
                    email: mes[lang_code].not_email
                }
            },
            submitHandler: function () {
                submitForm1();
            }
        });


        function submitForm1() {
            OpenInNewTab(openURL.update);
            $.ajax({
                url: '<?php echo $this->createUrl('index/index') ?>',
                type: 'POST',
                data: $("#index_form1").serialize(),
                success: function (data) {
                    var json = $.parseJSON(data);
                }
            });
        }

    });

</script>