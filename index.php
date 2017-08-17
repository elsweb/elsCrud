<?php
require_once('_app/Config.inc.php');
require_once('_app/Conn/Conn.class.php');
require_once('_app/interface/EntidadeInterface.class.php');
require_once('_app/class/Client.class.php');
require_once('_app/sys/ServiceDb.class.php');

header('Content-Type: text/html; charset=utf-8');

$Conn = new Conn();
$conexao= $Conn->getConn();

$Client = new Client();
$ServiceDb = new ServiceDb($conexao, $Client);


/*CREATE
//$Client->setNameClient('Maria Del San Thiago')
//       ->setEmailClient('maria@delthiago.com.br');
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
