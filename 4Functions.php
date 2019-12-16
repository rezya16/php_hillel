<?php
/*1. Написать фунцию для нахожения минимального и максимального значения элементов массива.
Использовать стандартные функции языка типа min($array) и max($array) запрещенно.*/

function foo1($str1){
    $max=$str1[0];
    $n1=count($str1);
    for ($key=0;$key<$n1;$key++){
        if ($str1[$key]>$max){
            $max=$str1[$key];
        }
    }
    return $max;

}
function foo2($str1){
    $min=$str1[0];
    $n1=count($str1);
    for ($key=0;$key<$n1;$key++){
        if ($str1[$key]<$min){
            $min=$str1[$key];
        }
    }
    return $min;

}
echo foo1 ([-20,5,9,7,3,6,35,777,1]);
echo foo2 ([-20,5,9,7,3,6,35,777,1]);

/*2. Написать функцию для определение является ли строка палиндромом или нет. Функция должна возвращать булевое значение.
Палиндром это строка которая читается одинаково с конца как и с начала.
Например "Мадам", "Шалаш", "Аргентина манит негра"*/

function foo3($str1)
{
    $sum=0;
    for($key=0,$cou=strlen($str1)-1;$key<strlen($str1),$cou>=0;$key++,$cou--)
    {
        if ($str1[$key]==$str1[$cou])
        {
            $sum += 1;
        }
    }
    if ($sum == strlen ($str1)){
        echo 'TRUE';
        return true;
    } else {
        echo 'FALSE';
        return false;
    }
}
$strr='madam';
$piq='msxzzannm';
foo3 ($strr);
foo3 ($piq);

/*3. Написать функцию для поверки номер платежной карты используя формулу Луна.
Функция должна возвращать булевое значение: true если номер правильный или false если нет.*/

function foo4 ($str1){
    $s=0;
    for ($i=count($str1)-1;$i>=0;$i--){
        if ($i%2!=0){
            $v=$str1[$i];
        }
        else {
            $v=$str1[$i]*2;}
        if ($v>9) {
            $v-=9;
        }

        $s+=$v;
    }
    return (($s%10)==0);
}
echo foo4 ([5,5,7,1,4,2,9,3,5,7,6,8,9,8,3,4]);
