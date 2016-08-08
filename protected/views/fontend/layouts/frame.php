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
    <script type="text/javascript" src="/monkeyweb/js/jquery.js"></script>
</head>
<body>
<?php echo $content ?>
</body>
</html>