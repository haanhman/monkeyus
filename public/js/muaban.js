var is_check = 0;
function tinhToanTienPhaiTra() {
    var soluong = $('#soluong').val();
    var tien = $('#list-pacage').val();
    var tien2 = tien;
    tien = tien / 0.7;
    tien = trusotienle(tien);
    $('#giaban').html(formatCurrent(tien));
    var tongtien = tien * soluong;
    tongtien = trusotienle(tongtien);
    $('#tongtien').html(formatCurrent(tongtien));
    var save_price = 0;
    if (coupon_code.length > 0) {
        var tongtien1 = tongtien * 0.6;
        tongtien1 = trusotienle(tongtien1);
        save_price = tongtien - tongtien1;
        tongtien = tongtien1;
        $('.sale_text').html('Mã giảm giá 40% giá trị sản phẩm được nhập thành công');
        $('.div-coupon').html('Mã giảm giá: <strong style="color: red;">' + coupon_code + '</strong>');
    } else {
        var tongtien1 = tien2 * soluong;
        tongtien1 = trusotienle(tongtien1);
        save_price = tongtien - tongtien1;
        //tru di so tien le
        save_price = trusotienle(save_price);
//            tongtien -= save_price;
        tongtien = tongtien1;
    }

    $('#save_price').html("-" + formatCurrent(save_price));
    $('#giagoimua, #thanhtien').html(formatCurrent(tongtien));

    $('#list-pacage option').each(function () {
        if ($(this).is(':selected')) {
            product_id = $(this).attr('pid');
        }
    });

}

$(function () {
    $('.method label').click(function () {
        $('div.method').removeClass('selected');
        $(this).parent().addClass('selected');
    });


    $('.buynow i').click(function () {
        product_price = $(this).attr('data-price');
        product_id = $(this).attr('data-product-id');
    });

    $('#list-pacage, #soluong').change(function () {
        tinhToanTienPhaiTra();
    });

    $('.magiamgia .initialism').click(function () {
        $('.coupon_form').show();
        $(this).parent().hide();
    });

    $('.validate_coupon').click(function () {
        if (is_check == 1) {
            return;
        }
        is_check = 1;
        $('.coupon_invalid').hide();
        var cp = $('#Coupon_Code').val();
        if (cp.length == 0) {
            alert('Vui lòng nhận mã giảm giá');
            is_check = 0;
            return;
        }
        if (cp.length < 5) {
            alert('Mã giảm giá không đúng, vui lòng thử lại');
            is_check = 0;
            return;
        }
        $.ajax({
            type: 'POST',
            url: '/pricing/coupon',
            data: {coupon: cp, oid: order_id},
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
                    coupon_code = cp;
                    tinhToanTienPhaiTra();
                } else {
                    $('.coupon_invalid').show();
                    return;
                }
            }
        });
    });

    $('.muaban-btn_hoantat_small').click(function () {
        $('.btn_submit_order_now').click();
    });

    $('.muaban-btn_datmua').click(function () {
        if ($('.ddyy').is(':checked')) {
            $('.btn_submit_order_now').click();
        } else {
            alert('Vui lòng đọc điều khoản và đồng ý với điều khoản trước khi đặt mua');
            return;
        }
    });
});


function formatCurrent(number) {
    return $.number(number) + ' đ';
}

function trusotienle(number) {
//    return number;
    var fl = number % 1000;
    if (fl > 0) {
        number -= fl;
    }
    return number;
}