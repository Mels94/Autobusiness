<?php


namespace application\controllers\admin;

use application\base\AdminBaseController;
use application\models\Order;
use application\components\Auth;

class OrderController extends AdminBaseController
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
        $this->view->setTitle('Order');
        $order = new Order($_POST);

        if ($order->orderIndex()){
            $arrOrder = $order->orderIndex();
            $this->view->render('admin/order/index', $arrOrder);
        }
        $this->view->render('admin/order/index', []);
        return true;
    }

    public function actionView($id)
    {
        $_POST['id'] = $id;
        $view = new Order($_POST);
        $arrView = $view->orderView();

        $this->view->setTitle('View Order');
        $this->view->render('admin/order/view', $arrView);
        return true;
    }

    public function actionUpdate($id)
    {
        $_POST['id'] = $id;
        $updateOrder = new Order($_POST);
        $arrUpdate = $updateOrder->orderView();
        $oldProductOrder = json_decode($arrUpdate[0]['product_order']);
        $arr = [];
        foreach ($oldProductOrder as $item){
            array_push($arr, ['product_id' => $item->product_id, 'count' => $item->count]);
        }
        $_SESSION['oldProductArr'] = $arr;

        if (!empty($_POST) && isset($_POST['submit'])){
            $validate = $updateOrder->validate();
            if (!empty($updateOrder->validate())) {
                $this->view->render('admin/order/update', [$validate, $arrUpdate]);
            }
            if ($updateOrder->orderUpdate()) {
                $updateOrder->oldOrderAddProduct();
                $updateOrder->newOrderAddProduct();
                unset($_SESSION['oldProductArr']);
                Auth::redirect('/admin/order/index');
            }
        }
        $this->view->setTitle('Update Order');
        $this->view->render('admin/order/update', [1, $arrUpdate]);
        return true;
    }

    public function actionUpdateIsNew(){
        $isNew = new Order($_POST);
        if ($isNew->updateOrderIsNew() == true){
            echo json_encode(1);
            die;
        }
    }

    public function actionIsNew(){
        $isNew = new Order($_POST);
        if ($isNew->selectOrderIsNewCount() == true){
            echo json_encode($isNew->selectOrderIsNewCount());
            die;
        }
        echo json_encode(0);
        die;
    }

    public function actionDelete()
    {
        $delete = new Order($_POST);
        if ($delete->orderDelete()){
            echo json_encode(1);
            return true;
        }
        return false;
    }
}