<?php

abstract class AbstractLinkedList
{
    abstract public function create($arr); // 創造串列
    abstract public function printList(); // 列印串列
    abstract public function insertElement($file, $key); // 在指定key 值位置插入元素
    abstract public function deleteElement($key); // 刪除指定key 值位置元素
    abstract public function getElement($key); // 取得指定key 值位置元素
    abstract public function clearList(); // 清除串列
}