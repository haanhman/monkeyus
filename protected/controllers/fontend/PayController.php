<?php

require_once LIB_PATH . '/jsonRPCClient.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author anhmantk
 */
class PayController extends OnepayController
{
    protected $is_sale;

    public function init()
    {
        parent::init();
        $this->is_sale = false;
    }

    /**
     * @meta 1
     */
    public function actionIndex()
    {
        $this->no_index = true;
        $this->layout = 'frame';
        $data = array();
        $coupon = trim($_GET['coupon']);
        if (!empty($coupon)) {
            $url = CURL_VALIDATE_COUPON . '?json=1&coupon=' . $coupon;
            $response = $this->cURLLicence($url);
            if ($response['status'] == -1) {
                echo '<meta charset="UTF-8">';
                echo 'Mã giảm giá: <strong>' . $coupon . '</strong> không tồn tại hoặc đã hết hạn';
                die;
            } else {
                $this->is_sale = true;
            }
        }


        $product_id = trim($_GET['product_id']);

        $package = $this->getProductInfo($product_id);
        tinhToanTienAo($package);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dongy = intval($_POST['dongy']);
            if ($dongy == 1) {
                $thongtinmua = Yii::app()->session['thongtinmua'];
                $price = $package['giam30'];
                if ($this->is_sale) {
                    $price = $package['giam40'];
                }

                $params = array(
                    'name' => $thongtinmua['name'],
                    'email' => $thongtinmua['email'],
                    'phone' => $thongtinmua['phone'],
                    'address' => $thongtinmua['address'],
                    'product_id' => $thongtinmua['product_id'],
                    'total' => 1,
                    'ip' => ip_address(),
                    'created' => time(),
                    'total_price' => $price,
                    'total_price_2' => number_format($price, 0, '', ',') . ' đ',
                    'price' => $price,
                    'coupon_code' => $coupon,
                    'order_id' => $thongtinmua['order_id']
                );
                $method = intval($_GET['method']);
                Yii::app()->session['method'] = $method;
                $url = '';
                if($method == 3) {
                    $url = $this->createOnePayVN($params);
                }elseif($method == 4) {
                    $url = $this->createOnePayVisa($params);
                }
                $this->redirect($url);
            }
        }


        if ($package['product_id'] == 'com.earlystart.us.full') {
            $package['product_name'] = 'Thẻ học Tiếng Anh';
        } elseif ($package['product_id'] == 'com.earlystart.alllanguage') {
            $package['product_name'] = 'Tất cả các ngôn ngữ';
        }
        $data['package'] = $package;
        $view = 'index';
        $this->render($view, array('data' => $data));
    }


}
