<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Vaccine</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script type="text/javascript">

			$(document).ready(function(){

				//associar o evento de click ao botao
				$('#btn_vacina').click(function(){

					if($('#texto_vacina').val().length > 0){

						$.ajax({
							url: 'inclui_vacina.php', 
							method: 'post',
							data: $('#form_vacina').serialize(),
							success: function(data){
								$('#texto_vacina').val('');
								atualizaVacina();
							}

						});

					}

				});

				function atualizaVacina(){
					//carregar vacinas

					$.ajax({
						url: 'get_vacina.php',
						success: function(data){
							$('#vacinas').html(data);
						

						}

					});

				}

				atualizaVacina();
			});

		</script>

	</head>

	<body>

		<!-- Static navbar -->
		<nav class="navbar navbar-default navbar-static-top"  style="background-color: #00868B"> 
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
				</div>

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="sair.php">Sair</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>


		<div class="container">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4><?= $_SESSION['usuario'] ?></h4>
						
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="form_vacina" class="input-group">
							<input type="text" id="texto_vacina" name="texto_vacina" class="form-control" placeholder="Cadastrar uma nova vacina" maxlength="140" />
							<span class="input-group-btn">
								<button class="btn btn-default" id="btn_vacina" type="button">Cadastrar</button>
							</span>
						</form>
					</div>
				</div>

				<div id="vacinas" class="list-group"></div>
			</div>
			<div class="col-md-3">
				
			</div>
		</div>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</body>
</html>