<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="agent_block2 ptop">
        <div class="col-xs-12">

            <div class="div-left text-center">
                <ul class="list-unstyled">
                    <li>- Bạn là admin của một fanpage hoặc group trên Facebook?</li>
                    <li>- Bạn là admin của một website?</li>
                    <li>- Bạn là admin của một kênh youtube?</li>
                    <li>- Bạn là người quan tâm đến giáo dục sớm?</li>
                </ul>
                <p class="Hay đơn giản">Hay đơn giản</p>
                <ul class="list-unstyled">
                    <li>- Bạn có tài khoản facebook?</li>
                </ul>

                <p class="lead text-center" style="padding-top: 30px;"><strong>BẤT KỲ AI CŨNG CÓ THỂ TRỞ THÀNH ĐỐI TÁC
                        CỦA CHÚNG
                        TÔI!!!</strong></p>
            </div>
            <div class="div-right">
                <div class="inner text-center">
                    <p class="title"><strong>Đăng kí ngay để trở thành đối tác!</strong></p>
                    <p class="">Mở tài khoản Đối tác với Monkey Junior và bắt đầu kiếm hoa hồng</p>
                    <a href="<?php echo $this->createUrl('register') ?>">
                        <button class="btn btn-success btn-lg">
                            Tôi muốn đăng kí ngay bây giờ!
                            <img src="/images/agent/arow.png" alt=""/>
                        </button>
                    </a>
                </div>
            </div>

            <div class="clearfix"></div>

            <hr class="line"/>

            <div class="grid-container-1100 agent_block2_khoi2">
                <div class="text-center">
                    <div class="title" style="padding-bottom: 15px;">
                        <h3>Tại sao nên trở thành đối tác của Monkey Junior?</h3>
                        <div class="border"></div>
                    </div>
                </div>

                <?php
                $class50 = 'col-xs-12 col-sm-6 col-md-6	col-lg-6';
                ?>
                <div class="feature">
                    <ul class="list-unstyled">

                        <li class="<?php echo $class50 ?>">
                            <div class="thumbnail">
                                <img class="img-responsive" src="/images/agent/icon4.png" alt=""/>
                                <div>
                                    <p class="lead">Mức chiết khấu doanh thu hấp dẫn</p>
                                    <p>Sau khi giới thiệu một khách hàng mua sản phẩm của Monkey Junior thành công, bạn
                                        sẽ được 20% trên giá trị đơn hàng.</p>
                                </div>
                            </div>
                        </li>
                        <li class="<?php echo $class50 ?>">
                            <div class="thumbnail">
                                <img class="img-responsive" src="/images/agent/icon2.png" alt=""/>
                                <div>
                                    <p class="lead">Tham gia miễn phí</p>
                                    <p>Bạn không mất phí để trở thành đối tác với Monkey Junior. Đặc biệt, mức doanh thu
                                        bạn
                                        có
                                        thể kiếm được
                                        không hề giới hạn.</p>
                                </div>
                            </div>
                        </li>
                        <li class="<?php echo $class50 ?>">
                            <div class="thumbnail">
                                <img class="img-responsive" src="/images/agent/icon1.png" alt=""/>
                                <div>
                                    <p class="lead">Tài liệu quảng cáo phong phú</p>
                                    <p>Chúng tôi tạo ra những hình ảnh đồ họa đẹp mắt, banner, hướng dẫn sử dụng, video sinh động để từ
                                        đó bạn có thể quảng bá sản phẩm tốt và hiệu quả hơn.<br/>
                                        <a target="_blank" href="<?php echo $this->createUrl('agent/adv') ?>">Xem quảng cáo mẫu ></a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="<?php echo $class50 ?>">
                            <div class="thumbnail">
                                <img class="img-responsive" src="/images/agent/icon3.png" alt=""/>
                                <div>
                                    <p class="lead">Hệ thống hoa hồng minh bạch</p>
                                    <p>Cung cấp hệ thống theo dõi số tiền hoa hồng và số tiền thanh toán tiếp theo của bạn</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="text-center fot">
                    <p><strong>Hãy giới thiệu Monkey Junior đến mạng lưới của bạn.</strong></p>
                    <p>Kiếm tiền rất đơn giản với tất cả công cụ hỗ trợ từ chúng tôi.</p>
                </div>

            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
    $(function () {
        var max = 0;
        $('.feature .thumbnail').each(function () {
            if ($(this).height() > max) {
                max = $(this).height();
            }
        });
        $('.feature .thumbnail').css('height', max);
    });
</script>