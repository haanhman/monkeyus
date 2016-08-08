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
class AboutController extends FontendController
{

    public function init()
    {
        parent::init();
    }

    /**
     * @meta 1
     */
    public function actionIndex()
    {
        $this->render_meta = true;
        $data = array();
        $view = 'index';
        if ($this->is_mobile) {
            $view = 'mobile/index';
        }
        $this->render($view, array('data' => $data));
    }

    public function actionContact()
    {
        $this->forward('index');
    }

    private function verifyCaptcha($response)
    {
        if (empty($response)) {
            return false;
        }
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=6LeuoyETAAAAAGnX-ZZjPLQql4s17WVVP_z8ZdzC&response=' . $response;
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1');
        $result = curl_exec($ch);
        $json = json_decode($result, true);
        return $json['success'];
    }

    public function actionSubmitContact()
    {
        $xacthuc = $this->verifyCaptcha($_POST['g-recaptcha-response']);
        if (!$xacthuc) {
            $std = new stdClass();
            $std->status = 0;
            echo json_encode($std);
            die;
        }
        $email = trim($_POST['email']);
        $name = trim($_POST['name']);
        $subject = trim($_POST['subject']);
        $message = trim($_POST['message']);

        $is_email = $this->validateEmailAddress($email);
        $std = new stdClass();
        $std->status = 1;


        if (!$is_email | empty($name) | empty($subject) | empty($message)) {
            $std->status = 0;
            echo json_encode($std);
            return;
        }


        //`name`, `email`, `subject`, `message`, `created`
        $values = array(
            'name' => $name,
            'email' => $email,
            'ip' => ip_address(),
            'subject' => $subject,
            'message' => $message,
            'created' => time()
        );
        yii_insert_row('contact', $values);
        echo json_encode($std);
    }

}
