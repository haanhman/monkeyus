<?php
$this->renderPartial('mobile/block/1');
$this->renderPartial('mobile/block/2', array('data' => $data));
$this->renderPartial('mobile/block/3');
$this->renderPartial('//index/mobile/block/10');
$this->renderPartial('mobile/block/faq', array('data' => $data));
$this->renderPartial('//index/mobile/newsletter');
?>
