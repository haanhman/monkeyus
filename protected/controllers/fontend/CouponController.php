<?php

/**
 * Created by PhpStorm.
 * User: anhmantk
 * Date: 2/3/16
 * Time: 8:27 AM
 */
class CouponController extends FontendController {

    public function init() {
        parent::init();
        $this->layout = 'coupon';
        if ($this->is_mobile) {
            $this->layout = 'coupon_mobile';
        }
    }

    //put your code here
    public function actionIndex() {
        $this->noIndex = true;



        $coupon = strtoupper($_GET['cp']);
        $url = CURL_VALIDATE_COUPON . '?json=1&coupon=' . $coupon;
        $response = $this->cURLLicence($url);
        if ($response['status'] != 1) {
            $this->redirect($this->createUrl('index/index'));
        }
        $data['name'] = ucwords($response['name']);
        $data['coupon'] = $coupon;
        
        $cookie = new CHttpCookie('coupon_code_cookie', $coupon);
        $cookie->expire = time() + (3600 * 24 * 30);
        Yii::app()->request->cookies['coupon_code_cookie'] = $cookie;

        $meta_title = 'Mã giảm giá ' . $data['coupon'] . ' 40% - Monkey Junior';
        $meta_description = $data['name'] . ' mời bạn dùng thử chương trình học ngoại ngữ cho trẻ em Monkey Junior - Chương trình được tin dùng bởi nữa triệu người dùng trên toàn thế giới.';


        $view = 'index';
        if (!$this->is_vn) {
            $meta_title = 'Coupon code ' . $data['coupon'] . ' 40% OFF - Monkey Junior';
            $meta_description = $data['name'] . ' invited you to try Monkey Junior - #1 popular learn to read app on App Store and Google Play';
        }
        $this->setMetaTitle($meta_title);
        $this->setMetaDescription($meta_description);

        if ($this->is_mobile) {
            $view = $view . '_mobile';
        }
        if ($_GET['us'] == 1) {
            $view = $view . '_us';
        }
        $data['expried'] = false;
        if($response['expried'] <= 0) {
            $data['expried'] = true;
        } else {
            $expried = time() + $response['expried'];            
            $data['exprie'] = date('Y/m/d H:i:s', $expried);
        }        
        
        $this->render($view, array('data' => $data));
    }

}
