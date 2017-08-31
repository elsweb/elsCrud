<?php
require('_app/Config.inc.php');
require('_app/Conn/Read.class.php');
require('_app/Conn/Create.class.php');
require('_app/class/Client.class.php');

$cliente = new Client;
$cliente->setNameClient('Emanuel');
$cliente->setEmailClient('teste@teste.com.br');

$create = new Create($cliente);
$create->Create();

echo '<pre>';
print_r($create);
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