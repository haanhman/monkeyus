<div class="lightbox blog-book" style="padding-top: 0px; background: #CDDC39">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div style="padding: 50px 0px;">
        <div class="page-ebook grid-container-960" style="min-height: 350px">
            <div class="ebook">
                <img src="/monkeyweb/images/new/<?php echo $this->is_vn ? 'ebook_vn.png' : 'ebook.png'; ?>" />
            </div>
            <div class="text">
                <h3><?php echo $this->t(3, 'heading_1', 'page') ?></h3>
                <h1>
                    <?php echo nl2br($this->t(3, 'heading_2', 'page')) ?>
                </h1>

                <a  data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#download-ebook"><img src="/monkeyweb/images/new/<?php echo $this->is_vn ? 'btn_download_1_vn.png' : 'btn_download_1.png'; ?>" alt="download now"/></a>

            </div>
        </div>
    </div>
</div>


<div class="lightbox blog-book" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div style="padding: 50px 0px;">
        <div class="page-thank grid-container-960" style="min-height: 350px">
            <div class="content">
                <?php echo nl2br($this->t(3, 'html_content', 'page')) ?>
            </div>
            <p style="text-align: center; padding-top: 50px">

                <a  data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#download-ebook"><img src="/monkeyweb/images/new/<?php echo $this->is_vn ? 'btn_download_2_vn.png' : 'btn_download_2.png'; ?>" alt="download now"/></a>

            </p>
        </div>
    </div>
</div>
<?php $this->renderPartial('modal'); ?>