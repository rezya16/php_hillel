<?php

if (empty($_GET)) {
    echo 'Ничего не передано!';
    return;
}
if (empty($_GET['operation'])) {
    echo 'Операция не передана!';
    return;
}

$arg1 = $_GET['arg1'];
$arg2 = $_GET['arg2'];
switch ($_GET['operation']) {
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
        if ($arg2 == 0) {
            echo 'Делить на 0 нельзя';
            return;
        }
        $result = $arg1 / $arg2;
        break;
}
