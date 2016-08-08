<?php
$ctl = Yii::app()->controller->id;
$act = Yii::app()->controller->action->id;
if($ctl != 'page' && $act != 'download') {
    $this->renderPartial('//layouts/mobile/download');
}
?>
<div class="top">
    <div class="colorful">
        <div class="color1"></div>
        <div class="color2"></div>
        <div class="color3"></div>
        <div class="color4"></div>
        <div class="color5"></div>
    </div>
    <div class="clearfix"></div>
    <?php
    $ctl = Yii::app()->controller->id;
    $act = Yii::app()->controller->action->id;
    $showMenu = true;
    if ($ctl == 'page') {
        $showMenu = false;
    }

    if ($ctl == 'page' && $act == 'sale') {
        $showMenu = true;
    }

    if ($ctl == 'pricing' && $act == 'buy') {
        $showMenu = false;
    }
    $showMenu = true;

    if ($showMenu) {
        ?>
        <div class="top-nav">

            <div class="col-xs-2 danhmuc text-left">
                <?php
                if ($ctl == 'blog' && $act == 'detail' && $this->is_vn) {
                    echo '<a href="' . $this->createUrl('blog/index') . '"><img src="/monkeyweb/mobile/images/buy/back.png" alt=""></a>';
                }
                if ($ctl == 'agent' && $act == 'register') {
                    echo '<a href="' . $this->createUrl('agent/index') . '"><img src="/monkeyweb/mobile/images/buy/back.png" alt=""></a>';
                } else {
                    echo '<img class="ic" src="/monkeyweb/mobile/images/icon_nav.png" alt=""/>';
                }
                ?>

            </div>
            <div class="col-xs-8 text-center">
                <a href="<?php echo $this->createUrl('index/index') ?>"><img src="/monkeyweb/mobile/images/logo.png"
                                                                             alt=""/></a>
            </div>
            <?php
            $showLanguage = false;
            if ($this->is_vn == 1 | isset($_GET['us'])) {
                $showLanguage = true;
            }
            if ($showLanguage) {
                ?>
                <div <?php if ($act == 'sale') echo 'style="display: none"'; ?> class="col-xs-2 ngonngu text-right">
                    <?php
                    $flag = $this->is_vn == 1 ? '/images/vi.png' : '/images/en.png';
                    ?>
                    <img style="width: 30px" class="dropdown-toggle" data-toggle="dropdown" src="<?php echo $flag ?>"
                         alt=""/>
                    <ul class="dropdown-menu">
                        <?php
                        $language = 'Tiếng Anh';
                        $url = DOMAIN_US;
                        if ($this->is_vn == 0) {
                            $language = 'Tiếng Việt';
                            $url = DOMAIN_VN;
                        }
                        ?>
                        <li><a href="<?php echo $url ?>"><?php echo $language ?></a></li>
                    </ul>
                </div>
                <?php
            }
            ?>
            <div class="clearfix"></div>
        </div>
        <?php
    }
    ?>


</div>
<script type="text/javascript">
    $(function () {
        $('.danhmuc img.ic').click(function () {
            $('.menu').slideToggle();
        });
    });
</script>