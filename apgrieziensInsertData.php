<?php

include_once 'data.inc.php';

mysql_connect($host, $user, $pass);
mysql_select_db($dbName);

function checkSta($numurs) {
    $result = mysql_query("SELECT sta FROM apgrieziens WHERE num = '$numurs' AND sta != '0'");
    $num_rows = mysql_num_rows($result);
    if ($num_rows < 1) { $var = FALSE; }
    if ($num_rows >= 1) { $var = TRUE; }
    return $var;
}

function checkApg($numurs) {
    $result = mysql_query("SELECT sta FROM apgrieziens WHERE num = '$numurs' AND apg != '0'");
    $num_rows = mysql_num_rows($result);
    if ($num_rows < 1) { $var = TRUE; }
    if ($num_rows >= 1) { $var = FALSE; }
    return $var;
}

$check[0] = checkSta($_POST['numurs']);
$check[1] = checkApg($_POST['numurs']);

if (!$check[0]) {
    $error['style'] = "border: 3px solid; border-color:#FF0000;";
    $error['msg'] = "<span style=\"color:#FF0000;\"><b>Šāds numurs nav startējis! (Dati netika pierakstīti datu bāzē)</b></span>";
    include 'index.php';
}

if (!$check[1]) {
    $error['style'] = "border: 3px solid; border-color:#FF0000;";
    $error['msg'] = "<span style=\"color:#FF0000;\"><b>Šim numuram apgrieziens jau ir reģistrēts!</b></span>";
    include 'index.php';
}

if ($check[0] && $check[1]) {
    $laiks = -(mktime($hour, 0, 0, $month, $day, $year) - time());
    mysql_query("UPDATE apgrieziens SET apg = '$laiks' WHERE num = '".$_POST['numurs']."'");
    header('Location: index.php');
}

//mysql_close();