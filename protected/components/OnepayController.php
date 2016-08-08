<?php

class OnepayController extends FontendController
{

    protected function createOnePayVN($params)
    {
        Yii::app()->session['orderinfo'] = $params;
        $SECURE_SECRET = ONEPAY_SECURE_SECRET;        //Khóa bí mật - được cấp bởi OnePAY
        $Title = 'Thanh toan hoa don Monkey junior';            //
        $vpc_Merchant = ONEPAY_MERCHANT;                               //Được cấp bởi OnePAY
        $vpc_AccessCode = ONEPAY_ACCESSCODE;                           //Được cấp bởi OnePAY
        $vpc_MerchTxnRef = date('YmdHis') . rand();                                       //ID giao dịch, giá trị phải khác nhau trong mỗi lần thanh(tối đa 40 ký tự) toán
        $vpc_OrderInfo = $params['total'] . '_' . $params['product_id'];                                         //Tên hóa đơn - (tối đa 34 ký tự)
        $vpc_Amount = $params['total_price'] * 100;                                            //Số tiền cần thanh toán,Đã được nhân với 100. VD: 100=1VND
        $vpc_ReturnURL = $this->createAbsoluteUrl('pricing/success');   //Url nhận kết quả trả về sau khi giao dịch hoàn thành.
        $vpc_Version = 2;                                       //Phiên bản modul (cố định) = 2
        $vpc_Command = 'pay';                                   //Loại request (cố định) = pay
        $vpc_Locale = 'vn';                                     //Ngôn ngữ hiện thị trên cổng (vn/en) default = vn
        $vpc_Currency = 'VND';                                  //Loại tiền tệ (VND)
        $virtualPaymentClientURL = ONEPAY_virtualPaymentClientURL;
        $SECURE_SECRET = ONEPAY_SECURE_SECRET;
        $vpcURL = $virtualPaymentClientURL . "?";

        $_POST = array(
            'Title' => $Title,
            'vpc_AccessCode' => $vpc_AccessCode,
            'vpc_Amount' => $vpc_Amount,
            'vpc_Command' => $vpc_Command,
            'vpc_Currency' => $vpc_Currency,
            'vpc_Locale' => $vpc_Locale,
            'vpc_MerchTxnRef' => $vpc_MerchTxnRef,
            'vpc_Merchant' => $vpc_Merchant,
            'vpc_OrderInfo' => $vpc_OrderInfo,
            'vpc_ReturnURL' => $vpc_ReturnURL,
            'vpc_Version' => $vpc_Version
        );
        unset($_POST["virtualPaymentClientURL"]);
        unset($_POST["SubButL"]);
        $stringHashData = "";
        ksort($_POST);
        $appendAmp = 0;

        foreach ($_POST as $key => $value) {
            if (strlen($value) > 0) {
                if ($appendAmp == 0) {
                    $vpcURL .= urlencode($key) . '=' . urlencode($value);
                    $appendAmp = 1;
                } else {
                    $vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
                }
                if ((strlen($value) > 0) && ((substr($key, 0, 4) == "vpc_") || (substr($key, 0, 5) == "user_"))) {
                    $stringHashData .= $key . "=" . $value . "&";
                }
            }
        }
        $stringHashData = rtrim($stringHashData, "&");
        if (strlen($SECURE_SECRET) > 0) {
            $vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $stringHashData, pack('H*', $SECURE_SECRET)));
        }
        return $vpcURL;
    }

    protected function createOnePayVisa($params)
    {
        Yii::app()->session['orderinfo'] = $params;

        $Title = 'Thanh toan hoa don Monkey junior';
        $virtualPaymentClientURL = ONEPAY_virtualPaymentClientURL_VISA;
        $vpc_Merchant = ONEPAY_MERCHANT_VISA;
        $vpc_AccessCode = ONEPAY_ACCESSCODE_VISA;
        $vpc_MerchTxnRef = date('YmdHis') . rand();
        $vpc_OrderInfo = $params['total'] . '_' . $params['product_id'];
        $vpc_Amount = $params['total_price'] * 100;
        $vpc_ReturnURL = $this->createAbsoluteUrl('pricing/success');
        $vpc_Version = 2;
        $vpc_Command = 'pay';
        $vpc_Locale = 'en';
        $AVS_Country = 'VN';


        $SECURE_SECRET = ONEPAY_SECURE_SECRET_VISA;
        $vpcURL = $virtualPaymentClientURL . "?";
        $_POST = array(
            'Title' => $Title,
            'virtualPaymentClientURL' => $virtualPaymentClientURL,
            'vpc_Merchant' => $vpc_Merchant,
            'vpc_AccessCode' => $vpc_AccessCode,
            'vpc_MerchTxnRef' => $vpc_MerchTxnRef,
            'vpc_OrderInfo' => $vpc_OrderInfo,
            'vpc_Amount' => $vpc_Amount,
            'vpc_ReturnURL' => $vpc_ReturnURL,
            'vpc_Version' => $vpc_Version,
            'vpc_Command' => $vpc_Command,
            'vpc_Locale' => $vpc_Locale,
            'AVS_Country' => $AVS_Country,
            'AgainLink' => $this->createAbsoluteUrl('pricing/success')
        );

        unset($_POST["virtualPaymentClientURL"]);
        $md5HashData = "";

        ksort($_POST);
        $appendAmp = 0;
        foreach ($_POST as $key => $value) {
            if (strlen($value) > 0) {
                if ($appendAmp == 0) {
                    $vpcURL .= urlencode($key) . '=' . urlencode($value);
                    $appendAmp = 1;
                } else {
                    $vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
                }
                if ((strlen($value) > 0) && ((substr($key, 0, 4) == "vpc_") || (substr($key, 0, 5) == "user_"))) {
                    $md5HashData .= $key . "=" . $value . "&";
                }
            }
        }
        $md5HashData = rtrim($md5HashData, "&");
        if (strlen($SECURE_SECRET) > 0) {
            $hash = strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*', $SECURE_SECRET)));
            Yii::app()->session['hash'] = $hash;
            $vpcURL .= "&vpc_SecureHash=" . $hash;
        }
        return $vpcURL;
    }

    protected function checkHashVisa()
    {
        $SECURE_SECRET = ONEPAY_SECURE_SECRET_VISA;
        $vpc_Txn_Secure_Hash = $_GET["vpc_SecureHash"];
        unset($_GET["vpc_SecureHash"]);
        if (strlen($SECURE_SECRET) > 0 && $_GET["vpc_TxnResponseCode"] != "7" && $_GET["vpc_TxnResponseCode"] != "No Value Returned") {
            ksort($_GET);
            $md5HashData = "";
            foreach ($_GET as $key => $value) {
                if ($key != "vpc_SecureHash" && (strlen($value) > 0) && ((substr($key, 0, 4) == "vpc_") || (substr($key, 0, 5) == "user_"))) {
                    $md5HashData .= $key . "=" . $value . "&";
                }
            }
            $md5HashData = rtrim($md5HashData, "&");
            if (strtoupper($vpc_Txn_Secure_Hash) == strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*', $SECURE_SECRET)))) {
                $hashValidated = true;
            } else {
                $hashValidated = false;
            }
        } else {
            $hashValidated = false;
        }
        return $hashValidated;
    }

    protected function checkHashNoiDia()
    {
        $SECURE_SECRET = ONEPAY_SECURE_SECRET;
        $vpc_Txn_Secure_Hash = $_GET ["vpc_SecureHash"];
        unset($_GET ["vpc_SecureHash"]);
        $errorExists = false;
        ksort($_GET);
        if (strlen($SECURE_SECRET) > 0 && $_GET ["vpc_TxnResponseCode"] != "7" && $_GET ["vpc_TxnResponseCode"] != "No Value Returned") {
            $stringHashData = "";
            foreach ($_GET as $key => $value) {
                if ($key != "vpc_SecureHash" && (strlen($value) > 0) && ((substr($key, 0, 4) == "vpc_") || (substr($key, 0, 5) == "user_"))) {
                    $stringHashData .= $key . "=" . $value . "&";
                }
            }
            $stringHashData = rtrim($stringHashData, "&");
            if (strtoupper($vpc_Txn_Secure_Hash) == strtoupper(hash_hmac('SHA256', $stringHashData, pack('H*', $SECURE_SECRET)))) {
                $hashValidated = true;
            } else {
                $hashValidated = false;
            }
        } else {
            $hashValidated = false;
        }
        return $hashValidated;
    }

}
