<?php
$base_url = base_url();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo Yii::app()->name ?></title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="<?php echo $base_url ?>/public/admin/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo $base_url ?>/public/admin/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo $base_url ?>/public/admin/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo $base_url ?>/public/admin/css/ace-fonts.css" />
        <link rel="stylesheet" href="<?php echo $base_url ?>/public/admin/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo $base_url ?>/public/admin/css/ace-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo $base_url ?>/public/admin/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo $base_url ?>/public/admin/css/style.css" />
        <link rel="stylesheet" href="<?php echo $base_url ?>/public/js/fancybox/jquery.fancybox.css" />        
        <link rel="stylesheet" href="<?php echo $base_url ?>/public/jqueryui/css/ui-lightness/jquery-ui.css" />
        <script type="text/javascript" src="<?php echo $base_url ?>/public/admin/js/ace-extra.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_url ?>/public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $base_url ?>/public/admin/js/jquery.cookie.js"></script>

        <script type="text/javascript" src="<?php echo $base_url ?>/public/jqueryui/js/jquery-ui.js"></script>
        <?php
        $fancybox = 'jquery.fancybox.pack.js';
        ?>
        <script type="text/javascript" src="<?php echo $base_url ?>/public/js/fancybox/<?php echo $fancybox ?>"></script>

        <style type="text/css">
            #display_error {border: 1px solid #ff6633; padding: 5px; margin-bottom: 10px;}
        </style>
    </head>
    <body>
        <div class="navbar navbar-default" id="navbar">
            <script type="text/javascript">
                try {
                    ace.settings.check('navbar', 'fixed')
                } catch (e) {
                }
            </script>
            <?php $this->renderPartial('//layouts/widget/header'); ?>
        </div>
        <div class="main-container" id="main-container">
            <div class="main-container-inner">
                <a class="menu-toggler" id="menu-toggler" href="#">
                    <span class="menu-text"></span>
                </a>                
                <?php $this->renderPartial('//layouts/widget/sidebar'); ?>
                <div class="main-content">                                        
                    <?php echo $content ?>
                </div>                
            </div>
            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="icon-double-angle-up icon-only bigger-110"></i>
            </a>
        </div>
        <input id="base_url" type="hidden" readonly="" name="" value="<?php echo $base_url ?>" />
        <input id="data_url" type="hidden" readonly="" name="" value="<?php echo DOMAIN_DATA ?>" />
        <script src="<?php echo $base_url ?>/public/admin/js/bootstrap.min.js"></script>        
        <script src="<?php echo $base_url ?>/public/admin/js/ace-elements.min.js"></script>
        <script src="<?php echo $base_url ?>/public/admin/js/ace.min.js"></script>
    </body>
</html>
