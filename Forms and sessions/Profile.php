<?php

session_start();
if (empty($_POST)) {
    echo 'Error';
    exit;
}
if (empty($_SESSION['user'])) {
    echo 'Error';
    return;
}
$user = $_SESSION['user'];
$fio = $_POST['FIO'];
$address = $_POST['address'];
?>
<p>User</p>
<p>Login: <?= $user['login'] ?></p>
<p>Password: <?= $user['password'] ?></p>
<p>ФИО: <?= $fio ?></p>
<p>Адрес: <?= $address ?></p>
<a href="Logout.php">Log out</a>
