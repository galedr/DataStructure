<?php
require 'AbstractSort.php';
//todo 不斷找出陣列中最小值, 並依序放到陣列左邊, 排序將進行 n - 1 次, 最好的時候交換0 次, 最壞的時候交換n - 1 次
//todo 時間複雜度固定為O(n^2)
class SimpleSelection extends AbstractSort
{
    public function sort($arr)
    {
        $l = count($arr);
        for ($i = 0; $i < $l; $i++) {
            $min = $i; // 將當前鍵值定義為最小鍵值
            for ($j = $i + 1; $j < $l; $j++) {
                if ($arr[$min] > $arr[$j]) { // 指標以當前為準 + 1, 往後搜尋是否有更小的值, 若有則替換最小鍵值為指標鍵值
                    $min = $j;
                }
            }
            if ($i != $min) { // 若當前鍵值不等於最小, 替換之
                $arr = $this->swap($arr, $i, $min);
            }
        }
        return $arr;
    }
}

$arr = [3, 2, 5, 7, 9];
$m = new SimpleSelection();
print_r($m->sort($arr));