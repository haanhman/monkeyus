<div class="lightbox blog-book" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="bg_sample">
        <div class="grid-container-1100 gioithieugia">
            <div class="sale-title">
                <h2>Giá các chương trình học của <span>monkey junior</span></h2>
                <img src="/images/sale/line.png" alt="" />
            </div>
            <div class="clearfix"></div>
            <div class="giamua shadow">
                <ul>
                    <li class="goi1">
                        <p class="tengoi"><?php echo $data['package']['full']['product_name'] ?></p>
                        <p class="tiencu">
                            <?php echo number_format($data['package']['full']['tienao'], 0, '', ',') ?> đ
                            <img src="/images/sale/sale_40.png" alt="" />
                        </p>
                        <p class="tien40"><?php echo number_format($data['package']['full']['giam40'], 0, '', ',') ?> đ</p>
                    </li>
                    <li class="goi2">
                        <p class="tengoi"><?php echo $data['package']['all']['product_name'] ?></p>
                        <p class="tiencu">
                            <?php echo number_format($data['package']['all']['tienao'], 0, '', ',') ?> đ
                            <img src="/images/sale/sale_40.png" alt="" />
                        </p>
                        <p class="tien40"><?php echo number_format($data['package']['all']['giam40'], 0, '', ',') ?> đ</p>
                    </li>
                </ul>
            </div>

            <div class="payment_method-wp">
                <div class="payment_method" style="padding-bottom: 0px;">
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
</div>