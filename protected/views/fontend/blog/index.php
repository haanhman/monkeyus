<div class="lightbox blog-book" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="block_book">
        <div class="grid-container-1100">
            <div class="book">
                <?php
                $trangbia = '/monkeyweb/images/new/blog_book_en.png';
                if ($this->is_vn) {
                    $trangbia = '/monkeyweb/images/new/blog_book_vn.png';
                }
                ?>
                <img src="<?php echo $trangbia ?>">
            </div>
            <div class="form">
                <p class="title <?php echo $this->is_vn ? 'vn' : 'us'; ?>">
                    <?php echo $this->t(1, 'heading', 'blog') ?>
                </p>
                <form id="register_ebook" name="" action="" method="POST">
                    <input type="hidden" name="block" value="1" />
                    <input type="hidden" name="ref_url" value="<?php echo CHtml::encode($this->current_url) ?>" />
                    <i class="blog blog-input">
                        <input name="email" type="text" placeholder="<?php echo CHtml::encode($this->t(1, 'email_placeholder', 'blog')) ?>">
                    </i>
                    <input type="submit" value="<?php echo $this->t(1, 'btn_text', 'blog') ?>" class="blog blog-btn">
                </form>
                <p class="desc">
                    <?php echo $this->t(1, 'form_desc', 'blog') ?>
                </p>
            </div>
            <div class="clearfix"></div>
            <div class="more">
                <p>
                    <a href="#blog">
                        <?php echo $this->t(1, 'arow_text', 'blog') ?>
                        <i class="blog blog-more_blog"></i>
                    </a>
                </p>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {


        $("#register_ebook").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: mes[lang_code].empty_email,
                    email: mes[lang_code].not_email
                }
            },
            submitHandler: function () {
                dangkynhansach();
            }
        });


        function dangkynhansach() {
            OpenInNewTab(openURL.subscribe);
            $.ajax({
                url: '<?php echo $this->createUrl('index/subscribe') ?>',
                type: 'POST',
                data: $("#register_ebook").serialize(),
                success: function (data) {
                    var json = $.parseJSON(data);
                }
            });
        }

    });

</script>


<div class="lightbox blog-book" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>

    <div class="grid-container-1100" style="padding: 80px 0px 50px 0px">
        <a name="blog"></a>
        <?php
        $this->renderPartial('slidebar', array('data' => $data));
        ?>
        <div class="archive">
            <?php
            if (!empty($data['listItem'])) {
                $format_date = 'F d, Y';
                $i = 1;
                foreach ($data['listItem'] as $item) {
                    $url_detail = $this->createUrl('detail', array('alias' => $item['alias']));
                    ?>
                    <div class="items">
                        <h2>
                            <a href="<?php echo $url_detail ?>"><?php echo $item['title'] ?></a>
                        </h2>
                        <span class="timestamp"><?php echo blogFormatData($format_date, $item['created'], $this->is_vn) ?></span>
                        <div class="short_text"><?php echo filterContentImage($item['description']) ?></div>
                        <div class="more">
                            <a href="<?php echo $url_detail ?>"><i class="blog blog-icon-more"></i> <?php echo $this->is_vn ? 'Chi tiết' : 'Read more'; ?></a>
                        </div>
                    </div>
                    <?php
                    if ($i < count($data['listItem'])) {
                        echo '<div class="line"></div>';
                    }
                    $i++;
                }
            }
            //phan trang
            if (!empty($data['listItem'])) {
                echo '<div class="dataTables_paginate paging_bootstrap">';
                $this->widget('CLinkPager', array(
                    'header' => '',
                    'pages' => $pages,
                ));
                echo '</div>';
            }
            ?>
        </div>
        <div class="clearfix"></div>

    </div>

</div>
<?php
$this->renderPartial('//index/include/connect_with');
?>
