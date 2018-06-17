<?php
	
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}


	require_once('db.class.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objDb = new db();
    $link = $objDb->conecta_mysql();

	
	$sql = " SELECT * FROM vacina WHERE id_usuario = $id_usuario ORDER BY vacina";



	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){

		while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
			echo'<a href="#" class ="list-group-item">';
				echo '<h5 class = "list-group-item-heading">Vacina</h5>';
				echo '<p class="list-group-item-text">'.$registro['vacina'].'</p>';
				echo '<p class="list-group-item-text pull-right">';
					echo '<button type="button" class="btn btn-primary btn_excluir" data-id_vacina="'.$registro['id_vacina'].'" >Excluir Vacina</button>';
				echo '</p>';
				echo '<div class="clearfix"></div>';
			echo '</a>';
		}

	}else {
		echo 'Erro na consulta de vacinas no banco de dados';
	}
?>