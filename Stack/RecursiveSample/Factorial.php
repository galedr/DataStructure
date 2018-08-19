<?php
/*
 * 數學階層問題 N!
 * 採用跟費氏數列類似的做法
 * f(2) = 2 * 1, f(3) = 3 * (2 * 1), f(4) = 4 * (3 * (2 * 1) .... 依此類推
 */
class Factorial
{
    public function response($n)
    {
        return $this->getFactorial($n);
    }

    private function getFactorial($n)
    {
        if ($n == 1) {
            return $n;
        } else {
            return $n * $this->getFactorial($n - 1);
        }
    }
}

$num = 5;
$method = new Factorial();
echo $method->response($num);