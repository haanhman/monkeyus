<?php
$this->renderPartial('mobile/buy/heading', array('data' => $data));
$userInfo = array();
if (!empty(Yii::app()->session['buyInfo'])) {
    $userInfo = Yii::app()->session['buyInfo'];
}
$method = $_GET['method'];
//$userInfo = array(
//    'hoten' => 'Ha Anh Man',
//    'dienthoai' => '0904488452',
//    'email' => 'anhmantk@gmail.com',
//    'diachi' => 'Ha Noi'
//);
?>


<div class="step2 col-xs-12">
    <strong>Thông tin liên hệ</strong>

    <form id="form2" name="" action="" method="POST">
        <div class="error_container">
            <ol></ol>
        </div>
        <div class="input-group form-group">
            <div class="input-group-addon"><i class="icon-user"></i></div>
            <input name="hoten" type="text" class="form-control input-lg" placeholder="Họ và tên" value="<?php echo CHtml::encode($userInfo['hoten']) ?>">
        </div>
        <div class="input-group form-group">
            <div class="input-group-addon"><i class="icon-phone"></i></div>
            <input name="dienthoai" type="text" class="form-control input-lg" placeholder="Số điện thoại" value="<?php echo CHtml::encode($userInfo['dienthoai']) ?>">
        </div>
        <div class="input-group form-group">
            <div class="input-group-addon"><i class="icon-mail"></i></div>
            <input name="email" type="text" class="form-control input-lg" placeholder="Email..." value="<?php echo CHtml::encode($userInfo['email']) ?>">
        </div>
        <?php
        $cl = '';
        if ($method != 1) {
            $cl = 'hide';
        }
        ?>
        <div class="input-group form-group <?php echo $cl ?>">
            <div class="input-group-addon"><i class="icon-address"></i></div>
            <input name="diachi" type="text" class="form-control input-lg" placeholder="Địa chỉ nhận hàng" value="<?php echo CHtml::encode($userInfo['diachi']) ?>">
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-6 text-left">

            <?php
            $option = $_GET;
            $option['step'] = 1;
            ?>
            <a href="<?php echo $this->createUrl('pricing/buy', $option) ?>"><img
                    src="/monkeyweb/mobile/images/buy/btn_quaylai.png"/></a>
        </div>
        <div class="col-xs-6 text-right">
            <button class="btn_form" type="submit"><img src="/monkeyweb/mobile/images/buy/btn_tieptuc.png"/></button>
        </div>
        <div class="clearfix"></div>
    </form>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div class="choose_other">
    <a href="<?php echo $this->createUrl('pricing/index', array('coupon' => $this->coupon)) ?>" class="lead">> Chọn gói sản phẩm khác <</a>
</div>

<script type="text/javascript">
    $(function () {
        var container = $('div.error_container');
        $("#form2").validate({
            errorContainer: container,
            errorLabelContainer: $("ol", container),
            wrapper: 'li',
            rules: {
                hoten: {
                    required: true,
                },
                dienthoai: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                diachi: {
                    required: true,
                }
            },
            messages: {
                hoten: {
                    required: 'Vui lòng nhập họ tên',
                },
                dienthoai: {
                    required: 'Vui lòng nhập điện thoại',
                },
                email: {
                    required: 'Vui lòng nhập email của bạn',
                    email: 'Địa chỉ email không đúng định dạng'
                },
                diachi: {
                    required: 'Vui lòng nhập địa chỉ',
                }
            },
//            submitHandler: function () {
//                $("#form2").submit();
//                fbq('track', 'AddPaymentInfo');
//            }
        });
    });
</script>