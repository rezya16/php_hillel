<?php
//1. Написать функцию для получения первого и последнего элемента массива

function sideelement ($str1){
    for ($n=0,$first=0,$last=0;$n<count($str1);$n++){
        if ($n==0){
            $first=$str1[$n];
            echo $first."<br/>";
        } elseif ($n==count($str1)-1){
            $last=$str1[$n];
            echo $last."<br/>";
        }
    }
    return [$first,$last];
}
sideelement ([0,1,2,3,4]);

/*2. Дано фрагмент кода
$array = [1,2,3,4,5,6,'','','']);
$items = implode(',', $array);
Написать функцию для удаления последней запятой, т.е результат работы фунции должна быть строка вида "1,2,3,4,5,6"*/

$array = [1,2,3,4,5,6,'','',''];
$items = implode(',', $array);
$str2='';
function deleter ($str1,$element){
    $str2 = rtrim($str1,$element);
    return $str2;
}
echo deleter($items,',');

//3. Написать функцию которая будет удалять дубли и пустые значения (0, '', null) из массива

$array = [1,0,5, '',10, null,55] ;
$filtered = array_filter($array,function ($item){
    return !empty($item);
});
var_dump ($filtered);
echo "</br>";

//4. Написать функцию для сортировки пузырьком, шпаргалка по алгоритму тут

$array1=[1,5,3,2,4];
$array2=[51,1,15,23];
function bubble($arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$i] > $arr[$j]) {
                $var = $arr[$j];
                $arr[$j] = $arr[$i];
                $arr[$i] = $var;
            }
        }
    }
    return $arr;
}
var_dump(bubble ($array1));
var_dump(bubble ($array2));