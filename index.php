





<!DOCTYPE html>

<html lang="pt-br">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portal</title>

	<!-- ARQUIVO DE ESTILOS DO PORTAL -->
	<link rel="stylesheet" type="text/css" href="css/Estilo.css">
	
</head>


<body>

		<form id="form_login" name="form_login" class="form_veiculos" method="post" action="valida_login.php">

			<div><h1>LOGIN</h1></div>

				<div class="agrupamento_login">

					<div>

						<div><label>Digite seu login</label></div>	

						<div><input type="text" id="nome_login" name="nome_login" required autofocus></div>

						<div><label>Digite sua senha</label></div>

						<div><input type="password" id="senha_login" name="senha_login" required></div>
							<div class="esqueceu_senha">
							<p><a href="esqueceusuasenha.php" target="_blank">Esqueceu sua senha ?</a></p>
						</div>
						<div><input type="submit" id="btn_entrar" name="btn_entrar" value="Entrar"></div>

					</div>

					


				</div>

		</form>
</body>

</html>