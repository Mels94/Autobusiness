<?php

namespace application\models;

use application\components\Db;

class User
{
    public static function findByEmail($email)
    {
        $user = Db::getConnection()->prepare("SELECT * FROM `users` WHERE `email`='$email'"); // get user by email
        $user->execute();
        $user_info = $user->fetchAll(\PDO::FETCH_ASSOC);
        if($user_info) {
            return $user_info;
        }
        return false;
    }

    public static function forgotPassword($password)
    {
        // this method for later
    }

    public static function hashPassword($password)
    {
        return str_replace('$2y$10$', '', password_hash($password, PASSWORD_BCRYPT));
    }

    public static function findById($id)
    {
        $user = Db::getConnection()->prepare("SELECT * FROM `users` WHERE `id`='$id'"); // get user by id
        $user->execute();
        if($user) {
            return $user;
        }
        return false;
    }

    public static function generateAuthKey()
    {
        return md5(rand(1,999)); // for example
    }
}