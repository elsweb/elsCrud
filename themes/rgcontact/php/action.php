<?php
//sleep(2);
require_once('../../../_app/Config.inc.php');

require_once('../../../_app/Conn/Create.class.php');
require_once('../../../_app/Conn/Read.class.php');
require_once('../../../_app/Conn/Delete.class.php');
require_once('../../../_app/class/Client.class.php');

extract(filter_input_array(INPUT_POST,FILTER_DEFAULT));

switch($run){
	
	case 'register' : 
		$dados['nome'] = $txt_nome; //Reforçar segurança
		$dados['email'] = $txt_email;
		
		if(!in_array('',$dados)):
		/*OBJECT class*/
		$Client = new Client;
		$Client->setNameClient($dados['nome']);
		$Client->setEmailClient($dados['email']);
		$Create = new Create($Client);
		$Register = $Create->Create();
			if($Register):
				unset($Client);
				unset($Create);
				$dados['rtnjs'] = true;
			endif;
			else:
				$dados['rtnjs'] = false;
			endif;
		echo json_encode($dados);
	break;
	case 'readAll':
		$Read = new Read('clientes');
		$pag = array('offset' => $offset, 'limit'  => $limit);
		$Client = $Read->Read(null,null, $pag);
		if($Client){
			foreach ($Client as $dados) {
				echo '<tr class='.$dados['id'].'>';
					echo'<td>'.$dados['nome'].'</td>';
					echo'<td>'.$dados['email'].'</td>';
					echo
					'<td>
						<button id='.$dados['id'].' class="btn btn-danger delclient">Deletar</button>
						<button id='.$dados['id'].' class="btn btn-info edclient">Editar</button>
					</td>';
				echo '</tr>';
			}
		}else{
			echo 'empty';
		}
	break;
	case 'delete':
		$Client = new Client;
		$Client->setIdClient($client_id);
		$Delete = new Delete($Client);
		$Remove = $Delete->Delete();
			if($Remove):
				unset($Client);
				unset($Delete);
			endif;
	break;
	default : echo 'not found action';
	}
