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
class LoginController extends CController {

    protected $user;

    public function init() {
        $this->layout = null;
        $this->user = Yii::app()->session['user'];
        parent::init();
        Yii::import('application.models.users.*');
    }

    //put your code here
    public function actionIndex() {
        $data = array();
        if (!empty($_GET['dest'])) {
            $redirect = base64_decode($_GET['dest']);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_GET['dest'])) {
                if ($_POST['system'] == 'card') {
                    $redirect = $this->createUrl('home/index');
                } else {
                    $redirect = '/global';
                }
            }


            $email = $_POST['email'];
            $password = $_POST['password'];
            $condition = new CDbCriteria();
            $condition->condition = 'email = :email AND password = :password';
            $condition->params = array(':email' => $email, ':password' => md5($password));
            $user = User::model()->find($condition);
            if (!empty($user)) {
                Yii::app()->session['user'] = $user->attributes;
                if ($user->id == 16) {
                    $this->redirect($this->createUrl('reviewsentence/index', array('lang_id' => 1)));
                }
                if ($user->access_url) {
                    $redirect = '/' . trim($user->access_url, '/');
                }
                if ($user->is_agent == 1) {
                    $redirect = '/agent';
                }
                
                $this->redirect($redirect);
            } else {
                $data['error'] = 'Email hoặc mật khẩu không đúng';
            }
        } else {
            $user = Yii::app()->session['user'];
            if (!empty($user)) {
                if ($user->id == 13) {
                    $redirect = $this->createUrl('reviewsentence/index');
                }
                $this->redirect($redirect);
            }
        }
        $this->renderPartial('index', array('data' => $data));
    }

    public function actionChangePassword() {
        $lang = 'vi';
        Yii::app()->sourceLanguage = '00';
        Yii::app()->language = $lang;
        Yii::import('application.models.form.admin.ChangePasswordForm');
        $data = array();
        $form = new ChangePasswordForm();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form->attributes = $_POST['ChangePasswordForm'];
            if ($form->validate()) {
                $id = Yii::app()->session['user']['id'];
                $user = User::model()->findByPk($id);
                $user->password = md5($form->password);
                $user->save();
                Yii::app()->session['user'] = $user->attributes;
                createMessage('Thay đổi mật khẩu thành công');
                $this->redirect($this->createUrl('changepassword'));
            }
        }
        $data['form'] = $form;
        $this->render('change_password', array('data' => $data));
    }

    public function actionLogout() {
        $user = Yii::app()->session['user'];
        if (!empty($user)) {
            unset(Yii::app()->session['user']);
            Yii::app()->session->clear();
        }
        $this->redirect($this->createUrl('login/index'));
    }

}
