<?php
if (!empty($data['coupon_code_cookie'])) {
    echo '<p class="lead text-center">Mã giảm giá 40% “<strong style="color: red;">' . $data['coupon_code_cookie'] . '</strong>” đã được áp dụng thành công!</p>';
}
if (empty($data['coupon_code_cookie'])) {
    ?>
    <div class="row text-center">
        &gt; Bạn có <abbr title="Coupon Code" class="initialism magiamgiaabc" style="color: red; font-weight: bold">Mã
            giảm giá</abbr> không? &lt;
    </div>

    <div class="form-nhapma text-center" style="display: none;">
        <p class="text-center lead">Mã giảm giá nếu có</p>
        <form onsubmit="return checkFormGiamGia();" id="formgiamgia" class="form-inline" name="" action=""
              method="POST">
            <div class="form-group">
                <div style="width: 100px; margin: 0px auto">
                    <input id="formgiamgia_coupon" class="form-control" name="coupon"
                           style="margin-right: 15px; text-transform: uppercase">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary formgiamgia_btn" type="button">Kiểm tra</button>
            </div>
        </form>
        <p style="color: red; display: none;" id="formgiamgia_error">Vui lòng nhập mã giảm giá</p>
    </div>
    <?php
} elseif (isset(Yii::app()->session['nhapmagiamgia'])) {
    unset(Yii::app()->session['nhapmagiamgia']);
    ?>
    <div class="col-xs-12">
        <p class="text-center lead">
            <span style="color: #81C100">Mã giảm giá 40% giá trị sản phẩm được nhập thành công</span><br/>
            Mã giảm giá: <strong style="color: red;"><?php echo $data['coupon_code_cookie'] ?></strong>
        </p>
        <div class="clearfix"></div>
    </div>
    <?php
}
?>
<div class="clearfix"></div>
<script type="text/javascript">
    function checkFormGiamGia() {
        var magiamgia = $('#formgiamgia_coupon').val();
        if (!magiamgia) {
            $('#formgiamgia_error').html('Vui lòng nhập mã giảm giá').show();
            return false;
        }
        $('#formgiamgia_error').hide();
        $.ajax({
            type: 'POST',
            url: '<?php echo $this->createUrl('checkcoupon') ?>',
            data: $('#formgiamgia').serialize(),
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.status == 1) {
                    window.location = json.url + '#giamgia';
                } else {
                    $('#formgiamgia_error').html('Mã giảm giá không tồn tại').show();
                }
            }
        });
        return false;
    }

    $(function () {
        $('.magiamgiaabc').click(function () {
            $('.form-nhapma').show();
            $(this).parent().hide();
        });
        $('.formgiamgia_btn').click(function () {
            checkFormGiamGia();
        });

    });
</script>