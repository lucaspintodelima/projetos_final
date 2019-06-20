<?php
	session_start();
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$con   =   new PDO('mysql:host=localhost:3307;dbname=banco_apm','root','usbw');
	$cmd_sql="SELECT * FROM tabela_usuario WHERE login = ? AND senha = ?";

	$busca = $con->prepare($cmd_sql);
	$busca->bindParam(1,$login);
	$busca->bindParam(2,$senha);
	$busca->execute();
	if($busca->rowCount()>0)
	{
		$_SESSIO['login'] = $login;
		$_SESSIO['senha'] = $senha;
		header('location:index.php');
	}
	else
	{
		unset ($_SESSION['login']);
  		unset ($_SESSION['senha']);
  		header('location:index.html');
	}
?>

		
				
	
	