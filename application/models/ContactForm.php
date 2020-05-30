<?php


namespace application\models;

use application\components\Db;
use application\components\Validator;

class ContactForm
{
    private $name;
    private $email;
    private $subject;
    private $message;
    private $answer;
    private $id;

    public function __construct($post)
    {
        if (isset($post['name']) && isset($post['subject']) && isset($post['message'])){
            $this->name = $post['name'];
            $this->subject = $post['subject'];
            $this->message = $post['message'];
        }
        if (isset($post['email'])){
            $this->email = $post['email'];
        }
        if (isset($post['answer'])){
            $this->answer = $post['answer'];
        }
        if (isset($post['id'])){
            $this->id = $post['id'];
        }
    }

    protected function rules()
    {
        return [
            'required' => [
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                'message' => $this->message
            ],
            'name' => [
                'name' => $this->name,
                'subject' => $this->subject
            ],
            'email' => [
                'email' => $this->email
            ]
        ];
    }

    public function validate(){
        $validator = new Validator($this->rules());
        if (!empty($validator->validate())){
            return $validator->validate();
        }
        return [];
    }

    public function answerValidate(){
        if (isset($this->email) && $this->email == '') {
            return ['email' => 'email empty'];
        }
        if (isset($this->email) && !preg_match('#^[a-zA-Z0-9-.]{1,40}+@[a-z]{2,5}+\.[a-z]{2,3}$#', $this->email)) {
            return ['email' => 'email error'];
        }
        if (isset($this->answer) && $this->answer == '') {
            return ['answer' => 'answer field is empty'];
        }
        return [];
    }

    public function insertContact(){
        if ($this->validate() == []){
            Db::getConnection()->exec(CONTACT_TABLE);
            $insert = Db::getConnection()->prepare("INSERT INTO `contact` (`name`, `email`, `subject`, `message`, `isNew`, `create_time`) 
                VALUES (?, ?, ?, ?, '1', now())");
            return $insert->execute([$this->name, $this->email, $this->subject, $this->message]);
        }
        return false;
    }

    public function contactIndex(){
        $select = Db::getConnection()->prepare("SELECT * FROM `contact` ORDER BY `id` DESC");
        $select->execute();
        return $select->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function sendEmail(){
        if ($this->answerValidate() == []){
            $to = "$this->email";
            $subject = "AUTOBUSINESS";
            $message = "$this->answer";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <info@melsgitc.tk>' . "\r\n";
            if (mail($to, $subject, $message, $headers)){
                return true;
            }
        }
        return false;
    }

    public function updateContactIsNew(){
        $update = Db::getConnection()->prepare("UPDATE `contact` SET `isNew`='0' WHERE `id`='$this->id'");
        return $update->execute();
    }

    public function selectContactIsNewCount(){
        $select = Db::getConnection()->prepare("SELECT * FROM `contact` WHERE `isNew`='1'");
        $select->execute();
        return $rowCount = $select->rowCount();
    }

    public function contactDelete(){
        $delete = Db::getConnection()->prepare("DELETE FROM `contact` WHERE `id`='$this->id'");
        return $delete->execute();
    }
}