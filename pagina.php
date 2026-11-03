<?php
session_start();

if(!isset($_SESSION["usuario"])){
	header("Location: index.php")
	exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Página protegida</title>
</head>
<body>
	<h1>Bem vindo!</h1>

	<p>Olá, <?= htmlspecialchars($_session["usuario"])?>!</p>
	<p>Você acessou a página protegida por sessão</p>
	<a href="sair.php">Sair do sistema</a>
</body>
</html>
