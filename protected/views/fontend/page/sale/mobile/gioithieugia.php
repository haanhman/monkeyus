<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="gioithieugia">
        <div class="col-xs-12">
            <div class="sale-title">
                <h2>Giá các chương trình học của <span>Monkey Junior</span></h2>
                <img class="img-responsive" src="/images/sale/line.png" alt=""/>
            </div>
            <div class="clearfix"></div>
            <div class="giamua">
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <div class="goimua goi1 shadow">
                        <p class="tengoi"><?php echo $data['package']['full']['product_name'] ?></p>
                        <p class="tiencu">
                            <?php echo number_format($data['package']['full']['tienao'], 0, '', ',') ?> đ
                            <img src="/images/sale/sale_40.png" alt=""/>
                        </p>
                        <p class="tien40"><?php echo number_format($data['package']['full']['giam40'], 0, '', ',') ?>
                            đ</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <div class="goimua goi2 shadow">
                        <p class="tengoi"><?php echo $data['package']['all']['product_name'] ?></p>
                        <p class="tiencu">
                            <?php echo number_format($data['package']['all']['tienao'], 0, '', ',') ?> đ
                            <img src="/images/sale/sale_40.png" alt=""/>
                        </p>
                        <p class="tien40"><?php echo number_format($data['package']['all']['giam40'], 0, '', ',') ?>
                            đ</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

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


        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="clearfix"></div>