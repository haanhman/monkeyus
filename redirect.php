<?php
require_once 'lib/Mobile_Detect.php';
$obj = new Mobile_Detect();
if($obj->isMobile() == false && $obj->isTablet() == false) {
    include 'store.php';
    die;
}
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null;
$user_agent = strtolower($user_agent);

if(strpos($user_agent, 'android') !== false) {
    $os = 'android';
}

if(strpos($user_agent, 'iphone') !== false | strpos($user_agent, 'ipad') !== false | strpos($user_agent, 'ipod') !== false) {
    $os = 'ios';
}

if($os == 'android') {
    header('Location:https://play.google.com/store/apps/details?id=com.earlystart.android.monkeyjunior');
}
if($os == 'ios') {
    header('Location:https://itunes.apple.com/us/app/monkey-junior-teach-your-child/id930331514?mt=8');
}