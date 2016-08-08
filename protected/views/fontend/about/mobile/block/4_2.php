<?php
$arr = explode('/', __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="clearfix"></div>
<div class="zbg">
    <div class="llight"></div>
    <div class="rlight"></div>
    <div class="about_block4 ptop">
        <div class="col-xs-12">
            <div class="title text-center">
                <h2><?php echo $this->t($block, 'heading_1', 'about') ?></h2>
                <img src="/monkeyweb/mobile/images/line.png">
            </div>

            <h3><?php echo $this->t($block, 'group_1', 'about') ?>:</h3>
            <ul class="people list-unstyled">

                <?php
                $arr = array(
                    array(
                        'avatar' => '1.png',
                        'name' => 'Amanda Coffin',
                        'country' => $this->is_vn ? 'United States' : 'Early education expert'
                    ),
                    array(
                        'avatar' => '2.png',
                        'name' => 'Michael Paul',
                        'country' => $this->is_vn ? 'United States' : 'Educator'
                    ),
                    array(
                        'avatar' => '3.png',
                        'name' => 'Ric Santos',
                        'country' => $this->is_vn ? 'United States' : 'Educator'
                    ),
                    array(
                        'avatar' => '4.png',
                        'name' => 'Ellen Cribbs',
                        'country' => $this->is_vn ? 'United States' : 'Artist'
                    ),
                    array(
                        'avatar' => '10.png',
                        'name' => 'Aline Raynal',
                        'country' => $this->is_vn ? 'France' : 'Educator'
                    )
                );
                foreach ($arr as $item) {
                    ?>
                    <li class="col-xs-6">
                        <div class="row">
                            <div class="avatar">
                                <img src="/monkeyweb/images/team/<?php echo $item['avatar'] ?>"
                                     alt="<?php echo CHtml::encode($item['name']) ?>"/>
                            </div>
                            <div class="info">
                                <strong><?php echo $item['name'] ?></strong>
                                <address><?php echo $item['country'] ?></address>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>

            <div class="clearfix"></div>
            <h2><?php echo $this->t($block, 'group_2', 'about') ?>:</h2>
            <ul class="people list-unstyled">
                <?php
                $arr = array(
                    array(
                        'avatar' => '6.png',
                        'name' => $this->is_vn ? 'Nguyễn Văn Mận' : 'Man Le',
                        'country' => $this->is_vn ? 'Vietnam' : 'CTO'
                    ),
                    array(
                        'avatar' => '5.png',
                        'name' => 'Andy Tran',
                        'country' => $this->is_vn ? 'Vietnam' : 'Designer'
                    ),
                    array(
                        'avatar' => '7.png',
                        'name' => $this->is_vn ? 'Lê Khắc Sơn' : 'Son Le',
                        'country' => $this->is_vn ? 'Vietnam' : 'Developer'
                    ),
                    array(
                        'avatar' => '11.png',
                        'name' => $this->is_vn ? 'Nguyễn Thu Hiền' : 'Hien Nguyen',
                        'country' => $this->is_vn ? 'Vietnam' : 'Tester'
                    )
                );

                foreach ($arr as $item) {
                    ?>
                    <li class="col-xs-6">
                        <div class="row">
                            <div class="avatar">
                                <img src="/monkeyweb/images/team/<?php echo $item['avatar'] ?>"
                                     alt="<?php echo CHtml::encode($item['name']) ?>"/>
                            </div>
                            <div class="info">
                                <strong><?php echo $item['name'] ?></strong>
                                <address><?php echo $item['country'] ?></address>
                            </div>
                        </div>
                    </li>
                    <?php
                }

                ?>
            </ul>
            <div class="clearfix"></div>
            <h3><?php echo $this->t($block, 'group_3', 'about') ?>:</h3>
            <ul class="people list-unstyled">
                <?php
                $arr = array(
                    array(
                        'avatar' => '8.png',
                        'name' => $this->is_vn ? 'Xuyên Trần' : 'Xuyen Tran',
                        'country' => $this->is_vn ? 'Vietnam' : 'Customer Support<br />Specialist'
                    ),
                    array(
                        'avatar' => '9.png',
                        'name' => 'Sophia Nguyen',
                        'country' => $this->is_vn ? 'Vietnam' : 'Customer Support<br />Specialist'
                    )
                );
                foreach ($arr as $item) {
                    ?>
                    <li class="col-xs-6">
                        <div class="row">
                            <div class="avatar">
                                <img src="/monkeyweb/images/team/<?php echo $item['avatar'] ?>"
                                     alt="<?php echo CHtml::encode($item['name']) ?>"/>
                            </div>
                            <div class="info">
                                <strong><?php echo $item['name'] ?></strong>
                                <address><?php echo $item['country'] ?></address>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <div class="clearfix"></div>
            <h2 class="text-center"><?php echo $this->t($block, 'group_4', 'about') ?>:</h2>

            <div class="ceo-avatar text-center">
                <img src="/monkeyweb/images/new/avatar.png">
            </div>

            <div class="ceocontent">
                <p class="text-center">
                    <strong class="name"><?php echo $this->is_vn ? 'Đào Xuân Hoàng' : 'Hoang Dao Xuan'; ?></strong>
                    <?php
                    if ($this->is_vn) {
                        echo '<br /><em>Vietnam</em>';
                    }
                    ?>
                </p>

                <div class="text lead">
                    <?php echo nl2br($this->t($block, 'text', 'about')) ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>