<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="pricing_block2 ptop">
        <a name="muaban"></a>
        <div class="col-xs-12">
            <h4 class="text-center"><?php echo $this->t(1, 'heading', 'pricing') ?></h4>

            <div class="language_bar">
                <?php
                $languages = $this->active_language;
                $firstLang = array();
                ?>
                <ul class="list-inline text-center">
                    <?php
                    $code = isset($_GET['lang']) ? trim($_GET['lang']) : 'us';
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
                            <a href="<?php echo $this->createUrl('pricing/index', array('lang' => $item['code'])) ?>">
                                <img src="/monkeyweb/mobile/images/flag_<?php echo $item['code'] ?>.png" alt=""/>
                                <br/>
                                <strong><?php echo getLanguageTitle($item, $this->is_vn) ?></strong>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="clearfix"></div>


        </div>
    </div>
</div>

<?php
$all = $data['package']['all'];
$single = $data['package'][$code]['single'];
$full = $data['package'][$code]['full'];
?>

<div class="col-xs-12 list-package">
    <div class="package single">
        <p class="name"><?php echo $this->t(3, 'single_heading', 'pricing') ?></p>
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
        <p class="price"><?php echo $single['price']; ?></p>
        <a onclick="fbq('track', 'AddToCart');"
           href="<?php echo $this->createUrl('buy', array('coupon' => $this->coupon, 'pid' => $single['product_id'])) ?>">
            <button class="btn btn-default btn-lg"
                    type="submit"><?php echo $this->t(3, 'btn_text', 'pricing') ?></button>
        </a>

        <p class="more lead">
            Chi tiết gói dịch vụ
            <img src="/monkeyweb/mobile/images/pricing_down.png" alt=""/>
        </p>

        <div class="info">
            <ul class="list-unstyled">
                <li><?php echo $single['description'][0] ?></li>
                <li><?php echo $single['description'][1] ?></li>
            </ul>
            <p class="btn_collapse lead">
                Ẩn thông tin
                <img src="/monkeyweb/mobile/images/pricing_up.png" alt=""/>
            </p>
        </div>

    </div>


    <div class="package full">
        <p class="name"><?php echo $this->t(3, 'full_heading', 'pricing') ?></p>
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
        <p class="price"><?php echo $full['price']; ?></p>
        <a onclick="fbq('track', 'AddToCart');"
           href="<?php echo $this->createUrl('buy', array('coupon' => $this->coupon, 'pid' => $full['product_id'])) ?>">
            <button class="btn btn-default btn-lg"
                    type="submit"><?php echo $this->t(3, 'btn_text', 'pricing') ?></button>
        </a>

        <p class="more lead">
            Chi tiết gói dịch vụ
            <img src="/monkeyweb/mobile/images/pricing_down.png" alt=""/>
        </p>

        <div class="info">
            <ul class="list-unstyled">
                <li><?php echo $full['description'][0] ?></li>
                <li><?php echo $full['description'][1] ?></li>
            </ul>
            <p class="btn_collapse lead">
                Ẩn thông tin
                <img src="/monkeyweb/mobile/images/pricing_up.png" alt=""/>
            </p>
        </div>

    </div>

    <a name="giamgia"></a>
    <div class="package all">
        <p class="name"><?php echo $this->t(3, 'all_heading', 'pricing') ?></p>
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
        <p class="price"><?php echo $all['price']; ?></p>
        <a onclick="fbq('track', 'AddToCart');"
           href="<?php echo $this->createUrl('buy', array('coupon' => $this->coupon, 'pid' => $all['product_id'])) ?>">
            <button class="btn btn-default btn-lg"
                    type="submit"><?php echo $this->t(3, 'btn_text', 'pricing') ?></button>
        </a>

        <p class="more lead">
            Chi tiết gói dịch vụ
            <img src="/monkeyweb/mobile/images/pricing_down.png" alt=""/>
        </p>

        <div class="info">
            <ul class="list-unstyled">
                <li><?php echo $all['description'][0] ?></li>
                <li><?php echo $all['description'][1] ?></li>
                <li>Tất cả ngôn ngữ</li>
            </ul>
            <p class="btn_collapse lead">
                Ẩn thông tin
                <img src="/monkeyweb/mobile/images/pricing_up.png" alt=""/>
            </p>
        </div>

    </div>


    <div class="clearfix"></div>
</div>
<script type="text/javascript">
    $(function () {
        $('.list-package .more').click(function () {
            $(this).next().show();
            $(this).hide();
        });


        $('.list-package .btn_collapse').click(function () {
            $(this).parent().prev().show();
            $(this).parent().hide();
        });
    });
</script>
<?php
$this->renderPartial('mobile/coupon_form', array('data' => $data));
?>
<div class="col-xs-12 list-payment">
    <div class="payment">
        <p>
            <img src="/monkeyweb/mobile/images/method_1.png" alt=""/>
            <strong><?php echo $this->t(1, 'payment_1', 'pricing') ?></strong>
        </p>

        <p class="lead"><?php echo nl2br($this->t(1, 'payment_text_1', 'pricing')) ?></p>
    </div>

    <div class="payment">
        <p>
            <img src="/monkeyweb/mobile/images/method_2.png" alt=""/>
            <strong><?php echo $this->t(1, 'payment_2', 'pricing') ?></strong>
        </p>

        <p class="lead"><?php echo nl2br($this->t(1, 'payment_text_2', 'pricing')) ?></p>
    </div>

    <div class="payment">
        <p>
            <img src="/monkeyweb/mobile/images/method_3.png" alt=""/>
            <strong><?php echo $this->t(1, 'payment_3', 'pricing') ?></strong>
        </p>

        <p class="lead"><?php echo nl2br($this->t(1, 'payment_text_3', 'pricing')) ?></p>
    </div>

    <div class="clearfix"></div>
</div>