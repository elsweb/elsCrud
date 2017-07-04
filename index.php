<?php
header('Content-Type: text/html; charset=utf-8');

$host = 'localhost';
$user = 'lab';
$pass = '';
$dbsa = 'estudo_pdocomphp';

try {
$Conn = new  \PDO("mysql:host={$host};dbname={$dbsa}","{$user}","{$pass}");//String DSN config

$query = "SELECT * FROM clientes WHERE id=:id";

//$query = "INSERT INTO clientes (nome, email) VALUES ('Emanuel','atendimento@elsweb.com.br')";
//$resultado = $Conn->exec($query); // Executa a query no banco de dados

$stmt= $Conn->prepare($query);
$stmt->bindValue(":id",$_GET['id'],PDO::PARAM_INT); //Proteção contra SQL injection
$stmt->execute();

//$stmt= $Conn->query($query); //Prepara para execução do script no banco de dados.
//$resultado = $stmt->fetch(PDO::FETCH_ASSOC); //Lista um array associativo [REGISTRO ÚNICO]
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC); //Lista um array associativo [MULTIPLOS REGISTROS]
//$resultado = $stmt->fetchAll(PDO::FETCH_CLASS); //Lista como objetos

foreach ($resultado as $cliente) {
	echo'<pre>';
	print_r($cliente);
	echo'</pre>';
}

//echo'<pre>';
//print_r($resultado);
//echo'</pre>';

}catch(\PDOException $e){
	echo "<div style='padding:20px; background:black; color:red; width:200px; height:auto; margin: 0 auto; text-align:center;'>
	<span>Não foi possivel estabelezer conexão com bando de dados <b>{$dbsa}</b></span><hr>
	<span>Erro : <b>{$e->getCode()}</b></span>
</div>";
}