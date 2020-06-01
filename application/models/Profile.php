<?php


namespace application\models;

use application\components\Db;
use application\components\Validator;

class Profile
{
    private $name;
    private $surname;
    private $email;
    private $password;
    private $new_password;
    private $confirm_new_password;

    public function __construct($post)
    {
        if (isset($post['name']) && isset($post['surname']) && isset($post['email'])
            && isset($post['new_password']) && isset($post['confirm_new_password'])) {
            $this->name = $post['name'];
            $this->surname = $post['surname'];
            $this->email = $post['email'];
            $this->new_password = $post['new_password'];
            $this->confirm_new_password = $post['confirm_new_password'];
        }
        if (isset($post['password'])){
            $this->password = $post['password'];
        }
    }

    public function rules()
    {
        return [
            'required' => [
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'password' => $this->password,
                'new_password' => $this->new_password,
                'confirm_new_password' => $this->confirm_new_password,
            ],
            'name' => [
                'name' => $this->name,
                'surname' => $this->surname,
            ],
            'email' => [
                'email' => $this->email,
            ],
            'password' => [
                'password' => $this->password,
                'new_password' => $this->new_password,
                'confirm_new_password' => $this->confirm_new_password,
            ]
        ];
    }

    public function validate()
    {
        $validator = new Validator($this->rules());

        if (!empty($validator->validate())) {
            return $validator->validate();
        }
        if ($this->new_password != $this->confirm_new_password) {
            return ['confirm_new_password' => 'repeat the same password'];
        }
        $isPass = password_verify($this->password, '$2y$10$' . $this->selectUsersInfo()[0]['password']);
        if (!$isPass) {
            return ['password' => 'error password'];
        }
        $email =  $_SESSION['user']['email'];
        foreach ($this->getAllEmail() as $item){
            if ($item['email'] == $email){
                continue 1;
            }
            if ($this->email == $item['email']){
                return ['email' => 'there is such an email'];
            }
        }
        return [];
    }

    public function modalValidate()
    {
        if ($this->password == '') {
            return ['password' => 'password field is empty'];
        }
        $isPass = password_verify($this->password, '$2y$10$' . $this->selectUsersInfo()[0]['password']);
        if (!$isPass) {
            return ['password' => 'error password'];
        }
        return [];
    }

    private function getAllEmail(){
        $select = Db::getConnection()->prepare("SELECT `email` FROM `users`");
        $select->execute();
        return $select->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateUsers()
    {
        if ($this->validate() == []) {
            $email = $this->selectUsersInfo()[0]['email'];
            $password = User::hashPassword($this->new_password);
            $update = Db::getConnection()->prepare("UPDATE `users` SET `first_name`='$this->name', `last_name`='$this->surname',
                `email`='$this->email', `password`='$password' WHERE `email`='$email'");
            $_SESSION['user']['email'] = $this->email;
            return $update->execute();
        }
        return false;
    }

    public function selectUsersInfo()
    {
        $email =  $_SESSION['user']['email'];
        $select = Db::getConnection()->prepare("SELECT * FROM `users` WHERE `email`='$email'");
        $select->execute();
        return $select->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteUsers()
    {
        if ($this->modalValidate() == []) {
            $email = $this->selectUsersInfo()[0]['email'];
            $delete = Db::getConnection()->prepare("DELETE FROM `users` WHERE `email`='$email'");
            $delete->execute();
            if (isset($_COOKIE['cookie_key'])){
                setcookie('name', '', time() - (60 * 60 * 24), '/');
                setcookie('cookie_key', '', time() - (60 * 60 * 24), '/');
            }
            session_unset();
            session_destroy();
            return true;
        }
        return false;
    }

}