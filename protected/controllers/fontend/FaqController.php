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
class FaqController extends FontendController
{

    public function init()
    {
        parent::init();
    }

    /**
     * @meta 1
     */
    public function actionIndex()
    {
        $data = array();


        $data['category'] = $this->getFAQsCategory();
        $category = array();

        if ($this->my_action == 'faqcategory') {
            $exits = false;
            foreach ($data['category'] as $item) {
                if ($_GET['alias'] == $item['alias']) {
                    $category = $item;
                    $exits = true;
                    break;
                }
            }
            if (!$exits) {
                $this->redirect($this->createUrl('faq'));
            }
        }
        if (!empty($category)) {
            $cate_id = $category['id'];
        }


        $data['faq_alias'] = '';
        if ($this->my_action == 'faqdetail') {
            $data['faq_alias'] = $_GET['alias'];
            $query = "SELECT cate_id FROM tbl_faqs WHERE alias = '" . addslashes($data['faq_alias']) . "'";
            $cate_id = $this->db->createCommand($query)->queryScalar();
            if (empty($cate_id)) {
                $this->redirect($this->createUrl('faq'));
            }
        }
        $where = " AND cate_id <> 6";
        if ($cate_id > 0) {
            $data['cate_id'] = $cate_id;
            $where .= " AND cate_id = " . $cate_id;
        }


        $query = "SELECT * FROM tbl_faqs WHERE 1 " . $where . " ORDER BY weight, id DESC";
        $data['listItem'] = $this->db->createCommand($query)->queryAll();
        $row = array();
        if ($data['faq_alias'] != '') {
            foreach ($data['listItem'] as $item) {
                if ($item['alias'] == $data['faq_alias']) {
                    $row = $item;
                    break;
                }
            }
        }


        $this->render_meta = true;

        if ($this->my_action == 'faqcategory') {
            $this->render_meta = false;
            $title = 'Những câu hỏi thường gặp ở mục ' . $category['name'];
            $desc = 'Những câu hỏi thường gặp ở mục ' . $category['name'] . ' trong chương trình học tiếng Anh - Monkey Junior';
            $keywords = $category['name'] . ', câu hỏi thường gặp, monkey junior, early start';

            if (!$this->is_vn) {
                $title = 'Frequently asked questions in ' . $category['name'];
                $desc = 'Frequently asked questions in ' . $category['name'] . ' - Learn to read with Monkey Junior ';
                $keywords = $category['name'] . ', FAQ, monkey junior, learn to read, early start';
            }

            $this->setMetaKeywords($keywords);
            $this->setMetaTitle($title);
            $this->setMetaDescription($desc);

        }

        if ($this->my_action == 'faqdetail') {
            $this->render_meta = fase;
            $title = $row['title'];
            $desc = 'Tập hợp những câu hỏi thường gặp (FAQ) của người dùng trong quá trình sử dụng App - ' . $row['title'];
            $keywords = $row['title'] . ', monkey junior, early start, faq, câu hỏi thường gặp, thắc mắc';

            $this->setMetaKeywords($keywords);
            $this->setMetaTitle($title);
            $this->setMetaDescription($desc);

        }

        $view = 'index';
        if ($this->is_mobile) {
            $view = 'mobile/index';
        }
        $this->render($view, array('data' => $data));
    }

    public function actionFaqDetail()
    {
        $this->my_action = Yii::app()->controller->action->id;
        $this->forward('index');
    }

    public function actionFaqCategory()
    {
        $this->my_action = Yii::app()->controller->action->id;
        $this->forward('index');
    }

    private function getFAQsCategory()
    {
        $data = array();
        $query = "SELECT * FROM tbl_faq_category WHERE id <> 6 ORDER BY weight ASC";
        $result = $this->db->createCommand($query)->queryAll();
        foreach ($result as $item) {
            $data[] = $item;
        }
        return $data;
    }

}
