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
class BlogController extends MkController {

    public function init() {
        parent::init();
    }

    public function actionIndex() {
        
        $query = "SELECT * FROM tbl_blog ORDER BY id DESC";        
        $data['listItem'] = $this->db->createCommand($query)->queryAll();
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
                $params['created'] = time();
                $params['alias'] = change_url_seo($params['title']);
                yii_insert_row('blog', $params);
                createMessage('Tạo hướng dẫn thành công');
                $this->redirect($this->createUrl('index'));
            }
        }
        $this->render('add', array('data' => $data));
    }

    public function actionEdit() {
        $data = array();
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_blog WHERE id = " . $id;
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
                yii_update_row('blog', $params, 'id = ' . $id);
                createMessage('Sửa hướng dẫn thành công');
                $this->redirect($this->createUrl('index'));
            }
        }
        $this->render('add', array('data' => $data));
    }

    public function actionDelete() {
        $id = $_GET['id'];
        $query = "DELETE FROM tbl_blog WHERE id = " . $id;
        $this->db->createCommand($query)->execute();
        createMessage('Xoá nội dung thành công');
        $this->redirect($this->createUrl('index'));
    }

}
