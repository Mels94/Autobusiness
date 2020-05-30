<?php


namespace application\controllers\admin;

use application\base\AdminBaseController;
use application\components\Auth;
use application\components\Upload;
use application\models\Product;


class ProductController extends AdminBaseController
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
        $this->view->setTitle('Product');
        $product = new Product($_POST);
        $arrProduct = $product->productIndex();
        if (!empty($product->productIndex())) {
            $this->view->render('admin/product/index', $arrProduct);
        }

        $this->view->render('admin/product/index', []);

        return true;
    }

    public function actionCreate()
    {
        $this->view->setTitle('Create Product');
        if (!empty($_FILES) && isset($_FILES['images']['name'])) {
            $_POST['images'] = $_FILES['images']['name'];
        }
        $product = new Product($_POST);
        $arrCategory = $product->selectCategory();
        if (!empty($_POST) && isset($_POST['categoryOption'])) {
            $categoryOption = $_POST['categoryOption'];
            foreach ($arrCategory as $item){
                if ($categoryOption == $item['id']){
                    $_FILES['categoryName'] = $item['name'];
                }
            }
        }
        $upload = new Upload($_FILES);
        if (!empty($_POST) && isset($_POST['submit'])) {
            $validate = $product->validate();
            if (!empty($product->validate())) {
                $this->view->render('admin/product/create', [$validate, $arrCategory]);
            }
            $upl_validate = $upload->validate();
            if (!empty($upload->validate())) {
                $this->view->render('admin/product/create', [$upl_validate, $arrCategory]);
            }
            if ($product->productCreate() === true) {
                Auth::redirect('/admin/product/index');
            }
        }
        $this->view->render('admin/product/create', [1, $arrCategory]);

        return true;
    }

    public function actionView($id)
    {
        $_POST['id'] = $id;
        $view = new Product($_POST);
        $arrView = $view->productView();

        $this->view->setTitle('View product');
        $this->view->render('admin/product/view', $arrView);

        return true;
    }

    public function actionUpdate($id)
    {
        $_POST['id'] = $id;
        if (!empty($_FILES) && isset($_FILES['images']['name'])) {
            $_POST['images'] = $_FILES['images']['name'];
        }
        $update = new Product($_POST);
        $arrUpdate = $update->productView();
        $arrCategory = $update->selectCategory();
        $_FILES['old_categoryName'] = $arrUpdate[0]['cat_name'];
        $_FILES['old_img'] = $arrUpdate[0]['img_path'];
        if (!empty($_POST) && isset($_POST['categoryOption'])) {
            $categoryOption = $_POST['categoryOption'];
            foreach ($arrCategory as $item){
                if ($categoryOption == $item['id']){
                    $_FILES['categoryName'] = $item['name'];
                }
            }
        }
        $upload = new Upload($_FILES);
        if (!empty($_POST) && isset($_POST['submit'])) {
            $validate = $update->validate();
            if (!empty($update->validate())) {
                $this->view->render('admin/product/update', [$validate, $arrCategory]);
            }
            $upl_validate = $upload->validate();
            if (!empty($upload->validate())) {
                $this->view->render('admin/product/update', [$upl_validate, $arrCategory]);
            }
            if ($update->productUpdate() === true) {
                Auth::redirect('/admin/product/index');
            }
        }
        $this->view->setTitle('Update');
        $this->view->render('admin/product/update', [$arrUpdate, $arrCategory]);

        return true;
    }

    public function actionDelete()
    {
        $delete = new Product($_POST);
        $delete->productDelete();
        if ($delete->productDelete()) {
            echo json_encode(1);
            return true;
        }
        return false;
    }
}