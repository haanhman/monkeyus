<?php

//require LIB_PATH  . '/PayPal/autoload.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author anhmantk
 */
class PricingController extends OnepayController
{

    public $coupon;

    public function init()
    {
        parent::init();
        if ($this->is_vn == 0) {
            $this->redirect($this->createUrl('index/index'));
        }
        $coupon = trim($_GET['coupon']);
        $coupon = strtoupper($coupon);
        if (!empty($coupon)) {
            $url = CURL_VALIDATE_COUPON . '?json=1&coupon=' . $coupon;
            $response = $this->cURLLicence($url);
            if ($response['status'] == -1) {
                $this->redirect($this->createUrl('pricing/index'));
            } else {
                $this->coupon = $coupon;
            }
        }
    }

    public function actionCheckCoupon()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $coupon = trim($_POST['coupon']);
            $json = array();
            if (!empty($coupon)) {
                $coupon = strtoupper($coupon);
                $url = CURL_VALIDATE_COUPON . '?json=1&coupon=' . $coupon;
                $response = $this->cURLLicence($url);
                if ($response['status'] != 1) {
                    $json['status'] = -1;
                } else {
                    Yii::app()->session['nhapmagiamgia'] = 1;
                    $json['status'] = 1;
                    $json['url'] = $this->createAbsoluteUrl('index', array('coupon' => $coupon));
                }
            }
            echo json_encode($json);
        }
    }

    /**
     * @meta 1
     */
    public function actionIndex()
    {
        $data = array();
        $query = "SELECT * FROM tbl_faqs WHERE cate_id = 2 ORDER BY weight";
        $data['faq'] = $this->db->createCommand($query)->queryAll();

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
                tinhToanTienAo($item);
                $response[$index] = $item;
            }


            $package = array();
            foreach ($response as $item) {
                $price = empty($this->coupon) ? $item['giam30'] : $item['giam40'];
                $row = array(
                    'product_name' => $item['product_name'],
                    'product_id' => $item['product_id'],
                    'price' => number_format($price, 0, '', ',') . ' đ',
                    'tien' => $item['giam30'],
                    'description' => array_filter(explode("\n", $item['content_vn'])),
                    'tien_2' => number_format($item['tienao'], 0, '', ',') . ' đ',
                    'tien_ao' => $item['tienao']
                );
                $package[$item['product_id']] = $row;
            }
            $data['goitien'] = array();
            foreach ($this->active_language as $lang) {
                $code = $lang['code'];
                $pid = 'com.earlystart.' . $code . '.single';
                $data['package'][$code]['single'] = $package[$pid];
                $data['goitien'][$pid] = array(
                    'name' => $package[$pid]['product_name'],
                    'tien' => $package[$pid]['tien']
                );

                $pid = 'com.earlystart.' . $code . '.full';
                $data['package'][$code]['full'] = $package[$pid];
                $data['goitien'][$pid] = array(
                    'name' => $package[$pid]['product_name'],
                    'tien' => $package[$pid]['tien']
                );
            }
            $pid = 'com.earlystart.alllanguage';
            $data['package']['all'] = $package[$pid];
            $data['goitien'][$pid] = array(
                'name' => $package[$pid]['product_name'],
                'tien' => $package[$pid]['tien']
            );
        }
        $this->changePackageName($data['goitien']);


        $this->render_meta = true;
        if (Yii::app()->session['buyInfo']) {
            unset(Yii::app()->session['buyInfo']);
        }
        if (Yii::app()->session['method']) {
            unset(Yii::app()->session['method']);
        }

        if (!empty($this->coupon)) {
            Yii::app()->session['buyInfo'] = array('coupon' => $this->coupon);
        }

        $view = 'index';
        if ($this->is_mobile) {
            $view = 'mobile/index';
        }

        $data['coupon_code_cookie'] = Yii::app()->request->cookies['coupon_code_cookie'];

        $this->render($view, array('data' => $data));
    }

    private function changePackageName(&$list_package)
    {
        $this->getTranslateText();
        foreach ($list_package as $pk => $item) {
            if ($pk == 'com.earlystart.alllanguage') {
                $list_package[$pk]['name'] = $this->t(3, 'all_heading', 'pricing');
            } else {
                $arr = explode('.', $pk);
                $code = $arr[2];
                $type = $arr[3];
                $title = '';
                if ($type == 'single') {
                    $title = $this->t(3, 'single_heading', 'pricing');
                } elseif ($type == 'full') {
                    $title = $this->t(3, 'full_heading', 'pricing');
                }
                $langname = $this->active_language[$code]['name'];
                if ($this->is_vn == 1) {
                    $langname = $this->active_language[$code]['name_vn'];
                }
                $title .= ': ' . $langname;
                $list_package[$pk]['name'] = $title;
            }
        }
    }

    private function actionSyncPrice()
    {
        $url = 'http://54.187.133.151/faq/pricejson';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1');
        $response = curl_exec($ch);
        if (!empty($response)) {
            file_put_contents(ROOT_PATH . '/sync/sync_price.json', $response);
        }
    }

    public function actionAddOrder()
    {
        $info = Yii::app()->session['buyInfo'];
        $coupon = '';
        if (!empty($info['coupon'])) {
            $coupon = $info['coupon'];
        }
        $std = new stdClass();
        $std->status = 1;
        $params = $_POST;
        $oid = $params['oid'];
        if ($oid == 0) {
            $values = array(
                'name' => $params['name'],
                'email' => $params['email'],
                'phone' => $params['phone'],
                'address' => $params['address'],
                'product_id' => $params['pid'],
                'payment_method' => $params['method'],
                'ip' => ip_address(),
                'created' => time(),
                'coupon_code' => $coupon,
                'is_import' => 0
            );
            yii_insert_row('orders', $values);
            $std->order_id = $this->db->lastInsertID;
        } else {
            $query = "SELECT * FROM tbl_orders WHERE id = " . $oid;
            $row = $this->db->createCommand($query)->queryRow();
            $product_id = $row['product_id'];
            if ($product_id != $params['pid']) {
                $values = array(
                    'name' => $params['name'],
                    'email' => $params['email'],
                    'phone' => $params['phone'],
                    'address' => $params['address'],
                    'product_id' => $params['pid'],
                    'payment_method' => $params['method'],
                    'ip' => ip_address(),
                    'created' => time(),
                    'coupon_code' => $coupon
                );
                yii_insert_row('orders', $values);
                $std->order_id = $this->db->lastInsertID;
            } else {
                $payment_method = $row['payment_method'];
                $values = array(
                    'name' => $params['name'],
                    'email' => $params['email'],
                    'phone' => $params['phone'],
                    'address' => $params['address'],
                    'product_id' => $params['pid'],
                    'payment_method' => $payment_method . ',' . $params['method'],
                    'coupon_code' => $coupon
                );
                yii_update_row('orders', $values, 'id = ' . $oid);
            }
        }
        echo json_encode($std);
    }

    public function actionSubmitOrder()
    {
        $info = Yii::app()->session['buyInfo'];
        $coupon = '';
        if (!empty($info['coupon'])) {
            $coupon = $info['coupon'];
        }

        $std = new stdClass();
        $std->status = 1;


        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $address = trim($_POST['address']);
        $payment_method = intval($_POST['method']);
        $total = intval($_POST['total']);
        $product_id = trim($_POST['pid']);
        $oid = $_POST['oid'];
        $ip = ip_address();
        $created = time();
        if (empty($product_id) | empty($phone) | empty($name) | empty($email) | $total < 0) {
            $std->status = -1;
            echo json_encode($std);
            return;
        }

        //`name`, `email`, `phone`, `address`, `payment_method`, `product_id`, `total`, `ip`, `created`
        $pro = $this->getProductInfo($product_id);
        if (empty($pro)) {
            die('goi mua khong ton tai');
        }
        $price = $pro['dollar'];
        if ($this->is_vn == 1) {
            $price = $pro['tienvn'] / 0.7;
            $price = intval($price);
            $price -= $price % 1000;
        }


        if (!empty($coupon)) {
            $sale = 0.6;
            $total_price = $price * $sale * $total;
        } else {
            $total_price = $pro['tienvn'] * $total;
        }
        $price = $pro['tienvn'];

        $total_price = intval($total_price);
        $total_price -= $total_price % 1000;

        $values = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'product_id' => $product_id,
            'total' => $total,
            'ip' => $ip,
            'created' => $created,
            'total_price' => $total_price,
            'total_price_2' => trim($_POST['total_price']),
            'price' => $price,
            'coupon_code' => $coupon,
            'is_import' => 0
        );
        yii_update_row('orders', $values, 'id = ' . $oid);
        $values['order_id'] = $oid;
        $url = '';
        if ($payment_method == 3) {
            Yii::app()->session['method'] = $payment_method;
            $url = $this->createOnePayVN($values);
        }
        if ($payment_method == 4) {
            Yii::app()->session['method'] = $payment_method;
            $url = $this->createOnePayVisa($values);
        }


        $std->url = $url;
        echo json_encode($std);
    }

    public function actionSuccess()
    {
        $params = $_GET;
        $vpc_OrderInfo = explode('_', $params['vpc_OrderInfo']);
        $app_id = $vpc_OrderInfo[0];
        $device_id = $vpc_OrderInfo[1];
        $os = $vpc_OrderInfo[2];
        $product_id = 'com.earlystart.' . $vpc_OrderInfo[3];
        $onepay_id = $params['vpc_MerchTxnRef'];
        $success = 1;
        if ($params['vpc_TxnResponseCode'] != 0) {
            $success = 0;
        }
        //neu khong phai so
        if (!is_numeric($params['vpc_TxnResponseCode'])) {
            $success = 0;
        }
        $edu_method = Yii::app()->session['method'];

        if ($edu_method == 4) {
            if (!$this->checkHashVisa()) {
                $success = 0;
            }
        }
        if ($edu_method == 3) {
            if (!$this->checkHashNoiDia()) {
                $success = 0;
            }
        }
        $created = 1;
        //kiem tra thanh toan nay da co ai submit chua
        $query = "SELECT * FROM tbl_orders WHERE vpc_MerchTxnRef = :vpc_MerchTxnRef";
        $values = array(
            ':vpc_MerchTxnRef' => $params['vpc_MerchTxnRef']
        );
        $check = $this->db->createCommand($query)->bindValues($values)->queryRow();
        if (!empty($check)) {
            $created = 0;
        }

        if ($success == 1) {
            $order_info = $params['vpc_OrderInfo'];
            $arr = explode('_', $order_info);
            $total = intval($arr[0]);
            $product_id = $arr[1];
            $order_info = Yii::app()->session['orderinfo'];
            if (!empty($order_info) && $created == 1) {
                $par = array(
                    'total' => $total,
                    'pid' => $product_id,
                    'name' => $order_info['name'],
                    'phone' => $order_info['phone'],
                    'email' => $order_info['email'],
                    'order_id' => $order_info['order_id']
                );
                $data['order_detail'] = $par;
                $data['product'] = $this->getProductInfo($par['pid']);
                $url_params = http_build_query($par);
                $url = LICENCE_CREATE . '?' . $url_params;
                $data['ls'] = $this->cURLLicence($url);

                $query = "UPDATE tbl_orders SET vpc_MerchTxnRef = :vpc_MerchTxnRef, licence_code = :licence_code WHERE id = :id";
                $values = array(
                    ':id' => $order_info['order_id'],
                    ':vpc_MerchTxnRef' => $params['vpc_MerchTxnRef'],
                    ':licence_code' => json_encode($data['ls']['list_licence'])
                );
                $this->db->createCommand($query)->bindValues($values)->execute();


                $query = "UPDATE tbl_orders SET is_import = 0, sync_active = 0, transaction_done = 1 WHERE id = " . $order_info['order_id'];
                $this->db->createCommand($query)->execute();

                $params = array(
                    'coupon' => $order_info['coupon_code'],
                    'email' => $order_info['email'],
                    'price' => $order_info['total_price'],
                    'product_id' => $order_info['product_id'],
                    'onepay_id' => $_GET['vpc_MerchTxnRef'],
                    'name' => $order_info['name'],
                    'phone' => $order_info['phone'],
                    'method' => $edu_method
                );
                $url_params = http_build_query($params);
                $url = CURL_BUYWITHCOUPON . '?' . $url_params;
                $this->cURLLicence($url);


                unset(Yii::app()->session['orderinfo']);

                //gui mail thong bao

                $onepay_id = $_GET['vpc_MerchTxnRef'];
                $package = $data['product'];
                tinhToanTienAo($package);


                $package = $this->tinhToanTongTien($package, $total);

                $mail_param = array(
                    'agent' => array('coupon' => $order_info['coupon_code']),
                    'package' => $package,
                    'onepay_id' => $onepay_id,
                    'total' => $total
                );
                $htmlContent = $this->renderPartial('mail_info', array('data' => $mail_param), true);
                send_mail(null, $order_info['email'], '[Early Start] - thanh toán thành công (' . $onepay_id . ')', $htmlContent, array(), 'Early Start', 2);


                $html_mail = $this->renderPartial('licence_html', array('data' => $data, 'width' => 700, 'bg' => true), true);
                send_mail(null, $order_info['email'], '[Monkey Junior] - Mã kích hoạt sản phẩm', $html_mail, array(), 'Early Start', 2);
            } else {
                $query = "SELECT * FROM tbl_orders WHERE vpc_MerchTxnRef = :vpc_MerchTxnRef";
                $row = $this->db->createCommand($query)->bindValues(array(':vpc_MerchTxnRef' => $params['vpc_MerchTxnRef']))->queryRow();
                $json = json_decode($row['licence_code'], true);
                $licenses = '';
                if (count($json) > 1) {
                    $i = 1;
                    foreach ($json as $item) {
                        $licenses .= 'Mã kích hoạt ' . $i . ': <span style="color: #F2380F; font-weight: bold; font-size: 25px;">' . $item['licence'] . '</span>';
                    }
                } else {
                    $licenses .= 'Mã kích hoạt: <span style="color: #F2380F; font-weight: bold; font-size: 25px;">' . $json[0]['licence'] . '</span>';
                }
                $data['ls']['licence'] = $licenses;

                $par = array(
                    'pid' => $row['product_id'],
                    'name' => $row['name'],
                    'phone' => $row['phone'],
                    'email' => $row['email']
                );
                $data['order_detail'] = $par;
                $data['product'] = $this->getProductInfo($par['pid']);
            }
            $data['done'] = 1;
        } else {
            $data['done'] = 0;
        }
        $view = 'success';
        if ($this->is_mobile == 1) {
            $view = 'mobile/success';
        }
        $this->render($view, array('data' => $data));
    }


    public function actionPaypal()
    {

    }

    public function actionBuy()
    {
        $pid = $_GET['pid'];
        $product = $this->getProductInfo($pid);
        if (empty($product)) {
            die('Package not found!');
        }

        $step = intval($_GET['step']);
        if ($step == 0) {
            $step = 1;
        }
        $method = intval($_GET['method']);
        if ($step > 1 && $method == 0) {
            $this->redirect($this->createUrl('index'));
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($step == 2) {
                $this->processStep2();
            }
            if ($step == 3 | $step == 5) {
                $this->processStep3();
            }
        }


        if (file_exists(ROOT_PATH . '/sync/sync_price.json')) {
            $response = file_get_contents(ROOT_PATH . '/sync/sync_price.json');
            $response = json_decode($response, true);
            $package = array();
            foreach ($response as $item) {
                $item['price'] = str_replace('VNĐ', 'đ', $item['price']);
                $row = array(
                    'product_name' => $item['product_name'],
                    'product_id' => $item['product_id'],
                    'price' => '$' . $item['dollar'],
                    'description' => array_filter(explode("\n", $item['content_us'])),
                    'tien' => $item['dollar']
                );
                if ($this->is_vn) {
                    $str = number_format($item['tienvn'] / 0.7, 0, '', ',');
                    $leng = strlen($str);
                    $str = substr($str, 0, $leng - 3) . '000';

                    $str2 = number_format($item['tienvn'] / 0.7, 0, '', '');
                    $leng = strlen($str2);
                    $str2 = substr($str2, 0, $leng - 3) . '000';

                    $row = array(
                        'product_name' => $item['product_name'],
                        'product_id' => $item['product_id'],
                        'price' => $item['price'],
                        'description' => array_filter(explode("\n", $item['content_vn'])),
                        'tien' => $item['tienvn'],
                        'tien_2' => $str . ' đ',
                        'tien_ao' => $str2
                    );
                }
                $package[$item['product_id']] = $row;
            }
            $data['goitien'] = array();
            foreach ($this->active_language as $lang) {
                $code = $lang['code'];
                $pid = 'com.earlystart.' . $code . '.single';
                $data['package'][$code]['single'] = $package[$pid];
                $data['goitien'][$pid] = array(
                    'name' => $package[$pid]['product_name'],
                    'tien' => $package[$pid]['tien']
                );

                $pid = 'com.earlystart.' . $code . '.full';
                $data['package'][$code]['full'] = $package[$pid];
                $data['goitien'][$pid] = array(
                    'name' => $package[$pid]['product_name'],
                    'tien' => $package[$pid]['tien']
                );
            }
            $pid = 'com.earlystart.alllanguage';
            $data['package']['all'] = $package[$pid];
            $data['goitien'][$pid] = array(
                'name' => $package[$pid]['product_name'],
                'tien' => $package[$pid]['tien']
            );
        }
        $this->changePackageName($data['goitien']);
        $userInfo = Yii::app()->session['buyInfo'];
        $userInfo['method'] = $method;
        Yii::app()->session['buyInfo'] = $userInfo;


        if (!empty($userInfo['pid']) && $_GET['pid'] != $userInfo['pid']) {
            $option = $_GET;
            $option['pid'] = $userInfo['pid'];
            $this->redirect($this->createUrl('buy', $option));
        }

        $data['product'] = $this->getProductInfo($pid);
        if ($step == 5) {
            $step = 3;
        }
        $view = 'step' . $step;
        $data['view'] = $view;
        $this->render('mobile/buy/' . $view, array('data' => $data));
    }

    private function processStep3()
    {
        $pid = $_POST['pid'];
        $soluong = $_POST['soluong'];

        $method = intval($_GET['method']);
        $info = Yii::app()->session['buyInfo'];
        $info['method'] = $method;


        $name = $info['hoten'];
        $email = $info['email'];
        $phone = $info['dienthoai'];
        $address = $info['diachi'];
        $payment_method = $method;
        $total = $soluong;
        $product_id = $pid;
        $oid = $info['oid'];
        $ip = ip_address();
        $created = time();
        if (empty($product_id) | empty($phone) | empty($name) | empty($email) | $total < 0) {
            die('giao dich that bai, vui long thu lai');
            return;
        }

        //`name`, `email`, `phone`, `address`, `payment_method`, `product_id`, `total`, `ip`, `created`
        $pro = $this->getProductInfo($product_id);
        if (empty($pro)) {
            die('goi mua khong ton tai');
        }
        $price = $pro['dollar'];

        if ($this->is_vn == 1) {
            $price = $pro['tienvn'] / 0.7;
            $price = intval($price);
            $price -= $price % 1000;
        }

        if (!empty($info['coupon'])) {
            $sale = 0.6;
            $total_price = $price * $sale * $total;
        } else {
            $total_price = $pro['tienvn'] * $total;
        }
        $price = $pro['tienvn'];

        $total_price = intval($total_price);
        $total_price -= $total_price % 1000;

        $values = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'product_id' => $product_id,
            'total' => $total,
            'ip' => $ip,
            'created' => $created,
            'total_price' => doubleval($total_price),
            'total_price_2' => trim($_POST['total_price_2']),
            'price' => floatval($price),
            'coupon_code' => $info['coupon'],
            'is_import' => 0
        );
        yii_update_row('orders', $values, 'id = ' . $oid);
        $values['order_id'] = $oid;
        $url = '';
        if ($payment_method == 3) {
            $url = $this->createOnePayVN($values);
        }
        if ($payment_method == 4) {
            $url = $this->createOnePayVisa($values);
        }

        if ($url != '') {
            $this->redirect($url);
            return;
        }


        $option = $_GET;
        $option['step'] = 4;
        $method = intval($_GET['method']);
        if ($method == 2) {
            $option['step'] = 5;
        }
        if ($_GET['step'] == 5) {
            $this->redirect($this->createUrl('pricing/index'));
        }
        $this->redirect($this->createUrl('pricing/buy', $option));
    }

    private function processStep2()
    {
        $method = intval($_GET['method']);
        $info = Yii::app()->session['buyInfo'];
        $info['method'] = $method;
        $info['hoten'] = trim($_POST['hoten']);
        $info['dienthoai'] = trim($_POST['dienthoai']);
        $info['email'] = trim($_POST['email']);
        $info['diachi'] = trim($_POST['diachi']);
        $info['pid'] = $_GET['pid'];
        $info['coupon'] = $info['coupon'];
        $std = new stdClass();
        $std->status = 1;
        $oid = $info['oid'];
        if ($oid == 0) {
            $values = array(
                'name' => $info['hoten'],
                'email' => $info['email'],
                'phone' => $info['dienthoai'],
                'address' => $info['diachi'],
                'product_id' => $info['pid'],
                'payment_method' => $info['method'],
                'ip' => ip_address(),
                'created' => time(),
                'coupon_code' => $info['coupon'],
                'is_import' => 0
            );
            yii_insert_row('orders', $values);
            $info['oid'] = $this->db->lastInsertID;
        } else {
            $query = "SELECT * FROM tbl_orders WHERE id = " . $oid;
            $row = $this->db->createCommand($query)->queryRow();
            $product_id = $row['product_id'];
            if ($product_id != $info['pid']) {
                $values = array(
                    'name' => $info['hoten'],
                    'email' => $info['email'],
                    'phone' => $info['dienthoai'],
                    'address' => $info['diachi'],
                    'product_id' => $info['pid'],
                    'payment_method' => $info['method'],
                    'ip' => ip_address(),
                    'created' => time(),
                    'coupon_code' => $info['coupon'],
                );
                yii_insert_row('orders', $values);
                $std->order_id = $this->db->lastInsertID;
            } else {
                $payment_method = $row['payment_method'];
                $values = array(
                    'name' => $info['hoten'],
                    'email' => $info['email'],
                    'phone' => $info['dienthoai'],
                    'address' => $info['diachi'],
                    'product_id' => $info['pid'],
                    'payment_method' => $payment_method . ',' . $info['method'],
                    'coupon_code' => $info['coupon']
                );
                yii_update_row('orders', $values, 'id = ' . $oid);
            }
        }
        Yii::app()->session['buyInfo'] = $info;
        $option = $_GET;
        $option['step'] = 3;
        $method = intval($_GET['method']);
        if ($method == 2) {
            $option['step'] = 5;
        }
        $this->redirect($this->createUrl('pricing/buy', $option));
    }

    public function actionCoupon()
    {
        $std = new stdClass();
        $coupon = trim($_POST['coupon']);
        $sl = intval($_POST['sl']);
        $pid = $_POST['pid'];
        $order_id = intval($_POST['oid']);
        $userInfo = Yii::app()->session['buyInfo'];
        if ($order_id == 0 && $userInfo['oid'] > 0) {
            $order_id = $userInfo['oid'];
        }

        if (empty($coupon)) {
            $std->status = -1;
            echo json_encode($std);
            die;
        }
        $url = CURL_VALIDATE_COUPON . '?json=1&coupon=' . $coupon;

        $response = $this->cURLLicence($url);
        if ($response['status'] == 1) {
            $std->status = 1;

            $query = "UPDATE tbl_orders SET coupon_code = :coupon_code WHERE id = :id";
            $values = array(
                ':coupon_code' => $coupon,
                ':id' => $order_id
            );
            $this->db->createCommand($query)->bindValues($values)->execute();

            $userInfo = Yii::app()->session['buyInfo'];
            $userInfo['coupon'] = $coupon;
            $userInfo['soluong'] = $sl;
            $userInfo['pid'] = $pid;
            Yii::app()->session['buyInfo'] = $userInfo;
        } else {
            $std->status = -1;
        }
        echo json_encode($std);
    }

    public function actionPolicy()
    {
        $data = array();
        $view = 'policy';
        if ($this->is_mobile) {
            $view = 'mobile/policy';
        }

        $this->setMetaTitle('Điều kiện và điều khoản');
        $this->setMetaDescription('Bảng giá nội dung chương trình cho phép bạn chọn gói nội dung phù hợp với con mình. Monkey Junior cung cấp nhiều loại hình thanh toán khác nhau, gồm có: thanh toán tận nơi, thanh toán qua Internet Banking, thanh toán qua chuyển khoản qua tài khoản ngân hàng và thanh toán qua thẻ tín dụng');
        $this->setMetaKeywords('bảng giá, thanh toán, nội dung, monkey junior, early start');

        $this->render($view, array('data' => $data));
    }

    private function tinhToanTongTien($package, $total)
    {
        if ($total <= 1) {
            return $package;
        }

        $package['tienvn'] *= $total;
        $package['tienao'] *= $total;
        $package['giam40'] *= $total;
        $package['giam30'] *= $total;
        return $package;
    }

    public function actionTest()
    {
        $package = $this->getProductInfo('com.earlystart.us.single');
        tinhToanTienAo($package);
        $package = $this->tinhToanTongTien($package, 2);
        $mail_param = array(
            'agent' => array('coupon' => 'XA8G2'),
            'package' => $package,
            'onepay_id' => '1234324242424242424',
            'total' => 2
        );
        $htmlContent = $this->renderPartial('mail_info', array('data' => $mail_param), true);
        echo $htmlContent;
        die;
    }

}
