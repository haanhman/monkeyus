<?php

class PushCommand extends CConsoleCommand {

    /**
     *
     * @var CDbConnection
     */
    protected $db;

    public function run($args) {
        $this->db = EduDataBase::getConnection('db');
        $this->syncOrder();
    }

    private function syncOrder() {
        $query = "SELECT * FROM tbl_orders WHERE is_import = 0 ORDER BY id DESC";
        $result = $this->db->createCommand($query)->queryAll();


        $query = "SELECT * FROM tbl_orders WHERE sync_active = 0 AND transaction_done = 1";
        $list = $this->db->createCommand($query)->queryAll();

        if (empty($result) && empty($list)) {
            echo "Het du lieu roi\n";
            die;
        }
        $list_id = array();
        foreach ($result as $item) {
            $list_id[] = $item['id'];
        }

        $list_id2 = array();
        foreach ($list as $item) {
            $list_id2[] = $item['id'];
        }

        $data_file = json_encode($result);
        $data_done = json_encode($list);

        $url = 'http://54.187.133.151/crm/push/data';
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
