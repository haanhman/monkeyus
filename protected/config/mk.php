<?php

$backend_settings = array(
    'name' => 'Monkey Junior web',
    'defaultController' => 'index',
    'components' => array(
        'componentConfig' => array(
            'coreMessages' => array(
                'language' => 'vi'
            )
        ),
        'urlManager' => array(
            'class' => 'MyUrlManager',
            'urlFormat' => 'path',
            'rules' => array(                
                'mk' => 'index/index',
                'mk/logs/index' => 'logs/index',
                'mk/logs/fix' => 'logs/fix',
                'mk/logs/<alias:.*?>' => array('logs/detail', 'urlSuffix' => '.html'),
                'mk/<controller>' => '<controller>',
                'mk/<controller>/<action>' => '<controller>/<action>'
            ),
        )
    )
);
return CMap::mergeArray(require(dirname(__FILE__) . '/main.php'), $backend_settings);