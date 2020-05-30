<?php

namespace application\models;

use application\components\Db;
use application\components\Validator;

include_once 'application/config/define.php';

class SignupForm
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $confirm_password;

    public function __construct($post)
    {
        $this->first_name = $post['first_name'];
        $this->last_name = $post['last_name'];
        $this->email = $post['email'];
        $this->password = $post['password'];
        $this->confirm_password = $post['confirm_password'];
    }

    public function rules()
    {
        return [
            'required' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'password' => $this->password,
                'confirm_password' => $this->confirm_password,
            ],
            'name' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
            ],
            'email' => [
                'email' => $this->email,
            ],
            'password' => [
                'password' => $this->password,
                'confirm_password' => $this->confirm_password,
            ]
        ];
    }

    public function validate()
    {
        $validator = new Validator($this->rules());

        if (!empty($validator->validate())) {
            return $validator->validate();
        }
        if ($this->password != $this->confirm_password) {
            return ['confirm_password' => 'repeat the same password'];
        }
        foreach ($this->getAllEmail() as $item){
            if ($this->email == $item['email']){
                return ['email' => 'there is such an email'];
            }
        }

        return [];
    }

    private function getAllEmail(){
        $select = Db::getConnection()->prepare("SELECT `email` FROM `users`");
        $select->execute();
        return $select->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function register()
    {
        if ($this->validate() == []){
            Db::getConnection()->exec(CREATE_TABLE);
            $password = User::hashPassword($this->password);
            $insert = Db::getConnection()->prepare("INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `cookie_key`, `role`)
                        VALUES (?, ?, ?, ?, NULL, 'user')");
            $insert->execute([$this->first_name, $this->last_name, $this->email, $password]);

            return true;
        }
        return false;

    }
}