<?php
	
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$texto_vacina = $_POST['texto_vacina'];
	$id_usuario = $_SESSION['id_usuario'];

	if($texto_vacina == '' || $id_usuario == ''){

		die();
	}

	$objDb = new db();
    $link = $objDb->conecta_mysql();

	
	$sql = " INSERT INTO vacina(id_usuario, vacina)values($id_usuario, '$texto_vacina') ";


	mysqli_query($link, $sql);







?>