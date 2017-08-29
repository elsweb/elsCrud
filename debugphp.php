<?php
require('_app/Config.inc.php');
require('_app/Conn/Read.class.php');

$dRead = new Read('clientes');
$data  = array ('nome');
//$full = $dRead->Read($data, 'ORDER BY nome');
$full = $dRead->FullRead('ORDER BY nome');
//$full = $dRead->dm();
echo '<pre>';
print_r($full);
echo '</pre>';