<?php
namespace application\controllers\admin;

use application\base\AdminBaseController;
use application\components\Auth;
use application\models\Category;

class CategoryController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        if (!Auth::checkLogged()) {
            Auth::redirect('/');
            die;
        }
        if (!Auth::isAdmin('admin')) {
            Auth::redirect('/');
        }
    }

    public function actionIndex()
    {
        $this->view->setTitle('Category');
        $category = new Category($_POST);
        $arrCategory = $category->categoryIndex();
        if (!empty($category->categoryIndex())){
            $this->view->render('admin/category/index', $arrCategory);
        }
        $this->view->render('admin/category/index', []);

        return true;
    }

    public function actionCreate()
    {
        if (!empty($_POST) && isset($_POST['submit'])){
            $category = new Category($_POST);
            $validate = $category->validate();
            if (!empty($category->validate())){
                $this->view->render('admin/category/create', $validate);
            }
            if ($category->categoryCreate()){
                Auth::redirect('/admin/category/index');
            }
        }
        $this->view->setTitle('Create Category');
        $this->view->render('admin/category/create', []);

        return true;
    }

    public function actionView($id)
    {
        $_POST['id'] = $id;
        $view = new Category($_POST);
        $arrView = $view->categoryView();

        $this->view->setTitle('View category');
        $this->view->render('admin/category/view', $arrView);

        return true;
    }

    public function actionUpdate($id)
    {
        $_POST['id'] = $id;
        $update = new Category($_POST);
        $arrUpdate = $update->categoryUpdate();

        if (!empty($_POST) && isset($_POST['submit'])){
            $validate = $update->validate();
            if (!empty($update->validate())){
                $this->view->render('admin/category/update', $validate);
            }
            if ($update->categoryUpdate() === true){
                Auth::redirect('/admin/category/index');
            }
        }
        $this->view->setTitle('Update');
        $this->view->render('admin/category/update', $arrUpdate);

        return true;
    }

    public function actionDelete()
    {
        $delete = new Category($_POST);
        $delete->categoryDelete();
        if ($delete->categoryDelete()){
            echo json_encode(1);
            return true;
        }
        return false;
    }
}