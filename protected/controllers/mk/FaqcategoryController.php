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
class FaqcategoryController extends MkController {

    public function init() {
        parent::init();
    }
    
    public function actionIndex() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $arr = explode(',', $_POST['sort_faq']);
            $arr = array_filter($arr);
            if (!empty($arr)) {
                $query = "UPDATE tbl_faq_category SET weight = :weight WHERE id = :id";
                $i = 1;
                foreach ($arr as $app_id) {
                    $values = array(':weight' => $i++, ':id' => $app_id);
                    $this->db->createCommand($query)->bindValues($values)->execute();
                }
                createMessage('Sắp xếp thành công');
            }
            $this->redirect($_SERVER['HTTP_REFERER']);
        }

        $query = "SELECT * FROM tbl_faq_category ORDER BY weight, id DESC";
        $data['listItem'] = $this->db->createCommand($query)->queryAll();

        $this->render('index', array('data' => $data));
    }

    public function actionAdd() {
        $data = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            if (!empty($name)) {
                //`name`, `alias`, `is_vn`, `weight`
                $alias = change_url_seo($name);
                $params = array(
                    'name' => $name,
                    'alias' => $alias,                    
                    'weight' => 0
                );
                yii_insert_row('faq_category', $params);
                createMessage('Tạo danh mục thành công');
                $this->redirect($this->createUrl('index'));
            }
        }

        $this->render('add', array('data' => $data));
    }

    public function actionEdit() {
        $data = array();
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_faq_category WHERE id = " . $id;
        $data['row'] = $this->db->createCommand($query)->queryRow();


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            if (!empty($name)) {
                //`name`, `alias`, `is_vn`, `weight`
                $alias = change_url_seo($name);
                $params = array(
                    'name' => $name,
                    'alias' => $alias,
                    'weight' => 0
                );
                yii_update_row('faq_category', $params, 'id = ' . $id);
                createMessage('Sửa danh mục thành công');
                $this->redirect($this->createUrl('index'));
            }
        }

        $this->render('add', array('data' => $data));
    }

    public function actionDelete() {
        $id = $_GET['id'];
        $query = "DELETE FROM tbl_faq_category WHERE id = " . $id;
        $this->db->createCommand($query)->execute();
        createMessage('Xoá danh mục thành công');
        $this->redirect($this->createUrl('index'));
    }

}
