<?php
$this->renderPartial('mobile/buy/heading', array('data' => $data));

$userInfo = array('soluong' => 1);
if (!empty(Yii::app()->session['buyInfo'])) {
    $userInfo = Yii::app()->session['buyInfo'];
}
$step = $_GET['step'];
?>


<div class="step3">

    <form onsubmit="return checkConfirm();" name="" action="" method="POST">
        <?php
        if ($step == 5) {
            ?>
            <div class="step5">
                <div class="tinthongchuyenkhoan">
                    <p>
                        Công ty TNHH Early Start – <span>Số tài khoản</span> 0451000318224<br/>
                        Ngân hàng Vietcombank, chi nhánh Thanh Xuân, Hà Nội.
                    </p>
                </div>
                <div class="col-xs-12">
                    <div class="desc">
                        <strong>Các bước thanh toán:</strong>
                        <ol>
                            <li>
                                Chuyển khoản tới tài khoản trên với số tiền: <span id="giagoimua"></span><br/>
                                Tại mục “ghi chú”, bạn ghi rõ: Số điện thoại, email của bạn (nếu được), Họ và tên của bạn, gói nội dung bạn mua, mã giảm giá nếu có.
                            </li>
                            <li>
                                Khi có xác nhận thanh toán hoàn tất, <b>ngay lập tức</b> công ty sẽ gửi mã kích hoạt (kèm theo hướng
                                dẫn) vào email của bạn
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>            
            <?php
        } else {
            ?>

            <p class="userinfo">
                <strong>Thông tin khách hàng</strong>
                <label>Họ tên:</label> <span id="user-name"><?php echo $userInfo['hoten'] ?></span><br>
                <label>Email:</label> <span id="user-email"><?php echo $userInfo['email'] ?></span><br/>
                <label>Điện thoại:</label> <span id="user-phone"><?php echo $userInfo['dienthoai'] ?></span>
                <?php
                if (!empty($userInfo['diachi'])) {
                    ?>
                    <br/><label class="address">Địa chỉ: <span
                            id="user-address"><?php echo $userInfo['diachi'] ?></span></label>
                        <?php
                    }
                    ?>
            </p>
            <div class="hinhthucthanhtoan">
                <div class="left"><p class="lead">Hình thức thanh toán</p></div>
                <div class="right">
                    <?php
                    if ($userInfo['method'] == 1) {
                        echo 'Early Start thu tiền tận nơi';
                    }
                    if ($userInfo['method'] == 3) {
                        echo 'Thanh toán online qua thẻ ATM nội địa';
                    }
                    if ($userInfo['method'] == 4) {
                        echo 'Thanh toán online qua thẻ tín dụng visa, master';
                    }
                    ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
        }
        ?>

        <div class="order">
            <p class="lead">Thông tin sản phẩm</p>

            <div class="row">
                <div class="col-xs-4">Tên gói</div>
                <div class="col-xs-8">
                    <select name="package" id="list-pacage">
                        <?php
                        foreach ($data['goitien'] as $pid => $item) {
                            ?>
                            <option pid="<?php echo $pid ?>"
                                    value="<?php echo $item['tien'] ?>"><?php echo $item['name'] ?></option>
                                    <?php
                                }
                                ?>
                    </select>
                    <input type="hidden" name="pid" id="pid" value="<?php echo $_GET['pid'] ?>">
                    <input type="hidden" name="soluong" id="sl" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">Giá bán</div>
                <div class="col-xs-8">
                    <strong id="giaban">670.000đ</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">Số Lượng</div>
                <div class="col-xs-8">
                    <select id="soluong">
                        <option value="1" <?php if ($userInfo['soluong'] == 1) echo 'selected=""'; ?>>01</option>
                        <option value="2" <?php if ($userInfo['soluong'] == 2) echo 'selected=""'; ?>>02</option>
                        <option value="3" <?php if ($userInfo['soluong'] == 3) echo 'selected=""'; ?>>03</option>
                        <option value="4" <?php if ($userInfo['soluong'] == 4) echo 'selected=""'; ?>>04</option>
                        <option value="5" <?php if ($userInfo['soluong'] == 5) echo 'selected=""'; ?>>05</option>
                    </select>
                </div>
            </div>




            <div class="row">
                <div class="col-xs-4">Tổng tiền</div>
                <div class="col-xs-8">
                    <strong id="tongtien" class="<?php if (!empty($userInfo['coupon'])) echo 'black_color'; ?>">670.000đ</strong>
                </div>
            </div>
            <input type="hidden" value="<?php echo $userInfo['coupon'] ?>" class="form-control cp"
                   placeholder="">
            <div class="row">
                <div class="col-xs-4">Giảm giá <?php echo!empty($userInfo['coupon']) ? '40%' : '30%'; ?>: <strong style="color: red;"><?php echo $userInfo['coupon'] ?></strong></div>
                <div class="col-xs-8">
                    <strong class="saveprice">-<span id="save_price"></span></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">Thành tiền</div>
                <div class="col-xs-8">
                    <strong id="thanhtien">670.000đ</strong>
                    <input id="total_price_2" type="hidden" value="" name="total_price_2" />
                </div>
            </div>
            <?php
            if (empty($userInfo['coupon'])) {
                ?>
                <div class="row magiamgia">
                    > Bạn có <abbr title="Coupon Code" class="initialism">Mã giảm giá</abbr> không?<
                </div>
                <div class="coupon coupon_form">
                    Nhập mã giảm giá: <input type="text" id="Coupon_Code" class="form-control cp" placeholder="">
                    <button class="btn btn-default validate_coupon" type="button">Kiểm tra</button>
                    <br/>
                    <label class="coupon_invalid error">Mã giảm giá không tồn tại</label>
                </div>
                <?php
            }
            ?>

            <?php
            if ($_GET['method'] >= 3) {
                echo $this->renderPartial('dieukhoan');
            }
            ?>

            <div class="row dongy">
                <label class="lead"><input type="checkbox" name="dy" class="ddyy" value="1"/> Tôi đã đồng ý với các 
                    <?php
                    if ($_GET['method'] < 3) {
                        ?><a
                            style="text-decoration: none" href="<?php echo $this->createUrl('pricing/policy') ?>"
                            target="_blank">Điều kiện và Điều khoản</a>&nbsp;
                            <?php
                        } else {
                            echo 'Điều kiện và Điều khoản&nbsp;';
                        }
                        ?>


                    của Monkey Junior.</label>
            </div>

            <div class="row" style="padding-top: 10px">
                <div class="col-xs-6 text-left">

                    <?php
                    $option = $_GET;
                    $option['step'] = 2;
                    ?>

                    <a href="<?php echo $this->createUrl('pricing/buy', $option) ?>"><img
                            src="/monkeyweb/mobile/images/buy/btn_quaylai.png"/></a>
                </div>
                <div class="col-xs-6 text-right">
                    <?php
                    $src = '/monkeyweb/mobile/images/buy/btn_tieptuc.png';
                    if ($step == 5) {
                        $src = '/monkeyweb/mobile/images/buy/btn_hoantat.png';
                    }
                    ?>  
                    <button class="btn_form" type="submit"><img
                            src="<?php echo $src ?>"/>
                    </button>
                </div>
            </div>

        </div>


        <div class="clearfix"></div>

    </form>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div class="choose_other">
    <a href="<?php echo $this->createUrl('pricing/index', array('coupon' => $this->coupon)) ?>" class="lead">> Chọn gói sản phẩm khác <</a>
