<?php
$arr = explode('/', __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="overview ptop">
        <div class="col-xs-12">
            <div class="title text-center">
                <h2><?php echo $this->t($block, 'heading') ?></h2>
                <img src="/monkeyweb/mobile/images/line.png"/>
            </div>
            <div class="clearfix"></div>
            <div class="text-center">
                <ul class="tinhnang list-unstyled">
                    <li class="col-sm-6">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="/monkeyweb/mobile/images/img3.png"/>
                            </div>
                            <h3><?php echo $this->t($block, 'title_3') ?></h3>

                            <p><?php echo nl2br($this->t($block, 'text_3')) ?></p>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <li class="col-sm-6">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="/monkeyweb/mobile/images/img7.png"/>
                            </div>
                            <h3><?php echo $this->t($block, 'title_5') ?></h3>

                            <p><?php echo nl2br($this->t($block, 'text_5')) ?></p>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <li class="col-sm-6">
                        <div class="thumbnail">

                            <div class="img">
                                <img src="/monkeyweb/mobile/images/img1.png"/>
                            </div>
                            <h3><?php echo $this->t($block, 'title_1') ?></h3>

                            <p><?php echo nl2br($this->t($block, 'text_1')) ?></p>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <li class="col-sm-6">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="/monkeyweb/mobile/images/img2.png"/>
                            </div>
                            <h3><?php echo $this->t($block, 'title_2') ?></h3>

                            <p><?php echo nl2br($this->t($block, 'text_2')) ?></p>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <li class="col-sm-6">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="/monkeyweb/mobile/images/img6.png"/>
                            </div>
                            <h3><?php echo $this->t($block, 'title_6') ?></h3>

                            <p><?php echo nl2br($this->t($block, 'text_6')) ?></p>
                            <div class="clearfix"></div>
                        </div>

                    </li>

                    <li class="col-sm-6">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="/monkeyweb/mobile/images/img4.png"/>
                            </div>
                            <h3><?php echo $this->t($block, 'title_4') ?></h3>

                            <p><?php echo nl2br($this->t($block, 'text_4')) ?></p>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<script type="text/javascript">
//    $(function () {
//        var max = 0;
//        $('.tinhnang .thumbnail').each(function () {
//            if ($(this).height() > max) {
//                max = $(this).height();
//            }
//        });
//        $('.tinhnang .thumbnail').css('height', max);
//    });
</script>