<?php
$arr = explode('/', __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="home_block1">
        <div class="ptop">
            <div class="col-xs-12">
                <h1 class="text-center" style="text-transform: uppercase"><?php echo $this->t($block, 'app_name') ?></h1>

                <p class="lead"><?php echo $this->t($block, 'app_desc') ?></p>

                <div class="clearfix"></div>
            </div>

            <div class="col-xs-6 text-center play_videointro">
                <img src="/monkeyweb/images/mobile/xemvideo.png" class="img-responsive" alt="" />
                <strong style="padding-top: 15px; display: block">App trailer</strong>
            </div>
            <div class="col-xs-6 text-center">
                <a href="<?php echo $this->createUrl('page/download') ?>">
                    <img src="/monkeyweb/images/mobile/taixuong.png" class="img-responsive" alt="" />
                </a>
                <ul class="list-inline platform">
                    <li>
                        <a href="<?php echo $this->createUrl('page/download', array('platform' => 'ios')) ?>">
                            <img src="/monkeyweb/images/mobile/icon-ios.png" class="img-responsive" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl('page/download', array('platform' => 'android')) ?>">
                            <img src="/monkeyweb/images/mobile/icon-android.png" class="img-responsive" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl('page/download', array('platform' => 'amazon')) ?>">
                            <img src="/monkeyweb/images/mobile/icon-amazon.png" class="img-responsive" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl('page/download', array('platform' => 'desktop')) ?>">
                            <img src="/monkeyweb/images/mobile/icon-desktop.png" class="img-responsive" alt="" />
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 videointro text-center">
                <img class="img-responsive" src="/monkeyweb/mobile/images/videointro.png"/>

                <div class="youtube embed-responsive embed-responsive-16by9">
                    <iframe frameborder="0" class="embed-responsive-item"
                            src="//www.youtube.com/embed/<?php echo $this->is_vn ? 'rwwyPfDOHKA' : 'rbB8mzAlzMM'; ?>"
                            allowfullscreen></iframe>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>


        </div>

    </div>
</div>
<style type="text/css">
    .videointro {
        display: none;
    }
    ul.platform {
        margin-top: 10px;;
    }
    @media (max-width: 768px) {
        ul.platform img {
            width: 25px;
        }
    }
</style>
<script type="text/javascript">
    $(function () {
        $('.play_videointro').click(function(){
            $('.videointro').show().click();
        });
        $('.videointro').click(function () {
            $(this).find('img').hide();
            $(this).find('.youtube').show();
        });
    });
</script>