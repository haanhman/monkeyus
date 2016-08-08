<?php
$this->renderPartial('mobile/block/1');
?>

    <div class="col-xs-12 faq_page">
        <div class="faq-category">
            <ul class="list-unstyled">
                <?php
                $cate_id = $data['cate_id'];
                foreach ($data['category'] as $item) {
                    ?>
                    <li <?php if ($cate_id == $item['id']) echo 'class="active"'; ?>><a
                            href="<?php echo $this->createUrl('faqcategory', array('alias' => $item['alias'])) ?>"><?php echo $item['name'] ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>


        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
            $i = 1;
            foreach ($data['listItem'] as $item) {
                $active1 = 'collapsed';
                $active2 = '';
                if ($item['alias'] == $data['faq_alias']) {
                    $active1 = '';
                    $active2 = 'in';
                }
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h2 class="panel-title">
                            <a class="<?php echo $active1 ?>" role="button" data-toggle="collapse"
                               data-parent="#accordion"
                               href="<?php echo $this->createUrl('faqdetail', array('alias' => $item['alias'])) ?>#collapse_<?php echo $i ?>"
                               aria-expanded="true" aria-controls="collapseOne">
                                <img src="/monkeyweb/mobile/images/faq_a.png" alt="" /> <?php echo $item['title'] ?>
                            </a>
                            <i class="glyphicon glyphicon-minus"></i>
                            <i class="glyphicon glyphicon-plus"></i>
                        </h2>
                    </div>
                    <div id="collapse_<?php echo $i ?>" class="panel-collapse collapse <?php echo $active2 ?>"
                         role="tabpanel"
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


        <div class="clearfix"></div>
    </div>

    <script type="text/javascript">
        $(function () {
//
            $('.faq_page').on('hidden.bs.collapse', function () {
                $('.panel-title').each(function () {
                    var aa = $(this).find('a');
                    if (aa.hasClass('collapsed')) {
                        console.log('ok');
                        $(this).find('i.glyphicon-minus').hide();
                        $(this).find('i.glyphicon-plus').show();
                    } else {
                        $(this).find('i.glyphicon-minus').show();
                        $(this).find('i.glyphicon-plus').hide();
                    }
                });
            });
            $('.faq_page').on('shown.bs.collapse', function () {
                $('.panel-title').each(function () {
                    var aa = $(this).find('a');
                    if (aa.hasClass('collapsed')) {
                        console.log('ok');
                        $(this).find('i.glyphicon-minus').hide();
                        $(this).find('i.glyphicon-plus').show();
                    } else {
                        $(this).find('i.glyphicon-minus').show();
                        $(this).find('i.glyphicon-plus').hide();
                    }
                });
            });

        });
    </script>

<?php
$this->renderPartial('//index/mobile/newsletter');
?>