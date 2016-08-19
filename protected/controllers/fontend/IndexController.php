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
class IndexController extends FontendController
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
        $data = array();
        $this->render_meta = true;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->submitEmailAction();
            $email = trim($_POST['email']);
            $name = trim($_POST['name']);
            $this->getResponsePust($email, $name, 'monkeyjunior_update_vn');
            return;
        }

        //lay danh sach review
        $query = "SELECT name, gender, content, child_age, country FROM tbl_review WHERE status = 1 ORDER BY weight";
        $list = $this->db->createCommand($query)->queryAll();
        $data['review'] = array_chunk($list, 2);



        $view = 'index';
        if ($this->is_mobile) {
            $view = 'mobile/index';
        }
        $data['os'] = $this->getOS();
        $this->render($view, array('data' => $data));
    }

    private function submitEmailAction()
    {
        $email = trim($_POST['email']);
        $is_email = $this->validateEmailAddress($email);
        $std = new stdClass();
        $std->status = 1;
        if (!$is_email) {
            $std->status = 0;
            echo json_encode($std);
            return;
        }
        $block = intval($_POST['block']);
        $ref_url = trim($_POST['ref_url']);
        $name = trim($_POST['name']);
        $values = array(
            'name' => $name,
            'email' => $email,
            'ip' => ip_address(),
            'block' => $block,
            'ref_url' => $ref_url,
            'created' => time()
        );
        yii_insert_row('subscribe', $values);

        $url = $this->createAbsoluteUrl('page/update');
        if (Yii::app()->controller->action->id == 'subscribe') {
            $url = $this->createAbsoluteUrl('page/subscribe');
        }
        $std->url = $url;
        echo json_encode($std);
    }

    public function actionSubscribe()
    {
        $this->submitEmailAction();
        $email = trim($_POST['email']);
        $name = trim($_POST['name']);
        $this->getResponsePust($email, $name, 'monkey_junior_vn');
    }

    public function actionTest()
    {
        $this->getResponsePust('anhmantk@gmail.com', 'Ha ANh Man', 'monkey_junior_vn');
    }

    public function getResponsePust($mail, $name = '', $campaign_name)
    {
        if (empty($mail)) {
            return;
        }
        $api_key = 'b25f6d929ff3f820595f4bda22c49e7a';
        $api_url = 'http://api2.getresponse.com';
        $client = new jsonRPCClient($api_url);

        $campaigns = $client->get_campaigns(
            $api_key, array(
//find by name literally
                'name' => array('EQUALS' => $campaign_name)
            )
        );
        $arr = array_keys($campaigns);
        $CAMPAIGN_ID = $arr[0];
        try {
            $params = array(
                'campaign' => $CAMPAIGN_ID,
                'email' => $mail,
                'name' => $name,
                'cycle_day' => 0,
                'ip' => ip_address()
            );
            if (empty($params['name'])) {
                unset($params['name']);
            }


            $result = $client->add_contact(
                $api_key, $params
            );
        } catch (Exception $exc) {
//            echo $exc->getMessage();
        }
    }

    public function actionCountDown()
    {
        $std = new stdClass();
        $std->count = $this->getCountDown();
        echo json_encode($std);
    }

}
