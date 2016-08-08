<div class="lightbox zbg" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="pricing_success <?php if($data['done'] == 0) echo 'pricing_success_fail'; ?>">
        <div class="grid-container-1100" style="min-height: 350px">
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
        </div>
    </div>
</div>

<?php
if ($data['done'] == 1) {
    $this->renderPartial('licence_html', array('data' => $data));
}
?>