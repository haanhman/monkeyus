<?php
$arr = explode('/', __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
$ctl = Yii::app()->controller->id;
$buy_url = $this->createUrl('pricing/index');
if ($ctl == 'pricing') {
    $buy_url = '#muaban';
}
?>
<div class="clearfix"></div>
<div class="buyblock zbg">
    <div class="heading">
        <h4><?php echo $this->t($block, 'heading_1') ?></h4>
        <h3><?php echo $this->t($block, 'heading_2') ?></h3>
    </div>
    <p class="text-center">
        <a href="<?php echo $buy_url ?>">
            <button type="button" class="btn mybtn btn-primary btn-lg"><?php echo $this->t($block, 'btn_text') ?></button>
        </a>
    </p>
    <div class="clearfix"></div>
</div>