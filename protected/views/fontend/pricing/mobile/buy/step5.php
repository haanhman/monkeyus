<?php
$this->renderPartial('mobile/buy/heading', array('data' => $data));
?>


<div class="step5">

    <div class="tinthongchuyenkhoan">
        <p>
            Công ty TNHH Early Start – <span>Số tài khoản</span> 0451000318224<br/>
            Ngân hàng Vietcombank, chi nhánh Thanh Xuân, Hà Nội.
        </p>
    </div>
    <div class="desc">
        <strong>Các bước thanh toán:</strong>
        <ol>
            <li>
                Chuyển khoản tới tài khoản trên với số tiền: <span id="giagoimua"><?php echo $data['product']['price'] ?></span><br/>
                Tại mục “ghi chú”, bạn ghi rõ: Số điện thoại, email của bạn (nếu được), Họ và tên của bạn, gói nội dung bạn mua.
            </li>
            <li>
                Khi có xác nhận thanh toán hoàn tất, <b>ngay lập tức</b> công ty sẽ gửi mã kích hoạt (kèm theo hướng
                dẫn) vào email của bạn
            </li>
        </ol>
    </div>

    <div class="clearfix"></div>

    <div class="col-xs-6 text-left">
        <?php
        $option = $_GET;
        $option['step'] = 2;
        ?>

        <a href="<?php echo $this->createUrl('pricing/buy', $option) ?>"><img
                src="/monkeyweb/mobile/images/buy/btn_quaylai.png"/></a>
    </div>
    <div class="col-xs-6 text-right">
        <a href="<?php echo $this->createUrl('pricing/index') ?>"><img src="/monkeyweb/mobile/images/buy/btn_hoantat.png"/></a>
    </div>
    <div class="clearfix"></div>


</div>

<div class="choose_other">
    <a href="<?php echo $this->createUrl('pricing/index', array('coupon' => $this->coupon)) ?>" class="lead">> Chọn gói sản phẩm khác <</a>
</div>