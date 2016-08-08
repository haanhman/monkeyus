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
                <h1 class="text-center"><?php echo $this->t($block, 'app_name') ?></h1>

                <p class="lead"><?php echo $this->t($block, 'app_desc') ?></p>

                <div class="clearfix"></div>
            </div>

            <div class="col-xs-12 videointro text-center">
                <img class="img-responsive" src="/monkeyweb/mobile/images/videointro.png"/>

                <div class="youtube embed-responsive embed-responsive-16by9">
                    <iframe frameborder="0" class="embed-responsive-item"
                            src="//www.youtube.com/embed/<?php echo $this->is_vn ? 'rwwyPfDOHKA' : 'rbB8mzAlzMM'; ?>" allowfullscreen></iframe>
                </div>
                <div class="clearfix"></div>
            </div>


            <div class="store">
                <h3 class="text-center"><?php echo $this->t($block, 'start_download') ?></h3>
                <ul class="list-unstyled">
                    <li class="text-center">
                        <a target="_blank" title="<?php echo $this->url_download['ios']['title'] ?>"
                           href="<?php echo $this->url_download['ios']['url'] ?>">
                            <img src="/images/icon_ios.png" style="width: 170px" alt=""/>
                        </a>
                    </li>
                    <li class="text-center">
                        <a target="_blank" title="<?php echo $this->url_download['android']['title'] ?>"
                           href="<?php echo $this->url_download['android']['url'] ?>">
                            <img src="/images/icon_android.png" style="width: 170px" alt=""/>
                        </a>
                    </li>



                    <?php
                    if ($this->is_vn == 1) {
                        ?>
                        <li class="text-center">
                            <a target="_blank" title="<?php echo $this->url_download['laptop']['title'] ?>"
                               href="<?php echo $this->url_download['laptop']['url'] ?>">
                                <img src="/images/desktop.png" style="width: 170px" alt=""/>
                            </a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="text-center">
                            <a target="_blank" title="<?php echo $this->url_download['amazon']['title'] ?>"
                               href="<?php echo $this->url_download['amazon']['url'] ?>">
                                <img src="/monkeyweb/mobile/images/icon_amazon.png" alt=""/>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
                <div class="clearfix"></div>
                <ul class="total-download">
                    <h4 class="text-center"><?php echo $this->t($block, 'total_download') ?></h4>

                    <?php
                    $start = isset($_COOKIE['edu_total_download_new']) ? $_COOKIE['edu_total_download_new'] : $this->getCountDown();
                    ?>
                    <ul class="list-inline text-center countdown">
                        <?php
                        for($i = 0; $i < strlen($start); $i++) {
                            echo '<li>'.$start[$i].'</li>';
                        }
                        ?>
                    </ul>

                </div>
            </div>

        </div>
    </div>

</div>
<script type="text/javascript">
    $(function () {
        $('.videointro').click(function () {
            $(this).find('img').hide();
            $(this).find('.youtube').show();
        });
    });
</script>