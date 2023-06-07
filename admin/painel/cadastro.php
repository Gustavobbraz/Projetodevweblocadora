<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--LINK DO ARQUIVO Estilo.CSS-->
	<link rel="stylesheet" type="text/css" href="../../css/Estilo.css">
 	<!--TITULO DA PAGINA-->
	<title>Cadastro</title>
</head>
<style>


	* {
    margin: 0 auto;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
}

#menu-h{
    background-color: rgb(37, 37, 39);
}

#menu-h ul {
    max-width: 425px;
    list-style: none;
    padding: 0;
}
#menu-h ul li a {
    color: #ffffff;
    padding: 30px;
    display: inline-block;
    text-decoration: none;
    transition: background .4s;
	font-size: 2rem;
}

h1{
	color: beige;
}


	</style>
<body>
	
	<!--MENU DA PAGINA-->
    <nav id="menu-h">
        <ul>
            <!--PAINEL COM LINK PARA OUTRAS PAGINAS-->
            <li>
                <a href="http://localhost:8080/Loginlocadora/admin/topo_admin.php">Home</a></li>
            <li><a href="http://localhost:8080/Loginlocadora/admin/painel/exibir.php">Consultar</a></li>       
            <li><a href="http://localhost:8080/Loginlocadora/">Logout</a></li>       
        </ul>
    </nav>
	
	<div class="Pagina_fundo">
		<!-- FORMULARIO DA PAGINA -->
		<form id="form_cadastro" name="form_cadastro" class="form_veiculos" method="POST" enctype="multipart/form-data" action="salvar.php">
			<div>
				<h1>Cadastrar Veiculo</h1>
			</div>

			<div class="agrupamento_cadastro">
				<!-- LABEL E ENTRADAS DE DADOS -->
				<div>
					<label for="descricao_veiculo">Descricao do Veiculo</label>
				</div>
				<div>
					<input type="text" id="descricao_veiculo" name="descricao_veiculo" required autofocus>
				</div>

				<div>
					<label for="marca_veiculo">Marca do veículo </label>
				</div>
				<div>
					<input type="text" id="marca_veiculo" name="marca_veiculo" required autofocus>
				</div>

				<div>
					<label for="ano_veiculo">Ano do Veiculo</label>
				</div>
				<div>
					<input type="text" id="ano_veiculo" name="ano_veiculo" required autofocus>
				</div>

				<div>
					<label for="modelo_veiculo">Modelo do Veiculo</label>
				</div>
				<div>
					<input type="text" id="modelo_veiculo" name="modelo_veiculo" required autofocus>
				</div>

				<div>
					<label for="categoria_veiculo">Categoria do Veiculo</label>
				</div>
				<div>
					<input type="text" id="categoria_veiculo" name="categoria_veiculo" required autofocus>
				</div>

				<div>
					<label for="cor_veiculo">Cor do Veiculo</label>
				</div>
				<div>
					<input type="text" id="cor_veiculo" name="cor_veiculo" required autofocus>
				</div>

				<div>
					<input type="file" name="imagem_veiculo" id="imagem_veiculo" accept="image/*">
				</div>

				<div>
					<input type="submit" id="btn_cadastrar" name="insert" value="Cadastrar">
				</div>
			</div>
		</form>
	</div>
</body>
</html>
