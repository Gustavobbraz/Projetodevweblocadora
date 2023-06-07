<?php //session_start();

	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$db_name = "db_locadora";
	
	
	$conexao = mysqli_connect($servidor, $usuario, $senha, $db_name) or die('Banco de dados indisponível.');
	
	date_default_timezone_set("America/Manaus");
	
	$host_ip = $_SERVER['HTTP_HOST'];
	
	$url = "http://".$host_ip."/Loginlocadora";

	$url_admin = "http://".$host_ip."/Loginlocadora/admin";

	$url_cliente = "http://".$host_ip."/Loginlocadora/cliente";
	
?>
