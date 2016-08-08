<?php

$fontend_settings = array(
    'defaultController' => 'index',
    'components' => array(
        'urlManager' => array(
            'class' => 'MyUrlManager',
            'showScriptName' => false,
            'urlFormat' => 'path',
            'rules' => array(

                //new monkey web


                'min/css/<g>-<t>' => array('min/css', 'urlSuffix' => '.css'),
                'min/js/<g>-<t>' => array('min/js', 'urlSuffix' => '.js'),
                '/' => 'index/index',
                'refer/coupon-code-<cp:[a-zA-Z0-9\-]+>' => array('coupon/index', 'urlSuffix' => '.html'),
                'faq/<alias:[a-zA-Z0-9\-]+>' => array('faq/faqdetail', 'urlSuffix' => '.html'),
                'faq/topic/<alias:[a-zA-Z0-9\-]+>' => array('faq/faqcategory', 'urlSuffix' => '.html'),
                '/blog.html' => 'blog/index',
                '/blog/<alias:[a-zA-Z0-9\-]+>' => array('blog/detail', 'urlSuffix' => '.html'),
                '/faq.html' => 'faq/index',
                '/bang-gia.html' => 'pricing/index',
                '/dieu-khoan.html' => 'pricing/policy',
                '/ve-chung-toi.html' => 'about/index',
                '/lien-he.html' => 'about/contact',
                '/huong-dan-cai-dat-monkey-junior-tren-pc-laptop.html' => array('page/laptop'),
                '/huong-dan-cai-dat-monkey-junior-tren-thiet-bi-ios.html' => array('page/ios'),
                '/huong-dan-cai-dat-monkey-junior-tren-thiet-bi-android.html' => array('page/android'),
                '/gioi-thieu.html' => array('page/sale'),
                '/tai-mien-phi' => array('page/download'),
                '/tai-mien-phi/' => array('page/download'),
                '/affiliate.html' => array('agent/index'),
                '/affiliate-register.html' => array('agent/register'),
                '/affiliate-adv.html' => array('agent/adv'),
                '<controller>' => '<controller>',
                '<controller>/<action>' => '<controller>/<action>',
            ),
        )
    )
);

if(MINIFY_HTML) {
    $fontend_settings['controllerMap'] = array(
        'min' => array(
            'class' => 'ext.minScript.controllers.ExtMinScriptController',
        )
    );
    $fontend_settings['components']['clientScript'] = array(
        'class' => 'ext.minScript.components.ExtMinScript'
    );
}

//luat danh cho trang tieng anh
global $us_content;
if ($us_content == 1) {
    $rules = array(
        'min/css/<g>-<t>' => array('min/css', 'urlSuffix' => '.css'),
        'min/js/<g>-<t>' => array('min/js', 'urlSuffix' => '.js'),
        '/' => 'index/index',
        'refer/coupon-code-<cp:[a-zA-Z0-9\-]+>' => array('coupon/index', 'urlSuffix' => '.html'),
        'faq/<alias:[a-zA-Z0-9\-]+>' => array('faq/faqdetail', 'urlSuffix' => '.html'),
        'faq/topic/<alias:[a-zA-Z0-9\-]+>' => array('faq/faqcategory', 'urlSuffix' => '.html'),
        '/blog.html' => 'blog/index',
        '/blog/<alias:[a-zA-Z0-9\-]+>' => array('blog/detail', 'urlSuffix' => '.html'),
        '/faq.html' => 'faq/index',
        '/pricing.html' => 'pricing/index',
        '/privacy-policy.html' => 'pricing/policy',
        '/about-us.html' => 'about/index',
        '/contact-us.html' => 'about/contact',
        '/privacy-policy.html' => 'blog/detail',
        '/terms-and-conditions.html' => 'blog/detail',
        '/download' => array('page/download'),
        '/download/' => array('page/download'),
        '<controller>' => '<controller>',
        '<controller>/<action>' => '<controller>/<action>',
    );
    $fontend_settings['components']['urlManager']['rules'] = $rules;
}
return CMap::mergeArray(require(dirname(__FILE__) . '/main.php'), $fontend_settings);
