<?php


namespace application\models;

use application\components\Db;
use application\components\Pagination;
use application\components\Validator;
use application\components\Upload;

class Product
{
    private $name;
    private $categoryOption;
    private $images;
    private $radio;
    private $date;
    private $gearBox;
    private $motor;
    private $run;
    private $horsepower;
    private $color;
    private $desc;
    private $price;
    private $count;
    private $id;
    private $drop;
    private $brand;
    private $mark;
    private $minPrice;
    private $maxPrice;

    public function __construct($post, $get = [])
    {
        if (isset($post['name']) && isset($post['categoryOption']) && isset($post['images'])
                && isset($post['desc']) && isset($post['price']) && isset($post['dateOption']) &&
        isset($post['gearBoxOption']) && isset($post['motorOption']) && isset($post['run']) &&
        isset($post['horsepower']) && isset($post['color']) && isset($post['count'])){
            $this->name = $post['name'];
            $this->categoryOption = $post['categoryOption'];
            $this->images = $post['images'];
            $this->desc = $post['desc'];
            $this->price = $post['price'];
            $this->date = $post['dateOption'];
            $this->gearBox = $post['gearBoxOption'];
            $this->motor = $post['motorOption'];
            $this->run = $post['run'];
            $this->horsepower = $post['horsepower'];
            $this->color = $post['color'];
            $this->count = $post['count'];

        }
        if (isset($post['radio'])){
            $this->radio = $post['radio'];
        }
        if (!empty($post['categoryOption']) && $post['categoryOption'] == 'All category'){
            $this->categoryOption = '';
        }
        if (!empty($post['dateOption']) && $post['dateOption'] == 'Date'){
            $this->date = '';
        }
        if (!empty($post['gearBoxOption']) && $post['gearBoxOption'] == 'Gear box'){
            $this->gearBox = '';
        }
        if (!empty($post['motorOption']) && $post['motorOption'] == 'Motor'){
            $this->motor = '';
        }
        if (!empty($post['id'])){
            $this->id = $post['id'];
        }
        if (!empty($post['drop'])) {
            $this->drop = $post['drop'];
        }
        if (isset($get['brand'])) {
            $this->brand = $get['brand'];
        }
        if (isset($get['mark']) && $get['mark'] == ''){
            $this->mark = '';
        }else{
            $this->mark = $get['mark'];
        }
        if (isset($get['min_price']) && $get['min_price'] == ''){
            $this->minPrice = '1000';
        }else{
            $this->minPrice = $get['min_price'];
        }
        if (isset($get['max_price']) && $get['max_price'] == ''){
            $this->maxPrice = '100000';
        }else{
            $this->maxPrice = $get['max_price'];
        }
    }

