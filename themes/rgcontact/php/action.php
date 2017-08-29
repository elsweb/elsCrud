<?php
sleep(2);
require_once('../../../_app/Config.inc.php');
require_once('../../../_app/Conn/Conn.class.php');
require_once('../../../_app/interface/EntidadeInterface.class.php');
require_once('../../../_app/class/Client.class.php');
require_once('../../../_app/sys/ServiceDb.class.php');

extract(filter_input_array(INPUT_POST,FILTER_DEFAULT));

switch($run){
	
	case 'register' : 
		$dados['nome'] = $txt_nome; //Reforçar segurança
		$dados['email'] = $txt_email;
		
		if(!in_array('',$dados)):
			$Conn = new Conn();
		$Conexao = $Conn->getConn();
		$Client = new Client();
		$ServiceDb = new ServiceDb($Conexao, $Client);
		$Client->setNameClient($dados['nome'])
		->setEmailClient($dados['email']);
		$Register = $ServiceDb->Create();

		if($Register):
			$dados['rtnjs'] = true;	
		unset($Conn);
		unset($Client);
		unset($ServiceDb);
		endif;
		else:
			$dados['rtnjs'] = false;
		endif;
		echo json_encode($dados);
		break;
		case 'listed':

		break;
	}
