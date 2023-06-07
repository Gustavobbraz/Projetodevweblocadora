<?php
	/*Neste codigo o user entra com o email dele e entao criamos uma senha aleatoria e a enviamos pra ele no email dele, e tbm alteramos a antiga senha dele no bd para essa nova*/


	include("conexao.php");

	//se o campo ok foi preenchido
	if(isset($_POST[ok])){
		
		$email = $mysqli->escape_string($_POST['email']);

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$erro[] = 'Email invalido';
		}

		$sql_code = "SELECT senha, codigo FROM usuario WHERE email = '$email'";
		$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
		$dado = $sql_query->fetch_assoc();
		$total = $sql_query->num_rows;

		if($total == 0){
			$erro[] = "Email nao existe no banco de dados";
		}


		if(count($erro) == 0 && $total > 0){

			$novasenha = substr(md5(time()),0,6); //gerando uma nova senha aleatoriamente
			$nscriptografada = md5(md5($novasenha)); //criptografando ela
			

			//aqui ela so muda a senha se a funcao de enviar um email for bem sussedida.
			if(mail($email, "Sua nova senha", "Sua nova senha: ".$novasenha)){
				$sql_code = "UPDATE usuario SET senha = '$nscriptografada' WHERE email = '$email' ";
				$sql_query = $mysqli->query($sql_code) or die($mysqli->error);

				if($sql_query){
					$erro[] = "Senha alterada com sucesso.";
				}
			}
		}





	}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Recuperacao de senha</title>
</head>
<body>
<?php if( count($erro) > 0){
			foreach ($erro as $msg) {
				echo "<p>$msg</p>";
			}
		}
	?>
<form action="" method="POST">
	<input value="<?php echo $_POST['email'];?>" type="email" placeholder="Insira seu email" name="email">
	<input type="submit" name="ok" value="ok">

	<!--esse value no email serve pra autoprencher o email deps da pagina ser recarregada.-->

</form>
</body>
</html>
