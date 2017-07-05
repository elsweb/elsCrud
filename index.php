<?php
require_once('_app/sys/Client.class.php');

header('Content-Type: text/html; charset=utf-8');

$host = 'localhost';
$user = 'lab';
$pass = '';
$dbsa = 'estudo_pdocomphp';

try {
$Conn = new  \PDO("mysql:host={$host};dbname={$dbsa}","{$user}","{$pass}");//String DSN config
}catch(\PDOException $e){
	die ("<div style='padding:20px; background:black; color:red; width:200px; height:auto; margin: 0 auto; text-align:center;'>
		<span>Não foi possivel estabelezer conexão com bando de dados <b>{$dbsa}</b></span><hr>
		<span>Erro : <b>{$e->getCode()}</b></span>
	</div>");
}

$Client = new Client($Conn);
$Client->setNameClient('Antonio')
       ->setEmailClient('developer@elsweb.com.br');

$resultado = $Client->Create($Client);
echo $resultado;


//echo'<pre>';
//print_r($Client);
//echo'</pre>';
