<div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="icon-chevron-left green home-icon"></i>
            <a href="<?php echo $this->createUrl('index') ?>">Quay lại</a>
        </li>
    </ul>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>Thêm mới/Sửa bài hướng dẫn</h1>
            </div>
            <?php $form = $data['form']; ?>
            <?php echo CHtml::beginForm('', 'POST', array('class' => 'form-horizontal')); ?>
            <?php
            $row = isset($data['row']) ? $data['row'] : array();
            ?>

            <div class="form-group">                                
                <div class="col-sm-12">             
                    <label class="control-label">Tiêu đề</label>
                    <input type="text" name="title" value="<?php if (!empty($row['title'])) echo CHtml::encode($row['title']) ?>" style="width: 100%" />
                </div>
            </div> 
            <div class="form-group">                                
                <div class="col-sm-12">             
                    <label class="control-label">Danh mục</label><br />
                    <select name="cate_id">
                        <option value="0">Chọn danh mục</option>
                        <?php
                        foreach ($data['category'] as $cate_id => $item) {
                            ?>
                            <option <?php if ($row['cate_id'] == $cate_id) echo 'selected=""'; ?> value="<?php echo $cate_id ?>"><?php echo $item['name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div> 
            <div class="form-group">                                
                <div class="col-sm-12">              
                    <label class="control-label">Nội dung</label>
                    <textarea name="content" style="width: 100%; height: 300px;"><?php if (!empty($row['content'])) echo $row['content'] ?></textarea>
                </div>
            </div> 
            <div class="form-group">                                
                <div class="col-sm-12">             
                    <label class="control-label">Trạng thái</label>
                    <br />
                    <select name="status">
                        <?php
                        $status = isset($row['status']) ? intval($row['status']) : 0;
                        ?>
                        <option <?php if ($status === 1) echo 'selected=""'; ?> value="1">Hiển thị</option>
                        <option <?php if ($status === 0) echo 'selected=""'; ?> value="0">Ẩn</option>
                    </select>
                </div>
            </div> 


            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="icon-ok bigger-110"></i>
                        Submit
                    </button>
                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
        </div>
    </div>
</div>
<script src="/public/admin/js/tinymce/tinymce.min.js"></script>
<script>

    tinyMCE.init({selector: "textarea",
        selector: "textarea",
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
