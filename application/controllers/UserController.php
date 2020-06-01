<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:28
 */

namespace application\controllers;

use application\base\BaseController;
use application\components\Auth;
use application\models\LoginForm;
use application\models\SignupForm;
use application\models\Profile;

class UserController extends BaseController
{
    public function actionRegister()
    {
        $this->view->setTitle('Registration');
        if (!empty($_POST) && isset($_POST['submit'])) {
            $registration = new SignupForm($_POST);
            $validate = $registration->validate();
            if (!empty($validate)) {
                $this->view->render('user/register', $validate);die;
            }
            if ($registration->register()){
                Auth::redirect('/user/login');
            }
        }
        $this->view->render('user/register', []);

        return true;
    }

    public function actionLogin()
    {
        $this->view->setTitle('Login');
        if (!empty($_POST) && isset($_POST['submit'])){
            $login = new LoginForm($_POST);
            $validate = $login->validate();
            if (!empty($validate)) {
                $this->view->render('user/login', $validate);
            }
            if ($login->login()){
                Auth::redirect('/');
            }
        }
        $this->view->render('user/login', []);

        return true;
    }

    public function actionProfile()
    {
        if (!Auth::checkLogged()) {
            Auth::redirect('/');
            die;
        }
        $profile = new Profile($_POST);
        $arrProfile = $profile->selectUsersInfo();
        if (!empty($_POST) && isset($_POST['submit'])){
            if (!empty($profile->validate())){
                $this->view->render('/user/profile', [$profile->validate(), $arrProfile]);
            }
            if ($profile->updateUsers()){
                Auth::redirect('/user/profile');
            }
        }
        $this->view->setTitle('My profile');
        $this->view->render('user/profile', [1, $arrProfile]);

        return true;
    }

    public function actionDelete()
    {
        if (!empty($_POST) && isset($_POST['password'])){
            $delete = new Profile($_POST);
            $validate = $delete->modalValidate();
            if (!empty($delete->modalValidate())){
                echo json_encode(['success' => false, 'message' => $validate]);
                die;
            }
            if ($delete->deleteUsers() == true){
                echo json_encode(['success' => true, 'message' => 'Successful!']);
                die;
            }
            return true;
        }
        return false;
    }
}