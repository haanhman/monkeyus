<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="downloadhome">
    <div class="grid-container-1100" style="padding-top: 50px">
        <div class="dl">
            <div class="inner">
                <h1><?php echo $this->t($block, 'app_name') ?></h1>

                <p><?php echo $this->t($block, 'app_desc') ?></p>
            </div>
        </div>
        <div class="dr">
            <a class="video-link" data-video-id="y-<?php echo $this->is_vn ? 'rwwyPfDOHKA' : 'rbB8mzAlzMM'; ?>"
               data-video-autoplay="1">
                <i class="sprite sprite-video_bg"></i>
                <i class="sprite sprite-video_button"></i>
            </a>
        </div>
        <div class="clearfix"></div>
        <div class="grid-100 store">
            <p><?php echo $this->t($block, 'start_download') ?></p>
            <?php
            $this->renderPartial('block/1us', array('data' => $data));
            ?>
            <div class="clearfix"></div>
            <div class="total-download">
                <em><?php echo $this->t($block, 'total_download') ?></em>
                <?php
                $start = isset($_COOKIE['edu_total_download_new']) ? $_COOKIE['edu_total_download_new'] : $this->getCountDown();
                ?>
                <div class="count">
                    <?php
                    for ($i = 0; $i < strlen($start); $i++) {
                        echo '<span>' . $start[$i] . '</span>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>