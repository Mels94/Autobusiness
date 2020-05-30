<?php

namespace application\controllers\admin;

use application\base\AdminBaseController;
use application\base\BaseView;
use application\components\Auth;
use application\components\Db;
use application\components\Pagination;
use application\models\Category;
use application\models\LoginForm;
use application\models\Profile;

class DashboardController extends AdminBaseController
{
    public function actionIndex()
    {
        if (!Auth::checkLogged()) {
            Auth::redirect('/admin/dashboard/login');
            die;
        }
        if (!Auth::isAdmin('admin')) {
            Auth::redirect('/');
        }
        $this->view->setTitle('Admin');
        $this->view->render('admin/dashboard/index', []);

        return true;
    }

    public function actionLogin()
    {
        $this->view->setTitle('Admin Login');
        if (!empty($_POST) && isset($_POST['submit'])) {
            $admin_model = new LoginForm($_POST);
            if ($admin_model->login()) {
                Auth::redirect('/admin');
            }
        }
        $this->view->setLayout('adminLogin');
        $this->view->render('admin/dashboard/login', []);
        return true;
    }

    public function actionProfile()
    {
        if (!Auth::checkLogged()) {
            Auth::redirect('/');
            die;
        }
        if (!Auth::isAdmin('admin')) {
            Auth::redirect('/');
        }
        $this->view->setTitle('Profile');
        $profile = new Profile($_POST);
        $arrProfile = $profile->selectUsersInfo();
        if (!empty($_POST) && isset($_POST['submit'])){
            $validate = $profile->validate();
            if (!empty($profile->validate())){
                $this->view->render('admin/dashboard/profile', [$validate, $arrProfile]);
            }
            if ($profile->updateUsers()){
                Auth::redirect('/admin/dashboard/profile');
            }
        }
        $this->view->render('admin/dashboard/profile', [1, $arrProfile]);
        return true;
    }

}