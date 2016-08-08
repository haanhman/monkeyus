<div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
        <?php
        $option = $_GET;
        ?>
        <li>
            <a href="<?php echo $this->createUrl('index') ?>">Quay lại</a>
        </li>
        <li>
            <?php
            unset($option['us']);
            $option['vn'] = 1;
            ?>
            <a href="<?php echo $this->createUrl('translate', $option) ?>">Tiếng Việt</a>
        </li>
        <li>
            <?php
            unset($option['vn']);
            $option['us'] = 1;
            ?>
            <a href="<?php echo $this->createUrl('translate', $option) ?>">Tiếng Anh</a>
        </li>
    </ul>
</div>
<?php
$page = isset($_GET['action']) ? trim($_GET['action']) : 'index';
$block = isset($_GET['block']) ? intval($_GET['block']) : 1;
$us = intval($_GET['us']);
$vn = intval($_GET['vn']);
global $us_content;        
$us = $us_content;
?>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>Translate nội dung
                    <?php
                    if ($vn == 1) {
                        echo ': <span>Tiếng Việt</span>';
                    }
                    if ($us == 1) {
                        echo ': <span>Tiếng Anh</span>';
                    }
                    ?>
                </h1>
            </div>
            <?php echo showMessage() ?>
            <form action="" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Hình ảnh khối</label>

                    <div class="col-sm-9">
                        <a href="/monkeyweb/scene/<?php echo $page . '_' . $block ?>.png" target="_blank"><img
                                class="scene" src="/monkeyweb/scene/<?php echo $page . '_' . $block ?>.png"/></a>
                    </div>
                </div>
                <?php
                foreach ($data['field'] as $item) {
                    if ($vn == 0 && $us == 0) {
                        ?>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo $item ?></label>

                            <div class="col-sm-9"><textarea placeholder="<?php echo $item ?> US"
                                                            name="<?php echo $item ?>[us]"><?php echo $data[$item]['us'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">&nbsp;</label>

                            <div class="col-sm-9"><textarea placeholder="<?php echo $item ?> VN"
                                                            name="<?php echo $item ?>[vn]"><?php echo $data[$item]['vn'] ?></textarea>
                            </div>
                        </div>
                        <?php
                    } elseif ($vn == 1) {
                        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo $item ?></label>

                            <div class="col-sm-9"><textarea placeholder="<?php echo $item ?> VN"
                                                            name="<?php echo $item ?>[vn]"><?php echo $data[$item]['vn'] ?></textarea>
                            </div>
                        </div>
                        <?php
                    } elseif ($us == 1) {
                        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo $item ?></label>

                            <div class="col-sm-9"><textarea placeholder="<?php echo $item ?> US"
                                                            name="<?php echo $item ?>[us]"><?php echo $data[$item]['us'] ?></textarea>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="submit">
                            <i class="icon-ok bigger-110"></i>
                            Submit
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<style type="text/css">
    img.scene {
        max-width: 300px;
        max-height: 250px;
        vertical-align: middle;
    }

    textarea {
        width: 100%;
        height: 100px;
    }
</style>
<script src="/public/admin/js/tinymce/tinymce.min.js"></script>
<script>

    tinyMCE.init({
        mode: "exact",
        elements: "html_content[vn],html_content[us]",
        theme: "modern",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ],
        file_browser_callback: function (field, url, type, win) {
            tinyMCE.activeEditor.windowManager.open({
                file: '/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
                title: 'KCFinder',
                width: 700,
                height: 500,
                inline: true,
                close_previous: false
            }, {
                window: win,
                input: field
            });
            return false;
        }
    });

</script>