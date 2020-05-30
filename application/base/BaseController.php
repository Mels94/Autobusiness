<?php


namespace application\base;

use application\components\Auth;

class BaseController
{
    protected $view;

    public function __construct()
    {
        $this->view = new BaseView();
        $this->view->setLayout('main');
    }
}