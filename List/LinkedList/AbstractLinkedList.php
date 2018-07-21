<?php

abstract class AbstractLinkedList
{
    abstract public function create($arr);
    abstract public function printList();
    abstract public function insertElement($file, $key);
    abstract public function deleteElement($key);
    abstract public function getElement($key);
    abstract public function clearList();
}