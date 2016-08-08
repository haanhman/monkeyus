<div class="top-nav content-right">
    <nav role="navigation" style="float: right">
        <?php
        $ctl = Yii::app()->controller->id;
        ?>
        <ul>
            <li <?php if ($ctl == 'about') echo 'class="active"'; ?>>
                <a class="ie"
                   href="<?php echo $this->createUrl('about/index') ?>"><?php echo $this->t(2, 'about', 'global') ?></a>
            </li>
            <?php
            if ($this->is_vn) {
                ?>
                <li <?php if ($ctl == 'pricing') echo 'class="active"'; ?>>
                    <a class="ie"
                       href="<?php echo $this->createUrl('pricing/index') ?>"><?php echo $this->t(2, 'pricing', 'global') ?></a>
                </li>
                <li <?php if ($ctl == 'blog') echo 'class="active"'; ?>>
                    <a class="ie"
                       href="<?php echo $this->createUrl('blog/index') ?>"><?php echo $this->t(2, 'blog', 'global') ?></a>
                </li>
                <?php
            }
            ?>
            <li <?php if ($ctl == 'faq') echo 'class="active"'; ?>>
                <a class="ie"
                   href="<?php echo $this->createUrl('faq/index') ?>"><?php echo $this->t(2, 'faq', 'global') ?></a>
            </li>
            <li>
                <a class="ie"
                   href="<?php echo $this->createUrl('about/contact') ?>#contact"><?php echo $this->t(2, 'contact_us', 'global') ?></a>
            </li>
            <?php
            if ($this->is_vn) {
                ?>
                <li>
                    <a class="ie" href="<?php echo $this->createUrl('agent/index') ?>">ĐỐI TÁC</a>
                </li>
                <?php
            }
            $showLanguage = false;
            if ($this->is_vn == 1 | isset($_GET['us'])) {
                $showLanguage = true;
            }
            if ($showLanguage) {
                ?>
                <li class="language">
                    <a class="ie">
                        <?php
                        $flag = $this->is_vn == 1 ? '/images/vi.png' : '/images/en.png';
                        ?>
                        <img src="<?php echo $flag ?>" alt="" style="vertical-align: middle;"/>
                    </a>
                    <i class="sprite sprite-lang_selected"></i>

                    <div class="pricing pricing-language_popup">
                        <div class="inner">
                            <?php
                            if ($this->is_vn) {
                                ?>
                                <img src="/images/en.png" alt=""
                                     style="width: 25px;vertical-align: middle;float: left;"/> <a href="
            <?php echo DOMAIN_US ?>">Tiếng Anh</a>
                                <?php
                            } else {
                                ?>
                                <img src="/images/vi.png" alt=""
                                     style="width: 25px;vertical-align: middle;float: left;"/> <a href="
            <?php echo DOMAIN_VN ?>">Tiếng Việt</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
        <div class="clearfix"></div>
    </nav>

</div>