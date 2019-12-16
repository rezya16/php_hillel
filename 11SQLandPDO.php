<?php
/*Представьте что у вас есть некая фирма у которой есть много клиентов,
вам надо написать SQL запросы для того чтобы получить:
1) Список всех клиентов
2) Список клиентов который активны (поле is_active)
3) Список клиентов возраст которых больше или равно 30
4) Список клиентов имя которых начинается на В (Вася, Владимир)
5) Сколько клиентов у вас в базе всего
6) Самого старого (по возрасту клиента)
7) Сколько у вас активных клиентов
8) Получить и отсортировать всех клиентов по возрасту
9) Получить и отсортировать всех клиентов по имени
10) Посчтить сколько у вас активных клиентов старше 25.
Теперь вам надо добавить три любых клиентов в базу данных
Практика на UPDATE и DELETE
1) Изменить возраст на 45 для клиента номер 2
2) Изменит имя клиенту с номером 1
3) Деактивировать клиента номер 3 (подсказка - см. поле is_active)
4) Удалить всех не активных клиентов
5) Удалить всех созданных вами клиентов
Ниже я привожу SQL запросы для создания таблиц, а также начальные данные для них.
CREATE TABLE `clients` (
`id` INT NOT NULL AUTO_INCREMENT,
 `first_name` VARCHAR(45) NOT NULL,
 `last_name` VARCHAR(45) NOT NULL,
 `email` VARCHAR(45) NOT NULL,
 `company_name` VARCHAR(45) NOT NULL,
 `is_active` INT(11) NULL DEFAULT 0,
 `age` INT(11) NULL,
 PRIMARY KEY (`id`));*/

//Ответ
//DROP TABLE IF EXISTS dz11.clients;
//CREATE TABLE dz11.clients (
//    `id` INT NOT NULL AUTO_INCREMENT,
// `first_name` VARCHAR(45) NOT NULL,
// `last_name` VARCHAR(45) NOT NULL,
// `email` VARCHAR(45) NOT NULL,
// `company_name` VARCHAR(45) NOT NULL,
// `is_active` INT(11) NULL DEFAULT 0,
// `age` INT(11) NULL,
//
// PRIMARY KEY (`id`));
//
// SET SQL_SAFE_UPDATES = 0;
//
// insert into clients values (1,'Дима','Резниченко','D@gmail.com','DAXX',1,20);
// insert into clients values (2,'Владимир','Левченко','V@gmail.com','Facebook',0,30);
// insert into clients values (3,'Валерий','Москаленко','G@gmail.com','EPAM',1,23);
// insert into clients values (4,'Кирилл','Радченко','M@gmail.com','Yalantis',0,38);
// insert into clients values (5,'Михаил','Петренко','N@gmail.com','Google',1,45);
//
// select * from clients;
//
// select *
// from clients
// where is_active = 1;
//
// select *
// from clients
// where age >= 30;
//
// select *
// from clients
// where first_name
// like 'В%';
//
// select count(*)
// from clients;
//
// select *
// from clients
// where age =(select max(age) from clients);
//
// select count(*)
// from clients
// where is_active = 1;
//
// select *
// from clients
// order by age;
//
// select *
// from clients
// order by first_name;
//
// select count(*)
// from clients
// where is_active = 1 and age > 25;
//
// update clients set age = 45 where id = 2;
//
// update clients set first_name = 'Иван' where id = 1;
//
// update clients set is_active = 0 where id = 3;
//
// delete
// from clients
// where is_active = 0;
//
// delete
// from clients;

/*Задание 2
Возьмите ваши SQL запросы с предыдущего задания и переложите их в логику PHP и PDO.*/

$driver = 'mysql';
$host = 'localhost';
$db_name = 'dz';
$db_user = 'root';
$db_pass = '';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];

$db = new PDO('mysql:host=localhost;dbname=dz;charset=utf8mb4', 'root', '');

$stmt = $db->prepare("INSERT INTO clients(first_name,last_name,email,company_name,is_active,age) VALUES(?,?,?,?,?,?)");
$stmt->execute(['Кирилл', 'Кириллов', 'k@com.ua', 'Yalantis', 1, 31]);
$stmt->execute(['Макар','Макаров','m@com.ua','NMU',1,22]);

$stmt = $db->prepare("SELECT * FROM clients where id=5");
$stmt->bindValue(1, $id, PDO::PARAM_INT);
$stmt->bindValue(2, $name, PDO::PARAM_STR);
$stmt->execute();
var_dump( $rows = $stmt->fetchAll(PDO::FETCH_ASSOC));

$stmt = $db->prepare('SELECT * FROM clients where is_active = 1');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);

$stmt = $db->prepare('SELECT * FROM clients where age >= 30');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);

$stmt = $db->prepare("SELECT * FROM clients WHERE first_name LIKE 'К%' ");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);

$stmt = $db->prepare('SELECT count(id) FROM clients');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);

$stmt = $db->prepare('SELECT * FROM clients WHERE age = (SELECT max(age) FROM clients)');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);

$stmt = $db->prepare('SELECT count(id) FROM clients WHERE is_active = 1');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);

$stmt = $db->prepare('SELECT * FROM clients ORDER BY age');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($rows);

$stmt = $db->prepare('SELECT * FROM clients ORDER BY first_name ');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);

$stmt = $db->prepare("SELECT count(id) FROM clients WHERE (is_active = :is_active AND age >= :age)");
$stmt->bindValue(':is_active', 1, PDO::PARAM_INT);
$stmt->bindValue(':age', 25, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);

$stmt = $db->prepare('UPDATE clients SET age = 44 WHERE id = 2');
$stmt->execute();

$stmt = $db->prepare('UPDATE clients SET first_name = Ярослав WHERE id = 1');
$stmt->execute();

$stmt = $db->prepare('UPDATE clients SET is_active = 0 WHERE id = 5');
$stmt->execute();

$stmt = $db->prepare('DELETE FROM clients WHERE is_active = 0');
$stmt->execute();

$stmt = $db->prepare('DELETE FROM clients');
$stmt->execute();