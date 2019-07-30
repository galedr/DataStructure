<?php
require 'AbstractSort.php';
// 將陣列切分成比基準值小的與比基準值大的, 再將兩個陣列遞迴重複處理, 最後merge 成一個有序陣列
// 時間複雜度 O(nlogn), 空間複雜度 O(nlogn)
class Quick extends AbstractSort
{
    public function sort($arr)
    {
        if (count($arr) <= 1) {
            return $arr;
        }
        $left = [];
        $right = [];
        $flag = $arr[0]; // 取出第一個用以比較的值, 一般為首值
        for ($i = 1; $i < count($arr); $i++) {
            // 將比基準值要小的放入左, 其餘放入右
            if ($arr[$i] < $flag) {
                $left[] = $arr[$i];
            } else {
                $right[] = $arr[$i];
            }
        }
        $left = $this->sort($left); // 遞迴將小陣列再次分割
        $right = $this->sort($right); // 遞迴將大陣列再次分割
        return array_merge($left, [$flag], $right);
    }
}

$arr = [5, 5, 3, 2, 11, 9, 7];
$m = new Quick();
print_r($m->sort($arr));