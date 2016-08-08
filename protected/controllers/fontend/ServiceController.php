<?php

class ServiceController extends FontendController
{

    public function init()
    {
        parent::init();
    }

    public function actionTracking()
    {
        $id = $_GET['id'];

        $page = intval($_GET['page']);
        if ($page <= 1) {
            $page = 1;
        }
        $limit = 20;
        $offset = ($page - 1) * $limit;
        $data = array();

        $query = "SELECT COUNT(id) FROM tbl_coupon_tracking WHERE agent_id = " . $id;
        $total_item = $this->db->createCommand($query)->queryScalar();
        $data['total_page'] = ceil($total_item / $limit);

        $query = "SELECT url_access, created, user_agent FROM tbl_coupon_tracking WHERE agent_id = " . $id . " ORDER BY id DESC LIMIT " . $offset . "," . $limit;
        $result = $this->db->createCommand($query)->queryAll();
        $data['data'] = $result;
        echo json_encode($data);
    }

}
