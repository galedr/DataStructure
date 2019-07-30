<?php

abstract class AbstractSort
{
    abstract public function sort($arr);

    protected function swap($arr, $i, $j)
    {
        $t = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $t;
        return $arr;
    }
}