<?php
require 'AbstractSort.php';
// 每次排序確保最大的數字在陣列尾端，依序炮製至排序完成
// best O(n), worst O(n^2)
class BubbleSort extends AbstractSort
{
    public function sort($arr)
    {
        $l = count($arr);
        if ($l <= 1) {
            return $arr;
        }
        $flag = true;
        while ($flag) {
            $flag = false;
            for ($i = 0; $i < $l - 1; $i++) { // 迴圈長度為 n - 1, 目的為前指標 i + 1一定有值
                if ($arr[$i] > $arr[$i + 1]) { // 由大至小則改為 <
                    $arr = $this->swap($arr, $i, $i + 1);
                    $flag = true;
                }
            }
        }
        return $arr;
    }
}

$arr = [3, 5, 2, 7, 9];
$m = new BubbleSort();
print_r($m->sort($arr));