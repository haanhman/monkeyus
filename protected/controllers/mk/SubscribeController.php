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
class SubscribeController extends MkController {

    public function init() {
        parent::init();
    }

    public function actionIndex() {



        $query = "SELECT email FROM tbl_subscribe";
        $result = $this->db->createCommand($query)->queryColumn();
        echo '<h1>Count: ' . count($result) . '</h1>';
        foreach($result as $item) {
            echo $item . '<br />';
        }
    }

}
