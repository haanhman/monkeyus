<ul>
    <li>
        <a href="<?php echo $this->createUrl('about/index') ?>"><?php echo $this->t(2, 'about', 'global') ?></a>
        •
    </li>
    <?php
    if ($this->is_vn) {
        ?>
        <li>
            <a href="<?php echo $this->createUrl('pricing/index') ?>"><?php echo $this->t(2, 'pricing', 'global') ?></a>
            •
        </li>
        <li>
            <a href="<?php echo $this->createUrl('blog/index') ?>"><?php echo $this->t(2, 'blog', 'global') ?></a>
            •
        </li>
        <?php
    }
    ?>
    <li>
        <a href="<?php echo $this->createUrl('faq/index') ?>"><?php echo $this->t(2, 'faq', 'global') ?></a>
        •
    </li>
    <li>
        <a href="<?php echo $this->createUrl('about/contact') ?>#contact"><?php echo $this->t(2, 'contact_us', 'global') ?></a>
        •
    </li>
    <?php
    if ($this->is_vn) {
        ?>
        <li>
            <a href="<?php echo $this->createUrl('about/contact') ?>#contact">ĐỐI TÁC</a>
            •
        </li>
        <?php
    } else {
        ?>
        <li>
            <a href="/privacy-policy.html">Privacy Policy</a>
            •
        </li>
        <li>
            <a href="/terms-and-conditions.html">Terms and conditions</a>
            •
        </li>
        <?php
    }
    ?>


</ul>