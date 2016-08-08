<div class="grid-container-1100">
    <div class="baochi">
        <p class="lead">báo chí nói về chúng tôi</p>
        <div class="video">
            <h2>Monkey Junior trên VTV2</h2>
            <a class="video-link" data-video-id="y-W3w_DjdWwas" data-video-autoplay="1">
                <img src="/monkeyweb/images/video_vtv2.png" alt=""/>
            </a>
        </div>
        <div class="danhsachbaibao">
            <?php
            $list = array(
                array(
                    'url' => 'http://dantri.com.vn/suc-manh-so/ung-dung-huu-ich-huong-dan-doc-va-hoc-tieng-anh-cho-tre-em-20151116171448039.htm',
                    'source' => 'dantri.com.vn',
                    'title' => 'Ứng dụng hữu ích hướng dẫn đọc và học tiếng Anh cho trẻ em',
                    'intro' => 'Monkey Junior là chương trình giáo dục toàn diện được phát triển bởi các chuyên gia hàng đầu thế giới trong lĩnh vực giáo dục sớm...',
                ),
                array(
                    'url' => 'http://phununews.vn/lam-bo-da-thay-doi-cuoc-doi-toi-nhu-the-203662.html',
                    'source' => 'phununews.vn',
                    'title' => 'Làm bố đã thay đổi cuộc đời tôi như thế!',
                    'intro' => 'Monkey Junior đã được phát triển đầy đủ cả 03 yếu tố: các phương pháp dạy được kết hợp đan xen, hiệu quả; chương trình học hệ thống và nội dung học bao quát...',
                ),
                array(
                    'url' => 'http://www.vnmedia.vn/ict-vnmedia.vn/cong-nghe-360/201511/monkey-junior-ung-dung-viet-cho-cac-be-0-6-tuoi-hoc-ngoai-ngu-510313/',
                    'source' => 'www.vnmedia.vn',
                    'title' => 'Monkey Junior: Ứng dụng Việt cho các bé 0-6 tuổi học ngoại ngữ',
                    'intro' => 'Nội dung đồ sộ, đa dạng nhưng có chọn lọc cho lứa tuổi sẽ giúp bé không chỉ học đọc, học ngoại ngữ mà còn học các kiến thức cơ bản đi kèm.',
                ),
                array(
                    'url' => 'http://hanoimoi.com.vn/Tin-tuc/Giao-duc/816196/monkey-junior----phan-mem-hoc-ngoai-ngu-tren-thiet-bi-di-dong-duoc-ua-thich',
                    'source' => 'hanoimoi.com.vn',
                    'title' => 'Monkey Junior - Phần mềm học ngoại ngữ trên thiết bị di động được ưa thích',
                    'intro' => 'Đây là ứng dụng học đọc và học ngoại ngữ trên thiết bị di động dành cho trẻ từ 0 – 6 tuổi được tin dùng tại hơn 100 quốc gia trên thế giới...',
                )
            );
            ?>
            <ul class="baochi-list">
                <?php
                foreach ($list as $item) {
                    ?>
                    <li>
                        <h2><a target="_blank" rel="nofollow" href="<?php echo $item['url'] ?>"><?php echo $item['title'] ?></a></h2>
                        <p class="time"><span><a rel="nofollow" target="_blank" href="<?php echo $item['url'] ?>"><?php echo $item['source'] ?></a></p>
                        <p class="intro">"<?php echo $item['intro'] ?>"</p>
                        <a target="_blank" rel="nofollow" href="<?php echo $item['url'] ?>">Đọc thêm</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>