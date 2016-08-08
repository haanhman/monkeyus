<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="lightbox">
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="convincing grid-container-1100 box">
        <div class="title">
            <h2><?php echo $this->t($block, 'heading') ?></h2>
            <img src="/monkeyweb/images/new/sample_line.png"/>
        </div>
        <div class="clearfix"></div>
        <ul>
            <li>
                <div class="thumbnail">
                    <img src="/monkeyweb/images/new/img3.png"/>
                </div>
                <h3><?php echo $this->t($block, 'title_3') ?></h3>

                <p><?php echo nl2br($this->t($block, 'text_3')) ?></p>
            </li>
            <li>
                <div class="thumbnail">
                    <img src="/monkeyweb/images/new/img7.png"/>
                </div>
                <h3><?php echo $this->t($block, 'title_5') ?></h3>

                <p><?php echo nl2br($this->t($block, 'text_5')) ?></p>
            </li>
            <li>
                <div class="thumbnail">
                    <img src="/monkeyweb/images/new/img1.png"/>
                </div>
                <h3><?php echo $this->t($block, 'title_1') ?></h3>

                <p><?php echo nl2br($this->t($block, 'text_1')) ?></p>
            </li>
            <li>
                <div class="thumbnail">
                    <img src="/monkeyweb/images/new/img2.png"/>
                </div>
                <h3><?php echo $this->t($block, 'title_2') ?></h3>

                <p><?php echo nl2br($this->t($block, 'text_2')) ?></p>
            </li>
            <li>
                <div class="thumbnail">
                    <img src="/monkeyweb/images/new/img6.png"/>
                </div>
                <h3><?php echo $this->t($block, 'title_6') ?></h3>

                <p><?php echo nl2br($this->t($block, 'text_6')) ?></p>
            </li>

            <li>
                <div class="thumbnail">
                    <img src="/monkeyweb/images/new/img4.png"/>
                </div>
                <h3><?php echo $this->t($block, 'title_4') ?></h3>

                <p><?php echo nl2br($this->t($block, 'text_4')) ?></p>
            </li>
        </ul>


    </div>
    <div class="clearfix"></div>
</div>

<script type="text/javascript">
    $(function () {
        var max = 0;
        $('.convincing ul li').each(function () {
            if ($(this).height() > max) {
                max = $(this).height();
            }
        });
        $('.convincing ul li').css('height', max);
    });
</script>