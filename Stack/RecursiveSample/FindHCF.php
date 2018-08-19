<?php
/*
 * 尋找最大公因數
 * 輾轉相除法，餘數相除直到餘數為零
 */
class FindHCF
{
    public function response($num1, $num2)
    {
        return $this->getHCF($num1, $num2);
    }

    private function getHCF($num1, $num2)
    {
        if (($num1 % $num2) == 0) {
            return $num2;
        } else {
            return $this->getHCF($num2, ($num1 % $num2));
        }
    }
}

$a = 24;
$b = 36;
$method = new FindHCF();
echo $method->response($a, $b);