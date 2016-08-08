<div class="clearfix"></div>
<div class="footer">
    <div class="grid-container-1100">
        <?php
        if ($this->is_vn == 1) {
            $this->renderPartial('//layouts/monkeyjunior/contact_vn');
        }
        ?>

        <div class="link">
            <div class="url <?php if ($this->is_vn) echo 'vn'; ?>">
                <?php
                $ctl = Yii::app()->controller->id;
                $act = Yii::app()->controller->action->id;
                if ($ctl == 'page' && $act == 'sale') {
                    $this->renderPartial('//layouts/monkeyjunior/menu_sale');
                } else {
                    $this->renderPartial('//layouts/monkeyjunior/menu_chinh');
                }
                ?>
            </div>
            <div class="copyright">
                <p>Copyright &copy; 2015 Early Start • All Right Reserved</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>