<?php
require_once 'AbstractLineList.php';

class LineList extends AbstractLineList
{
    public $max = 10;
    public $list;

    public function create($arr)
    {
        if (count($arr) > $this->max) {
            echo 'over max length';
            exit;
        }
        $this->list = $arr;
    }

    public function getElement($key)
    {
        if ($key > ($this->max -1) or $key < 0) {
            echo 'over max length';
            exit;
        }
        return $this->list[$key];
    }

    public function deleteElement($key)
    {
        if ($key > ($this->max - 1) or $key < 0) {
            echo 'not in range';
            exit;
        }
        unset($this->list[$key]);
        var_dump($this->list); exit;
        $result = [];
        foreach ($this->list as $k => $v) {
            $result[] = $this->list[$k];
        }
        $this->list = $result;
    }

    public function insertElement($file, $key)
    {
        if ($key > ($this->max - 1) or $key < 0 or count($this->list) == $this->max) {
            echo 'not in range';
            exit;
        }
        $result = [];
        foreach ($this->list as $k => $v) {
            if (count($result) == $key) {
                $result[] = $file;
            } else {
                $result[] = $v;
            }
        }
        $this->list = $result;
    }

    public function clearList()
    {
        // TODO: Implement clearList() method.
    }
}