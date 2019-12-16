<?php
session_start();
$user = [
    'login'=>'user',
    'password'=>'pass',
];
if (empty($_POST)){
    echo 'Error';
    return;
}
if (empty($_POST['login'])){
    echo 'Error';
    return;
}
if (empty($_POST['password'])){
    echo 'Error';
    return;
}

$login = $_POST['login'];
$password = $_POST['password'];

if ($login !== $user['login']||$password !== $user['password']){
    echo 'Неправильный логин или пароль';
    exit;
}
$_SESSION['user']=$user;
?>
<form action="Profile.php" method="post">
    <input type="text" name="FIO" value="Введите ФИО">
    <input type="text" name="address" value="Введите адрес">
    <button type="submit" name="submit">Сохранить данные</button>
</form>
