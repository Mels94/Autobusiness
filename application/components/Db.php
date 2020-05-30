<?php


namespace application\components;

class Db
{
    public static function getConnection()
    {
        $paramsPath = __DIR__.'/../config/db_params.php';
        $params = include ($paramsPath);
        $dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";
        try {
            $db = new \PDO($dsn, $params['user'], $params['password']);
            $db->exec("set name utf8");

            return $db;
        }catch (\PDOException $e){
            echo $e->getMessage();
        }

        return false;
    }
}