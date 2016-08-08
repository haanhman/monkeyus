<div class="navbar-container" id="navbar-container">
    <div class="navbar-header pull-left">
        <a style="display: block; float: left;" href="<?php echo $this->createUrl('index/index') ?>" class="navbar-brand">
            <small>
                <i class="icon-archive"></i> <?php echo Yii::app()->name ?>
            </small>
        </a>
    </div>
    <div class="navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">                        
            <li class="light-blue">
                <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                    <img class="nav-user-photo" src="<?php echo base_url() ?>/public/admin/img/profile.png"
                         alt="<?php echo CHtml::encode($this->user['fullname']) ?>"/>
                    <span class="user-info"><?php echo $this->user['fullname'] ?></span>                    
                </a>               
            </li>
        </ul>
    </div>
</div>