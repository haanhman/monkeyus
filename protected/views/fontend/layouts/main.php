<?php
if (MINIFY_HTML) {
    include ROOT_PATH . '/lib/minify/compress_html.php';
    ob_start('replace_tabs_newlines');
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?php echo $this->metaTag['title'] ?></title>
        <meta charset="UTF-8">
        <?php
        if (NOINDEX == TRUE || $this->no_index) {
            echo '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
        }
        if (Yii::app()->controller->id == 'pricing') {
            echo '<link rel="canonical" href="' . $this->createAbsoluteUrl('pricing/index') . '" />';
        }
        ?>


        <meta name="description" content="<?php echo CHtml::encode($this->metaTag['description']) ?>"/>
        <meta name="keywords" content="<?php echo CHtml::encode($this->metaTag['keywords']) ?>"/>

        <meta property="og:url" content="<?php echo $this->current_url ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="<?php echo CHtml::encode($this->metaTag['title']) ?>"/>
        <meta property="og:description" content="<?php echo CHtml::encode($this->metaTag['description']) ?>"/>
        <meta property="og:app_id" content="186281401544836"/>
        <?php
        $og_image = 'http://' . $_SERVER['SERVER_NAME'] . '/monkeyweb/images/banner.jpg';
        if (!empty($this->metaTag['og_image'])) {
            $og_image = $this->metaTag['og_image'];
        }
        ?>
        <meta property="og:image" content="<?php echo $og_image ?>"/>


        <?php
        if ($this->is_vn == 0) {
            echo "<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>";
        }
        ?>


        <script type="text/javascript" src="/monkeyweb/js/jquery.js"></script>
        <script type="text/javascript" src="/monkeyweb/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="/monkeyweb/js/messages.js"></script>


        <?php
        include 'analyticstracking.php';

        ?>
        <!--<script type="text/javascript" src="/js/firebug/firebug-lite-dev.js"></script>-->

        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="/monkeyweb/css/ie.css"/>
        <![endif]-->

        <!--[if IE 8]>
        <link rel="stylesheet" type="text/css" href="/monkeyweb/css/ie8.css"/>
        <![endif]-->

    </head>
    <body class="<?php echo $this->is_vn == 1 ? 'page_vn' : 'page_us'; ?>">
    <noscript>
        <meta http-equiv="refresh" content="0;url=noscript.html">
    </noscript>
    <script type="text/javascript">
        var lang_code = '<?php echo $this->is_vn ? 'vn' : 'us'; ?>';
    </script>
    <?php
    if ($this->fuck_ie) {
        $this->renderPartial('//layouts/monkeyjunior/fuckie');
    }
    ?>
    <?php $this->renderPartial('//layouts/monkeyjunior/heading') ?>
    <?php echo $content; ?>
    <?php $this->renderPartial('//layouts/monkeyjunior/footer') ?>

    <!--<a href="#0" class="cd-top">Top</a>-->

    <div id="my-tooltip"></div>
    <?php
    if ($_SERVER['SERVER_NAME'] != 'monkeyjunior.com.vn') {
        ?>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f3e88735c6a42fb"
                async="async"></script>
        <?php
    }
    ?>
    <script type="text/javascript">
        fbq('track', 'ViewContent');
    </script>
    <?php
    if ($_SERVER['SERVER_NAME'] != 'monkeyjunior.com.vn') {
        $this->renderPartial('//layouts/monkeyjunior/chat');
    }

    ?>
    </body>
    </html>
<?php
if (MINIFY_HTML) {
    ob_end_flush();
}
?>