<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alugar</title>
  <link rel='stylesheet' type='text/css' media='screen' href='../css/cliente.css'>
</head>

<body>

<?php
require('../conexao.php');

$imagem_veiculo = "../upload/";

$select_veiculo = mysqli_query($conexao, "SELECT * FROM veiculo ORDER BY codigo_veiculo ASC");

if (mysqli_num_rows($select_veiculo) > 0) {
?>

  <div class="tabela_cliente">
      <div><h1>VEICULOS DISPONIVEIS</h1></div>
      <ul class="lista_veiculos">
         
          <?php while ($dados_veiculo = mysqli_fetch_assoc($select_veiculo)) { ?>
          <li>
            <?php if ($dados_veiculo['imagem_veiculo'] !=""){ ?>   
            <div class="item_veiculo"> <img  src="<?php echo $imagem_veiculo . $dados_veiculo['imagem_veiculo'];?>" alt="imagem do veiculo"></div> 
            <?php } ?>
              <div class="item_veiculo"><strong>CÓDIGO:</strong> <?php echo $dados_veiculo['codigo_veiculo'];?></div>
              <div class="item_veiculo"><strong>DESCRIÇÃO:</strong> <?php echo $dados_veiculo['descricao_veiculo'];?></div>
              <div class="item_veiculo"><strong>MARCA:</strong> <?php echo $dados_veiculo['marca_veiculo'];?></div>
              <div class="item_veiculo"><strong>MODELO:</strong> <?php echo $dados_veiculo['modelo_veiculo'];?></div>
              <div class="item_veiculo"><strong>ANO:</strong> <?php echo $dados_veiculo['ano_veiculo'];?></div>
              <a href="alugar.php?codigo_veiculo=<?php echo $dados_veiculo['codigo_veiculo'];?>">
                        <input type="submit" value="ALUGAR" nome="btn_alugar" class="btn_alugar">
                    </a>
          </li>
          <?php } ?>
      </ul>
  </div>

<?php } else {
    
    echo "<script> alert ('NÃO EXISTEM VEICULOS CADASTRADOS!');</script>";

}
?>

</body>
</html>
