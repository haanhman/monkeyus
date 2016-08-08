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
class FaqController extends MkController {

    public function init() {
        parent::init();
    }

    public function actionIndex() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $arr = explode(',', $_POST['sort_faq']);
            $arr = array_filter($arr);
            if (!empty($arr)) {
                $query = "UPDATE tbl_faqs SET weight = :weight WHERE id = :id";
                $i = 1;
                foreach ($arr as $app_id) {
                    $values = array(':weight' => $i++, ':id' => $app_id);
                    $this->db->createCommand($query)->bindValues($values)->execute();
                }
                createMessage('Sắp xếp thành công');
            }
            $this->redirect($_SERVER['HTTP_REFERER']);
        }

        $query = "SELECT * FROM tbl_faqs ORDER BY weight, id DESC";
        if ($_GET['cate_id'] > 0) {
            $query = "SELECT * FROM tbl_faqs WHERE cate_id = " . $_GET['cate_id'] . " ORDER BY weight, id DESC";
        }
        
        $data['listItem'] = $this->db->createCommand($query)->queryAll();
        $data['category'] = $this->getFAQsCategory();
        $this->render('index', array('data' => $data));
    }

    
    


    public function actionAdd() {
        $data = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = $_POST;
            $errors = array();
            if (empty($params['title'])) {
                $errors[] = 'Vui lòng nhập tiêu đề';
            }
            if (empty($params['content'])) {
                $errors[] = 'Vui lòng nhập nội dung';
            }
            $data['row'] = $_POST;
            if (!empty($errors)) {
                createMessage($errors, 'error');
            } else {
                $params['alias'] = change_url_seo($params['title']);
                yii_insert_row('faqs', $params);
                createMessage('Tạo hướng dẫn thành công');
                $this->redirect($this->createUrl('index'));
            }
        }
        $data['category'] = $this->getFAQsCategory();
        $this->render('add', array('data' => $data));
    }

    public function actionEdit() {
        $data = array();
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_faqs WHERE id = " . $id;
        $data['row'] = $this->db->createCommand($query)->queryRow();


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = $_POST;
            $errors = array();
            if (empty($params['title'])) {
                $errors[] = 'Vui lòng nhập tiêu đề';
            }
            if (empty($params['content'])) {
                $errors[] = 'Vui lòng nhập nội dung';
            }
            $data['row'] = $_POST;
            if (!empty($errors)) {
                createMessage($errors, 'error');
            } else {
                yii_update_row('faqs', $params, 'id = ' . $id);
                createMessage('Sửa hướng dẫn thành công');
                $this->redirect($this->createUrl('index'));
            }
        }
        $data['category'] = $this->getFAQsCategory();
        $this->render('add', array('data' => $data));
    }

    public function actionDelete() {
        $id = $_GET['id'];
        $query = "DELETE FROM tbl_faqs WHERE id = " . $id;
        $this->db->createCommand($query)->execute();
        createMessage('Xoá nội dung thành công');
        $this->redirect($this->createUrl('index'));
    }

}
