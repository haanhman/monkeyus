<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author anhmantk
 */
class PageController extends FontendController
{
    public $coupon;

    public function init()
    {
        parent::init();
        $coupon = trim($_GET['coupon']);

        if (empty($coupon)) {
            if ($_SERVER['SERVER_NAME'] == 'monkeyjunior.com.vn') {
                $coupon = 'XA8G2';
            } else {
                $coupon = '1FB10';
            }
        }
        $coupon = strtoupper($coupon);

        if (!empty($coupon)) {
            $url = CURL_VALIDATE_COUPON . '?json=1&coupon=' . $coupon;
            $response = $this->cURLLicence($url);
            if ($response['status'] == -1) {
                $this->redirect($this->createUrl('page/sale'));
            } else {
                $this->coupon = $coupon;
            }
        }

        $this->layout = 'singlepage';
        if ($this->is_mobile == 1) {
            $this->layout = 'singlepage_mobile';
        }
    }

    /**
     * @meta 1
     */
    public function actionSubscribe()
    {
        $data = array();

        $view = 'subscribe';
        if ($this->is_mobile) {
            $view = 'mobile/subscribe';
        }
        $this->render($view, array('data' => $data));
    }

    public function actionUpdate()
    {
        $data = array();
        $view = 'update';
        if ($this->is_mobile) {
            $view = 'mobile/update';
        }
        $this->render($view, array('data' => $data));
    }

    /**
     * @meta 1
     */
    public function actionThank()
    {
        $data = array();
        $view = 'thankyou';
        if ($this->is_mobile) {
            $view = 'mobile/thankyou';
        }
        $this->render($view, array('data' => $data));
    }

    /**
     * @meta 1
     */
    public function actionEbook()
    {
        $data = array();
        $view = 'ebook';
        if ($this->is_mobile) {
            $view = 'mobile/ebook';
        }
        $this->render($view, array('data' => $data));

    }

    public function actionSale()
    {
        //Monkey Junior - Chương trình dạy bé 0-6 tuổi học đọc và ngoại ngữ
        $data = array();
        //lay danh sach review
        $query = "SELECT name, gender, content, child_age, country FROM tbl_review WHERE status = 1 ORDER BY weight";
        $list = $this->db->createCommand($query)->queryAll();
        $data['review'] = array_chunk($list, 2);

        $query = "SELECT * FROM tbl_faqs WHERE cate_id = 2 ORDER BY weight";
        $data['faq'] = $this->db->createCommand($query)->queryAll();

        //lay thong tin goi tien
        $data['package'] = array();
        if (!file_exists(ROOT_PATH . '/sync/sync_price.json')) {
            if (ROOT_PATH . '/sync') {
                mkdir(ROOT_PATH . '/sync');
            }
            $this->actionSyncPrice();
        }

        if (file_exists(ROOT_PATH . '/sync/sync_price.json')) {
            $response = file_get_contents(ROOT_PATH . '/sync/sync_price.json');
            $response = json_decode($response, true);

            foreach ($response as $index => $item) {
                if ($item['product_id'] == 'com.earlystart.alllanguage') {
                    tinhToanTienAo($item);
                    $item['product_name'] = 'Tất cả các ngôn ngữ';
                    $data['package']['all'] = $item;
                }
                if ($item['product_id'] == 'com.earlystart.us.full') {
                    tinhToanTienAo($item);
                    $item['product_name'] = 'Ngôn ngữ Tiếng Anh';
                    $data['package']['full'] = $item;
                }


            }
        }
        unset(Yii::app()->session['thongtinmua']);

        $view = 'sale';
        if ($this->is_mobile) {
            $view = 'mobile/sale';
        }

        $this->setMetaTitle('Monkey Junior - Chương trình dạy bé 0-6 tuổi học đọc và ngoại ngữ - Giảm giá 40%');
        $this->setMetaDescription('Monkey Junior cung cấp hệ thống các bài học trên thiết bị di động giúp bé học đọc và học ngôn ngữ. Bé học hàng ngày, mọi lúc, mọi nơi. Chương trình giảm giá đặc biệt');
        $this->setMetaKeywords('monkey junior, chương trình học, tiếng anh, ứng dụng di động, giảm giá, bé 0-6 tuổi');
        $this->render($view, array('data' => $data));
    }


    public function actionBuy()
    {
        $method = isset($_POST['method']) ? intval($_POST['method']) : 1;
        $package = $this->getProductInfo($_POST['product_id']);
        tinhToanTienAo($package);
        $price = $package['giam30'];
        if (!empty($this->coupon)) {
            $price = $package['giam40'];
        }
        $values = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'payment_method' => $method,
            'product_id' => $_POST['product_id'],
            'price' => $package['tienvn'],
            'total' => 1,
            'total_price' => $price,
            'total_price_2' => number_format($price, 0, '', ',') . ' đ',
            'ip' => ip_address(),
            'created' => time(),
            'coupon_code' => $this->coupon
        );
        yii_insert_row('orders', $values);
        $order_id = $this->db->lastInsertID;
        $values['order_id'] = $order_id;
        Yii::app()->session['thongtinmua'] = $values;
        echo $this->createUrl('pay/index', array('coupon' => $this->coupon, 'method' => $method, 'product_id' => $_POST['product_id']));
    }

    public function actionLaptop()
    {
        $this->setMetaTitle('Hướng dẫn cài đặt Monkey Junior trên PC, laptop');
        $view = 'laptop';
        if ($this->is_mobile) {
            $view = 'mobile/laptop';
        }
        $this->render($view);
    }

    public function actionIos()
    {
        $this->setMetaTitle('Hướng dẫn cài đặt Monkey Junior trên thiết bị iOS');
        $view = 'ios';
        if ($this->is_mobile) {
            $view = 'mobile/ios';
        }
        $this->render($view);
    }

    public function actionAndroid()
    {
        $this->setMetaTitle('Hướng dẫn cài đặt Monkey Junior trên thiết bị Android');
        $view = 'android';
        if ($this->is_mobile) {
            $view = 'mobile/android';
        }
        $this->render($view);
    }

    public function actionDownload()
    {
        global $us_content;
//        title,meta_desc,meta_keyword
        $this->getTranslateText();
        $this->setMetaTitle($this->t(6, 'title', 'page'));
        $this->setMetaDescription($this->t(6, 'meta_desc', 'page'));
        $this->setMetaKeywords($this->t(6, 'meta_keyword', 'page'));

        $view = 'download';
        if ($this->is_mobile) {
            $view = 'mobile/download';
        } else {
            $this->layout = 'main';
        }

        $data = array();
        $data['os'] = $this->getOS();
        $this->render($view, array('data' => $data));

    }

    private function getOS()
    {

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $os_platform = "Unknown OS Platform";

        $os_array = array(
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );
        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }
        return $os_platform;
    }

}
