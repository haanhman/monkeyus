<html>
<head>
    <title>Thông tin agent</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
Kính chào quý khách,<br/><br/>

Cám ơn quý khách đã mua gói nội dung của Monkey Junior, Phần mềm dạy đọc và ngoại ngữ cho bé!
<br/>
<br/>
Mã đơn hàng: <strong><?php echo $data['onepay_id'] ?></strong><br/>
Được mua lúc: <?php echo date('d/m/Y H:i') ?>
<?php
$agent = $data['agent'];
$package = $data['package'];
?>
<table style="width: 600px; border-top: 1px solid gray; border-left: 1px solid gray; border-spacing: 0px">
    <tr>
        <th style="border-right: 1px solid gray; border-bottom: 1px solid gray; padding: 3px;">Tên gói</th>
        <th style="border-right: 1px solid gray; border-bottom: 1px solid gray; padding: 3px;">Số lượng</th>
        <th style="border-right: 1px solid gray; border-bottom: 1px solid gray; padding: 3px;">Giá tiền</th>
        <th style="border-right: 1px solid gray; border-bottom: 1px solid gray; padding: 3px;">Thành tiền</th>
    </tr>
    <tr>
        <td style="border-right: 1px solid gray; border-bottom: 1px solid gray; padding: 3px;">
            <?php echo $package['product_name'] ?>
        </td>
        <td style="border-right: 1px solid gray; border-bottom: 1px solid gray; padding: 3px;"><?php echo $data['total'] ?></td>
        <td style="border-right: 1px solid gray; border-bottom: 1px solid gray; padding: 3px;">
            <?php
            echo number_format($package['tienao'] / $data['total'], 0,'',',');
            ?>
            VNĐ
        </td>
        <td style="border-right: 1px solid gray; border-bottom: 1px solid gray; padding: 3px; text-align: right; width: 20%">
            <?php echo number_format($package['tienao'], 0, '', ',') ?> VNĐ
        </td>
    </tr>
    <tr>
        <td colspan="4"
            style="border-right: 1px solid gray; border-bottom: 1px solid gray; padding: 3px; text-align: right">
            <?php
            $price = $package['giam30'];
            if (!empty($agent['coupon'])) {
                $price = $package['giam40'];
                ?>
                Coupon: <span style="color: red;"><?php echo $agent['coupon'] ?></span> giảm giá
                <span style="color: #669900;"> 40%</span><br/>
                <?php
            } else {
                $price = $package['giam30'];
                ?>
                Giảm giá <span style="color: #669900;"> 30%</span><br/>
                <?php
            }
            $save_price = $package['tienao'] - $price;
            ?>
            <strong style="color: #669900">- <?php echo number_format($save_price, 0, '', ',') ?>
                VNĐ</strong>
        </td>
    </tr>
    <tr>
        <th colspan="4"
            style="border-right: 1px solid gray; border-bottom: 1px solid gray; padding: 3px; text-align: right">


            Tổng chi phí: <span style="color: red;">
                        <?php echo number_format($price, 0, '', ',') ?> VNĐ
                    </span>
        </th>
    </tr>
</table>

<p style="font-style: italic">
    Nếu có bất cứ vấn đề gì vui lòng gửi email tới: <a
        href="contact.earlystart@gmail.com">contact.earlystart@gmail.com</a> để được giúp đỡ.
</p>


<div style="padding-top: 10px; font-weight: bold">
    Early Start Team<br/>
    Phân phối bởi: Cty TNHH Early Start<br/>
    Địa chỉ: 12D8, Thanh Xuân Bắc, Thanh Xuân, Hà Nội<br/>
    Điện thoại: (04) 6285 8545<br/>
    Hotline: 0934 486 648<br/>
    Website: <a href="http://www.monkeyjunior.vn">http://www.monkeyjunior.vn</a><br/>
    <a href="<?php echo FACEPAGE ?>"><?php echo FACEPAGE ?></a>
</div>

</body>
</html>
