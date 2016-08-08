<?php

class RedirectController extends CController {
    protected $domain;

    public function init() {
        parent::init();
        $this->domain = 'http://pay.monkeyjunior.com';
        $redirect = $this->domain . $_SERVER['REQUEST_URI'];
        $this->redirect($redirect);
    }
}
