<?php
require_once('_app/interface/EntidadeInterface.class.php');
require_once('_app/class/Client.class.php');
require_once('_app/sys/ServiceDb.class.php');

header('Content-Type: text/html; charset=utf-8');

$host = 'localhost';
$user = 'elscode';
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


$Client = new Client();


$Client->setNameClient('Maria Del San Thiago')
       ->setEmailClient('maria@delthiago.com.br');

$ServiceDb = new ServiceDb($Conn, $Client);

/*CREATE
//$ServiceDb->Create();

/* UPDATE
$ServiceDb->setNameClient('Emanuel L.D. Silva')
->setEmailClient('developer@elsweb.com.br');
$Client->Update(9);
*/

/* DELETE
$Client->Delete(9);
*/

/*READ*/
$array = $ServiceDb->Read('id desc'); 
foreach($array as $c):
	echo $c['id'].' Nome '.$c['nome'].' E-mail.: '.$c['email'].'<br>';
endforeach;
