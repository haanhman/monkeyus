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
class ReviewController extends MkController {

    public function init() {
        parent::init();
    }

    public function actionIndex() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $arr = explode(',', $_POST['sort_faq']);
            $arr = array_filter($arr);
            if (!empty($arr)) {
                $query = "UPDATE tbl_review SET weight = :weight WHERE id = :id";
                $i = 1;
                foreach ($arr as $app_id) {
                    $values = array(':weight' => $i++, ':id' => $app_id);
                    $this->db->createCommand($query)->bindValues($values)->execute();
                }
                createMessage('Sắp xếp thành công');
            }
            $this->redirect($_SERVER['HTTP_REFERER']);
        }

        $query = "SELECT * FROM tbl_review ORDER BY weight, id DESC";
        $data['listItem'] = $this->db->createCommand($query)->queryAll();

        $this->render('index', array('data' => $data));
    }

    public function actionAdd() {
        $data = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = $_POST;
            $errors = array();
            if (empty($params['name'])) {
                $errors[] = 'Vui lòng nhập tên';
            }
            if (empty($params['content'])) {
                $errors[] = 'Vui lòng nhập nội dung';
            }
            $data['row'] = $_POST;
            if (!empty($errors)) {
                createMessage($errors, 'error');
            } else {                
                yii_insert_row('review', $params);
                createMessage('Tạo review thành công');
                $this->redirect($this->createUrl('index'));
            }
        }

        $this->render('add', array('data' => $data));
    }
    
    public function actionEdit() {
        $data = array();
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_review WHERE id = " . $id;
        $data['row'] = $this->db->createCommand($query)->queryRow();
        
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = $_POST;
            $errors = array();
            if (empty($params['name'])) {
                $errors[] = 'Vui lòng nhập tên';
            }
            if (empty($params['content'])) {
                $errors[] = 'Vui lòng nhập nội dung';
            }
            $data['row'] = $_POST;
            if (!empty($errors)) {
                createMessage($errors, 'error');
            } else {
                yii_update_row('review', $params, 'id = ' . $id);
                createMessage('Sửa review thành công');
                $this->redirect($this->createUrl('index'));
            }
        }

        $this->render('add', array('data' => $data));
    }
    
    public function actionDelete() {
        $id = $_GET['id'];
        $query = "DELETE FROM tbl_review WHERE id = " .$id;
        $this->db->createCommand($query)->execute();
        createMessage('Xoá nội dung thành công');
        $this->redirect($this->createUrl('index'));
    }
    
}
