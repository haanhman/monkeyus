<?php

class MkController extends BaseController {

    /**
     *
     * @var CDbConnection
     */
    protected $db;
    protected $is_vn = 0;

    public function init() {
        parent::init();
        $this->db = EduDataBase::getConnection('db');        
        global $us_content;        
        if($us_content == 0) {
            $this->is_vn = 1;
        }
        
    }

    protected function getFAQsCategory() {
        $query = "SELECT * FROM tbl_faq_category ORDER BY weight ASC";
        $result = $this->db->createCommand($query)->queryAll();
        $data = array();
        foreach ($result as $item) {
            $data[$item['id']] = $item;
        }
        return $data;
    }

}
