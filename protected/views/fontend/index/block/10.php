<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
$ctl = Yii::app()->controller->id;
$buy_url = $this->createUrl('pricing/index');
if($ctl == 'pricing') {
    $buy_url = '#muaban';
}
?>
<div class="buyblock">
    <div class="grid-container-1100" style="padding-top: 75px">
        <div class="heading">
            <em><?php echo $this->t($block, 'heading_1') ?></em>
            <h4><?php echo $this->t($block, 'heading_2') ?></h4>
        </div>
        <div class="downloadbtn">
            <a href="<?php echo $buy_url ?>">
                <i class="sprite sprite-buy_btn"><?php echo $this->t($block, 'btn_text') ?></i>
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>