<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="pricing_block1 ptop">
        <div class="col-xs-12 text-center">
            <?php
            if ($data['done'] == 1) {
                ?>
                <h1>Giao dịch thành công!</h1>
                <div class="desc">
                    Mã kích hoạt và hướng dẫn sử dụng đã được gửi vào email của bạn
                </div>
                <?php
            } else {
                ?>
                <h1>Giao dịch thất bại!</h1>
                <div class="desc">
                    Giao dịch của bạn đã bị huỷ, vui lòng thử lại hoặc liên hệ với BQT để được trợ giúp.
                </div>
                <?php
            }
            ?>
            <img src="/monkeyweb/mobile/images/line.png">
        </div>
        <div class="clearfix"></div>
    </div>
</div>


<div class="col-xs-12">
    <?php
    if ($data['done'] == 1) {
        $this->renderPartial('licence_html', array('data' => $data));
    }
    ?>
    <div class="clearfix"></div>
</div>

