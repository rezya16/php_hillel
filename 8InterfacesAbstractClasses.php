<?php
/*1) Создайте абстрактный класс User который содержит абстрактный метод getRole()
который должен выводить роль пользователя, например admin, viewer, moderator и тд.
Создайте классы Admin, Viewer, Moderator,
которые наследуют класс User и реализуйте абстрактныей метод getRole()
который будет возвращать роль пользователя (подсказка имя класса == имени роли в нижнем регистре).
Так же позаботьтеся о методах которые будут получать и сохранять информацию о пользователе.
Не забудьте о модификаторах доступа, а так же о силе наследования.*/

abstract class User
{
    protected $role;
    protected $name;
    protected $surname;
    protected $age;

    protected abstract function getRole();

    public function setInfo($name,$surname,$age)
    {
        $this->name=$name;
        $this->surname=$surname;
        $this->age=$age;
        return $this;
    }


    public function getInfo ()
    {
        return $this->name.' '.$this->surname.' '.$this->age;
    }
}

class Admin extends User
{
    public function getRole()
    {
        return $this->role='admin';
    }
}

class Viewer extends User
{
    public function getRole()
    {
        return $this->role='viewer';
    }
}

class Moderator extends User
{
    public function getRole()
    {
        return $this->role='moderator';
    }
}

$Moderator = new Moderator;
echo $Moderator -> getRole();
$Moderator -> setInfo('Dima','Reznichenko',20);
echo $Moderator->getInfo();

/*2) Спроектируйте классы и интерфейсы, который будут описывать транспортные средства. Например:
а) автомобиль движется за счет мотора, имеет 4 колеса
б) велосипед использует мускульную силу, имеет два колеса
в) танк движется за счет мотора, имеет две гусеницы и умеет стрелять*/

abstract class Vehicles
{
    abstract protected function getMotorType ();
    abstract protected function accelerate ($accelerate);
    abstract protected function decelerate ($decelerate);
}

interface Wheels
{
    public function getWheelCount ();
}

interface Doors
{
    public function getDoorsCount ();
}

interface Armed
{
    public function getCaterpillar ();
    public function fire ();
}

class Car extends Vehicles implements Wheels, Doors
{
    private $speed;


    public function getWheelCount()
    {
        return '4 Wheels ';
    }
    public function getDoorsCount()
    {
        return '4 Doors ';
    }
    public function getMotorType ()
    {
        return 'Motor ';
    }
    public function accelerate($accelerate)
    {
        return $this->speed=$accelerate;
    }
    public function decelerate($decelerate)
    {
        return $this->speed-=$decelerate;
    }
}

class Bike extends Vehicles implements Wheels
{
    private $speed;

    public function getWheelCount()
    {
        return '2 Wheels ';
    }
    public function getMotorType ()
    {
        return 'Muscles ';
    }
    public function accelerate($accelerate)
    {
        return $this->speed=$accelerate;
    }
    public function decelerate($decelerate)
    {
        return $this->speed-=$decelerate;
    }
}

class Tank extends Vehicles implements Armed
{
    private $speed;

    public function getCaterpillar()
    {
        return '2 Caterpillars ';
    }

    public function getMotorType ()
    {
        return 'Motor ';
    }
    public function accelerate($accelerate)
    {
        return $this->speed=$accelerate;
    }
    public function decelerate($decelerate)
    {
        return $this->speed-=$decelerate;
    }
    public function fire()
    {
        return 'BOOM';
    }
}