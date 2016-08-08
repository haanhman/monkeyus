<?php
if($this->is_vn) {
    $this->renderPartial('mobile/block/1');
} else {
    $this->renderPartial('mobile/block/1us');
}

//$this->renderPartial('//page/sale/mobile/block4');
$this->renderPartial('mobile/block/2');
$this->renderPartial('mobile/block/3');
$this->renderPartial('mobile/block/4');
$this->renderPartial('mobile/block/6');
$this->renderPartial('mobile/block/7');
$this->renderPartial('mobile/block/5');
$this->renderPartial('mobile/block/11');
$this->renderPartial('mobile/block/8');
if($this->is_vn) {
    $this->renderPartial('mobile/block/10');
}
$this->renderPartial('mobile/block/9', array('data' => $data));
//if($this->is_vn) {
//    $this->renderPartial('mobile/block/baochi');
//}
$this->renderPartial('//index/mobile/newsletter');
?>
