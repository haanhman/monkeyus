$.fn.wizard = function (config) {
    if (!config) {
        config = {};
    }
    var containerSelector = config.containerSelector || ".wizard-content";
    var stepSelector = config.stepSelector || ".wizard-step";
    var steps = $(this).find(containerSelector + " " + stepSelector);
    var stepCount = steps.size();
    var exitText = config.exit || 'Exit';
    var backText = config.back || 'Back';
    var nextText = config.next || 'Next';
    var finishText = config.finish || 'Finish';
    var isModal = config.isModal || true;
    var validateNext = config.validateNext || function () {
        return true;
    };
    var validateFinish = config.validateFinish || function () {
        return true;
    };
    //////////////////////
    var step = 1;
    var container = $(this).find(containerSelector);
    steps.hide();
    $(steps[0]).show();
    if (isModal) {
        $(this).on('hidden.bs.modal', function () {
            step = 1;
            $($(containerSelector + " .wizard-steps-panel .step-number")
                    .removeClass("done")
                    .removeClass("doing")[0])
                    .toggleClass("doing");

            $($(containerSelector + " .wizard-step")
                    .hide()[0])
                    .show();
        });
    }
    ;
    $(this).find(".wizard-steps-panel").remove();
    container.prepend('<div class="wizard-steps-panel steps-quantity-' + stepCount + '"></div>');
    var stepsPanel = $(this).find(".wizard-steps-panel");
    for (s = 1; s <= stepCount; s++) {
        stepsPanel.append('<div class="step-number step-' + s + '"><div class="number">' + s + '</div></div>');
    }
    $(this).find(".wizard-steps-panel .step-" + step).toggleClass("doing");
    //////////////////////
    var contentForModal = "";
    if (isModal) {
        contentForModal = ' data-dismiss="modal"';
    }
    var btns = "";
    btns += '<button type="button" class="btn btn-default wizard-button-exit"' + contentForModal + '>' + exitText + '</button>';
    btns += '<button type="button" class="btn btn-default wizard-button-back">' + backText + '</button>';
    btns += '<button type="button" class="btn btn-default wizard-button-next">' + nextText + '</button>';
    btns += '<button type="button" class="btn btn-primary wizard-button-finish" ' + contentForModal + '>' + finishText + '</button>';
    $(this).find(".wizard-buttons").html("");
    //$(this).find(".wizard-buttons").append(btns);
    var btnExit = $(this).find(".wizard-button-exit");
    var btnBack = $(this).find(".wizard-button-back");
    var btnFinish = $(this).find(".wizard-button-finish");
    var btnNext = $(this).find(".wizard-button-next");

    btnNext.on("click", function () {
        if (!validateNext(step, steps[step - 1])) {
            return;
        }
        if (step == 2) {
            fbq('track', 'AddPaymentInfo');
        }

        if (step == 1) {
            //kiem tra nguoi dung chon hinh thuc mua ban nao
            hinhthucthanhtoan = $('#step1 input:checked').val();
            if (!hinhthucthanhtoan) {
                return;
            }
        }

        //gui thong tin mua ban len server
        if (step == 2) {
            updateOrder();
        }
        if (step == 3) {            
            redirectOnepay();
            if(hinhthucthanhtoan != 1) {
                return;
            }

        }

        $(container).find(".wizard-steps-panel .step-" + step).toggleClass("doing").toggleClass("done");
        step++;
        steps.hide();
        if(step > 4) {
            step = 4;
        }
        $(steps[step - 1]).show();
        $(container).find(".wizard-steps-panel .step-" + step).toggleClass("doing");
        loadStep();
    });

    btnBack.on("click", function () {
        $(container).find(".wizard-steps-panel .step-" + step).toggleClass("doing");
        step--;
        steps.hide();
        $(steps[step - 1]).show();
        $(container).find(".wizard-steps-panel .step-" + step).toggleClass("doing").toggleClass("done");
        loadStep();
    });

    btnFinish.on("click", function () {
        if (!validateFinish(step, steps[step - 1])) {
            return;
        }
        ;
        if (!!config.onfinish) {
            config.onfinish();
        }
    });

    function updateOrder() {
        user_name = $('#form2 input[name="hoten"]').val();
        user_phone = $('#form2 input[name="dienthoai"]').val();
        user_email = $('#form2 input[name="email"]').val();
        user_address = $('#form2 input[name="diachi"]').val();
        var params = {
            name: user_name,
            email: user_email,
            address: user_address,
            phone: user_phone,
            pid: product_id,
            method: hinhthucthanhtoan,
            oid: order_id
        }
        $.ajax({
            type: 'POST',
            'url': '/pricing/addorder',
            data: params,
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.order_id > 0) {
                    order_id = json.order_id;
                }
            }
        });
    }


    function redirectOnepay() {
        var soluong = $('#soluong').val();
        var tien = $('#list-pacage').val();
        var params = {
            name: user_name,
            email: user_email,
            address: user_address,
            phone: user_phone,
            pid: product_id,
            price: tien,
            total: soluong,
            method: hinhthucthanhtoan,
            total_price: $('#thanhtien').html(),
            oid: order_id
        }
        $.ajax({
            type: 'POST',
            'url': '/pricing/submitorder',
            data: params,
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.status == -1) {
                    alert('Giao dịch không thành công, vui lòng thử lại');
                    return;
                }
                order_id = 0;
                if (json.url.length > 0) {
                    window.location = json.url;
                }
            }
        });
        return;
    }

    function loadStep() {

        activeTab(step);
        if (step == 2) {
            loadDataForm2();
        }
        if (step == 3) {
            loadDataForm3();
        }
        if (step == 4) {
            datMuaThanhCong();
        }
    }

    function datMuaThanhCong() {
        var soluong = $('#soluong').val();
        var tien = $('#list-pacage').val();
        var tongtien = tien * soluong;
        if (coupon_code.length > 0) {
            var save_price = tongtien * 0.1;
            tongtien -= save_price;
        }
        fbq('track', 'Purchase', {value: tongtien, currency: 'VND'});
    }

    function loadDataForm2() {
        if (hinhthucthanhtoan == 1) {
            $('#form2 input[name="dienthoai"]').addClass('input-phone');
            $('#form2 .diachi').show();
            $('#form2 span.desc').show();
        } else {
            $('#form2 input[name="dienthoai"]').removeClass('input-phone');
            $('#form2 span.desc').hide();
            $('#form2 .diachi').hide();
        }
    }

    function loadDataForm3() {
        if (hinhthucthanhtoan == 2) {
            $('div.onepay').show();
            $('div.option1').show();
            $('div.buoc3').hide();
            $('div.option2').hide();
        } else {
            $('div.onepay').hide();
            $('div.option1').hide();
            $('div.buoc3').show();
            $('div.option2').show();
        }

        if (hinhthucthanhtoan < 3) {
            $('.dieukhoan').hide();
            $('.a1').show();
            $('.a2').hide();
        } else {
            $('.dieukhoan').show();
            $('.a2').show();
            $('.a1').hide();
        }

        user_name = $('#form2 input[name="hoten"]').val();
        user_phone = $('#form2 input[name="dienthoai"]').val();
        user_email = $('#form2 input[name="email"]').val();
        user_address = $('#form2 input[name="diachi"]').val();

        $('#user-name').html(user_name);
        $('#user-phone').html(user_phone);
        $('#user-email').html(user_email);
        $('#user-address').html(user_address);

        $('#giaban').html(product_price);
        $('#tongtien').html(product_price);


        var phuongthucthanhtoan = '';
        if (hinhthucthanhtoan == 1) {
            phuongthucthanhtoan = 'Early Start thu tiền tận nơi';
        }
        if (hinhthucthanhtoan == 3) {
            phuongthucthanhtoan = 'Thanh toán online qua thẻ ATM nội địa';
        }
        if (hinhthucthanhtoan == 4) {
            phuongthucthanhtoan = 'Thanh toán online qua thẻ tín dụng visa, master';
        }
        $('.hinhthucthanhtoan .right').html(phuongthucthanhtoan);

        if (hinhthucthanhtoan == 1) {
            $('.userinfo .address').show();
        } else {
            $('.userinfo .address').hide();
        }

        $('#list-pacage').removeAttr('selected');
        $('#list-pacage option[pid="' + product_id + '"]').prop('selected', true);
        tinhToanTienPhaiTra();
    }


    function activeTab(index) {
        if (index == 5 || index == 4) {
            $('.tabbar ul').hide();
            $('.tabbar .logo').show();
            return;
        }

        $('.tabbar ul').show();
        $('.tabbar .logo').hide();

        if (index == 3) {
            index = 5;
        }
        if (index == 2) {
            index = 3;
        }
        $('.tabbar ul li').removeClass('current');
        $('.tabbar ul li:nth-child(' + index + ')').addClass('current');
    }

    return this;
};
