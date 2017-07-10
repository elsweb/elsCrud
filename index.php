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

/* CREATE
$Client->setNameClient('Antonio')
->setEmailClient('developer@elsweb.com.br');
$Client->Create($Client);
*/

/* UPDATE
$Client->setNameClient('Emanuel L.D. Silva')
->setEmailClient('developer@elsweb.com.br');
$Client->Update(9);
*/

/* DELETE
$Client->Delete(9);
*/

/* READ
$array = $Client->Read('id desc'); 
foreach($array as $c):
	echo $c['id'].' Nome '.$c['nome'].' E-mail.: '.$c['email'].'<br>';
endforeach;
*/

$cli = $Client->FindOut(10);
echo $cli['nome'];

//echo'<pre>';
//print_r($Client);
//echo'</pre>';
