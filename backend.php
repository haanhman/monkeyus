<?php

require_once 'define.php';
$global = strpos($_SERVER['REQUEST_URI'], '/global');
$mk = strpos($_SERVER['REQUEST_URI'], '/mk');
$end = 'backend';
$config = ROOT_PATH . '/protected/config/backend.php';
if ($global === 0) {
    $config = ROOT_PATH . '/protected/config/global.php';
    $end = 'global';
} elseif ($mk === 0) {
    $config = ROOT_PATH . '/protected/config/mk.php';
    $end = 'mk';
}
Yii::createWebApplication($config)->runEnd($end);
