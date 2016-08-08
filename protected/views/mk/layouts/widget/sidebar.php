<?php
$sidebar = array(
    array(
        'Translate', 'translate/index?page=index&max=11', 'icon-cog',
    ),
    array(
        'FAQs', 'faq/index', 'icon-question',
        array(
            array('faqcategory/index', 'Danh mục'),
            array('faq/index', 'Bài viết'),
        ),
        'action' => array('faqcategory', 'faq')
    ), 
    array(
        'Blog', 'blog/index', 'icon-folder-open',
    ),
    array(
        'Review', 'review/index', 'icon-pencil',
    ),
    array(
        'Orders', 'order/index', 'icon-shopping-cart',
    )
);
$controller = Yii::app()->controller->id;
$action = Yii::app()->controller->action->id;
?>
<div class="sidebar <?php echo $_COOKIE['sidebar-collapsed'] ?>" id="sidebar">
    <ul class="nav nav-list">
        <?php
        foreach ($sidebar as $menu) {
            $route = $controller . '/' . $action;
            ?>
            <li class="<?php if (in_array($controller, $menu['action']) | $route == $menu[1]) echo 'active'; ?>">
                <a href="<?php echo $this->createUrl($menu[1]) ?>" class="dropdown-toggle">
                    <i class="<?php echo $menu[2] ?>"></i>
                    <span class="menu-text"><?php echo $menu[0] ?></span>
                    <?php
                    if (isset($menu[3])) {
                        echo '<b class="arrow icon-angle-down"></b>';
                    }
                    ?>
                </a>
                <?php
                if (isset($menu[3])) {
                    echo '<ul class="submenu">';
                    foreach ($menu[3] as $item) {
                        $class = '';
                        if ($item[0] == ($controller . '/' . $action)) {
                            $class = ' class="active"';
                        }
                        echo '<li' . $class . '><a href="' . $this->createUrl($item[0]) . '"><i class="icon-double-angle-right"></i>' . $item[1] . '</a></li>';
                    }
                    echo '</ul>';
                }
                ?>
            </li>
            <?php
        }
        ?>
    </ul>

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#sidebar-collapse').click(function () {
            if (!$('#sidebar').hasClass('menu-min')) {
                $.cookie('sidebar-collapsed', 'menu-min', {expires: 7, path: '/'});
                $('.main-content').css('margin-left', '43px');
                $(this).find('i').attr('class', $(this).attr('data-icon2'));
            } else {
                $.cookie('sidebar-collapsed', '', {expires: 7, path: '/'});
                $('.main-content').css('margin-left', '190px');
                $(this).attr('class', $(this).attr('data-icon1'));
            }
        });
        if ($('#sidebar').hasClass('menu-min')) {
            $('.main-content').css('margin-left', '43px');
            var $i = $('#sidebar-collapse i');
            $i.attr('class', $i.attr('data-icon2'));
        }
    });
</script>