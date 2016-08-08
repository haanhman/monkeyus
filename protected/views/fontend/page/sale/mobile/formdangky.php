<a name="datmuathe"></a>

<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="datmuathe ptop30">
        <div class="col-xs-12">
            <div class="sale-title">
                <h2 style="text-transform: uppercase; font-size: 50px;">thanh toán</h2>
                <img src="/images/sale/line_small.png" alt=""/>
                <h2>Cách 1: đặt mua thẻ học <span>Monkey Junior</span></h2>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div class="dangkymua ptop30">
            <div class="col-xs-12">
                <div class="caption">
                    <p class="lead text-center">
                        <img style="width: 45px;" alt="" src="/images/sale/cart.png"/> Bạn hãy điền đầy đủ vào mẫu dưới
                        để đặt mua thẻ
                    </p>
                    <p class="lead note text-center">
                        <span>Chúng tôi sẽ gọi điện xác nhận ngay sau khi bạn đặt mua thẻ</span></p>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-6 col-lg-offset-3 col-sm-offset-3">
                    <form class="form-horizontal" id="dangkymuathe" name=""
                          action="<?php echo $this->createUrl('buy', array('coupon' => $this->coupon)) ?>"
                          method="POST">

                        <div class="form-group">
                            <label>Họ và tên:</label>
                            <input class="form-control" type="text" name="name" placeholder="Nhập tên của bạn">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            <input class="form-control" type="text" name="phone"
                                   placeholder="Nhập số điện thoại của bạn">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input class="form-control" type="text" name="email" placeholder="Nhập email của bạn">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            <input class="form-control" type="text" name="address" placeholder="Nhập địa chỉ của bạn">
                        </div>
                        <div class="form-group">
                            <label>Chọn loại thẻ học:</label>
                            <select class="form-control list-product" name="product_id">
                                <option value="com.earlystart.us.full">Thẻ học tiếng Anh</option>
                                <option value="com.earlystart.alllanguage">Thẻ học tất cả các ngôn ngữ</option>
                            </select>
                            <div class="card_mau">
                                <div class="card-full"><img class="img-responsive" src="/images/sale/full_2.png"
                                                            alt=""/></div>
                                <div class="card-all" style="display: none"><img class="img-responsive"
                                                                                 src="/images/sale/all_2.png?v=1" alt=""/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btnsubmit">Đặt mua thẻ ngay</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <div class="dangkymuathanhcong">
                        <strong>Cảm ơn bạn!</strong>
                        <p>
                            Chúng tôi sẽ liên lạc với bạn trong thời gian
                            sớm nhất để xác nhận đơn hàng
                        </p>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="col-xs-12">
            <div class="hinhanhthe ptop">
                <img class="img-responsive" src="/images/sale/mobile/hinhanhthehoc_mobile.png" alt=""/>
            </div>
            <a name="chinhsachgiaothe"></a>
            <div class="giaothe">
                <div class="noidung">
                    <div class="text-center">
                        <h3>Chính sách giao thẻ</h3>
                        <img class="img-responsive" src="/images/sale/arow_den.png" alt="">
                    </div>

                    <div class="ptop">
                        <img class="img-responsive" src="/images/sale/mobile/hi.png" alt="Chính sách giao và hoàn">
                    </div>

                    <p>Thẻ sẽ được giao miễn phí. Nếu bạn <span>ở Hà Nội</span> thì nhân viên giao thẻ
                        sẽ mang thẻ đến tận nơi trong vòng 24h.</p>
                    <p>Còn nếu bạn ở <span>tỉnh, thành phố khác</span> thì thẻ sẽ được gửi qua dịch vụ
                        chuyển phát nhanh EMS của bưu điện. Trong vòng 2 đến 3 ngày bạn
                        sẽ nhận được thẻ.</p>
                    <p>
                        Giá của thẻ đã bao gồm thuế VAT và mọi chi phí vận
                        chuyển - bạn KHÔNG phải thêm bất kỳ một phí gì khác. Khi nhận thẻ
                        bạn chỉ cần trả số tiền bằng đúng giá thẻ cho người giao thẻ.
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
    $(function () {
        $('.list-product').change(function () {
            if ($(this).val() == 'com.earlystart.alllanguage') {
                $('.card-all').show();
                $('.card-full').hide();
            } else {
                $('.card-full').show();
                $('.card-all').hide();
            }
        });


        $("#dangkymuathe").validate({
            rules: {
                name: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                address: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
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
                    required: mes[lang_code].empty_address,
                }
            },
            submitHandler: function () {
                $('.btnsubmit').html('Vui lòng chờ...');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->createUrl('buy', array('coupon' => $this->coupon)) ?>',
                    data: $("#dangkymuathe").serialize(),
                    success: function () {
                        $('#dangkymuathe').hide();
                        $('.dangkymuathanhcong').slideToggle();
                    }
                });
            }
        });
    });
</script>
