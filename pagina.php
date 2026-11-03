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