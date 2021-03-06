<?php
if (MINIFY_HTML) {
    include ROOT_PATH . '/lib/minify/compress_html.php';
    ob_start('replace_tabs_newlines');
}
?>
    <noscript>
        <meta http-equiv="refresh" content="0;url=noscript.html">
    </noscript>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->metaTag['title'] ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <meta name="description" content="<?php echo CHtml::encode($this->metaTag['description']) ?>"/>
        <meta name="keywords" content="<?php echo CHtml::encode($this->metaTag['keywords']) ?>"/>

        <meta property="og:url" content="<?php echo $this->current_url ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="<?php echo CHtml::encode($this->metaTag['title']) ?>"/>
        <meta property="og:description" content="<?php echo CHtml::encode($this->metaTag['description']) ?>"/>
        <?php
        $og_image = 'http://' . $_SERVER['SERVER_NAME'] . '/monkeyweb/images/banner.jpg';
        if (!empty($this->metaTag['og_image'])) {
            $og_image = $this->metaTag['og_image'];
        }
        if (Yii::app()->controller->id == 'pricing') {
            echo '<link rel="canonical" href="' . $this->createAbsoluteUrl('pricing/index') . '" />';
        }
        ?>
        <meta property="og:image" content="<?php echo $og_image ?>"/>

        <?php
        if (NOINDEX == TRUE || $this->no_index) {
            echo '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
        }
        ?>
        <script type="text/javascript" src="/monkeyweb/js/jquery.js"></script>
        <script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/monkeyweb/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="/monkeyweb/js/messages.js"></script>
        <script type="text/javascript">
            var lang_code = '<?php echo $this->is_vn ? 'vn' : 'us'; ?>';
        </script>
        <?php
        if ($_SERVER['SERVER_NAME'] != 'monkeyjunior.com.vn') {

        }
        include 'analyticstracking.php';
        ?>
        <!-- Bootstrap -->


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

    <?php
    $show_heading = true;

    if (Yii::app()->controller->id == 'pricing' && Yii::app()->controller->action->id == 'buy') {
        $show_heading = false;
    }
    if($show_heading) {
        $this->renderPartial('//layouts/mobile/heading');

    }
    $this->renderPartial('//layouts/mobile/menu');
    echo $content;
    $this->renderPartial('//layouts/mobile/footer');
    ?>

    </body>
    <?php
    $ctl = Yii::app()->controller->id;
    $act = Yii::app()->controller->action->id;
    $addthis = true;
    if ($act == 'pricing' && $act == 'buy') {
        $addthis = false;
    }

    if ($_SERVER['SERVER_NAME'] == 'monkeyjunior.com.vn') {
        $addthis = false;
    }

    if ($addthis) {
        echo '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f3e88735c6a42fb" async="async"></script>';
    }
    if ($_SERVER['SERVER_NAME'] != 'monkeyjunior.com.vn' && !isset($_GET['test'])) {
        $this->renderPartial('//layouts/monkeyjunior/chat');
    }
    ?>
    <script type="text/javascript">
        fbq('track', 'ViewContent');
    </script>
    </html>
<?php
if (MINIFY_HTML) {
    ob_end_flush();
}
?>