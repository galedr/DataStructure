<?php
require 'AbstractSort.php';
// 迴圈時指針逐一往已經經過回圈的值比較, 若比前值小則插入
// O(n^2)
class Insertion extends AbstractSort
{
    public function sort($arr)
    {
        $l = count($arr);
        for ($i = 0; $i < $l; $i++) {
            $t = $arr[$i]; // 將當前值放入暫存, 隨時準備移動
            $j = $i - 1;
            while ($j >= 0 and $arr[$j] > $t) { // 迴圈將指針往前比, 遇到較當前小的則換位
                $arr[$j + 1] = $arr[$j];
                $j--;
            }
            $arr[$j + 1] = $t;
        }
        return $arr;
    }
}
$arr_t = [2, 5, 3, 4];
$arr = [5, 3, 2, 9, 7];
$m = new Insertion();
print_r($m->sort($arr));