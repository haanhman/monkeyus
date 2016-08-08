<link rel="stylesheet" href="/icon/css/glyphicons.css" />
<div class="orderdetail">

    <div class="onepay" style="display: none">
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
                    Tại mục “ghi chú”, bạn ghi rõ: Số điện thoại, email của bạn (nếu được), Họ và tên của bạn, gói nội dung bạn mua, mã giảm giá nếu có.
                </li>
                <li>
                    Khi có xác nhận thanh toán hoàn tất, <b>ngay lập tức</b> công ty sẽ gửi mã kích hoạt (kèm theo hướng
                    dẫn) vào email của bạn
                </li>
            </ol>
        </div> 
    </div>



    <div class="buoc3" style="display: none">
        <div class="heading">
            <i class="muaban muaban-icon-info"></i>
            <strong>Thông tin khách hàng</strong>

            <div class="clearfix"></div>
        </div>

        <p class="userinfo">
            <label>Họ tên:</label> <span id="user-name">Hà Anh Mận</span> - 
            <label>Email:</label> <span id="user-email">anhmantk@gmail.com</span> -
            <label>Điện thoại:</label> <span id="user-phone">0904.488.452</span><br/>
            <label class="address">Địa chỉ: <span
                    id="user-address">Trạm Điện - Quang Trung - Hà Đông - Hà Nội</span></label>
        </p>

        <div class="hinhthucthanhtoan">
            <div class="left">Hình thức thanh toán</div>
            <div class="right">Thanh toán qua Internet Banking</div>
            <div class="clearfix"></div>
        </div>
    </div>

    <?php
    $this->renderPartial('order_table', array('data' => $data));
    ?>


    <div class="option1" style="display: none">
        <div class="function_btn">
            <div class="inner">
                <button type="button" class="muaban muaban-btn_quaylai wizard-button-back"></button>
                <button style="display: none;" type="button" class="btn_submit_order_now wizard-button-next"></button>
                <button type="button" class="muaban muaban-btn_hoantat_small wizard-button-finish" data-dismiss="modal"></button>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="option2" style="display: none">
        <?php echo $this->renderPartial('dieukhoan') ?>

        <div style="padding-top: 10px; font-style: italic ">
            <label><input type="checkbox" name="dy" class="ddyy" value="1"/> Tôi đã đồng ý với các 
                <a class="a1" style="text-decoration: none" href="<?php echo $this->createUrl('pricing/policy') ?>" target="_blank">Điều kiện và Điều khoản</a>
                <span class="a2" style="display: none">Điều kiện và Điều khoản</span>
                của Monkey Junior.
            </label>
        </div>

        <div class="function_btn">
            <div class="inner">
                <button type="button" class="muaban muaban-btn_quaylai wizard-button-back"></button>
                <button style="display: none;" type="button" class="btn_submit_order_now wizard-button-next"></button>
                <button type="submit" class="muaban muaban-btn_datmua"></button>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<style type="text/css">
    .dieukhoan {
        margin-top: 20px;
        background: #F6F4E7;
        max-height: 80px;
        padding: 5px;
        overflow: auto;
        border: 1px solid gray;
    }
</style>