<?php
require('_app/Config.inc.php');
require('_app/Conn/Read.class.php');
require('_app/Conn/Create.class.php');
require('_app/Conn/Update.class.php');
require('_app/class/Client.class.php');

$cliente = new Client;

//$cliente->setIdClient(244);
$cliente->setNameClient('Aline maria');
$cliente->setEmailClient('teste@teste.com.br');

//$create = new Create($cliente);
//$create->Create();

$update = new Update($cliente);
$update->Update(244);

echo '<pre>';
print_r($update);
echo '</pre>';

//$dRead = new Read('clientes');
//$dCreate = new Read('clientes');
//$data  = array ('nome','email');
//$full = $dRead->Read();
//$full = $dRead->FindOut(231);
//$full = $dRead->FullRead('ORDER BY nome');
//$full = $dRead->dm();
//echo '<pre>';
//print_r($full);
//echo '</pre>';