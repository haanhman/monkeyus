<?php

class MyUrlManager extends CUrlManager {

    public function createUrl($route, $params = array(), $ampersand = '&') {  
//        if (isset($params['id']) && is_numeric($params['id'])) {
//            $params['id'] = hexID($params['id']);
//        }        
        if(isset($_GET['us'])) {
            $params['us'] = 1;
        }
        if(isset($_GET['mobile'])) {
            $params['mobile'] = 1;
        }
        if(isset($_GET['coupon'])) {
            $params['coupon'] = strtoupper(trim($_GET['coupon']));
        }

        return parent::createUrl($route, $params, $ampersand);
    }    
}
?>