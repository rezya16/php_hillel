<?php
//1. Создать переменную которая хранит ваше имя и вывести ее значение используя echo или print.

$name = 'Дмитрий';

echo $name;

/*2. Используя echo или print и одинарные кавычки, нужно вывести строку с следующим содержимым:
  'This is a concatenated string' . Cлово concatenated следует поместить в переменную.*/

$a = 'concatenated';
echo 'This is a ' .$a. ' string'; //Это вариант, если дословно прочесть задание (используйте echo и одинарные кавычки)
echo "This is a $a string";// Более простой вариант

/*3. Создать несколько переменных с различным типом данных содержимого и вывести на экран тип переменной. Подсказка:
в PHP для получения типа переменной существует функция gettype($varibleName),
которая возвращает тип переменной. Вывод должен быть в виде:
Variable $a is string
Variable $b is integer
Variable $c is boolean
Variable $d is double*/

$a = 'str';
$b = 10;
$c = TRUE;
$d = 10.1;

echo 'Variable $a is '.gettype ($a)."<br/>";
echo 'Variable $b is '.gettype ($b)."<br/>";
echo 'Variable $c is '.gettype ($c)."<br/>";
echo 'Variable $d is '.gettype ($d)."<br/>";

/*4. Имеется массив со словами:
$words = array('scripting', 'development', 'PHP', 'especially');
Нужно написать скрипт который используя массив со словами выведет строку
'PHP is a popular general-purpose scripting language that is especially suited to web development'*/

$words = ['scripting','development','PHP','especially'];
echo "$words[2] is a popular general-purpose $words[0] language that is $words[3] suited to web $words[1]";