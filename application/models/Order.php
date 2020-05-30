<?php


namespace application\models;


use application\components\Db;
use application\components\Validator;

class Order
{
    private $productIdCountArr;
    private $name;
    private $phone;
    private $message;
    private $nameCard;
    private $cardNumber;
    private $products;
    private $id;
    private $product_id;
    private $count;
    private $productValid = !null;
    private $productOrder = [];

    public function __construct($post)
    {
        if (isset($post['productIDCountArr'])) {
            $this->productIdCountArr = $post['productIDCountArr'];
        }
        if (isset($post['name']) && isset($post['phone']) && isset($post['message']) &&
            isset($post['name_card']) && isset($post['card_number'])){
            $this->name = $post['name'];
            $this->phone = $post['phone'];
            $this->message = $post['message'];
            $this->nameCard = $post['name_card'];
            $this->cardNumber = $post['card_number'];
        }
        if (isset($post['products'])){
            $this->products = $post['products'];
        }
        if (isset($post['id'])){
            $this->id = $post['id'];
        }
        if (isset($post['product_id']) && $post['count']){
            $this->product_id = $post['product_id'];
            $this->count = $post['count'];

            foreach (array_combine($this->product_id, $this->count) as $key => $value){
                if ($key == '' || $value == ''){
                    $this->productValid = '';
                }else{
                    array_push($this->productOrder, ['product_id' => "$key", 'count' => "$value"]);
                }
            }
        }
    }

    protected function rules()
    {
        return [
            'required' => [
                'name' => $this->name,
                'phone' => $this->phone,
                'name_card' => $this->nameCard,
                'card_number' => $this->cardNumber,
                'product' => $this->productValid
            ],
            'name' => [
                'name' => $this->name,
                'name_card' => $this->nameCard
            ],
            'phone' => [
                'phone' => $this->phone
            ]
        ];
    }

    public function validate(){
        $validator = new Validator($this->rules());
        if (!empty($validator->validate())){
            return $validator->validate();
        }
        if (!preg_match('#^[0-9-]{19}$#', $this->cardNumber)){
            return ['card_number' => 'enter only numbers և 16 characters'];
        }
        return [];
    }

    public function orderProductIDCount()
    {
        $arr['products'] = [];
        $arr['success'] = true;
        foreach ($this->productIdCountArr as $item) {
            $product_id = $item['product_id'];
            $count = $item['count'];
            $select = Db::getConnection()->prepare("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` WHERE `prod`.`id`='$product_id' AND `prod`.`count`<'$count'");
            $select->execute();
            $select = $select->fetchAll(\PDO::FETCH_ASSOC);
            if (!empty($select)) {
                $arr['success'] = false;
                array_push($arr['products'], ['name' => $select[0]['name'], 'count' => $select[0]['count'], 'cat_name' => $select[0]['cat_name']]);
            }
        }
        return $arr;
    }

    public function insertOrder(){
        $orderDate = date("Y-m-d H:i:s", time());
        $shippingDate = date("Y-m-d H:i:s", strtotime( "+5 day"));
        if ($this->validate() == []){
            Db::getConnection()->exec(ORDER_TABLE);
            Db::getConnection()->exec(ORDER_DELETE);
            $insert = Db::getConnection()->prepare("INSERT INTO `order` (`name`, `phone`, `message`, `name_card`, `card_num`, 
                `product_order`, `isNew`, `order_time`, `shipping_date`) VALUES (?, ?, ?, ?, ?, ?, '1', ?, ?)");
            $insert->execute([$this->name, $this->phone, $this->message, $this->nameCard, $this->cardNumber, $this->products, $orderDate, $shippingDate]);
            return true;
        }
        return false;
    }

    public function orderDeleteProductCount(){
        $products = json_decode($this->products);
        foreach ($products as $key => $item){
            $update = Db::getConnection()->prepare("UPDATE `product` SET `count`=`count`-'$item->count' WHERE `id`='$item->product_id'");
            $update->execute();
        }
    }


    public function orderIndex(){
        $select = Db::getConnection()->prepare("SELECT * FROM `order` ORDER BY `id` DESC");
        $select->execute();
        return $select->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function orderView(){
        $view = Db::getConnection()->prepare("SELECT * FROM `order` WHERE `id`='$this->id'");
        $view->execute();
        return $view->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function orderUpdate(){
        if ($this->validate() == []){
            $productOrder = json_encode($this->productOrder);
            $update = Db::getConnection()->prepare("UPDATE `order` SET `name`='$this->name', `phone`='$this->phone',
                `message`='$this->message', `name_card`='$this->nameCard', `card_num`='$this->cardNumber', 
                `product_order`='$productOrder' WHERE `id`='$this->id'" );
            return $update->execute();
        }
        return false;
    }


    public function oldOrderAddProduct(){
        if (!empty($_SESSION) && isset($_SESSION['oldProductArr'])){
            foreach ($_SESSION['oldProductArr'] as $item){
                $product_id = $item['product_id'];
                $count = $item['count'];
                $update = Db::getConnection()->prepare("UPDATE `product` SET `count`=`count`+'$count' WHERE `id`='$product_id'");
                $update->execute();
            }
        }
    }

    public function newOrderAddProduct(){
        foreach ($this->productOrder as $item){
            $product_id = $item['product_id'];
            $count = $item['count'];
            $update = Db::getConnection()->prepare("UPDATE `product` SET `count`=`count`-'$count' WHERE `id`='$product_id'");
            $update->execute();
        }
    }

    public function updateOrderIsNew(){
        $update = Db::getConnection()->prepare("UPDATE `order` SET `isNew`='0' WHERE `id`='$this->id'");
        return $update->execute();
    }

    public function selectOrderIsNewCount(){
        $select = Db::getConnection()->prepare("SELECT * FROM `order` WHERE `isNew`='1'");
        $select->execute();
        return $rowCount = $select->rowCount();
    }

    public function orderDelete(){
        $delete = Db::getConnection()->prepare("DELETE FROM `order` WHERE `id`='$this->id'");
        return $delete->execute();
    }

}