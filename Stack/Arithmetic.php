<?php

class Arithmetic
{
    public $num = [0,1,2,3,4,5,6,7,8,9];
    public $mark = ['+', '-', '*', '/'];
    public $stack = [];

    public function response($str)
    {
        for ($i = 0; $i < strlen($str); $i++) {
            if (is_numeric($str[$i]) and in_array($str[$i], $this->num)) {
                array_unshift($this->stack, $str[$i]);
                var_dump($this->stack); echo '<br>';
            } elseif (in_array($str[$i], $this->mark)) {
                $num1 = array_shift($this->stack);
                $num2 = array_shift($this->stack);
                $rs = $this->doMath($str[$i], $num1, $num2);
                array_unshift($this->stack, $rs);
                var_dump($this->stack); echo '<br>';
            }
        }
        exit;
        return $this->stack[0];
    }

    private function doMath($mark, $n1, $n2)
    {
        switch ($mark) {
            case '+':
                return $n1 + $n2;
                break;
            case '-':
                return $n1 - $n2;
                break;
            case '*':
                return $n1 * $n2;
                break;
            case '/':
                return $n1 / $n2;
                break;
        }
    }
}

$numA = 5;
$numB = 7;
$numC = 3;
// $numA+$numB*$numC
$str = "{$numA}{$numB}{$numC}*+";
$method = new Arithmetic();
echo $method->response($str);