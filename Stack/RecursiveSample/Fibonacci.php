<?php
/*
 * 從0, 1開始，之後的數字都是前兩個數字的相加
 * 遞迴解很方便，但可能產生較高的時間複雜度，此例為O(2^n)，可能產生記憶體溢位，未來可能研究演算法解
 */
class Fibonacci
{
    public function response($n)
    {
        return $this->getFibonacci($n);
    }

    private function getFibonacci($n)
    {
        if ($n == 0 or $n == 1) {
            return $n;
        }
        return $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
    }
}

$num = 50;
$method = new Fibonacci();
for ($i = 0; $i <= $num; $i++) {
    echo $method->response($i) . '<br>';
}
