<?php


namespace application\components;


class Upload
{
    private $name;
    private $type;
    private $tmp_name;
    private $error;
    private $size;
    private $old_img;
    private $path;
    private $categoryName;
    private $old_categoryName;

    public function __construct($file)
    {
        if (isset($file['images']['name']) && isset($file['images']['type']) && isset($file['images']['tmp_name'])
        && isset($file['images']['error']) && isset($file['images']['size'])){
            $this->name = $file['images']['name'];
            $this->type = $file['images']['type'];
            $this->tmp_name = $file['images']['tmp_name'];
            $this->error = $file['images']['error'];
            $this->size = $file['images']['size'];
        }
        if (isset($file['old_img'])){
            $this->old_img = $file['old_img'];
        }
        if (isset($file['categoryName'])){
            $this->categoryName = $file['categoryName'];
        }
        if (isset($file['old_categoryName'])){
            $this->old_categoryName = $file['old_categoryName'];
        }

        if (!is_dir(__DIR__.'../../../uploads/'.$this->categoryName)){
            mkdir(__DIR__.'../../../uploads/'.$this->categoryName, 0777, true);
        }
    }

    public function rules()
    {
        return [
            'fileError' => [
                'images' => $this->error
            ],
            'fileSize' => [
                'images' => $this->size,
            ]
        ];
    }

    public function validate()
    {
        $validator = new Validator($this->rules());
        $format = ['jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG'];
        if (!empty($validator->validate())) {
            return $validator->validate();
        }
        if (!in_array($this->fileExt(), $format)) {
            return ['images' => 'The file has not been found or the extension does not match'];
        }
        return [];
    }

    private function fileExt(){
        return pathinfo($this->name, PATHINFO_EXTENSION);
    }

    public function fileName(){
        date_default_timezone_set("Asia/Yerevan");
        return $this->name = date("Y-m-dis", time()).'.'.$this->fileExt();
    }

    public function fileUpload(){
        if ($this->validate() == []){
            return move_uploaded_file($this->tmp_name, __DIR__.'../../../uploads/'.$this->categoryName.'/'.$this->fileName());
        }
        return false;
    }

    public function fileDelete(){
        if (is_file(__DIR__.'../../../uploads/'.$this->old_categoryName.'/'.$this->old_img)){
            return unlink(__DIR__.'../../../uploads/'.$this->old_categoryName.'/'.$this->old_img);
        }
        return false;
    }
}