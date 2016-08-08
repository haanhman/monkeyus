<?php
$arr = explode('/', __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="sample ptop">
        <div class="">
            <div class="title text-center">
                <h2><?php echo $this->t($block, 'heading') ?></h2>
                <img src="/monkeyweb/mobile/images/line.png"/>
                <p style="font-style: italic">(<?php echo $this->t($block, 'sample_desc') ?>)</p>
            </div>

            <div class="play-sample">
                <div class="ls lesson1">
                    <h4><?php echo $this->t($block, 'easy_level') ?></h4>

                    <div class="inner text-center">
                        <div class="text">
                            <strong><?php echo $this->t($block, 'lesson_1') ?>:</strong>

                            <p><?php echo $this->t($block, 'easy_text') ?></p>
                        </div>
                        <img src="/monkeyweb/mobile/images/sample_1.png"/>
                        <i class="home home-icon_playvideo"></i>
                    </div>

                    <div class="col-xs-12 youtube">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe frameborder="0" class="embed-responsive-item"
                                    src="//www.youtube.com/embed/62hTkCAUv5k" allowfullscreen></iframe>

                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>

                <div class="ls lesson2">
                    <h4><?php echo $this->t($block, 'medium_level') ?></h4>

                    <div class="inner">
                        <div class="text">
                            <strong><?php echo $this->t($block, 'lesson_2') ?>:</strong>

                            <p><?php echo $this->t($block, 'medium_text') ?></p>
                        </div>
                        <img src="/monkeyweb/mobile/images/sample_2.png"/>
                        <i class="home home-icon_playvideo"></i>
                    </div>

                    <div class="col-xs-12 youtube">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe frameborder="0" class="embed-responsive-item"
                                    src="//www.youtube.com/embed/GPW7-OBLmvY" allowfullscreen></iframe>

                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="ls lesson3">
                    <h4><?php echo $this->t($block, 'advanced_level') ?></h4>

                    <div class="inner">
                        <div class="text">
                            <strong><?php echo $this->t($block, 'lesson_3') ?>:</strong>

                            <p><?php echo $this->t($block, 'advanced_text') ?></p>
                        </div>
                        <img src="/monkeyweb/mobile/images/sample_3.png"/>
                        <i class="home home-icon_playvideo"></i>
                    </div>

                    <div class="col-xs-12 youtube">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe frameborder="0" class="embed-responsive-item"
                                    src="//www.youtube.com/embed/BYv0-LZaVcY" allowfullscreen></iframe>

                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('.ls').click(function () {
            $(this).find('.inner').hide();
            $(this).find('.youtube').show();
        });
    });
</script>