<a name="datmuathe"></a>
<div class="lightbox blog-book" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="namecard">
        <div class="grid-container-1100 thehoc">
            <div class="sale-title">
                <h2 style="margin: 0px;font-size: 55px;">thanh toán</h2>
                <img src="/images/sale/line_small.png" alt=""/>
                <h2>cách 1: đặt mua thẻ học <span>monkey junior</span></h2>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="grid-container-1100 dangkymua">
            <div class="caption">
                <p class="cap1">
                    <img alt="" src="/images/sale/cart.png"/> Bạn hãy điền đầy đủ vào mẫu dưới để đặt mua thẻ
                </p>
                <div class="cap2">
                    Chúng tôi sẽ gọi điện xác nhận ngay sau khi bạn đặt mua thẻ
                </div>
            </div>
            <form id="dangkymuathe" name="" action="<?php echo $this->createUrl('buy', array('coupon' => $this->coupon)) ?>" method="POST">
                <ul>
                    <li class="l">
                        <label>Họ và tên:</label>
                        <input type="text" name="name" placeholder="Nhập tên của bạn">
                    </li>
                    <li>
                        <label>Số điện thoại:</label>
                        <input type="text" name="phone" placeholder="Nhập số điện thoại của bạn">
                    </li>
                    <li class="l">
                        <label>Email:</label>
                        <input type="text" name="email" placeholder="Nhập email của bạn">
                    </li>
                    <li>
                        <label>Địa chỉ:</label>
                        <input type="text" name="address" placeholder="Nhập địa chỉ của bạn">
                    </li>
                    <li class="l">
                        <label>Chọn loại thẻ học:</label>
                        <select class="list-product" name="product_id">
                            <option value="com.earlystart.us.full">Thẻ học tiếng Anh</option>
                            <option value="com.earlystart.alllanguage">Thẻ học tất cả các ngôn ngữ</option>
                        </select>
                        <div class="card_mau">
                            <div class="card-full"><img src="/images/sale/full_2.png" alt=""/></div>
                            <div class="card-all" style="display: none"><img src="/images/sale/all_2.png?v=1" alt=""/></div>
                        </div>
                    </li>
                    <li>
                        <div class="btn-action">
                            <button type="submit" class="btnsubmit">đặt mua thẻ ngay</button>
                        </div>
                    </li>
                </ul>
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
        <div class="clearfix"></div>
        <div class="hinhanhthe text-center">
            <img src="/images/sale/hinhanhthe.png" alt="" />
        </div>
        <!-- chinh sach giao the -->
        <a name="chinhsachgiaothe"></a>
        <div class="grid-container-1100 chinhsach-giaothe">

            <div class="giaothe">
                <div class="noidung">
                    <h3>Chính sách giao thẻ</h3>
                    <div class="arow"><img src="/images/sale/arow_den.png" alt=""></div>
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
                <div class="img">
                    <img src="/images/sale/hi.png" alt="Chính sách giao và hoàn">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>


    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('.list-product').change(function(){
            if($(this).val() == 'com.earlystart.alllanguage') {
                $('.card-all').fadeIn();
                $('.card-full').fadeOut();
            } else {
                $('.card-full').fadeIn();
                $('.card-all').fadeOut();
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
                    success: function() {
                        $('#dangkymuathe').hide();
                        $('.dangkymuathanhcong').slideToggle();
                    }
                });
            }
        });
    });
</script>