<?php
$row = $data['row'];
?>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>Add meta tag cho <span><?php echo $_GET['ctl'] . '/' . $_GET['act']; ?></span></h1>
            </div>
            <?php echo showMessage() ?>
            <?php echo CHtml::beginForm('', 'POST', array('class' => 'form-horizontal')); ?>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Meta title</label>
                    <textarea name="meta_title"
                              style="width: 100%; height: 100px"><?php if (!empty($row['meta_title'])) echo $row['meta_title'] ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Meta description</label>
                    <textarea name="meta_description"
                              style="width: 100%; height: 100px"><?php if (!empty($row['meta_description'])) echo $row['meta_description'] ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Meta keywords</label>
                    <textarea name="meta_keywords"
                              style="width: 100%; height: 100px"><?php if (!empty($row['meta_keywords'])) echo $row['meta_keywords'] ?></textarea>
                </div>
            </div>

            <input type="hidden" name="controller_id" readonly="" value="<?php echo $_GET['ctl'] ?>">
            <input type="hidden" name="action_id" readonly="" value="<?php echo $_GET['act'] ?>">

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
