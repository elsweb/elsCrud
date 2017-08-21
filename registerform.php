<?php 
require_once('_app/Config.inc.php');
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Formulário de Registros</title>
	<link rel="stylesheet" href="<?=HOME?>/_cdn/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?=HOME?>/_cdn/boot/boot.css"/>
	<style type="text/css">
		form {margin-top: 100px;}
	</style>
</head>
<body>
	<div class="xs-content centered">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<form method="post" name="registerform">
					<div class="form-group">
						<label for="">Nome</label>
						<input type="text" name="txt_nome" class="form-control">

						<label for="">E-mail</label>
						<input type="mail" name="txt_email" class="form-control">
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
	<script type="text/javascript" src="<?=HOME?>/themes/rgcontact/js/action.js"></script>
</body>
</html>