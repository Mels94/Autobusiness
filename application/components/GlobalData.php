<?php


namespace application\components;
use application\components\Db;

class GlobalData
{
    public static function allCategory()
    {
        $category = Db::getConnection()->prepare("SELECT * FROM `category` GROUP BY `name`");
        $category->execute();
        return $category->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function allProduct()
    {
        $product = Db::getConnection()->prepare("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id`");
        $product->execute();
        return $product->fetchAll(\PDO::FETCH_ASSOC);
    }
}