    protected function rules()
    {
        return [
            'required' => [
                'name' => $this->name,
                'category option' => $this->categoryOption,
                'images' => $this->images,
                'radio' => $this->radio,
                'description' => $this->desc,
                'price' => $this->price,
                'date' => $this->date,
                'gear box' => $this->gearBox,
                'motor' => $this->motor,
                'run' => $this->run,
                'horsepower' => $this->horsepower,
                'color' => $this->color,
                'count' => $this->count
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

    public function productIndex(){
        $product = Db::getConnection()->prepare("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` ORDER BY `id` DESC");
        $product->execute();
        return $product->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function productCreate(){
        $upload = new Upload($_FILES);
        if ($this->validate() == [] && $upload->fileUpload() == true){
            $this->images = $upload->fileName();
            Db::getConnection()->exec(PRODUCT_TABLE);
            Db::getConnection()->exec(ALTER_PRODUCT);
            $create = Db::getConnection()->prepare("INSERT INTO `product` (`name`, `category_id`, `img_path`, 
                        `isNew`, `date`, `gear_box`, `motor`, `run`, `horsepower`, `color`, `description`, `price`, `count`, `create_time`, `update_time`) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(), now())");
            return $create->execute([$this->name, $this->categoryOption, $this->images, $this->radio, $this->date, $this->gearBox,
                $this->motor, $this->run, $this->horsepower, $this->color, $this->desc, $this->price, $this->count]);
        }
        return false;
    }

    public function productView(){
        $view = Db::getConnection()->prepare("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` WHERE `prod`.`id`='$this->id'");
        $view->execute();
        return $view->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function productUpdate(){
        $upload = new Upload($_FILES);
        if ($this->name && $this->validate() == [] && $upload->fileUpload() == true){
            $upload->fileDelete();
            $this->images = $upload->fileName();
            $update = Db::getConnection()->prepare("UPDATE `product` SET `name`='$this->name', `category_id`='$this->categoryOption', 
            `img_path`='$this->images', `isNew`='$this->radio', `date`='$this->date', `gear_box`='$this->gearBox', `motor`='$this->motor', `run`='$this->run', 
            `horsepower`='$this->horsepower', `color`='$this->color', `description`='$this->desc', `price`='$this->price', `count`='$this->count' WHERE `id`='$this->id'");
            return $update->execute();
        }
        return false;
    }

    public function selectCategory(){
        $select = Db::getConnection()->prepare("SELECT * FROM `category` GROUP BY `name`");
        $select->execute();
        return $select->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function productDelete(){
        if (isset($this->productView()[0]['cat_name']) && isset($this->productView()[0]['img_path'])){
            $categoryName = $this->productView()[0]['cat_name'];
            $path = $this->productView()[0]['img_path'];
            if (is_file(__DIR__.'../../../uploads/'.$categoryName.'/'.$path)){
                return unlink(__DIR__.'../../../uploads/'.$categoryName.'/'.$path);
            }
        }
        if (!empty($this->id)){
            $delete = Db::getConnection()->prepare("DELETE FROM `product` WHERE `id`='$this->id'");
            return $delete->execute();
        }elseif (!empty($this->drop)){
            $drop_product = Db::getConnection()->prepare("DROP TABLE `product`");
            $drop_product->execute();
            return true;
        }
        return false;
    }

    public function siteProductIndex(){
        $product_limit = new Pagination(20, '/site/product', 'product');
        $limit = $product_limit->getLimit();
        $product = Db::getConnection()->prepare("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` ORDER BY `id` DESC $limit");
        $product->execute();
        return $product->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function categoryIdProduct(){
        $product_limit = new Pagination(20, '/site/category', 'product');
        $limit = $product_limit->getLimit();
        $select = Db::getConnection()->prepare("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` WHERE `prod`.`category_id`='$this->id' ORDER BY `id` DESC $limit");
        $select->execute();
        return $select->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function categoryIdProductCount(){
        $select = Db::getConnection()->prepare("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` WHERE `prod`.`category_id`='$this->id'");
        $select->execute();
        return $rowCount = $select->rowCount();
    }

    public function isNewProduct(){
        $product_limit = new Pagination(9, '/site/index', 'product');
        $limit = $product_limit->getLimit();
        $select = Db::getConnection()->prepare("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` WHERE `prod`.`isNew`='1' ORDER BY `id` DESC $limit");
        $select->execute();
        return $select->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function categoryIdSelectProduct(){
        $select = Db::getConnection()->prepare("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` WHERE `prod`.`category_id`='$this->id' GROUP BY `name`");
        $select->execute();
        return $select->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function searchProduct(){
        $url = '';
        foreach ($_GET as $index => $item) {
            if ($index == 'pn'){
                continue 1;
            }
                $url .= $index.'='.$item .'&';
        }
        if (strlen($url) !== 0){
            $url = '?'.$url;
        }
        $product_limit = new Pagination(20, "/site/product{$url}", 'product');
        $limit = $product_limit->getLimit();
        $select = Db::getConnection()->prepare("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` WHERE `prod`.`category_id`='$this->brand' AND `prod`.`name` 
                                        LIKE '%$this->mark%' AND `prod`.`price` BETWEEN '$this->minPrice' AND '$this->maxPrice' ORDER BY `id` DESC $limit");
        $select->execute();
        return $select->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function searchProductCount(){
        $select = Db::getConnection()->prepare("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` WHERE `prod`.`category_id`='$this->brand' AND `prod`.`name` 
                                        LIKE '%$this->mark%' AND `prod`.`price` BETWEEN '$this->minPrice' AND '$this->maxPrice' ORDER BY `id` DESC");
        $select->execute();
        return $rowCount = $select->rowCount();
    }



}