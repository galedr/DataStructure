<?php
require 'AbstractSort.php';
// 將長度為n 的陣列每次對分成 n/2 大小遞迴, 再合併成一個有序陣列
// 時間複雜度 O(nlogn) 由於是二分法遞迴, 空間複雜度 O(n)
class Merge extends AbstractSort
{
    public function sort($arr)
    {
        $l = count($arr);
        if ($l <= 1) {
            return $arr;
        }
        $left = array_slice($arr, 0, $l / 2);
        $right = array_slice($arr, $l / 2);

        $left = $this->sort($left);
        $right = $this->sort($right);

        return $this->getMerge($left, $right);
    }

    private function getMerge($left, $right)
    {
        $rs = [];
        $left_index = $right_index = 0;
        while ($left_index < count($left) and $right_index < count($right)) {
            if ($left[$left_index] > $right[$right_index]) {
                $rs[] = $right[$right_index];
                $right_index++;
            } else {
                $rs[] = $left[$left_index];
                $left_index++;
            }
        }
        while ($left_index < count($left)) {
            $rs[] = $left[$left_index];
            $left_index++;
        }
        while ($right_index < count($right)) {
            $rs[] = $right[$right_index];
            $right_index++;
        }
        print_r($rs);
        return $rs;
    }
}

$arr = [3, 5, 2, 11, 9, 7, 8, 4];
$m = new Merge();
print_r($m->sort($arr));