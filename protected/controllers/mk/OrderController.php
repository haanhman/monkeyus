<?php

class OrderController extends MkController
{

    public function init()
    {
        parent::init();
    }

    public function actionIndex()
    {
        $data = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->submitSentence();
        }

        $query_count = "SELECT COUNT(id) FROM tbl_orders";
        $item_count = $this->db->createCommand($query_count)->queryScalar();

        $pages = new CPagination($item_count);
        $perPage = 10;
        $pages->setPageSize($perPage);

        $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
        if ($page <= 0) {
            $page = 1;
        }

        $offset = ($page - 1) * $perPage;

        $query = "SELECT * FROM tbl_orders "
            . "ORDER BY id DESC "
            . "LIMIT " . $offset . "," . $perPage;
        $data['listItem'] = $this->db->createCommand($query)->queryAll();
        if ($_GET['a']) {
            echo '<pre>' . print_r($data['listItem'][0], true) . '</pre>';
            die;
        }

        $this->render('index', array(
            'data' => $data,
            'item_count' => $item_count,
            'page_size' => $perPage,
            'pages' => $pages,
        ));
    }

    public function actionDelete()
    {
        $id = $_GET['id'];
        $query = "DELETE FROM tbl_orders WHERE id = " . $id;
        $this->db->createCommand($query)->execute();
        createMessage('Xoá hoá đơn thành công');


        $query = "SELECT COUNT(id) FROM tbl_orders";
        $total_order = $this->db->createCommand($query)->queryScalar();
        $total_order = intval($total_order);


        $query = "UPDATE tbl_variables SET str_value = " . $total_order . " WHERE str_name = 'total_order'";
        $this->db->createCommand($query)->execute();

        $this->redirect($_SERVER['HTTP_REFERER']);
    }

}
