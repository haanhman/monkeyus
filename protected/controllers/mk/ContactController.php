<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 * @desc Quản lý ngôn ngữ
 * @author anhmantk
 */
class ContactController extends MkController {

    public function init() {
        parent::init();
    }

    public function actionIndex() {
        $data = array();


        $query_count = "SELECT COUNT(id) FROM tbl_contact";
        $item_count = $this->db->createCommand($query_count)->queryScalar();

        $pages = new CPagination($item_count);
        $perPage = 10;
        $pages->setPageSize($perPage);

        $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
        if ($page <= 0) {
            $page = 1;
        }

        $offset = ($page - 1) * $perPage;

        $query = "SELECT * FROM tbl_contact "
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

    
    




}
