<?php
$this->renderPartial('sale/block1');
$this->renderPartial('sale/block2');
$this->renderPartial('sale/block3');
//$this->renderPartial('sale/block4');
$this->renderPartial('//index/block/9', array('data' => $data));
$this->renderPartial('sale/gioithieugia',array('data' => $data));
$this->renderPartial('sale/formdangky');
$this->renderPartial('sale/chinhsach');
$this->renderPartial('sale/muaonline',array('data' => $data));
$this->renderPartial('//pricing/faq', array('data' => $data));
$this->renderPartial('sale/fb_comment');
?>






