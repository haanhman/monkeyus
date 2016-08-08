<?php

class CronController extends FontendController
{

    public function init()
    {
        parent::init();
    }


    //kiem tra xem co ai dang ky doi tac hay khong
    public function actionAgent() {
        $query_count = "SELECT COUNT(id) FROM tbl_agent";
        $item_count = $this->db->createCommand($query_count)->queryScalar();

        $query = "SELECT str_value FROM tbl_variables WHERE str_name = 'total_agent'";
        $total_agent = $this->db->createCommand($query)->queryScalar();
        $total_agent = intval($total_agent);
        if ($item_count > $total_agent) {
            $data['total_agent'] = $item_count - $total_agent;

            $html_mail = $this->renderPartial('checkagent', array('data' => $data), true);

            $title = '[Monkey Junior] - ' . $data['total_agent'] . ' đăng ký làm đối tác';

            send_mail(null, 'xuyen.trannh@gmail.com', $title, $html_mail);

            $query = "UPDATE tbl_variables SET str_value = " . $item_count . " WHERE str_name = 'total_agent'";
            $this->db->createCommand($query)->execute();

        } else {
            echo 'khong co gi moi ca';
        }

    }

    public function actionCheckOrder()
    {
        $query_count = "SELECT COUNT(id) FROM tbl_orders";
        $item_count = $this->db->createCommand($query_count)->queryScalar();

        $query_count = "SELECT COUNT(id) FROM tbl_contact";
        $total_contact_new = $this->db->createCommand($query_count)->queryScalar();


        $query = "SELECT str_value FROM tbl_variables WHERE str_name = 'total_order'";
        $total_order = $this->db->createCommand($query)->queryScalar();
        $total_order = intval($total_order);


        $query = "SELECT str_value FROM tbl_variables WHERE str_name = 'total_contact'";
        $total_contact = $this->db->createCommand($query)->queryScalar();
        $total_contact = intval($total_contact);

        if ($item_count > $total_order || $total_contact_new > $total_contact) {
            $query = "UPDATE tbl_variables SET str_value = " . $item_count . " WHERE str_name = 'total_order'";
            $this->db->createCommand($query)->execute();

            $query = "UPDATE tbl_variables SET str_value = " . $total_contact_new . " WHERE str_name = 'total_contact'";
            $this->db->createCommand($query)->execute();

            $data['total_order'] = $item_count - $total_order;
            $data['total_contact'] = $total_contact_new - $total_contact;

            $html_mail = $this->renderPartial($this->is_vn ? 'checkorder' : 'checkorder_us', array('data' => $data), true);

            $title = '[Monkey Junior] - ' . $data['total_order'] . ' orders (' . $data['total_contact'] . ') contact';
            send_mail(null, 'xuyen.trannh@gmail.com', $title, $html_mail);
        } else {
            echo 'khong co order moi';
        }
    }

    public function actionCheckContact()
    {
        $query_count = "SELECT COUNT(id) FROM tbl_contact";
        $total_contact_new = $this->db->createCommand($query_count)->queryScalar();


        $query = "SELECT str_value FROM tbl_variables WHERE str_name = 'total_contact'";
        $total_contact = $this->db->createCommand($query)->queryScalar();
        $total_contact = intval($total_contact);

        if ($total_contact_new > $total_contact) {

            $query = "UPDATE tbl_variables SET str_value = " . $total_contact_new . " WHERE str_name = 'total_contact'";
            $this->db->createCommand($query)->execute();

            $data['total_contact'] = $total_contact_new - $total_contact;

            $html_mail = $this->renderPartial($this->is_vn ? 'checkorder' : 'checkorder_us', array('data' => $data), true);

            $title = '[Monkey Junior] - (' . $data['total_contact'] . ') contact';

            send_mail(null, 'xuyen.trannh@gmail.com', $title, $html_mail);
        } else {
            echo 'khong co contact moi';
        }
    }
    
    public function actionPushOrder() {
        $query = "SELECT * FROM tbl_orders WHERE is_import = 0 ORDER BY id DESC";
        $result = $this->db->createCommand($query)->queryAll();


        $query = "SELECT * FROM tbl_orders WHERE sync_active = 0 AND transaction_done = 1";
        $list = $this->db->createCommand($query)->queryAll();

        if (empty($result) && empty($list)) {
            echo "Het du lieu roi\n";
            die;
        }
        $list_id = array();
        foreach ($result as $index =>  $item) {
            $package = $this->getProductInfo($item['product_id']);
            tinhToanTienAo($package);
            $item['package'] = $package;
            $result[$index] = $item;
            $list_id[] = $item['id'];
        }

        $list_id2 = array();
        foreach ($list as $item) {
            $list_id2[] = $item['id'];
        }

        $data_file = json_encode($result);
        $data_done = json_encode($list);

        $url = 'http://54.187.133.151/crm/push/data';
        if($_SERVER['SERVER_NAME'] == 'monkeyjunior.com.vn') {
            $url = 'http://edu.vn/crm/push/data';
        }
        $headers = array("Content-Type:multipart/form-data"); // cURL headers for file uploading
        $postfields = array("data" => "$data_file", 'done' => "$data_done");
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => true,
            CURLOPT_POST => 1,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postfields,
//            CURLOPT_INFILESIZE => $file_size,
            CURLOPT_RETURNTRANSFER => true
        ); // cURL options
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        $info = curl_getinfo($ch);
        echo '<pre>' . print_r($info, true) . '</pre>';
        if (!curl_errno($ch)) {
            $info = curl_getinfo($ch);
            if ($info['http_code'] == 200) {
                if (!empty($list_id)) {
                    $query = "UPDATE tbl_orders SET is_import = 1 WHERE id IN (" . implode(',', $list_id) . ")";
                    $this->db->createCommand($query)->execute();
                }
                if (!empty($list_id2)) {
                    $query = "UPDATE tbl_orders SET sync_active = 1 WHERE id IN (" . implode(',', $list_id2) . ")";
                    $this->db->createCommand($query)->execute();
                }

                echo 'File uploaded successfully';
            }
        } else {
            $errmsg = curl_error($ch);
            echo $errmsg;
        }
        curl_close($ch);
        echo "Done\n";
    }

}
