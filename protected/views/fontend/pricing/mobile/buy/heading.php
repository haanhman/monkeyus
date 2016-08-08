<div class="top-nav">
    <div class="col-xs-2 danhmuc text-left">
        <?php
        $step = intval($_GET['step']);
        if ($step == 0) {
            $step = 1;
        }

        if ($data['view'] != 'step4' && $step > 1) {

            $option = $_GET;
            if($step == 5) {
                $option['step'] = 2;
            } else {
                $option['step']--;
            }
            ?>
            <a href="<?php echo $this->createUrl('pricing/buy', $option) ?>">
                <img src="/monkeyweb/mobile/images/buy/back.png" alt="">
            </a>
            <?php
        }
        ?>
    </div>
    <div class="col-xs-8 text-center">
        <a href="<?php echo $this->createUrl('index/index') ?>"><img src="/monkeyweb/mobile/images/logo.png"
                                                                     alt=""/></a>
    </div>
    <div class="col-xs-2">&nbsp;</div>
    <div class="clearfix"></div>
</div>
<?php
$step = 0;
$title = '';
if ($data['view'] == 'step1') {
    $step = 1;
    $title = '1. Chọn hình thức thanh toán';
}
if ($data['view'] == 'step2') {
    $step = 2;
    $title = '2. Nhập thông tin liên hệ';
}
if ($data['view'] == 'step3') {
    $step = 3;
    $title = '3. Xác nhận đơn hàng';
}
if ($data['view'] == 'step5') {
    $step = 3;
    $title = '3. Chuyển khoản';
}

if ($data['view'] != 'step4') {

    ?>
    <div class="clearfix"></div>
    <div class="zbg">
        <div class="llight"></div>
        <div class="rlight"></div>
        <div class="step text-center">
            <div class="title">
                <p><?php echo $title ?></p>
            </div>
            <div class="list-dot">
                <div class="col-xs-12">
                    <div class="wizard-steps-panel steps-quantity-3">
                        <?php
                        $class = '';
                        if ($step == 1) {
                            $class = 'doing';
                        }
                        if ($step > 1) {
                            $class = 'done';
                        }
                        ?>
                        <div class="step-number step-1 <?php echo $class; ?>">
                            <div class="number">1</div>
                        </div>
                        <?php
                        $class = '';
                        if ($step == 2) {
                            $class = 'doing';
                        }
                        if ($step > 2) {
                            $class = 'done';
                        }
                        ?>
                        <div class="step-number step-2 <?php echo $class; ?>">
                            <div class="number">2</div>
                        </div>
                        <?php
                        $class = '';
                        if ($step == 3) {
                            $class = 'doing';
                        }
                        if ($step > 3) {
                            $class = 'done';
                        }
                        ?>
                        <div class="step-number step-3 <?php echo $class; ?>">
                            <div class="number">3</div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php
}
?>