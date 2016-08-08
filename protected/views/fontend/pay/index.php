<?php
$package = $data['package'];
?>
<link rel="stylesheet" href="/monkeyweb/css/pay.css" />
<form id="form_data" action="<?php echo $url_submit ?>" method="POST">
    <div id="container">

        <h1>monkey junior</h1>
        <div class="content">
            <h2>Thông tin thanh toán</h2>
            <p>Vui lòng xem lại chi tiết giao dịch dưới đây.</p>
            <table>
                <thead>
                <tr>
                    <th width="25%">Tên gói</th>
                    <th>Mô tả</th>
                    <th width="25%">Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $package['product_name'] ?></td>
                    <td>
                        <?php echo nl2br($package['description']) ?>
                    </td>
                    <td align="right">
                        <?php echo number_format($package['tienao'], 0, '', ',') ?> VNĐ
                    </td>
                </tr>

                <?php
                $price = $package['giam30'];
                if ($this->is_sale == 1) {
                    $price = $package['giam40'];
                }
                $save_price = $package['tienao'] - $price;
                ?>

                <tr>
                    <td colspan="4" align="right">
                        <?php
                        if ($this->is_sale == 1) {
                            ?>
                            Mã giảm giá 40%: <strong style="color: red"><?php echo $_GET['coupon'] ?></strong><br/>
                            <?php
                        } else {
                            echo 'Giảm giá 30%<br />';
                        }
                        ?>
                        <strong style="color: #669900">- <?php echo number_format($save_price, 0, '', ',') ?>
                            VNĐ</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="right">
                        <strong style="color: red;"><?php echo number_format($price, 0, '', ',') ?> VNĐ</strong>
                    </td>
                </tr>


                </tbody>
            </table>
            <?php echo $this->render('//pricing/dieukhoan') ?>
            <div class="confirm">
                <noscript>
                    <div class="noscript"><p>Trình duyệt của bạn phải được hỗ trợ JavaScript.<br>
                            Vui lòng bật JavaScript và <a href="">thử lại</a>.</p></div>
                </noscript>
                <label>
                    <input type="checkbox" id="dongy"/> Tôi đã đọc và đồng ý với tất cả Điều kiện và Điều khoản nêu
                    trên.
                </label>
                <input type="hidden" id="okmen" name="dongy" value=""/>
                <div class="btn">
                    <a onclick="return checkSubmit();">
                        <img width="120px;" src="/public/img/xac_nhan.png" title="Xác nhận thanh toán"
                             alt="Xác nhận thanh toán"/>
                    </a>
                </div>
                <p><em>Chúng tôi sẽ chuyển bạn qua hệ thống thanh toán của onepay.<br/>Có bất kỳ vấn đề nào xin vui lòng
                        liên hệ số điện thoại <strong>0934.486.648</strong></em></p>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    function checkSubmit() {
        if ($('#dongy').is(':checked') == false) {
            alert('Vui lòng đọc và đồng ý với các điều khoản thanh toán');
            return false;
        }
        $('#okmen').val('1');
        $('#form_data').submit();
    }
</script>