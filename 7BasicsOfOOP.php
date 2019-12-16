<?php
/*1.Создайте класс Into и реализуйте метод getClassName() который должен вывести имя класса в котором вызывается метода,
используйте магическую константу для получения имени класса*/

class Into{
    public  function  getClassName()
    {
        return  __CLASS__;
    }
}
$account = new Into;
echo $account -> getClassName();

//2.Создайте класс Math и реализйте методо calcFactorial($number) который будет расчитывать факториал целых чисел

class Math
{
    public function calcFactorial($number)
    {
        $s = 1;
        for ($n = 1; $n <= $number; $n++) {
            $s = $s * $n;
        }
        return $s;
    }
//3.Дополните класс Math из предыдущего задание и реализуйте метод для простого калькулятора

    public function calc($arg1,$arg2,$action)
    {
        switch ($action) {
            case '+':
                $result = $arg1 + $arg2;
                break;
            case '-':
                $result = $arg1 - $arg2;
                break;
            case '*':
                $result = $arg1 * $arg2;
                break;
            case '/':
                if ($arg2 == 0){
                    echo 'Делить на 0 нельзя';
                    break;
                }
                $result = $arg1 / $arg2;
                break;
        }
        return $result;
    }
}
$a = new Math;

$a->calcFactorial(6);
echo $a->calc(10,5,'/');
echo "<br/>";

/*4.Создайте класс который будет принимать массив целых чисел при создании объекта класса и сортировать их
(можно использовать PHPешный sort()),
также создайте свойсвтво где этот массив будет хранится и метод для получения этого свойства.*/
class Sorter{
    public $Arr1;

    public function Sorting (){
        sort($this->Arr1);
        return $this->Arr1;
    }
}
$user = new Sorter();
$user ->Arr1 = [5,6,4,3,20];
var_dump($user ->Sorting());

/*5. Создайте класс Accounting (например часть бухгальерской программы) и реализуйте следующий функционал:
метод для получения данных о пользователе, например ФИО, номер счета, сколько начисленно, сколько вычтенно налогов и тд на ваше усмотрение, данные должны быть представленны в массиве.
метод для добавление новых записей в массив с данными о пользователе
метод для удаление записи о пользователе
метод для редактирования записи о пользователе
метод который считает количество налогов которые будут вычтенны из ЗП*/

class Accounting {
    public $name;
    public $account;
    public $salary;
    public $info;

    public function __construct($name,$account,$salary)
    {
        $this->info=
            ["name"=>$this->name=$name,
                "acc"=>$this->account=$account,
                "sal"=>$this->salary=$salary];
    }
    public function getInfo()
    {
        return ($this->info);
    }
    public function addInfo($newCategory,$newInfo)
    {
        return $this->info[$newCategory]=$newInfo;
    }
    public function delInfo($key)
    {
        unset($this->info[$key]);
    }
    public function redInfo ($key,$text)
    {
        return $this->info[$key]=$text;
    }
    public function getTax ()
    {
        $tax = $this->salary * 0.18;
        return $tax;
    }

}
$user4 = new Accounting('Denis',55241549,10000);
$user4 ->addInfo('Surname','Gagarin');
$user4 ->delInfo('sal');
$user4 ->redInfo("account",186574);
echo  $user4 ->getTax();