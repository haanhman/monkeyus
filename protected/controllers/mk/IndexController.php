<?php

class IndexController extends MkController {

    public function init() {
        parent::init();
        
    }

    public function actionIndex() {
        $data = array();
        $query_count = "SELECT COUNT(id) FROM tbl_orders";
        $data['total_order'] = $this->db->createCommand($query_count)->queryScalar();

        $query_count = "SELECT COUNT(id) FROM tbl_contact";
        $data['total_contact'] = $this->db->createCommand($query_count)->queryScalar();

        $query_count = "SELECT COUNT(id) FROM tbl_agent";
        $data['total_doitac'] = $this->db->createCommand($query_count)->queryScalar();

        $this->render('index', array('data' => $data));
    }

}
