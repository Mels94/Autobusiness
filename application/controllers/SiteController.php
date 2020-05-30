<?php


namespace application\controllers;

use application\base\BaseController;
use application\components\Auth;
use application\models\Category;
use application\models\ContactForm;
use application\models\Order;
use application\models\Product;
use application\components\Pagination;
use application\components\Message;

class SiteController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionIndex()
    {
        $isNew = new Product($_POST);
        $arrIsNew = $isNew->isNewProduct();

        $this->view->setTitle('Autobusiness');
        $this->view->render('site/index', $arrIsNew);

        return true;
    }


    public function actionCategory($id)
    {
        $_POST['id'] = $id;
        $product = new Product($_POST);
        $oneCategory = $product->categoryIdProduct();
        $oneCategoryCount = $product->categoryIdProductCount();


        $this->view->setTitle('Category');
        $this->view->render('site/category', [$oneCategory, $oneCategoryCount]);

        return true;
    }

    public function actionProduct()
    {
        foreach ($_GET as $index => $item) {
            if (strlen($item) !== 0){
                break;
            }else{
                unset($_GET[$index]);
            }
        }
        $product = new Product($_POST, $_GET);
        $allProduct = $product->siteProductIndex();

        if (!empty($_POST) && isset($_POST['id'])){
            $categoryIdSelectProduct = $product->categoryIdSelectProduct();
            echo json_encode($categoryIdSelectProduct);die;
        }

        if (!empty($_GET) && isset($_GET['submit'])){
            $searchProduct = $product->searchProduct();
            $searchProductCount = $product->searchProductCount();
            $this->view->render('site/product', [$searchProduct, $searchProductCount]);
        }

        $this->view->setTitle('Product');
        $this->view->render('site/product', [$allProduct, []]);

        return true;
    }

    public function actionSingle_car($id)
    {
        $_POST['id'] = $id;
        $single = new Product($_POST);
        $single_car = $single->productView();
        $arrIsNew = $single->isNewProduct();

        $this->view->setTitle('Single Car');
        $this->view->render('site/single_car', [$single_car, $arrIsNew]);

        return true;
    }

    public function actionContact()
    {
        if (!empty($_POST) && isset($_POST['submit'])){
            $contact = new ContactForm($_POST);
            if (!empty($contact->validate())){
                $validate = $contact->validate();
                echo json_encode(['success' => false, 'message' => $validate]);
                die;
            }
            if ($contact->insertContact() == true){
                echo json_encode(['success' => true, 'message' => 'Successful!']);
                die;
            }
        }

        $this->view->setTitle('Contact');
        $this->view->render('site/contact', []);

        return true;
    }

    public function actionAbout()
    {
        $this->view->setTitle('About');
        $this->view->render('site/about', []);

        return true;
    }

    public function actionCart()
    {
        if (!empty($_POST) && isset($_POST)){
            $cart = new Order($_POST);
            echo json_encode($cart->orderProductIDCount());
            die;
        }

        $this->view->setTitle('Cart');
        $this->view->render('site/cart', []);

        return true;
    }

    public function actionCheckout()
    {
        if (!Auth::checkLogged()) {
            Auth::redirect('/user/login');
            die;
        }
        if (!empty($_POST) && isset($_POST['submit'])){
            $checkout = new Order($_POST);
            $validate = $checkout->validate();
            if (!empty($checkout->validate())){
                echo json_encode(['success'=>false,'message' => $validate]);
                die;
            }
            if ($checkout->insertOrder()){
                $checkout->orderDeleteProductCount();
                echo json_encode(['success'=>true,'message' => 'Successful! We will send in five days']);
                die;
            }
        }
        $this->view->setTitle('checkout');
        $this->view->render('site/checkout', []);
        return true;
    }

    public function actionError()
    {
        $this->view->setLayout('error');
        $this->view->setTitle('error');
        $this->view->render('layout/error', []);

        return true;
    }

    public function actionLogout()
    {
        Auth::logout();
    }
}