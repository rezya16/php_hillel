<?php
if (empty($_GET)) {
    echo 'Error';
    return;
}
if (empty($_GET['type'])) {
    echo 'Error';
    return;
}
if (empty($_GET['temp'])) {
    echo 'Error';
    return;
}
$arg1 = $_GET['temp'];
switch ($_GET['type']) {
    case 'C':
        echo 'Температура в Фаренгейтах: ' . $result = ($arg1 * 1.8) + 32;
        break;
    case 'F':
        echo 'Температура в Цельсиях: ' . $result = ($arg1 - 32) * 0.55;
        break;
}
return $result;
