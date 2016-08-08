<div class="clearfix"></div>
<div class="lightbox blog-book" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="grid-container-1100 muaonline">
        <div class="sale-title">
            <h2>cách 3: mua chương trình học bằng hình thức<br/>internet banking</h2>
            <img src="/images/sale/line.png" alt=""/>
            <p>Nhận mã kích hoạt ngay lập tức sau khi thanh toán thành công</p>
        </div>

        <div class="goimua">
            <ul>
                <li class="goi1">
                    <p class="tengoi">Tiếng Anh</p>
                    <p class="tiencu">
                        <?php echo number_format($data['package']['full']['tienao'], 0, '', ',') ?> đ
                        <img src="/images/sale/sale_40.png" alt=""/>
                    </p>
                    <p class="tien40"><?php echo number_format($data['package']['full']['giam40'], 0, '', ',') ?> đ</p>
                    <div class="line">&nbsp;</div>

                    <?php
                    $option = array(
                        'name' => 'Tiếng Anh',
                        'price' => number_format($data['package']['full']['giam40'], 0, '', ',') . ' đ',
                        'product_id' => $data['package']['full']['product_id']
                    );
                    ?>

                    <a data='<?php echo json_encode($option) ?>'
                       class="shadow">Mua ngay</a>
                </li>
                <li class="goi2">
                    <p class="tengoi">Tất cả<br/>các ngôn ngữ</p>
                    <p class="tiencu">
                        <?php echo number_format($data['package']['all']['tienao'], 0, '', ',') ?> đ
                        <img src="/images/sale/sale_40.png" alt=""/>
                    </p>
                    <p class="tien40"><?php echo number_format($data['package']['all']['giam40'], 0, '', ',') ?> đ</p>
                    <div class="line">&nbsp;</div>
                    <?php
                    $option = array(
                        'name' => 'Tất cả các ngôn ngữ',
                        'price' => number_format($data['package']['all']['giam40'], 0, '', ',') . ' đ',
                        'product_id' => $data['package']['all']['product_id']
                    );
                    ?>
                    <a data='<?php echo json_encode($option) ?>' class="shadow">Mua ngay</a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>


        <div class="form-online">
            <form id="mua-online" name="" action="" method="POST" class="form-horizontal">
                <p class="lead thongtingoimua text-center">Tiếng Anh: <span>462,000 đ</span></p>
                <p class="caption">Vui lòng cung cấp thông tin để chúng tôi gửi mã kích hoạt</p>
                <div class="errors">
                    <ol></ol>
                </div>
                <input type="hidden" class="form-control" id="url_online"/>
                <input type="hidden" class="form-control" name="product_id" id="product_id_online"/>
                <div class="form-group">
                    <label>Họ tên:</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập họ tên của bạn"/>
                </div>
                <div class="form-group">
                    <label>Số điện thoại:</label>
                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại của bạn"/>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control" name="email" placeholder="Nhập email của bạn"/>
                </div>
                <div class="form-group">
                    <label>
                        <img src="/images/sale/atm.png" alt="">
                        <input type="radio" name="method" value="3">
                        Thanh toán online qua thẻ ATM nội địa
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <img src="/images/sale/visa.png" alt="">
                        <input type="radio" name="method" value="4">
                        Thanh toán online qua thẻ tín dụng visa, master
                    </label>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-primary submit-muaonline" type="submit">Tiếp tục</button>
                </div>

            </form>
        </div>

        <div class="clearfix"></div>
    </div>
</div>

<script type="text/javascript">
    $(function () {

        $('.goimua a').click(function () {
            $('#url_online').val($(this).attr('dir'));
            var data = $.parseJSON($(this).attr('data'));
            $('#product_id_online').val(data.product_id);
            var thongtin = data.name + ': <span>' + data.price + '</span>';
            $('.thongtingoimua').html(thongtin);
            $('.form-online').slideDown();
        });

        var container = $('div.errors');
        $("#mua-online").validate({
            errorContainer: container,
            errorLabelContainer: $("ol", container),
            wrapper: 'li',
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
                method: {
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
                method: {
                    required: 'Vui lòng chọn hình thức thanh toán',
                }
            },
            submitHandler: function () {
                $('.submit-muaonline').html('Vui lòng chờ...');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->createUrl('buy', array('coupon' => $this->coupon)) ?>',
                    data: $("#mua-online").serialize(),
                    success: function (url) {
                        window.location = url;
                    }
                });
            }
        });
    });
</script>