</div>


<style type="text/css">
    .dieukhoan {
        margin-top: 20px;
        background: #F6F4E7;
        max-height: 150px;
        padding: 5px;
        overflow: auto;
        border: 1px solid gray;
    }
</style>
<script type="text/javascript">
    var have_coupon = 0;
    var product_id = '<?php echo $_GET['pid'] ?>';
    var is_check = 0;
<?php
if (!empty($userInfo['coupon'])) {
    echo 'have_coupon = 1;';
}
?>
    $(function () {
        if (have_coupon == 1) {
            $('.giamgia').removeClass('hide');
        }

        $('.magiamgia .initialism').click(function () {
            $('.coupon_form').show();
            $(this).parent().hide();
        });

        $('#list-pacage, #soluong').change(function () {
            changePrice();
        });


        $('#list-pacage option[pid="' + product_id + '"]').attr('selected', 'selected');

        function changePrice() {
            var soluong = $('#soluong').val();
            var tien = $('#list-pacage').val();
            var tien2 = tien;
            tien = tien / 0.7;
            tien = trusotienle(tien);

            $('#giaban').html(formatCurrent(tien));
            var tongtien = tien * soluong;
            $('#tongtien').html(formatCurrent(tongtien));
            var save_price = 0;
            if (have_coupon == 1) {
                var tongtien1 = tongtien * 0.6;
                tongtien1 = trusotienle(tongtien1);
                
                save_price = tongtien - tongtien1;
                save_price = trusotienle(save_price);
                
                tongtien = tongtien1;
            } else {
                var tongtien1 = tien2 * soluong;
                tongtien1 = trusotienle(tongtien1);
                
                save_price = tongtien - tongtien1;
                //tru di so tien le
                save_price = trusotienle(save_price);
                tongtien = tongtien1;
            }
            $('#save_price').html(formatCurrent(save_price));
            $('#giagoimua, #thanhtien').html(formatCurrent(tongtien));
            $('#total_price_2').val(formatCurrent(tongtien));


            $('#list-pacage option').each(function () {
                if ($(this).is(':selected')) {
                    $('#pid').val($(this).attr('pid'));
                }
            });
            $('#sl').val(soluong);


        }

        changePrice();

        $('.validate_coupon').click(function () {
            if (is_check == 1) {
                return;
            }
            is_check = 1;
            $('.coupon_invalid').hide();
            var cp = $('#Coupon_Code').val();
            if (cp.length == 0) {
                $('.coupon_invalid').html('Vui lòng nhận mã giảm giá').show();
                is_check = 0;
                return;
            }
            if (cp.length < 5) {
                $('.coupon_invalid').html('Mã giảm giá không đúng, vui lòng thử lại').show();
                is_check = 0;
                return;
            }

            var soluong = $('#soluong').val();


            $.ajax({
                type: 'POST',
                url: '<?php echo $this->createUrl('pricing/coupon') ?>',
                data: {coupon: cp, sl: soluong, pid: $('#pid').val()},
                beforeSend: function () {
                    $('.validate_coupon').html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');
                },
                complete: function () {
                    $('.validate_coupon').html('Kiểm tra');
                    is_check = 0;
                },
                success: function (data) {
                    var json = $.parseJSON(data);
                    if (json.status == 1) {
                        window.location.reload();
                    } else {
                        $('.coupon_invalid').show();
                        return;
                    }
                }
            });
        });

    });
    function formatCurrent(number) {
        return $.number(number) + ' đ';
    }

    function trusotienle(number) {
        var fl = number % 1000;
        if (fl > 0) {
            number -= fl;
        }
        return number;
    }

    function checkConfirm() {
        if ($('.ddyy').is(':checked')) {
            var cp = $('#Coupon_Code').val();
            var soluong = $('#soluong').val();
            var tien = $('#list-pacage').val();
            var tongtien = tien * soluong;
            if (cp.length > 0) {
                var save_price = tongtien * 0.1;
                tongtien -= save_price;
            }
            fbq('track', 'Purchase', {value: tongtien, currency: 'VND'});
            return true;
        } else {
            alert('Vui lòng đọc điều khoản và đồng ý với điều khoản trước đi đặt mua');
            return false;
        }
    }

</script>