<link rel="stylesheet" href="/public/admin/css/tiles.css"/>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1><?php echo Yii::app()->name ?></h1>
            </div>
            <div class="tiles">
                <a href="<?php echo $this->createUrl('translate/index', array('page' => 'index', 'max' => 11)) ?>">
                    <div class="tile bg-green-meadow">
                        <div class="tile-body">
                            <i class="icon-cog"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name">Translate</div>
                            <div class="number">&nbsp;</div>
                        </div>
                    </div>
                </a>
                <a href="<?php echo $this->createUrl('faq/index') ?>">
                    <div class="tile bg-green-meadow">
                        <div class="tile-body">
                            <i class="icon-question"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name">FAQs</div>
                            <div class="number">&nbsp;</div>
                        </div>
                    </div>
                </a>
                <a href="<?php echo $this->createUrl('order/index') ?>">
                    <div class="tile bg-red-sunglo">
                        <div class="tile-body">
                            <i class="icon-shopping-cart"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name">Order</div>
                            <div class="number"><?php echo $data['total_order'] ?></div>
                        </div>
                    </div>
                </a>
                <a href="<?php echo $this->createUrl('contact/index') ?>">
                    <div class="tile bg-red-sunglo">
                        <div class="tile-body">
                            <i class="icon-comments"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name">Contact</div>
                            <div class="number"><?php echo $data['total_contact'] ?></div>
                        </div>
                    </div>
                </a>
                <a href="<?php echo $this->createUrl('meta/index') ?>">
                    <div class="tile bg-red-sunglo">
                        <div class="tile-body">
                            <i class="icon-cog"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name">Meta tags</div>
                            <div class="number"></div>
                        </div>
                    </div>
                </a>
                <a href="<?php echo $this->createUrl('agent/index') ?>">
                    <div class="tile bg-red-sunglo">
                        <div class="tile-body">
                            <i class="icon-user"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name">Đối tác</div>
                            <div class="number"><?php echo $data['total_doitac'] ?></div>
                        </div>
                    </div>
                </a>
                <a href="<?php echo $this->createUrl('subscribe/index') ?>">
                    <div class="tile bg-red-sunglo">
                        <div class="tile-body">
                            <i class="icon-user"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name">subscribe</div>
                            <div class="number"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
