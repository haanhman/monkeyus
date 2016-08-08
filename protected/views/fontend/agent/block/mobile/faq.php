<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="pricing_faq ptop">
        <div class="col-xs-12">
            <p class="title">Các câu hỏi thường gặp</p>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php
                $i = 1;
                foreach ($data['faq'] as $item) {
                    ?>


                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapse_<?php echo $i ?>"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <img src="/monkeyweb/mobile/images/faq_1.png" alt=""/> <?php echo $item['title'] ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse_<?php echo $i ?>" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body">
                                <?php echo filterContentImage($item['content']) ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('.pricing_faq').on('hide.bs.collapse', function () {
            $('.panel-title').find('a').each(function () {
                if ($(this).hasClass('collapsed')) {
                    $(this).find('img').attr('src', '/monkeyweb/mobile/images/faq_1.png');
                } else {
                    $(this).find('img').attr('src', '/monkeyweb/mobile/images/faq_2.png');
                }
            });
        });
        $('.pricing_faq').on('show.bs.collapse', function () {
            $('.panel-title').find('a').each(function () {
                if ($(this).hasClass('collapsed')) {
                    $(this).find('img').attr('src', '/monkeyweb/mobile/images/faq_1.png');
                } else {
                    $(this).find('img').attr('src', '/monkeyweb/mobile/images/faq_2.png');
                }
            });
        });
    });
</script>
