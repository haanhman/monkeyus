<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="page_ebook ptop text-center">
            <div class="ebook">
                <img src="/monkeyweb/images/new/<?php echo $this->is_vn ? 'ebook_vn.png' : 'ebook.png'; ?>" />
            </div>
            <div class="text">
                <h3><?php echo $this->t(3, 'heading_1', 'page') ?></h3>
                <h1>
                    <?php echo nl2br($this->t(3, 'heading_2', 'page')) ?>
                </h1>

                <a class="show_form" href="#download-ebook"><img src="/monkeyweb/images/new/<?php echo $this->is_vn ? 'btn_download_1_vn.png' : 'btn_download_1.png'; ?>" alt="download now"/></a>

            </div>
        </div>
    </div>
</div>


<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="ptop" style="padding-top: 50px">
        <div class="col-xs-12">
            <div class="content">
                <?php echo nl2br($this->t(3, 'html_content', 'page')) ?>
            </div>
            <p style="text-align: center; padding-top: 50px">

                <a class="show_form" href="#download-ebook"><img src="/monkeyweb/images/new/<?php echo $this->is_vn ? 'btn_download_2_vn.png' : 'btn_download_2.png'; ?>" alt="download now"/></a>

            </p>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php $this->renderPartial('mobile/modal'); ?>
<script type="text/javascript">
    $(function(){
        $('a.show_form').click(function(){
            $('.dangkyform').slideToggle();
        });
    });
</script>
