<div class="lightbox blog-book" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>

    <div class="grid-container-1100" style="padding: 80px 0px 50px 0px">

        <?php
        $this->renderPartial('slidebar', array('data' => $data));
        ?>
        <div class="archive">
            <?php
            $item = $data['row'];
            ?>
            <div class="items">
                <h1><?php echo $item['title'] ?></h1>
                <span class="timestamp"><?php echo date($format_date, $item['created']) ?></span>
                <div class="short_text"><?php echo filterContentImage($item['content']) ?></div>
            </div>

            <div id="fb-root"></div>
            <script>(function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-comments" data-href="<?php echo $this->current_url ?>" data-width="100%" data-numposts="5"></div>

        </div>
        <div class="clearfix"></div>

    </div>
    <script type="text/javascript">
        $(function () {
            $('img').each(function () {
                $(this).parent().addClass('text-center');
            });
            $('.faq-archive .anser a').click(function () {
                $(this).prev().click();
                return false;
            });
            $('.faq-archive .anser').each(function () {
                $(this).click(function () {
                    if ($(this).hasClass('active')) {
                        return;
                    }

                    $('.faq-archive .items').removeClass('active');
                    $(this).parent().addClass('active');

                    $('.icon i').removeClass('blog-faq-tru').addClass('blog-faq-cong');
                    $(this).find('i').removeClass('blog-faq-cong').addClass('blog-faq-tru');

                    $(this).next().slideDown('slow');
                });
            });
        });
    </script>
</div>
<?php
$this->renderPartial('//index/include/connect_with');
?>