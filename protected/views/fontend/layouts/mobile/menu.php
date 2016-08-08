<div class="clearfix"></div>
<div class="menu text-center">
    <?php
    $ctl = Yii::app()->controller->id;
    ?>
    <ul class="list-unstyled">
        <li <?php if ($ctl == 'about') echo 'class="active"'; ?>><a
                href="<?php echo $this->createUrl('about/index') ?>"><?php echo $this->t(2, 'about', 'global') ?></a>
        </li>
        <?php
        if ($this->is_vn == 1) {
            ?>
            <li <?php if ($ctl == 'pricing') echo 'class="active"'; ?>><a
                    href="<?php echo $this->createUrl('pricing/index') ?>"><?php echo $this->t(2, 'pricing', 'global') ?></a>
            </li>
            <li <?php if ($ctl == 'blog') echo 'class="active"'; ?>><a
                    href="<?php echo $this->createUrl('blog/index') ?>"><?php echo $this->t(2, 'blog', 'global') ?></a>
            </li>
            <?php
        }
        ?>
        <li <?php if ($ctl == 'faq') echo 'class="active"'; ?>><a
                href="<?php echo $this->createUrl('faq/index') ?>"><?php echo $this->t(2, 'faq', 'global') ?></a></li>
        <li>
            <a href="<?php echo $this->createUrl('about/contact') ?>#contact"><?php echo $this->t(2, 'contact_us', 'global') ?></a>
        </li>
        <?php
        if ($this->is_vn == 1) {
            ?>
            <li <?php if ($ctl == 'agent') echo 'class="active"'; ?>><a
                    href="<?php echo $this->createUrl('agent/index') ?>">ĐỐI TÁC</a></li>
            <?php
        }
        ?>

    </ul>
</div>