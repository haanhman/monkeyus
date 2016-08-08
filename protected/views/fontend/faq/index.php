<div class="lightbox blog-book" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="faq_heading">
        <div class="grid-container-1100">
            <p><?php echo $this->t(1, 'heading_1', 'faq') ?></p>
            <h1><?php echo $this->t(1, 'heading_2', 'faq') ?></h1>
        </div>
    </div>
</div>

<div class="grid-container-1100" style="padding-bottom: 50px">
    <div class="faq-category">
        <ul>
            <?php
            $cate_id = $data['cate_id'];
            foreach ($data['category'] as $item) {
                ?>
                <li <?php if ($cate_id == $item['id']) echo 'class="active"'; ?>><a href="<?php echo $this->createUrl('faqcategory', array('alias' => $item['alias'])) ?>"><?php echo $item['name'] ?></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="clearfix"></div>

    <div class="faq-archive">
        <?php
        foreach ($data['listItem'] as $item) {
            if($item['alias'] == 'co-nhung-hinh-thuc-thanh-toan-nao') {
                echo '<a name="huongdanthanhtoan"></a>';
            }
            ?>
            <div class="items <?php if ($item['alias'] == $data['faq_alias']) echo 'active'; ?>">
                <div class="anser">
                    <i class="blog blog-faq_anser"></i>
                    <h2><a src="<?php echo $this->createUrl('faqdetail', array('alias' => $item['alias'])) ?>"><?php echo $item['title'] ?></a></h2>
                    <div class="icon"><i class="blog blog-faq-tru"></i></div>
                    <div class="clearfix"></div>
                </div>
                <div class="question">
                    <?php echo filterContentImage($item['content']) ?>
                </div>
            </div>
            <?php
        }
        ?>


    </div>

</div>
<script type="text/javascript">
    $(function () {
        
//        $('.faq-archive .anser a').click(function(){
//            $(this).prev().click();
//            return false;
//        });
        $('.faq-archive .anser').each(function () {
            $(this).click(function () {
                if ($(this).parent().hasClass('active')) {
                    $(this).parent().removeClass('active');
                    $('.icon i').removeClass('blog-faq-tru').addClass('blog-faq-cong');
                    $(this).next().slideUp();
                } else {
                    $('.faq-archive .items').removeClass('active');
                    $(this).parent().addClass('active');
                    $('.icon i').removeClass('blog-faq-tru').addClass('blog-faq-cong');
                    $(this).find('i').removeClass('blog-faq-cong').addClass('blog-faq-tru');
                    $(this).next().slideDown();
                }
            });
        });
    });
</script>


<?php
$this->renderPartial('//index/include/newsletter');
?>