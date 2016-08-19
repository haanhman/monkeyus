<?php
//Phương pháp học đa giác quan>Bách khoa toàn thư cho bé>Các trò chơi đa dạng và hấp dẫn
$this->renderPartial('block/1', array('data' => $data));
//$this->renderPartial('//page/sale/block4');
$this->renderPartial('block/2');
$this->renderPartial('block/3');
$this->renderPartial('block/4');
$this->renderPartial('block/6');
$this->renderPartial('block/7');
$this->renderPartial('block/5');
$this->renderPartial('block/11');
$this->renderPartial('block/8');
if($this->is_vn) {
    $this->renderPartial('block/10');
}
$this->renderPartial('block/9', array('data' => $data));
//if($this->is_vn) {
//    $this->renderPartial('block/baochi');
//}
$this->renderPartial('//index/include/newsletter');
?>