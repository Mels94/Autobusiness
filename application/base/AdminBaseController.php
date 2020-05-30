<?php

namespace application\base;

use application\components\Auth;
use application\components\Db;

class AdminBaseController
{
    protected $view;

    public function __construct()
    {
        $this->view = new BaseView();
        $this->view->setLayout('admin');
    }
}