<?php


namespace application\components;
use application\components\Db;

class Pagination
{
    private $pageRow;
    private $paginationLink = '';
    private $path;
    private $limit;
    private $tableName;
    private $tableRowCount;

    public function __construct($pageRow, $path, $tableName, $rowCount = null)
    {
        $this->pageRow = $pageRow;
        $this->path = $path;
        $this->tableName = $tableName;
        if ($rowCount == null){
            $this->tableRowCount = $this->getTableRowCount();
        }
        if ($rowCount !== null){
            $this->tableRowCount = $rowCount;
        }
    }

    private function getList()
    {
        $list = ceil($this->tableRowCount/$this->pageRow);
        if($list < 1) {
            $list = 1;
        }
        return $list;
    }

    private function getPn()
    {
        $pn = 1;
        if (isset($_GET['pn'])){
            $pn = $_GET['pn'];
        }
        if ($pn < 1){
            $pn = 1;
        }elseif ($pn > $this->getList()){
            $pn = $this->getList();
        }
        return $pn;
    }

    private function prevGo()
    {
        $_URL = $_SERVER['REQUEST_URI'];
        if (empty($_GET)){
            $ext = '?';
        }else{
            $ext = '&';
        }
        if (strpos($_URL,'?pn')) {
            $ext = '?';
        }
        if ($this->getPn() > 1){
            //prev_end
            $prev_end = 1;
            $this->paginationLink .= "<a href=\"$this->path{$ext}pn=$prev_end\" class='pn'><i class=\"fas fa-angle-double-left\"></i></a>";
            //previous page
            $previous = $this->getPn() - 1;
            $this->paginationLink .= "<a href=\"$this->path{$ext}pn=$previous\" class='pn'><i class=\"fas fa-arrow-left\"></i></a>";
            //left page
            for ($i = $this->getPn() - 2; $i < $this->getPn(); $i++){
                if ($i > 0){
                    $this->paginationLink .= "<a href=\"$this->path{$ext}pn=$i\" class='pn'>$i</a>";
                }
            }
            return $this->paginationLink;
        }
        return false;
    }

    private function nextGo()
    {
        $_URL = $_SERVER['REQUEST_URI'];
        if (empty($_GET)){
            $ext = '?';
        }else{
            $ext = '&';
        }
        if (strpos( $_URL,'?pn')) {
            $ext = '?';
        }
        for ($i = $this->getPn() + 1; $i <= $this->getList(); $i++){
            $this->paginationLink .= "<a href=\"$this->path{$ext}pn=$i\" class='pn'>$i</a>";
            if ($i >= $this->getPn() + 2){
                break;
            }
        }
        //next page
        if ($this->getPn() != $this->getList()){
            $next = $this->getPn() + 1;
            $this->paginationLink .= "<a href=\"$this->path{$ext}pn=$next\" class='pn'><i class=\"fas fa-arrow-right\"></i></a>";
            //next_end
            $next_end = $this->getList();
            $this->paginationLink .= "<a href=\"$this->path{$ext}pn=$next_end\" class='pn'><i class=\"fas fa-angle-double-right\"></i></a>";
        }
        return false;
    }

    public function getPaginationLink()
    {
        if ($this->getList() != 1){
            $this->prevGo();

            $this->paginationLink .= '<a class="pn active">'.$this->getPn().'</a>';

            $this->nextGo();
            return $this->paginationLink;
        }
        return false;
    }

    public function getLimit()
    {
        $this->limit = 'LIMIT '.($this->getPn() - 1) * $this->pageRow.','.$this->pageRow;

        return $this->limit;
    }

    private function getTableRowCount()
    {
        $select = Db::getConnection()->prepare("SELECT * FROM `$this->tableName`");
        $select->execute();
        $rowCount = $select->rowCount();
        return $rowCount;
    }

}

