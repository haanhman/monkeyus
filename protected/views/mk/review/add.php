<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>Thêm mới/Sửa review</h1>
            </div>
            <?php $form = $data['form']; ?>
            <?php echo CHtml::beginForm('', 'POST', array('class' => 'form-horizontal')); ?>
            <?php
            $row = isset($data['row']) ? $data['row'] : array();
            ?>

            <div class="form-group">                                
                <div class="col-sm-12">             
                    <label class="control-label">Tên</label>
                    <input type="text" name="name" value="<?php if (!empty($row['name'])) echo CHtml::encode($row['name']) ?>" style="width: 100%" />
                </div>
            </div> 
            <div class="form-group">                                
                <div class="col-sm-12">             
                    <label class="control-label">Bé bao tuổi</label>
                    <input type="text" name="child_age" value="<?php if (!empty($row['child_age'])) echo CHtml::encode($row['child_age']) ?>" style="width: 100%" />
                </div>
            </div>
            <div class="form-group">                                
                <div class="col-sm-12">             
                    <label class="control-label">Quốc gia</label>
                    <input type="text" name="country" value="<?php if (!empty($row['country'])) echo CHtml::encode($row['country']) ?>" style="width: 100%" />
                </div>
            </div>
            <div class="form-group">                                
                <div class="col-sm-12">              
                    <label class="control-label">Nội dung</label>
                    <textarea name="content" style="width: 100%; height: 100px;"><?php if (!empty($row['content'])) echo $row['content'] ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Giới tính</label>
                    <br />
                    <select name="gender">
                        <?php
                        $gender = isset($row['gender']) ? intval($row['gender']) : 0;
                        ?>
                        <option <?php if ($gender === 1) echo 'selected=""'; ?> value="1">Nam</option>
                        <option <?php if ($gender === 0) echo 'selected=""'; ?> value="0">Nữ</option>
                    </select>
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