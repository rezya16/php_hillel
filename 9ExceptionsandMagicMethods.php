<?php
/*1) Напишите класс который с помощтю магических методов будет делать манипуляции над строками.
Вызов класса должен быть следующий:
$stringFormater = new StringFormater();
$stringFormater->name = 'uSeRnaMe';
echo $stringFormater->name; // вывести USERNAME*/

class StringFormater  {
    private $method;
    public function __set($name, $value)
    {
        $this->method[$name] = strtoupper($value);
    }
    public function __get($name)
    {
        return $this->method[$name];// TODO: Implement __get() method.
    }
}
$stringFormater = new StringFormater();
$stringFormater->name = 'uSeRnaMe';
echo $stringFormater->name."\n"; // вывести USERNAME

/*2) Напишите класс который умеет заменять в строке пробелы на знак +, а строку приводить в нижний регистр .
Вызов должен быть следующий:
$concatenated = Concatenator::prepareString('I am concatenated');
echo $concatenated; // i+am+concatenated*/

class Concatenator {
    private $store;
    public static function __callStatic($name, $arguments)
    {
        return $store[$name] = preg_replace('/ /','+',implode(", ",$arguments));
    }
}
$concatenated = Concatenator::prepareString('I am concatenated');
echo $concatenated;// i+am+concatenated

/*3) Напишите класс который будет фильтровать массив путем удаления его элементов.
Только с использованием магических методов!. Вызов класса будет такой:
$filter = new Filter(['f', 2, 't', 7, 2, 'k']);
$filter->getNumbers(); //[2,7,2]
$filter->getStrings(); // ['f', 't', 'k']*/

class Filter {
    private $array;
    private $numbers;
    private $strings;

    public function __construct($array)
    {
        $this->array=$array;
    }

    public function __call($name, $arguments)
    {
        if ($name== 'getNumbers'){
            foreach ($this->array as $item){
                if (is_numeric($item)){
                    $this->numbers[]=$item;
                }
            }
            return $this->numbers;
        }
        if ($name== 'getStrings'){
            foreach ($this->array as $item){
                if (is_string($item)){
                    $this->strings[]=$item;
                }
            }
            return $this->strings;
        }
    }

}
$filter = new Filter(['f', 2, 't', 7, 2, 'k']);
$filter->getNumbers(); //[2,7,2]
$filter->getStrings(); // ['f', 't', 'k']
?>
/*4) Напишите небольшое приложение которое будет проверять данные которые были введены с формы. Ваша логика должна использовать исключения и бросать:
а) исключение EmptyStringException если в поле вводе была передана пустая строка
б) исключение InvalidInputTypeException если данные были введены с неправильным типом (например число вместо строки)
Оформите валидатор как класс и подключите его в ваш обработчик формы. Вывод ошибок на ваше усмотрение.*/

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <form action="9ExceptionsandMagicMethods.php" method="post">
        <input type="text" name="login">
        <button type="submit">Сохранить</button>
    </form>
<?php require_once 'index.php';
$name = $_POST['login'];
    try {
        if ($name == '') {
            throw new EmptyStringException('Введена пустая строка!');
        }
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
    try {
        if (is_numeric($name)) {
            throw new InvalidInputTypeException('Неправильный тип данных!');
        }
        echo $name;
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
?>
</div>
</body>
</html>
<?php
class EmptyStringException extends Exception {
public function __construct($message = "", $code = 0, Throwable $previous = null)
{
parent::__construct($message, $code, $previous);
}
}

class InvalidInputTypeException extends Exception {
public function __construct($message = "", $code = 0, Throwable $previous = null)
{
parent::__construct($message, $code, $previous);
}
}

class User {
    private $name;

    public function getString ($string){
        $this->name = $string;
        if ($this->name = '') {
            throw new EmptyStringException($string,'Поймано исключение: Пустая строка!');
        }
        return $this->name;
    }
}

$user = new User();

try {
    $user ->getString($login);
} catch (EmptyStringException $e){
    echo $e->getMessage()."</br>";
}

