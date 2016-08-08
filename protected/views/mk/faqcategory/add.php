<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>Thêm mới/Sửa danh mục FAQs</h1>
            </div>           
            <?php echo CHtml::beginForm('', 'POST', array('class' => 'form-horizontal')); ?>
            <?php
            $row = isset($data['row']) ? $data['row'] : array();
            ?>

            <div class="form-group">                                
                <div class="col-sm-12">             
                    <label class="control-label">Tên danh mục</label>
                    <input type="text" name="name" value="<?php if (!empty($row['name'])) echo CHtml::encode($row['name']) ?>" style="width: 100%" />
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