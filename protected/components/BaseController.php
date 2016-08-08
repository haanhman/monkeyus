<?php

class BaseController extends CController {

    public static $permission;
    protected $user;
    protected $_model;
    protected $lang;
    protected $lang_id;
    protected $list_os;
    protected $current_os = 0;

    /**
     *
     * @var CDbConnection
     */
    protected $db;  
    
    
    public function init() {
        parent::init();
        
        $this->db = EduDataBase::getConnection();
        $this->user = Yii::app()->session['user'];
        if (empty($this->user)) {
            $query_string = '?dest=' . base64_encode($_SERVER['REQUEST_URI']);
            $redirect = '/mk/login/index' . $query_string;            
            $this->redirect($redirect);
        }
            
        Yii::import('application.models.users.*');
        
        Yii::app()->setSystemViewPath(ROOT_PATH . '/protected/views/system');
    }

}
