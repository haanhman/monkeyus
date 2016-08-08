<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author anhmantk
 */
class BlogController extends FontendController {

    public function init() {
        parent::init();
    }


    /**
     * @meta 1
     */
    public function actionIndex() {        
        $data = array();
        $this->render_meta = true;
        $query_count = "SELECT COUNT(id) FROM tbl_blog WHERE status = 1";
        $item_count = $this->db->createCommand($query_count)->queryScalar();

        $pages = new CPagination($item_count);
        $perPage = 5;
        if($this->is_mobile) {
            $perPage = 10;
        }
        $pages->setPageSize($perPage);

        $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
        if ($page <= 0) {
            $page = 1;
        }

        $offset = ($page - 1) * $perPage;

        $query = "SELECT * FROM tbl_blog WHERE status = 1 ORDER BY id DESC "
                . "LIMIT " . $offset . "," . $perPage;
        $data['listItem'] = $this->db->createCommand($query)->queryAll();


        //lay danh sach cac bai viet tieu bieu
        $query = "SELECT title, alias FROM tbl_blog WHERE is_popular = 1 AND status = 1 ORDER BY id DESC";
        $data['popular'] = $this->db->createCommand($query)->queryAll();


        $view = 'index';
        if ($this->is_mobile) {
            $view = 'mobile/index';
        }

        $this->render($view, array(
            'data' => $data,
            'item_count' => $item_count,
            'page_size' => $perPage,
            'pages' => $pages,
        ));
    }
    
    public function actionDetail() {
        $alias = $_GET['alias'];
        if($_SERVER['REQUEST_URI'] == '/privacy-policy.html') {
            $alias = 'privacy-policy';
        }
        if($_SERVER['REQUEST_URI'] == '/terms-and-conditions.html') {
            $alias = 'terms-and-conditions';
        }


        $data = array();
        //lay danh sach cac bai viet tieu bieu
        $query = "SELECT title, alias FROM tbl_blog WHERE is_popular = 1 AND status = 1 ORDER BY id DESC";
        $data['popular'] = $this->db->createCommand($query)->queryAll();



        $query = "SELECT * FROM tbl_blog WHERE alias = :alias";
        $data['row'] = $this->db->createCommand($query)->bindValues(array(':alias' => $alias))->queryRow();
        if (empty($data['row'])) {
            $this->redirect($this->createUrl('blog/index'));
        }

        $meta_title = $data['row']['title'];
        if(!empty($data['row']['meta_title'])) {
            $meta_title = $data['row']['meta_title'];
        }
        $this->setMetaTitle($meta_title);
        $this->setMetaKeywords($data['row']['meta_keywords']);
        $this->setMetaDescription($data['row']['meta_description']);
        if(!empty($data['row']['og_image'])) {
            $this->setMetaImage($data['row']['og_image']);
        }

        $view = 'blog_detail';
        if ($this->is_mobile) {
            $view = 'mobile/blog_detail';
        }
        if(!$this->is_vn) {
            $view .= '_us';
        }

        $this->render($view, array('data' => $data));
    }

}
