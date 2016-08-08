<?php
include 'lib/Mobile_Detect.php';
$mobile = new Mobile_Detect();
$isMobile = $mobile->isMobile();
$isAndroidOS = $mobile->is('AndroidOS');
var_dump($isMobile);
echo '<hr />';
echo 'isAndroidOS: ';
var_dump($isAndroidOS);
echo '<hr />';

$isiOS = $mobile->is('iOS');
echo 'iOS: ';
var_dump($isiOS);
echo '<pre>' . print_r($mobile, true) . '</pre>';
die;