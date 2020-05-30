<?php


namespace application\controllers\admin;


use application\base\AdminBaseController;
use application\components\Auth;
use application\models\ContactForm;

class ContactController extends AdminBaseController
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

    public function actionIndex(){

        $contact = new ContactForm($_POST);
        $contactIndex = $contact->contactIndex();

        $this->view->setTitle('Contact');
        $this->view->render('admin/contact/index', $contactIndex);

        return true;
    }

    public function actionMail(){
        $mail = new ContactForm($_POST);
        if (!empty($mail->answerValidate())){
            $validate = $mail->answerValidate();
            echo json_encode(['success' => false, 'message' => $validate]);
            die;
        }
        if ($mail->sendEmail() == true){
            echo json_encode(['success' => true, 'message' => 'Successful!']);
            die;
        }
        return true;
    }

    public function actionUpdate(){
        $isNew = new ContactForm($_POST);
        if ($isNew->updateContactIsNew() == true){
            echo json_encode(1);
            die;
        }
    }

    public function actionIsNew(){
        $isNew = new ContactForm($_POST);
        if ($isNew->selectContactIsNewCount() == true){
            $isNew->selectContactIsNewCount();
            echo json_encode($isNew->selectContactIsNewCount());
            die;
        }
        echo json_encode(0);
        die;
    }

    public function actionDelete(){
        $delete = new ContactForm($_POST);
        if ($delete->contactDelete() == true){
            echo json_encode(1);
            die;
        }
    }



}