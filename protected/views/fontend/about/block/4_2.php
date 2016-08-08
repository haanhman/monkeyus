<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<div class="lightbox team-about">
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="grid-container-800">
        <div class="inner">
            <div class="heading">
                <h2><?php echo $this->t($block, 'heading_1', 'about') ?></h2>
                <img src="/monkeyweb/images/new/about_line_2.png">
            </div>

            <h3><?php echo $this->t($block, 'group_1', 'about') ?>:</h3>
            <ul class="people">
                <li>
                    <div class="ct">
                        <div class="hinhanh">
                            <img src="/monkeyweb/images/team/1.png" alt=""/>
                        </div>
                        <div class="info">
                            <div class="in">
                                <strong class="name">Amanda Coffin</strong>
                                <em><?php echo $this->is_vn ? 'United States' : 'Early education expert'; ?></em>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <li class="right">
                    <div class="ct">
                        <div class="hinhanh">
                            <img src="/monkeyweb/images/team/2.png" alt=""/>
                        </div>
                        <div class="info">
                            <div class="in">

                                <strong class="name">Michael Paul </strong>
                                <em><?php echo $this->is_vn ? 'England' : 'Educator'; ?></em>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <li>
                    <div class="ct">
                        <div class="hinhanh">
                            <img src="/monkeyweb/images/team/3.png?v=1" alt=""/>
                        </div>
                        <div class="info">
                            <div class="in">
                                <strong class="name">Ric Santos</strong>
                                <em><?php echo $this->is_vn ? 'United States' : 'Educator'; ?></em>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <li class="right">
                    <div class="ct">
                        <div class="hinhanh">
                            <img src="/monkeyweb/images/team/4.png" alt=""/>
                        </div>
                        <div class="info">
                            <div class="in">
                                <strong class="name">Ellen Cribbs</strong>
                                <em><?php echo $this->is_vn ? 'United States' : 'Artist'; ?></em>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <li>
                    <div class="ct">
                        <div class="hinhanh">
                            <img src="/monkeyweb/images/team/10.png" alt=""/>
                        </div>
                        <div class="info">
                            <div class="in">
                                <strong class="name">Aline Raynal</strong>
                                <em><?php echo $this->is_vn ? 'France' : 'Educator'; ?></em>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
            </ul>

            <div class="clearfix"></div>
            <h3><?php echo $this->t($block, 'group_2', 'about') ?>:</h3>
            <ul class="people">

                <li>
                    <div class="ct">
                        <div class="hinhanh">
                            <img src="/monkeyweb/images/team/6.png" alt=""/>
                        </div>
                        <div class="info">
                            <div class="in">

                                <strong class="name"
                                        style="font-size: 19px"><?php echo $this->is_vn ? 'Nguyễn Văn Mận' : 'Man Le'; ?></strong>
                                <em><?php echo $this->is_vn ? 'Vietnam' : 'CTO'; ?></em>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <li class="right">
                    <div class="ct">
                        <div class="hinhanh">
                            <img src="/monkeyweb/images/team/5.png" alt=""/>
                        </div>
                        <div class="info">
                            <div class="in">
                                <strong class="name">Andy Tran</strong>
                                <em><?php echo $this->is_vn ? 'Vietnam' : 'Designer'; ?></em>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <li>
                    <div class="ct">
                        <div class="hinhanh">
                            <img src="/monkeyweb/images/team/7.png" alt=""/>
                        </div>
                        <div class="info">
                            <div class="in">
                                <strong class="name"><?php echo $this->is_vn ? 'Lê Khắc Sơn' : 'Son Le'; ?></strong>
                                <em><?php echo $this->is_vn ? 'Vietnam' : 'Developer'; ?></em>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <li class="right">
                    <div class="ct">
                        <div class="hinhanh">
                            <img src="/monkeyweb/images/team/11.png" alt=""/>
                        </div>
                        <div class="info">
                            <div class="in">
                                <strong class="name"
                                        style="font-size: 18px;"><?php echo $this->is_vn ? 'Nguyễn Thu Hiền' : 'Hien Nguyen'; ?></strong>
                                <em><?php echo $this->is_vn ? 'Vietnam' : 'Tester'; ?></em>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
            </ul>
            <div class="clearfix"></div>
            <h3><?php echo $this->t($block, 'group_3', 'about') ?>:</h3>
            <ul class="people">
                <li>
                    <div class="ct">
                        <div class="hinhanh">
                            <img src="/monkeyweb/images/team/8.png" alt=""/>
                        </div>
                        <div class="info">
                            <div class="in">
                                <strong class="name"><?php echo $this->is_vn ? 'Xuyên Trần' : 'Xuyen Tran'; ?></strong>
                                <em><?php echo $this->is_vn ? 'Vietnam' : 'Customer Support Specialist'; ?></em>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <li class="right">
                    <div class="ct">
                        <div class="hinhanh">
                            <img src="/monkeyweb/images/team/9.png" alt=""/>
                        </div>
                        <div class="info">
                            <div class="in">

                                <strong class="name">Sophia Nguyen</strong>
                                <em style="width: 220px;display: block;"><?php echo $this->is_vn ? 'Vietnam' : 'Customer Support Specialist'; ?></em>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
            </ul>
            <div class="clearfix"></div>
            <h2><?php echo $this->t($block, 'group_4', 'about') ?>:</h2>

            <div class="avatar">
                <img src="/monkeyweb/images/new/avatar.png">
            </div>

            <div class="ceocontent">
                <p>
                    <strong class="name"><?php echo $this->is_vn ? 'Đào Xuân Hoàng' : 'Hoang Dao Xuan'; ?></strong>
                    <?php
                    if ($this->is_vn) {
                        echo '<em>Vietnam</em>';
                    }
                    ?>
                </p>
                <br/>

                <div class="text">
                    <?php echo nl2br($this->t($block, 'text', 'about')) ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>