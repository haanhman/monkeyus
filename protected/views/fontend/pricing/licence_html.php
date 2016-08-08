<meta charset="UTF-8">
<?php
$order = $data['order_detail'];
$package = $data['product'];
$fontSize = 16;
if (!isset($width)) {
    $fontSize = 20;
    $width = '960px;';
    if ($this->is_mobile == 1) {
        $width = '';
    }
}
$hava_bg = isset($bg);
if ($hava_bg) {
    echo '<div style="background: #f2f2f2; padding: 10px;">';
}
?>


<div style="width: <?php echo $width ?>; margin: 0px auto; line-height: 150%; font-size: <?php echo $fontSize ?>px; padding-top: 30px;">
    Xin chào: <strong><?php echo $order['name'] ?></strong>

    <p style="padding: 15px 0px;">Cảm ơn bạn đã tin tưởng và đồng hành cùng Monkey Junior. Dưới đây là thông tin về
        mã
        kích hoạt của bạn:</p>

    <div style="padding-bottom: 15px">
        <?php
        echo nl2br($data['ls']['licence']);
        ?>
        <br>
        Tên gói nội dung: "<strong><?php echo $package['product_name'] ?></strong>"
        <br/>
        Mô tả gói nội dung: <?php echo $package['description'] ?>
    </div>

    <hr style="margin: 15px 0px;"/>

    <h3 style="padding-bottom: 15px">Hướng dẫn dùng mã kích hoạt</h3>

    <div>
        <a href="https://www.youtube.com/watch?v=PisB1ZnR0mU">Xem video: Hướng dẫn dùng mã kích hoạt</a><br />
        <strong>Bước 1:</strong> Mở app Monkey Junior
        <br/>
        <strong>Bước 2:</strong> Nhấp vào biểu tượng Settings
        <br/>
        <strong>Bước 3:</strong> Nhấp vào "License key"
        <br/>
        <strong>Bước 4:</strong> Nhập mã kích hoạt trên
        <p style="padding: 15px 0px">
            Ngay sau khi hệ thống xác nhận mã đã được nhập thành công, bạn có thể bắt đầu tải nội dung đã mua
        </p>
    </div>

    <hr style="margin: 15px 0px;"/>

    <h3 style="padding-bottom: 15px">Một số thông tin bạn cần biết</h3>

    <div>
        1. Bạn được sử dụng nội dung chương trình không giới hạn thời gian<br/>
        2. Mỗi gói nội dung được phép chạy trên 2 thiết bị của hệ điều hành iOS hoặc Android. Vui lòng xem hướng dẫn
        kích hoạt ở trên.<br />
        3. Bạn có thể dạy nhiều bé khác nhau bằng cách tạo mỗi bé một tài khoản (profile). Hệ thống sẽ lưu giữ tiến trình học của từng bé.
    </div>

    <hr style="margin: 15px 0px;"/>

    <h3 style="padding-bottom: 15px">Hướng dẫn cài đặt app Monkey Junior</h3>

    <p>
        Nếu bạn chưa cài đặt app Monkey Junior thì có thể tiến hành các cách sau.
    </p>

    <div>
        <strong>Cách 1:</strong><br/>
        Bước 1: Truy cập App Store (iOS) hoặc Google Play (Android) và tìm kiếm với từ khoá "Monkey
        Junior"<br/>
        Bước 2: Ấn vào biểu tượng chú khỉ đang đọc sách <img src="http://behocchu.com/public/images/monkey-icon.png" alt=""> rồi
        bắt đầu tải và cài đặt.
    </div>

    <div style="padding-top: 30px">
        <strong>Cách 2:</strong> Vào trực tiếp qua đường dẫn sau:
        <br>
        Với Android bạn có thể tải <a style="color: blue" target="_blank"
                                      href="https://play.google.com/store/apps/details?id=com.earlystart.android.monkeyjunior">tại
            đây</a>
        <br>
        Với iOS bạn có thể tải <a style="color: blue" target="_blank"
                                  href="https://itunes.apple.com/us/app/monkey-junior-teach-your-child/id930331514?mt=8">tại
            đây</a>
    </div>

    <div style="padding-top: 30px">
        <strong>Cách 3:</strong> Dùng phần mềm đọc Barcode để tải và cài đặt app:
        <ul style="padding: 0px;">
            <li style="list-style: none; display: inline-block; width: 200px">
                <a target="_blank" title="Monkey Junior:Bé học tiếng anh"
                   href="https://itunes.apple.com/us/app/monkey-junior-teach-your-child/id930331514?mt=8">
                    <img src="http://behocchu.com/public/images/barcode_ios.png" alt="">
                </a>
            </li>
            <li style="list-style: none; display: inline-block; width: 200px">
                <a target="_blank" title="Monkey Junior:Bé học tiếng anh"
                   href="https://play.google.com/store/apps/details?id=com.earlystart.android.monkeyjunior">
                    <img src="http://behocchu.com/public/images/barcode_android.png" alt="">
                </a>
            </li>
            <li style="list-style: none; display: inline-block; width: 200px">
                <a target="_blank" title="Monkey Junior:Bé học tiếng anh"
                   href="http://www.amazon.com/EARLY-START-Learn-Monkey-Junior/dp/B00QPWJJXG">
                    <img src="http://behocchu.com/public/images/barcode_amazon.png" alt="">
                </a>
            </li>
        </ul>
    </div>
    <h3 style="padding-bottom: 15px"><a href="http://www.monkeyjunior.vn/blog/huong-dan-su-dung-chuong-trinh-monkey-junior-giup-be-hoc-ma-choi-choi-ma-hoc.html">Hướng dẫn sử dụng Monkey Junior</a></h3>

    <div style="padding: 20px 0px">
        <p>
            Một lần nữa cảm ơn bạn đã lựa chọn Monkey Junior và chúc bé sẽ có những giây phút bổ ích
            trong quá trình học chương trình.
        </p>

        <p style="font-weight: bold; padding-top: 10px;">Early Start Team</p>
    </div>

    <?php
    if ($hava_bg) {
        ?>
        <h3 style="padding-bottom: 0px; margin-bottom: 0px;">BÁO CHÍ NÓI VỀ MONKEY JUNIOR:</h3>

        <a href="http://dantri.com.vn/suc-manh-so/ung-dung-huu-ich-huong-dan-doc-va-hoc-tieng-anh-cho-tre-em-20151116171448039.htm">http://dantri.com.vn/suc-manh-so/ung-dung-huu-ich-huong-dan-doc-va-hoc-tieng-anh-cho-tre-em-20151116171448039.htm</a>
        <br />
        <a href="http://www.vnmedia.vn/ict-vnmedia.vn/cong-nghe-360/201511/monkey-junior-ung-dung-viet-cho-cac-be-0-6-tuoi-hoc-ngoai-ngu-510313/">http://www.vnmedia.vn/ict-vnmedia.vn/cong-nghe-360/201511/monkey-junior-ung-dung-viet-cho-cac-be-0-6-tuoi-hoc-ngoai-ngu-510313/</a>
        <br />
        <a href="http://phununews.vn/lam-bo-da-thay-doi-cuoc-doi-toi-nhu-the-203662.html">http://phununews.vn/lam-bo-da-thay-doi-cuoc-doi-toi-nhu-the-203662.html</a>

        <h3 style="padding-bottom: 0px; margin-bottom: 0px; padding-top: 15px">THAM KHẢO CHƯƠNG TRÌNH HỌC MONKEY JUNIOR:</h3>        
        <strong>Giới thiệu chung:</strong> <a href="https://www.youtube.com/watch?v=rbB8mzAlzMM">https://www.youtube.com/watch?v=rbB8mzAlzMM</a>
        <br />
        <strong>Một bài học mẫu cấp độ dễ:</strong> <a href="https://www.youtube.com/watch?v=62hTkCAUv5k">https://www.youtube.com/watch?v=62hTkCAUv5k</a>
        <br />       
        <strong>Một bài học mẫu cấp độ trung bình:</strong> <a href="https://www.youtube.com/watch?v=GPW7-OBLmvY">https://www.youtube.com/watch?v=GPW7-OBLmvY</a>
        <br />
        <strong>Một bài học mẫu cấp độ nâng cao:</strong> 
        <a href="https://www.youtube.com/watch?v=BYv0-LZaVcY">https://www.youtube.com/watch?v=BYv0-LZaVcY</a>



        <h3 style="padding-bottom: 0px; margin-bottom: 0px; padding-top: 15px">ĐƠN VỊ PHÂN PHỐI:</h3>

        <p style="font-weight: bold; padding-top: 5px; margin: 0px">
            CTY TNHH Early Start<br />
            Địa chỉ: 12D8, Thanh Xuân Bắc, Thanh Xuân, Hà Nội<br />
            Điện thoại: (04) 6285 8545<br />
            Hotline: 0934 486 648<br />
            Website: <a href="http://www.monkeyjunior.vn">http://www.monkeyjunior.vn</a><br />
            Facebook: <a href="<?php echo FACEPAGE ?>"><?php echo FACEPAGE ?></a>
        </p>
        <?php
    }
    ?>

</div>
<?php
if ($hava_bg) {
    echo '</div>';
}
?>
