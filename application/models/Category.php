<?php

namespace application\models;


use application\components\Db;
use application\components\Pagination;
use application\components\Validator;

class Category
{
    private $name;
    private $id;
    private $drop;
    private $key;

    public function __construct($post)
    {
        if (!empty($post['name'])) {
            $this->name = $post['name'];
        }
        if (!empty($post['id'])) {
            $this->id = $post['id'];
        }
        if (!empty($post['drop'])) {
            $this->drop = $post['drop'];
        }
        if (!empty($post['key'])) {
            $this->key = $post['key'];
        }
    }

    protected function rules()
    {
        return [
            'required' => [
                'name' => $this->name
            ],
            'name' => [
                'name' => $this->name,
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

    public function categoryIndex(){
        $category = Db::getConnection()->prepare("SELECT * FROM `category` ORDER BY `id` DESC");
        $category->execute();
        return $category->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function categoryCreate(){
        if ($this->validate() == []){
            Db::getConnection()->exec(CATEGORIES_TABLE);
            $create = Db::getConnection()->prepare("INSERT INTO `category` (`name`, `create_time`, `update_time`)
                            VALUES (?, now(), now())");
            $create->execute([$this->name]);
            return true;
        }
        return false;
    }

    public function categoryView(){
        $view = Db::getConnection()->prepare("SELECT * FROM `category` WHERE `id`='$this->id'");
        $view->execute();
        return $view->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function categoryUpdate(){
        if ($this->name && $this->validate() == []){
            $updCategory = Db::getConnection()->prepare("UPDATE `category` SET `name`='$this->name' WHERE `id`='$this->id'");
            return $updCategory->execute();
        }else{
            $select = Db::getConnection()->prepare("SELECT * FROM `category` WHERE `id`='$this->id'");
            $select->execute();
            return $select->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function categoryDelete(){
        if (!empty($this->id)){
            $delete = Db::getConnection()->prepare("DELETE FROM `category` WHERE `id`='$this->id'");
            return $delete->execute();
        }elseif (!empty($this->drop)){
            $drop_product = Db::getConnection()->prepare("DROP TABLE `product`");
            $drop_product->execute();
            $drop = Db::getConnection()->prepare("DROP TABLE `category`");
            $drop->execute();
            return true;
        }
        return false;
    }

/*    public function categorySearch(){
        $category_pn = new Pagination(5, '/admin/category/index', 'category');
        $limit = $category_pn->getLimit();
        //var_dump($limit);
        $search = Db::getConnection()->prepare("SELECT * FROM `category` WHERE `name` LIKE '$this->key%' ORDER BY `id` DESC $limit");
        $search->execute();
        return $search->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function categorySearchRow(){
        $search = Db::getConnection()->prepare("SELECT * FROM `category` WHERE `name` LIKE '$this->key%'");
        $search->execute();
        return $search->rowCount();
    }*/
}