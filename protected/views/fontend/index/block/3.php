<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="lightbox zbg" style="padding-top: 0px">
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="sample">
        <div class=" grid-container-1100">
            <div class="title box">
                <h2><?php echo $this->t($block, 'heading') ?></h2>
                <img src="/monkeyweb/images/new/sample_line.png"/>
                <p style="font-style: italic">(<?php echo $this->t($block, 'sample_desc') ?>)</p>
            </div>
            <div class="clearfix"></div>

            <div class="play-sample">
                <div class="ls lesson1">
                    <em><?php echo $this->t($block, 'easy_level') ?></em>

                    <a class="video-link" data-video-id="y-62hTkCAUv5k" data-video-autoplay="1">
                        <div class="inner">
                            <div class="text">
                                <strong><?php echo $this->t($block, 'lesson_1') ?>:</strong>

                                <p><?php echo $this->t($block, 'easy_text') ?></p>
                            </div>
                            <img src="/monkeyweb/images/new/sample_1.png"/>
                            <i class="sample-play"></i>
                        </div>
                    </a>
                </div>

                <div class="ls lesson2">
                    <em><?php echo $this->t($block, 'medium_level') ?></em>
                    <a class="video-link" data-video-id="y-GPW7-OBLmvY" data-video-autoplay="1">

                        <div class="inner">
                            <div class="text">
                                <strong><?php echo $this->t($block, 'lesson_2') ?>:</strong>

                                <p><?php echo $this->t($block, 'medium_text') ?></p>
                            </div>
                            <img src="/monkeyweb/images/new/sample_2.png"/>
                            <i class="sample-play"></i>
                        </div>
                    </a>
                </div>
                <div class="ls lesson3">
                    <em><?php echo $this->t($block, 'advanced_level') ?></em>
                    <a class="video-link" data-video-id="y-BYv0-LZaVcY" data-video-autoplay="1">

                        <div class="inner">
                            <div class="text">
                                <strong><?php echo $this->t($block, 'lesson_3') ?>:</strong>

                                <p><?php echo $this->t($block, 'advanced_text') ?></p>
                            </div>
                            <img src="/monkeyweb/images/new/sample_3.png"/>
                            <i class="sample-play"></i>
                        </div>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>