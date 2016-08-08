<div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <i class="muaban muaban-btn_close" data-dismiss="modal"></i>
            <div class="tabbar">
                <ul class="">
                    <li class="current">
                        <div class="number">1</div>
                        <div class="r">
                            <strong>Chọn</strong>
                            <em>Hình thức thanh thoán</em>
                        </div>
                    </li>
                    <li class="arow"><i class="muaban muaban-arow"></i></li>
                    <li>
                        <div class="number">2</div>
                        <div class="r">
                            <strong>Nhập</strong>
                            <em>Thông tin cá nhân</em>
                        </div>
                    </li>
                    <li class="arow"><i class="muaban muaban-arow"></i></li>
                    <li>
                        <div class="number">3</div>
                        <div class="r">
                            <strong>Xác nhận</strong>
                            <em>Đơn hàng</em>
                        </div>
                    </li>
                </ul>
                <div class="logo" style="display: none;"><i class="muaban muaban-logo"></i></div>
            </div>
            <div class="modal-body wizard-content">
                <?php
                $arrStep = array('step1', 'thongtinlienhe', 'orderdetail', 'thankyou');
                foreach ($arrStep as $step) {
                    echo '<div class="wizard-step">';
                    $this->renderPartial($step, array('data' => $data));
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>