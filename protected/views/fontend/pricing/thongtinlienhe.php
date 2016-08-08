<div class="heading">
    <i class="muaban muaban-icon-info"></i>
    <strong>Nhập thông tin liên hệ</strong>

    <div class="clearfix"></div>
</div>

<form id="form2" action="" method="POST" class="form-horizontal thongtinlienhe1">
    <div class="container">
        <ol></ol>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Họ và tên:</label>

        <div class="col-sm-9">
            <input type="text" name="hoten" placeholder="" class="form-control" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Điện thoại:</label>

        <div class="col-sm-9">
            <input type="text" name="dienthoai" placeholder="" class="form-control" value="">
            <span class="desc" style="display: none">Dùng liên hệ khi giao hàng</span>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email:</label>

        <div class="col-sm-9">
            <input type="text" name="email" placeholder="" class="form-control" value="">
        </div>
    </div>
    <div class="form-group diachi">
        <label class="col-sm-3 control-label">Đia chỉ:</label>

        <div class="col-sm-9">
            <input type="text" name="diachi" placeholder="" class="form-control" value="">
        </div>
    </div>
    <div class="function_btn">
        <div class="inner">
            <button type="button" class="muaban muaban-btn_quaylai wizard-button-back"></button>
            <?php
                if($this->fuck_ie) {
                    ?>
                    <button type="button" class="muaban muaban-btn_tieptuc wizard-button-next"></button>
                    <?php
                } else {
                    ?>
                    <button style="display: none;" type="button" class="wizard-button-next"></button>
                    <button type="submit" class="muaban muaban-btn_tieptuc"></button>
                    <?php
                }
            ?>
        </div>
        <div class="clearfix"></div>
    </div>

</form>

<script type="text/javascript">
    $(function(){
        var container = $('div.container');
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
            submitHandler: function () {
                $('#form2 .wizard-button-next').click();
            }
        });
    });
</script>