<?php
$arr = explode('/', __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="clearfix"></div>

<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="home_block2 container">
        <div class="ptop">
            <div class="avaiable-language">
                <strong class="title text-center"><?php echo $this->t($block, 'learn_now') ?></strong>
                <ul class="list-inline text-center">
                    <?php
                    foreach ($this->active_language as $lang) {
                        echo '<li><img src="/monkeyweb/mobile/images/flag_' . $lang['code'] . '.png" alt="" /></li>';
                    }
                    ?>
                </ul>
            </div>
            <hr/>
            <div class="comingsoon-language">
                <strong class="title text-center"><?php echo $this->t($block, 'coming_soon') ?></strong>
                <ul class="list-inline text-center">
                    <?php
                    foreach ($this->comingsoon_language as $lang) {
                        if ($lang['code'] == 'taybannha') {
                            $lang['code'] = 'tbn';
                        }
                        echo '<li><img src="/monkeyweb/mobile/images/flag_' . $lang['code'] . '.png" alt="" /></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

</div>

<div class="home-subscribe-form">
    <p class="lead text-center"><?php echo $this->t($block, 'form_caption') ?></p>

    <div class="col-sm-12" style="float: none;">
        <form id="index_form1" name="" action="" method="POST">
            <input type="hidden" name="block" value="<?php echo $block ?>"/>
            <input type="hidden" name="ref_url" value="<?php echo CHtml::encode($this->current_url) ?>"/>

            <div class="form-group">
                <input type="text" name="email" class="form-control input-lg"
                       placeholder="<?php echo CHtml::encode($this->t($block, 'text_placeholder')) ?>">
            </div>

            <div class="form-group text-center">
                <button type="submit"
                        class="btn mybtn btn-default btn-lg"><?php echo $this->t($block, 'btn_title') ?></button>
            </div>
        </form>
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
            OpenInNewTab(openURLMobile.update);
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