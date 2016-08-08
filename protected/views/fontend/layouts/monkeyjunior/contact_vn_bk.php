<div class="lienhe">
    <div class="row1">
        <?php
        $ctl = Yii::app()->controller->id;
        $act = Yii::app()->controller->action->id;
        if ($ctl == 'page' && $act == 'sale') {
            echo '<strong>Giới thiệu về Monkey Junior</strong><br /><strong style="color: #900">Một sản phẩm của Early Start</strong>';
        } else {
            echo '<strong>Liên hệ:</strong><p class="company_name">CÔNG TY TNHH EARLY START</p>';
        }
        ?>

    </div>
    <div class="ctact">
        <div class="left">
            <i class="sprite sprite-icon_map"></i>

            <p>
                Địa chỉ: 12D8, Thanh Xuân Bắc, Thanh Xuân, Hà Nội
                <br/>
                <br/>
                Email: <a herf="mailto:contact@monkeyjunior.com">contact@monkeyjunior.com</a>
            </p>
        </div>
        <div class="right">
            <i class="sprite sprite-icon_phone"></i>

            <p>
                Mọi thắc mắc xin vui lòng liên hệ
                <br/>
                <br/>Điện thoại: (04) 6285 8545
            </p>
        </div>
        <div class="clearfix"></div>
    </div>
    <p style="text-align: right; padding-bottom: 10px;">Hỗ trợ ngoài giờ HC & Thứ 7, Chủ nhật: <strong>0934 486 648</strong></p>
</div>