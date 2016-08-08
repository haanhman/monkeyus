<div class="onepay">
    <div class="tinthongchuyenkhoan">
        <strong>Thông tin chuyển khoản:</strong>

        <p>
            Công ty TNHH Early Start – <span>Số tài khoản</span> 0451000318224<br/>
            Ngân hàng Vietcombank, chi nhánh Thanh Xuân, Hà Nội.
        </p>
    </div>
    <div class="desc">
        <strong>Các bước thanh toán:</strong>
        <ol>
            <li>
                Chuyển khoản tới tài khoản trên với số tiền: <span id="giagoimua">100.000 VNĐ</span><br/>
                Tại mục “ghi chú”, bạn ghi rõ: Số điện thoại, email của bạn (nếu được), Họ và tên của bạn, gói nội dung bạn mua.
            </li>
            <li>
                Khi có xác nhận thanh toán hoàn tất, <b>ngay lập tức</b> công ty sẽ gửi mã kích hoạt (kèm theo hướng
                dẫn) vào email của bạn
            </li>
        </ol>
    </div>    
    <div class="orderdetail">
        <?php
        $this->renderPartial('order_table', array('data' => $data));
        ?>
    </div>

    <div class="function_btn">
        <div class="inner">
            <button type="button" class="muaban muaban-btn_quaylai wizard-button-back"></button>
            <button type="button" class="muaban muaban-btn_hoantat_small wizard-button-finish" data-dismiss="modal"></button>
        </div>
        <div class="clearfix"></div>
    </div>
</div>