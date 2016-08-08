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
class AgentController extends FontendController
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
//        $this->no_index = true;
        $data = array();

        $query = "SELECT * FROM tbl_faqs WHERE cate_id = 6 ORDER BY weight";
        $data['faq'] = $this->db->createCommand($query)->queryAll();

        $view = 'index';
        if ($this->is_mobile) {
            $view = 'index_mobile';
        }

        $this->setMetaTitle('Chương trình affiliate với Monkey Junior');
        $this->setMetaDescription('Chương trình đối tác affiliate với Monkey Junior cho phép bạn kiếm hoa hồng lên đến 20% trên giá trị đơn hàng');
        $this->setMetaKeywords('đối tác, affiliate, monkey junior, hoa hồng, đại lý');
        $this->render($view, array('data' => $data));
    }

    public function actionSubmit()
    {
        $response = array();
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            //`name`, `phone`, `email`, `address`, `facebook`, `website`, `more_info`, `ip`, `created`
            $values = array(
                'name' => trim($_POST['name']),
                'phone' => trim($_POST['phone']),
                'email' => trim($_POST['email']),
                'address' => trim($_POST['address']),
                'facebook' => trim($_POST['facebook']),
                'website' => trim($_POST['website']),
                'more_info' => trim($_POST['more_info']),
                'ip' => ip_address(),
                'created' => time()
            );
            yii_insert_row('agent', $values);
            $response['status'] = 1;
        } else {
            $response['status'] = -1;
        }
        echo json_encode($response);
    }

    public function actionRegister()
    {
        $this->no_index = true;
        $data = array();
        $view = 'block/mobile/dangky';
        $this->render($view, array('data' => $data));
    }

    public function actionAdv()
    {
        $this->setMetaTitle('Chương trình affiliate với Monkey Junior');
        $this->setMetaDescription('Chương trình đối tác affiliate với Monkey Junior cho phép bạn kiếm hoa hồng lên đến 20% trên giá trị đơn hàng');
        $this->setMetaKeywords('đối tác, affiliate, monkey junior, hoa hồng, đại lý');
        $this->no_index = true;
        $data = array();
        $view = 'adv';
        if ($this->is_mobile) {
            $view = 'adv_mobile';
        }
        $this->render($view, array('data' => $data));
    }

}
