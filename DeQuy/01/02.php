<?php
// 4! =  4 * 3 * 2 * 1
// 0! = 1
// 1! = 1
// n! = n *(n - 1)!

function  factorial($number)
{
    $result = 1;
    if ($number > 1) {
        $result = $number * factorial($number - 1);
    }
    return $result;
}
echo factorial(3);
