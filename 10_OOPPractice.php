<?php
/*1.Необходимо написать класс для подсчета и группировки слов в предложении.
Например: “Лето, наступило у нас лето”
Результат должен быть в виде массива:
[‘лето’] => 2,
[‘наступило’] => 1,
[‘у’] => 1,
[‘нас’] => 1*/

class Count
{
    private $string;
    private $array;
    private $arr;

    public function __construct($string)
    {
        $this->string = mb_strtolower($string);

    }

    public function calculate ()
    {
        $this->array = explode(' ',$this->string);
        foreach ($this->array as $item) {
            $this->arr []= rtrim($item,',');
        }
        return array_count_values($this->arr);
    }
}
$string = 'Лето, наступило у нас лето';
$arg1 = new Count($string);
print_r($arg1->calculate());

/*2. Создайте класс и реализуйте в нем статический метод accumulate(array
        $numbers). Метод должен к каждому элементу массива применить функцию:
x = x * x
Пример: дано массив [1, 2, 3, 4, 5]
Результат должен быть в виде массива: [1, 4, 9, 16, 25]*/

class Calculator {
    public static function accumulate (array $numbers)
    {
        $newArray = array_map(function ($item) {
            return $item*$item;
        },$numbers);
        return $newArray;
    }
}

print_r($result = Calculator::accumulate([1,2,3,4,5]));

/*3. Создайте класс который будет высчитывать “космический” возраст на:
● Земля: орбитальный период 365.25 земных дней, или 31557600 секунд
● Меркурий: орбитальный период 0.2408467 земных лет
● Венера: орбитальный период 0.61519726 земных лет
● Марс: орбитальный период 1.8808158 земных лет
● Юпитер: орбитальный период 11.862615 земных лет
● Сатурн: орбитальный период 29.447498 земных лет
● Уран: орбитальный период 84.016846 земных лет
● Нептуне: орбитальный период 164.79132 земных лет
Например, вы прожили 1,000,000,000 секунд, то на Земле ваш возраст бы
составил: 31.69 лет.
Аргумент метода может принимать как время в секундах, так и годах*/

class SpaceAge {
    private $earthage;

    public function calculateAge ($age,$planet,$is_years = TRUE)
    {
        if ($is_years == FALSE){
            $this->earthage = $age/365.25/24/3600;

        }else {
            $this->earthage = $age;
        }
        switch ($planet) {
            case 'Mercury':
                return $this->earthage*0.2408467;
            case 'Venus':
                return $this->earthage*0.6159726;
            case 'Mars':
                return $this->earthage*1.8808158;
            case 'Upiter':
                return $this->earthage*11.862615;
            case 'Saturn':
                return $this->earthage*29.447498;
            case 'Uran':
                return $this->earthage*84.016846;
            case 'Neptun':
                return $this->earthage*164.79132;
        }
    }
}

$var = new SpaceAge();
echo $var->calculateAge(10000000000,'Mercury', false)."\n";
echo $var->calculateAge(55,'Saturn',true);

/*4. Создайте класс и реализуйте метод который будет делать плоский массив из
ассоциативного
Пример: [1,[2,3,null,4],[null],5]
Результат: [1,2,3,4,5]*/

class Create
{
    private $list;
    public function createList (array $array){
        foreach ($array as $item){
            if ($item != NULL) {
                if (!is_array($item)) {
                    $this->list[] = $item;
                } else
                    foreach ($item as $value) {
                        if ($value != NULL) {
                            $this->list[] = $value;
                        } else {
                            unset($value);
                        }
                    }
            }
            else {
                unset($item);
            }
        }
        return $this->list;
    }
}
$arg = new Create();
var_dump($arg->createList([1,[2,3,null,4],[null],null,5]));

/*5.Представьте что в параллельной вселенной роботы программируются на PHP.
В данном задании вам предстоит реализовать некоторую логику которая будет
описывать и создавать нужных нам роботов.
Реализуйте следующий функционал:
1. С помощью паттерна абстрактная фабрика реализуйте функционал создания
двух видов роботов: гражданского и военного. Каждый из роботов имеет
следующие способности:
● При включении (создания) роботу присваивается имя, состоящие из трех
латинских букв в верхнем регистре и четырех цифр.
● Робот может быть сброшен на заводские установки, тогда его имя
стирается
● Робот может быть переинициализирован, тогда ему заново
присваивается случайное имя*/

interface AbstractFactory
{
    public function createRobot ();
}

class CivilFactory implements AbstractFactory
{
    public function createRobot()
    {
        return new CivilRobot;
    }
}

class WarFactory implements AbstractFactory
{
    public function createRobot()
    {
        return new WarRobot;
    }
}

interface AbstractRobot
{
    public function createName ();
    public function reset ();
    public function reinitiation ();
}

class CivilRobot implements AbstractRobot
{
    private $name;
    private $letters = 'ABCDEFGHIJKLMNOPQRSTUVXYZ';

    public function createName()
    {
        for ($i = 0;$i < 3;$i++) {
            $this->name .= $this->letters[rand(0,24)];
        }
        for ($i = 0;$i < 4;$i++)
        {
            $this->name .= rand(0,9);
        }
        return $this->name;
    }

    public function reset()
    {
        unset($this -> name);
        return ;
    }

    public function reinitiation()
    {
        $this->reset();
        return $this->createName();
    }
}

class WarRobot implements AbstractRobot
{
    private $name;
    private $letters = 'ABCDEFGHIJKLMNOPQRSTUVXYZ';

    public function createName()
    {
        for ($i = 0;$i < 3;$i++) {
            $this->name .= $this->letters[rand(0,24)];
        }
        for ($i = 0;$i < 4;$i++)
        {
            $this->name .= rand(0,9);
        }
        return $this->name;
    }

    public function reset()
    {
        unset($this -> name);
        return ;
    }

    public function reinitiation()
    {
        $this->reset();
        return $this->createName();
    }
}
$a = new CivilFactory();