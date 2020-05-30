<?php

namespace application\base;

class BaseView
{
    public $basePath = "application/views/";
    protected $title;
    protected $layout;

    public function render($content, $data)
    {
        include_once $this->basePath."layout/".$this->layout.'.php';
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}