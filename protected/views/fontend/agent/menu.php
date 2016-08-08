<div class="top-nav content-right menu-agent">
    <?php
    if (Yii::app()->controller->action->id == 'index') {
        ?>
        <button data-backdrop="static" data-toggle="modal" data-target="#form_dang_ky" class="btn btn-success"
                style="margin-top: 25px;">
            Đăng ký
        </button>

        <?php
    }
    ?>


</div>