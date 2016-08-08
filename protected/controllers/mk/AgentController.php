<?php

class AgentController extends MkController
{

    public function init()
    {
        parent::init();
    }

    public function actionIndex()
    {
        $data = array();

        $query_count = "SELECT COUNT(id) FROM tbl_agent";
        $item_count = $this->db->createCommand($query_count)->queryScalar();

        $pages = new CPagination($item_count);
        $perPage = 10;
        $pages->setPageSize($perPage);

        $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
        if ($page <= 0) {
            $page = 1;
        }

        $offset = ($page - 1) * $perPage;

        $query = "SELECT * FROM tbl_agent "
            . "ORDER BY id DESC "
            . "LIMIT " . $offset . "," . $perPage;
        $data['listItem'] = $this->db->createCommand($query)->queryAll();


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
        $query = "DELETE FROM tbl_agent WHERE id = " . $id;
        $this->db->createCommand($query)->execute();
        createMessage('Xoá đối tác thành công');
        $this->redirect($_SERVER['HTTP_REFERER']);
    }

}
