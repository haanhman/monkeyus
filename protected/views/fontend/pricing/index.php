<div class="lightbox blog-book" style="padding-top: 0px">
    <a name="muaban"></a>
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="grid-container-1100 pricing-page">
        <h2><?php echo $this->t(1, 'heading', 'pricing') ?>:</h2>

        <div class="language_bar">
            <?php
            $languages = $this->active_language;
            $firstLang = array();
            ?>
            <ul>
                <?php
                $code = 'us';
                foreach ($languages as $item) {
                    $class = '';
                    $small = '_small';
                    if ($item['code'] == $code) {
                        $class = 'active';
                        $small = '';
                        $firstLang = $item;
                    }
                    ?>
                    <li dir="<?php echo $item['code'] ?>" class="<?php echo $class ?> <?php echo $item['code'] ?>">
                        <div class="in">
                            <i class="pricing pricing-icon_select"></i>
                            <i class="pricing flag pricing-lang_<?php echo $item['code'] . $small ?>"></i>
                        </div>
                        <strong><?php echo getLanguageTitle($item, $this->is_vn) ?></strong>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <div class="clearfix"></div>
        </div>

        <?php
        $all = $data['package']['all'];
        $single = $data['package'][$code]['single'];
        $full = $data['package'][$code]['full'];
        ?>
        <div class="banggia-wp">
            <div id="banggia">
                <div class="flag">
                    <i class="pricing flag pricing-lang_us"></i>
                </div>
                <div class="single-title">
                    <?php echo $this->t(3, 'single_heading', 'pricing') ?>
                </div>
                <div class="full-title">
                    <?php echo $this->t(3, 'full_heading', 'pricing') ?>
                </div>
                <div class="all-title">
                    <?php echo $this->t(3, 'all_heading', 'pricing') ?>
                </div>
                <ul class="price">
                    <li>&nbsp;</li>
                    <li class="single">
                        <div class="tien2">
                            <span><?php echo $single['tien_2'] ?></span>
                            <?php
                            if (empty($this->coupon)) {
                                echo '<img src="/monkeyweb/images/new/sale_30.png" alt="sale off 30%" />';
                            } else {
                                echo '<img src="/monkeyweb/images/new/sale_40.png" alt="sale off 40%" />';
                            }
                            ?>
                        </div>
                        <div class="tien1"><?php echo $single['price']; ?></div>
                    </li>
                    <li class="full">
                        <div class="tien2">
                            <span><?php echo $full['tien_2'] ?></span>
                            <?php
                            if (empty($this->coupon)) {
                                echo '<img src="/monkeyweb/images/new/sale_30.png" alt="sale off 30%" />';
                            } else {
                                echo '<img src="/monkeyweb/images/new/sale_40.png" alt="sale off 40%" />';
                            }
                            ?>
                        </div>
                        <div class="tien1"><?php echo $full['price']; ?></div>
                    </li>
                    <li class="all">
                        <div class="tien2">
                            <span><?php echo $all['tien_2'] ?></span>
                            <?php
                            if (empty($this->coupon)) {
                                echo '<img src="/monkeyweb/images/new/sale_30.png" alt="sale off 30%" />';
                            } else {
                                echo '<img src="/monkeyweb/images/new/sale_40.png" alt="sale off 40%" />';
                            }
                            ?>
                        </div>
                        <div class="tien1"><?php echo $all['price']; ?></div>
                    </li>
                </ul>
                <ul class="lesson">
                    <li class="first">
                        <div class="lbl"><?php echo $this->t(3, 'label_lesson', 'pricing') ?></div>
                        <i class="banggia banggia-icon-arow"></i>
                    </li>

                    <li class="single">
                        <div><?php echo $single['description'][0] ?></div>
                    </li>
                    <li class="full">
                        <div><?php echo $full['description'][0] ?></div>
                    </li>
                    <li class="all">
                        <div><?php echo $all['description'][0] ?></div>
                    </li>
                </ul>
                <ul class="level">
                    <li class="first">
                        <div class="lbl"><?php echo $this->t(3, 'label_level', 'pricing') ?></div>
                        <i class="banggia banggia-icon-arow"></i>
                    </li>
                    <li class="single">
                        <div><?php echo $single['description'][1] ?></div>
                    </li>
                    <li class="full">
                        <div><?php echo $full['description'][1] ?></div>
                    </li>
                    <li class="all">
                        <div><?php echo $all['description'][1] ?></div>
                    </li>
                </ul>
                <ul class="language">
                    <li class="first">
                        <div class="lbl"><?php echo $this->t(3, 'label_language', 'pricing') ?></div>
                        <i class="banggia banggia-icon-arow"></i>
                    </li>
                    <li class="single">
                        <div><?php echo getLanguageTitle($firstLang, $this->is_vn) ?></div>
                    </li>
                    <li class="full">
                        <div><?php echo getLanguageTitle($firstLang, $this->is_vn) ?></div>
                    </li>
                    <li class="all">
                        <div style="position: absolute;top: 375px;left: 720px;width: 236px;"><?php echo $this->t(3, 'lbl_alllanguage', 'pricing') ?></div>
                    </li>
                </ul>
                <ul class="comingsoon">
                    <li class="first">
                        <div class="lbl"><?php echo $this->t(3, 'label_comingsoon', 'pricing') ?></div>
                        <i class="banggia banggia-icon-arow"></i><a name="giamgia"></a>
                    </li>
                    <li class="single">
                        <div><i class="banggia banggia-icon-tick"></i></div>
                    </li>
                    <li class="full">
                        <div><i class="banggia banggia-icon-tick"></i></div>
                    </li>
                    <li class="all">
                        <div><i class="banggia banggia-icon-tick"></i></div>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <ul class="buynow">
                    <li>&nbsp;</li>
                    <li class="single"><i data-product-id="<?php echo $single['product_id'] ?>"
                                          data-price="<?php echo $single['price']; ?>" data-backdrop="static"
                                          data-keyboard="false" data-toggle="modal" data-target="#buyModal"
                                          class="banggia banggia-btn_single"><?php echo $this->t(3, 'btn_text', 'pricing') ?></i>
                    </li>
                    <li class="full"><i data-product-id="<?php echo $full['product_id'] ?>"
                                        data-price="<?php echo $full['price']; ?>" data-backdrop="static"
                                        data-keyboard="false" data-toggle="modal" data-target="#buyModal"
                                        class="banggia banggia-btn_full"><?php echo $this->t(3, 'btn_text', 'pricing') ?></i>
                    </li>
                    <li class="all"><i data-product-id="<?php echo $all['product_id'] ?>"
                                       data-price="<?php echo $all['price']; ?>" data-backdrop="static"
                                       data-keyboard="false" data-toggle="modal" data-target="#buyModal"
                                       class="banggia banggia-btn_all"><?php echo $this->t(3, 'btn_text', 'pricing') ?></i>
                    </li>
                </ul>
            </div>
        </div>
        <?php
        $this->renderPartial('coupon_form', array('data' => $data));
        ?>

        <div class="payment_method-wp">
            <div class="payment_method">
                <ul>
                    <li class="first">
                        <div class="h">
                            <i class="pricing pricing-method_1"></i>
                            <strong><?php echo $this->t(1, 'payment_1', 'pricing') ?></strong>
                        </div>
                        <p><?php echo nl2br($this->t(1, 'payment_text_1', 'pricing')) ?></p>
                    </li>

                    <li>
                        <div class="h">
                            <i class="pricing pricing-method_2"></i>
                            <strong><?php echo $this->t(1, 'payment_2', 'pricing') ?></strong>
                        </div>
                        <p><?php echo nl2br($this->t(1, 'payment_text_2', 'pricing')) ?></p>
                    </li>
                    <li class="last">
                        <div class="h">
                            <i class="pricing pricing-method_3_new"></i>
                            <strong><?php echo $this->t(1, 'payment_3', 'pricing') ?></strong>
                        </div>
                        <p><?php echo nl2br($this->t(1, 'payment_text_3', 'pricing')) ?></p>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>


<?php
$this->renderPartial('//index/block/3');
$this->renderPartial('review');
$this->renderPartial('//index/block/10');
$this->renderPartial('faq', array('data' => $data));
?>


<script type="text/javascript">

    var package = <?php echo json_encode($data['package']) ?>;
    var order_id = 0;
    var obj = null;
    var coupon_code = '<?php echo $this->coupon; ?>';
    $(function () {
        $('.buynow i').click(function () {
            fbq('track', 'AddToCart');
        });

        $('.language_bar li').click(function () {
            if ($(this).hasClass('active')) {
                return;
            }
            obj = $(this);
            $('#banggia').fadeOut();

            setTimeout(changeLanguage, 500);

        });
    });


    function changeLanguage() {
        var code;
        var remove_class;
        var add_class;
        $('.language_bar li').each(function () {
            code = $(this).attr('dir');
            remove_class = 'pricing-lang_' + code;
            add_class = 'pricing-lang_' + code + '_small';
            $(this).find('.flag').removeClass(remove_class).addClass(add_class);
        });

        code = obj.attr('dir');
        remove_class = 'pricing-lang_' + code + '_small';
        add_class = 'pricing-lang_' + code;
        $('.language_bar li').removeClass('active');
        obj.find('.flag').removeClass(remove_class).addClass(add_class);
        obj.addClass('active');

        <?php
        foreach ($this->active_language as $lang) {
            $flag = 'pricing-lang_' . $lang['code'];
            echo "$('#banggia .flag i').removeClass('" . $flag . "');";
        }
        ?>
        remove_class = 'pricing-lang_' + code;
        $('#banggia .flag i').addClass(remove_class);


        var lang_name = obj.find('strong').html();
        //find data
        var single = package.us.single;
        var full = package.us.full;
        if (code == 'uk') {
            single = package.uk.single;
            full = package.uk.full;
        }
        if (code == 'fr') {
            single = package.fr.single;
            full = package.fr.full;
        }
        if (code == 'vn') {
            single = package.vn.single;
            full = package.vn.full;
        }
        if (code == 'us') {
            single = package.us.single;
            full = package.us.full;
        }
        $('.price .single div.tien1').html(single.price);
        $('.price .single div.tien2 span').html(single.tien_2);
        $('.lesson .single div').html(single.description[0]);
        $('.level .single div').html(single.description[1]);
        $('.language .single div').html(lang_name);
        $('.language .full div').html(lang_name);

        $('.price .full div.tien1').html(full.price);
        $('.price .full div.tien2 span').html(full.tien_2);
        $('.lesson .full div').html(full.description[0]);
        $('.level .full div').html(full.description[1]);

        $('.buynow .single i').attr('data-product-id', single.product_id);
        $('.buynow .single i').attr('data-price', single.price);

        $('.buynow .full i').attr('data-product-id', full.product_id);
        $('.buynow .full i').attr('data-price', full.price);


        $('#banggia').fadeIn();
    }


</script>

<?php
$this->renderPartial('//index/include/newsletter');
$this->renderPartial('buy', array('data' => $data['goitien']));
?>

<script type="text/javascript">
    var hinhthucthanhtoan = 0;
    var product_id, product_price, user_name, user_email, user_phone, user_address;
    $(function () {
        $("#buyModal").wizard({
            exitText: 'exit',
            onfinish: function () {
            }
        });
    });
</script>