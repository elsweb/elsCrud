<?php
header('Content-Type: text/html; charset=utf-8');

$host = 'localhost';
$user = 'lab';
$pass = '';
$dbsa = 'estudo_pdocomphp';

$Conn = new  \PDO("mysql:host={$host};dbname={$dbsa}","{$user}","{$pass}");//String DSN config