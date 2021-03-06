<div class="modal fade" id="form_dang_ky" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">
                    Đăng ký tài khoản đối tác
                </h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <p class="lead dangkythanhcong" style="display: none; padding-top: 20px;">Chúng tôi sẽ liên lạc với bạn trong thời gian
                        sớm nhất</p>
                    <form id="dangky_doitac" name="" action="" method="POST"
                          class="form-horizontal">
                        <div class="form-group">
                            <label>Họ và tên *:</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại *:</label>
                            <input type="text" class="form-control" name="phone"/>
                        </div>
                        <div class="form-group">
                            <label>Email *:</label>
                            <input type="text" class="form-control" name="email"/>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ *:</label>
                            <input type="text" class="form-control" name="address"/>
                        </div>
                        <div class="form-group">
                            <label>Website:</label>
                            <input type="text" class="form-control" name="website"/>
                        </div>

                        <div class="form-group">
                            <label>Giới thiệu bản thân (cung cấp facebook của bạn):</label>
                            <textarea class="form-control" name="more_info" rows="2"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-lg">Đăng ký tài khoản <img
                                    src="/images/agent/arow.png" alt=""/></button>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#dangky_doitac").validate({
            rules: {
                name: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                address: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: mes[lang_code].empty_email,
                    email: mes[lang_code].not_email
                },
                name: {
                    required: mes[lang_code].empty_name,
                },
                phone: {
                    required: mes[lang_code].empty_phone,
                },
                address: {
                    required: 'Vui lòng nhập địa chỉ của bạn',
                }
            },
            submitHandler: function () {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->createUrl('submit') ?>',
                    data: $("#dangky_doitac").serialize(),
                    success: function (data) {
                        $('#dangky_doitac').hide();
                        $('#myModalLabel').html('Đăng ký thành công');
                        $('.dangkythanhcong').show();
                    }
                });
            }
        });
    });
</script>