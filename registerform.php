<?php 
require_once('_app/Config.inc.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="theme" content="<?=HOME?>/themes/<?=THEME?>">
	<title>Formulário de Registros</title>
	<link rel="stylesheet" href="<?=HOME?>/_cdn/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?=HOME?>/_cdn/boot/boot.css"/>
	<style type="text/css">
		form {margin-top: 100px;}
		.warning{border: solid 1px red;}
	</style>
</head>
<body>
	<div class="xs-content centered">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<form method="post" name="registerform">
					<div class="form-group">
						<label for="">Nome</label>
						<input type="text" name="txt_nome" class="form-control require" required>
						<label for="">E-mail</label>
						<input type="email" name="txt_email" class="form-control require" required>
					</div>
					<div class="form-group">
						<button type="button" name="submit" class="btn btn-default">Cadastrar</button>
						<div class="rtn"></div>
					</div>
				</form>				
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?=HOME?>/_cdn/jquery.js"></script>
	<script type="text/javascript" src="<?=HOME?>/_cdn/corejs/hp.string.js"></script><!--[CORE-js]elsWeb Freelancer-->
	<script type="text/javascript" src="<?=HOME?>/themes/rgcontact/js/action.js"></script>
</body>
</html>