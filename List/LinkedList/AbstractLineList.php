<?php

abstract class AbstractLineList
{
    abstract public function create($arr); // 創建串列
    abstract public function clearList(); // 清除串列
    abstract public function getElement($key); // 取得key 值資料
    abstract public function insertElement($file, $key); // 在key 值插入資料
    abstract public function deleteElement($key); // 刪除指定key 值元素
}