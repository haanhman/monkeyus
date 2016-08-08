<?php
$this->renderPartial('mobile/buy/heading', array('data' => $data));
$option = $_GET;
$option['step'] = 2;
?>

<ul class="list-unstyled buy_method">
    <li>
        <?php
        $option['method'] = 1;
        ?>
        <a href="<?php echo $this->createUrl('pricing/buy', $option) ?>">
            <div class="icon"><img src="/monkeyweb/mobile/images/buy/pay1.png"></div>
            <div class="desc">
                <strong>Early Start thu tiền tận nơi</strong>

                <p>Giao thẻ học và thu tiền tận nơi bạn đăng ký, không mất phí vận chuyển.</p>
            </div>
        </a>
    </li>
    <li>
        <?php
        $option['method'] = 2;
        ?>
        <a href="<?php echo $this->createUrl('pricing/buy', $option) ?>">
            <div class="icon"><img src="/monkeyweb/mobile/images/buy/pay2.png"></div>
            <div class="desc">
                <strong>Chuyển khoản qua tài khoản ngân hàng</strong>

                <p>Bạn chuyển khoản vào tài khoản của chúng tôi và nhận mã kích hoạt khi giao dịch thành công.</p>
            </div>
        </a>
    </li>
    <li>
        <?php
        $option['method'] = 3;
        ?>
        <a href="<?php echo $this->createUrl('pricing/buy', $option) ?>">
            <div class="icon"><img src="/monkeyweb/mobile/images/buy/pay3.png"></div>
            <div class="desc">
                <strong>Thanh toán online qua thẻ ATM nội địa</strong>

                <p>Nhận mã kích hoạt <strong>ngay lập tức</strong>, không mất thêm bất kỳ phí nào khác. Áp dụng với thẻ ATM có chức năng Internet Banking của tất cả các ngân hàng.</p>
            </div>
        </a>
    </li>
    <li class="last">
        <?php
        $option['method'] = 4;        
        ?>
        <a class="comingsoon" href="<?php echo $this->createUrl('pricing/buy', $option) ?>">
            <div class="icon"><img src="/monkeyweb/mobile/images/buy/pay4.png"></div>
            <div class="desc">
                <strong>Thanh toán online qua thẻ tín dụng visa, master</strong>

                <p>Nhận mã kích hoạt <strong>ngay lập tức</strong>, không mất thêm phí nào. Áp dụng với tất cả thẻ tín dụng visa, master</p>
            </div>
        </a>
    </li>
</ul>
<div class="choose_other">
    <a href="<?php echo $this->createUrl('pricing/index', array('coupon' => $this->coupon)) ?>" class="lead">> Chọn gói sản phẩm khác <</a>
</div>