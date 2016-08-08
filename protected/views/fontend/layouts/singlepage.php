<?php
if (MINIFY_HTML) {
    include ROOT_PATH . '/lib/minify/compress_html.php';
    ob_start('replace_tabs_newlines');
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title><?php echo $this->metaTag['title'] ?></title>
        <?php
        if ($is_tablet) {
            echo '<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">';
        } else {
            echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        }
        if (Yii::app()->controller->action->id == 'sale') {
            echo '<link rel="canonical" href="' . $this->createAbsoluteUrl('page/sale') . '" />';
        }
        ?>

        <meta name="description" content="<?php echo CHtml::encode($this->metaTag['description']) ?>"/>
        <meta name="keywords" content="<?php echo CHtml::encode($this->metaTag['keywords']) ?>"/>
        <meta property="og:url" content="<?php echo $this->current_url ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="<?php echo CHtml::encode($this->metaTag['title']) ?>"/>
        <meta property="og:description" content="<?php echo CHtml::encode($this->metaTag['description']) ?>"/>
        <meta property="og:image" content="http://<?php echo $_SERVER['SERVER_NAME'] ?>/monkeyweb/images/banner.jpg"/>
        <meta charset="UTF-8">
        <?php
        if (NOINDEX == TRUE || $this->no_index) {
            echo '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
        }
        ?>
        <script type="text/javascript" src="/monkeyweb/js/jquery.js"></script>
        <script type="text/javascript" src="/monkeyweb/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="/monkeyweb/js/messages.js"></script>
        <script type="text/javascript">
            var lang_code = '<?php echo $this->is_vn ? 'vn' : 'us'; ?>';
        </script>
        <?php
        include 'analyticstracking.php';
        ?>
    </head>
    <body>
    <?php
    if (Yii::app()->controller->action->id == 'sale') {
        echo '<div class="sale-top-menu">';
    }
    ?>

    <div class="top">
        <?php
        $action = Yii::app()->controller->action->id;
        if ($action != 'sale') {
            ?>
            <div class="colorful">
                <div class="color1"></div>
                <div class="color2"></div>
                <div class="color3"></div>
                <div class="color4"></div>
                <div class="color5"></div>
                <div class="color6"></div>
                <div class="color7"></div>
                <div class="color8"></div>
            </div>
            <div class="clearfix"></div>

            <?php
        }
        $ignore_clock = array(
            'ebook', 'sale'
        );
        if (!in_array($action, $ignore_clock)) {
            ?>
            <div class="logo-nav" style="background-color: #CDDC39;">
                <div class="grid-container">
                    <div class="top-logo">
                        <a href="<?php echo $this->createUrl('index/index') ?>" title="Monkey Junior">
                            <img src="/monkeyweb/images/new/logo.png" alt="Monkey Junior">
                        </a>
                    </div>
                    <div class="top-nav content-right">
                        <?php
                        $arr = array(
                            'thank',
                            'laptop',
                            'ios',
                            'android',
                            'download'
                        );
                        if (!in_array($action, $arr)) {
                            echo '<div id="clock" class="time">05:00</div>';
                        }
                        ?>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php
        } elseif ($action == 'sale') {
            $this->renderPartial('//page/sale/topmenu');
        }
        ?>
    </div>
    <?php
    if (Yii::app()->controller->action->id == 'sale') {
        echo '</div>';
    }
    ?>

    <?php echo $content; ?>
    <div class="clearfix"></div>
    <?php $this->renderPartial('//layouts/monkeyjunior/footer') ?>
    <script type="text/javascript">
        fbq('track', 'ViewContent');
    </script>
    </body>
    </html>
<?php
if (MINIFY_HTML) {
    ob_end_flush();
}
?>