<?php
// 4! =  4 * 3 * 2 * 1
// 0! = 1
// 1! = 1

function  factorial($number)
{
    $result = 1;
    if ($number > 1) {
        for ($i = 1; $i <= $number; $i++) {
            $result = $result * $i;
        }
    } else $result = 1;
    return $result;
}
echo factorial(2);
