<?php

$min_libPath = dirname(__FILE__);
set_include_path($min_libPath . PATH_SEPARATOR . get_include_path());
function replace_tabs_newlines($content) {
    
    require_once 'Minify/HTML.php';
    require_once 'Minify/CSS.php';
    require_once 'JSMin.php';    
    $content = Minify_HTML::minify($content, array(
            'cssMinifier' => array('Minify_CSS', 'minify'),
            'jsMinifier' => array('JSMin', 'minify'),
            'xhtml' => true,
        ));        
    return $content;
}	