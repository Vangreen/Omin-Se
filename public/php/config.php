<?php
/**
 * Created by PhpStorm.
 * User: szwedoman
 * Date: 06.04.19
 * Time: 16:21
 */

$cfg['db_server'] = '85.128.152.101'; // Serwer bazy danych
$cfg['db_user'] = 'szwedoman_omin'; // Nazwa uzytkownika
$cfg['db_pass'] = 'omsOMS11'; // Haslo
$cfg['db_name'] = 'szwedoman_omin'; // Nazwa bazy danych

// POLACZ Z BAZA DANYCH
$conn = @mysqli_connect ($cfg['db_server'], $cfg['db_user'], $cfg['db_pass']);
$select = @mysqli_select_db ($conn, $cfg['db_name']);

if (!$conn) {
    die ('<p class="error">Nie udalo sie polaczyc z baza danych.</p>');
}

if (!$select) {
    die ('<p class="error">Nie udalo sie wybrac bazy danych.</p>');
}

mysqli_query($conn, 'SET NAMES utf8');

function safe($value, $conn){
    return mysqli_real_escape_string($conn, (string)$value);
};
?>