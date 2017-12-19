<?php require_once('_app/Config.inc.php');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="theme" content="<?=HOME?>/themes/<?=THEME?>">
	<title>Register Listed</title>
	<link rel="stylesheet" href="<?=HOME?>/_cdn/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?=HOME?>/_cdn/boot/boot.css"/>
	<style type="text/css">
		.moreclient{display: none;}
	</style>
</head>
<body>
	<div class="sm-content centered">
		<div class="row">
			<table class="table">
				<thead>
					<tr>
						<th>Nome</th>
						<th>E-mail</th>
						<th></th>
					</tr>
				</thead>
				<tbody class="client-ajax"></tbody>
			</table>
		</div>
		<button class="btn btn-info moreclient">Carregar Mais</button>
		<div class="loadclient">Aguarde, obtendo usuários</div>
	</div>
	<script type="text/javascript" src="<?=HOME?>/_cdn/jquery.js"></script>
	<script type="text/javascript" src="<?=HOME?>/_cdn/corejs/hp.string.js"></script><!--[CORE-js]elsWeb Freelancer-->
	<script type="text/javascript" src="<?=HOME?>/themes/rgcontact/js/action.js"></script>
</body>
</html>