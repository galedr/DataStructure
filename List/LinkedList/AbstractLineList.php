<?php

abstract class AbstractLineList
{
    abstract public function create($arr);
    abstract public function clearList();
    abstract public function getElement($key);
    abstract public function insertElement($file, $key);
    abstract public function deleteElement($key);
}