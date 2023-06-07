<?php session_start();

	if (!isset($_SESSION['nome_login'])) {	
	    
	    session_destroy();
	 
	    unset ($_SESSION['nome_login']);
	    unset ($_SESSION['tipo_login']);

		echo "<script> alert ('ERRO: É NECESSÁRIO FAZER LOGIN');</script>";
		
		echo "<script> window.location.href='http://localhost/Loginlocadora';</script>";

	}	

	if ($_SESSION['tipo_login'] <> 0) {

		echo "<script> alert('ERRO: VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA!');</script>";					
		session_destroy();
	 
		unset ($_SESSION['nome_completo_login']);
		unset ($_SESSION['nome_login']);
		unset ($_SESSION['tipo_login']);

		unset ($_SESSION['url']);
		unset ($_SESSION['url_admin']);
		unset ($_SESSION['url_cliente']);

		echo "<script> window.location.href='http://localhost/Loginlocadora';</script>";				

	} 


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <!--TITULO DA PAGINA-->
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!--LINK DO ARQUIVO Estilo.CSS-->
    <link rel='stylesheet' type='text/css' media='screen' href='../css/Estilo.css'>
    
    <style>

    </style>
</head>

<!--CORPO DA PAGINA-->
<body>
    <!--MENU DA PAGINA-->
    <nav id="menu-h">
        <ul>
			<!--PAINEL COM LINK PARA OUTRAS PAGINAS-->
            <li><a href="http://localhost:8080/Loginlocadora/admin/topo_admin.php">Home</a></li>
            <li><a href="http://localhost:8080/Loginlocadora/admin/painel/cadastro.php">Cadastrar</a></li> 
            
            <li><a href="http://localhost:8080/Loginlocadora/admin/painel/exibir.php">Consultar</a></li>


            <li><a href="http://localhost:8080/Loginlocadora/admin/painel/alugado.php">Pedidos</a></li>

            <li><a href="http://localhost:8080/Loginlocadora/sair.php">Logout</a></li>
        </ul>
    </nav>

    <div class="home_page">
        <div></div>
        <div class="h1"></div>
        <div><h1></h1></div>
    </div>

</body>
</html>
