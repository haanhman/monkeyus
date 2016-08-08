<?php
$this->renderPartial('mobile/block/1');
?>

<div class="col-xs-12">
    <?php
    if (!empty($data['listItem'])) {
        $format_date = 'F d, Y';
        $i = 1;
        foreach ($data['listItem'] as $item) {
            $url_detail = $this->createUrl('detail', array('alias' => $item['alias']));
            ?>
            <a class="blog-item" href="<?php echo $url_detail ?>">
                <h2><?php echo $item['title'] ?></h2>
                        <span
                            class="timestamp"><?php echo blogFormatData($format_date, $item['created'], $this->is_vn) ?></span>
            </a>
            <?php
            if ($i < count($data['listItem'])) {
                echo '<div class="line"></div>';
            }
            $i++;
        }
    }
    //phan trang
    if (!empty($data['listItem'])) {
        echo '<div class="dataTables_paginate paging_bootstrap">';
        $this->widget('CLinkPager', array(
            'header' => '',
            'pages' => $pages,
        ));
        echo '</div>';
    }
    ?>
    <div class="clearfix"></div>
</div>

<?php
$this->renderPartial('//about/mobile/connect_with');
?>
