<?php
sleep(1);
require_once('../../../_app/Config.inc.php');
require_once('../../../_app/Conn/Conn.class.php');
require_once('../../../_app/interface/EntidadeInterface.class.php');
require_once('../../../_app/class/Client.class.php');
require_once('../../../_app/sys/ServiceDb.class.php');

$run = filter_input(INPUT_GET,'run',FILTER_DEFAULT);
extract(filter_input_array(INPUT_POST,FILTER_DEFAULT));

switch($run){
	case 'register' : 
	$Conn = new Conn();
	$conexao= $Conn->getConn();

	$Client = new Client();
	$ServiceDb = new ServiceDb($conexao, $Client);

	
	$Client->setNameClient($txt_nome)
	->setEmailClient($txt_email);
	$resposta = $ServiceDb->Create();
	
	if($resposta):
		echo "O registro <strong>{$txt_nome}</strong> foi efetuado com sucesso";
		//print_r($txt_nome);
	unset($Conn);
	unset($Client);
	unset($ServiceDb);
	endif;	
	break;
}
