<?php

ini_set('memory_limit', '-1');
ini_set('zlib_output_compression', 'On');
date_default_timezone_set('Asia/Bangkok');
ini_set('session.cookie_lifetime', 3600 * 5); //thoi gian time out
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);


global $mysql_config, $mysql_address, $us_content;
$us_content = 0;
if ($_SERVER['SERVER_NAME'] == 'www.monkeyjunior.com' | $_SERVER['SERVER_NAME'] == 'monkeyjunior.us' | $_GET['us'] == 1) {
    $us_content = 1;
}

$mysql_address = array(
    'vn1' => 'localhost',
    'vn2' => 'localhost'
);

if ($_SERVER['SERVER_NAME'] == 'www.monkeyjunior.com' | $_SERVER['SERVER_NAME'] == 'mk.com') {
    $mysql_address['vn1'] = 'localhost';
    $us_content = 1;
}


if ($_SERVER['SCRIPT_NAME'] == 'crontab.php') {
    $mysql_address['vn2'] = '127.0.0.1';
}

$mysql_config = array(
    'username' => 'eduuser',
    'password' => 'Eadux23X',
    'db' => 'edu_monkeyjunior',
    'db_global' => 'edu_global',
);

$test = false;
if ($_SERVER['SERVER_NAME'] == 'monkeyjunior.com.vn') {
    $test = true;
}
if ($_GET['test'] == 1) {
    $test = true;
}
if ($test) {
    define('ONEPAY_MERCHANT', 'ONEPAY');
    define('ONEPAY_ACCESSCODE', 'D67342C2');
    define('ONEPAY_SECURE_SECRET', 'A3EFDFABA8653DF2342E8DAC29B51AF0');
    define('ONEPAY_virtualPaymentClientURL', 'https://mtf.onepay.vn/onecomm-pay/vpc.op');

    define('ONEPAY_MERCHANT_VISA', 'TESTONEPAY');
    define('ONEPAY_ACCESSCODE_VISA', '6BEB2546');
    define('ONEPAY_SECURE_SECRET_VISA', '6D0870CDE5F24F34F3915FB0045120DB');
    define('ONEPAY_virtualPaymentClientURL_VISA', 'https://mtf.onepay.vn/vpcpay/vpcpay.op');
} else {
    define('ONEPAY_MERCHANT', 'MONKEYJUNIOR');
    define('ONEPAY_ACCESSCODE', 'L3O21D7N');
    define('ONEPAY_SECURE_SECRET', '8469D64575B47914205F4FA609D51DAE');
    define('ONEPAY_virtualPaymentClientURL', 'https://onepay.vn/onecomm-pay/vpc.op'); //https://mtf.onepay.vn/onecomm-pay/vpc.op
    //VISA
    define('ONEPAY_MERCHANT_VISA', 'MONKEYJUNIOR');
    define('ONEPAY_ACCESSCODE_VISA', '1F8D416D');
    define('ONEPAY_SECURE_SECRET_VISA', '57D26F226015500152230BD05717FDF6');
    define('ONEPAY_virtualPaymentClientURL_VISA', 'https://onepay.vn/vpcpay/vpcpay.op');
}

define('LICENCE_CREATE', 'http://54.187.133.151/pricing/create');
define('CURL_BUYWITHCOUPON', 'http://54.187.133.151/agent/service/buy');
define('CURL_VALIDATE_COUPON', 'http://54.187.133.151/agent/service/validatecoupon');

$compress = false;
if($_SERVER['SERVER_NAME'] != 'monkeyjunior.us') {
    $compress = true;
}
define('MINIFY_HTML', $compress);

define('FACEPAGE', 'https://www.facebook.com/1658165124411579');

define('NOINDEX', false);
define('PROJECT_ENVIRONMENT', $test == false ? 'online' : 'offline');
define('DOMAIN_VN', 'http://www.monkeyjunior.vn');
define('DOMAIN_US', 'http://www.monkeyjunior.com?us=1');

define('ROOT_PATH', dirname(__FILE__));
define('CRM_PATH', ROOT_PATH . '/crm');
define('LIB_PATH', dirname(__FILE__) . '/lib');
define('TEMPLATE_EMAIL', ROOT_PATH . '/temp_mail');
//so ban ghi tren 1 trang
define('PAGE_SIZE', 20);
define('AGENT_SALE', 10);
define('FRAMEWORK_PATH', dirname(__FILE__) . '/framework');
//define('YII_DEBUG', TRUE);
//define('YII_DEBUG', TRUE);
define('YII_DEBUG', $_GET['bug'] == 1 ? TRUE : FALSE);

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

if (YII_DEBUG == TRUE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
}

require_once ROOT_PATH . '/lib/function.php';
// include Yii bootstrap file
//require_once(FRAMEWORK_PATH . '/yii.php');
if (extension_loaded('apc') && ini_get('apc.enabled')) {
    require_once(FRAMEWORK_PATH . '/yiilite.php');
} else {
    require_once(FRAMEWORK_PATH . '/yii.php');
}