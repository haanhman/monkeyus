<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $this->metaTag['title'] ?></title>
        <meta charset="UTF-8">
        <?php
        if (NOINDEX == TRUE || $this->no_index) {
            echo '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
        }
        ?>        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

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
        
        <style type="text/css">
            h1 {
                font-size: 50px;
                text-align: center;
                color: red;
                text-transform: uppercase;
            }
        </style>
        <script type="text/javascript" src="/monkeyweb/js/jquery.js"></script>
    </head>    
    <body>
        <?php echo $content ?>
        <?php $this->renderPartial('//layouts/coupon/footer') ?>
    </body>    
</html>