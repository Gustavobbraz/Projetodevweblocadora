<?php
    require('../conexao.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data_retirada = $_POST['data_retirada'];
        $local_retirada = $_POST['local_retirada'];
        $codigo_veiculo = $_GET['codigo_veiculo'];

        // Recupere os dados do veículo do banco de dados
        $select_veiculo = mysqli_query($conexao, "SELECT * FROM veiculo WHERE codigo_veiculo = $codigo_veiculo");

        if (mysqli_num_rows($select_veiculo) > 0) {
            $dados_veiculo = mysqli_fetch_assoc($select_veiculo);
            $descricao = $dados_veiculo['descricao_veiculo'];
            $marca = $dados_veiculo['marca_veiculo'];
            $modelo = $dados_veiculo['modelo_veiculo'];
            $ano = $dados_veiculo['ano_veiculo'];

            // Insira os dados do aluguel e do veículo no banco de dados
            $insert_query = "INSERT INTO aluguel (data_retirada, local_retirada, codigo_veiculo, descricao, marca, modelo, ano) VALUES ('$data_retirada', '$local_retirada', '$codigo_veiculo', '$descricao', '$marca', '$modelo', '$ano')";

            if (mysqli_query($conexao, $insert_query)) {
                echo "<script> alert ('Dados inseridos com sucesso no banco de dados.');</script>";
                echo "<script> window.location.href='$url_cliente/index.php';</script>";
            } else {
                echo "Erro ao inserir dados no banco de dados: " . mysqli_error($conexao);
                echo "<script> window.location.href='$url_cliente/index.php';</script>";
            }
        } else {
            echo "<script> alert ('NÃO EXISTEM VEICULOS CADASTRADOS!');</script>";
            echo "<script> window.location.href='$url_admin/painel';</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/cliente.css'>
   
</head>
<body>
    <?php
        require('../conexao.php');

        $codigo_veiculo = $_GET['codigo_veiculo'];

        $imagem_veiculo = "../upload/";

        $select_veiculo = mysqli_query($conexao, "SELECT * FROM veiculo WHERE codigo_veiculo = $codigo_veiculo");

        if (mysqli_num_rows($select_veiculo) > 0) {
            $dados_veiculo = mysqli_fetch_assoc($select_veiculo);
        } else {
            echo "<script> alert ('NÃO EXISTEM VEICULOS CADASTRADOS!');</script>";
            echo "<script> window.location.href='$url_admin/veiculos';</script>";
        }
    ?>
        <div class="agrupamento_alugar">

            <ul class="lista_alugar"> 
                <li><img src="<?php echo $imagem_veiculo . $dados_veiculo['imagem_veiculo'];?>" alt="Imagem do veiculo"></li>
                <li><?php echo $dados_veiculo['descricao_veiculo'];?></li>
                <li><?php echo $dados_veiculo['marca_veiculo'];?></li>
                <li><?php echo $dados_veiculo['modelo_veiculo'];?></li>
                <li><?php echo $dados_veiculo['ano_veiculo'];?></li>
            </ul>
        
            <form action="alugar.php?codigo_veiculo=<?php echo $codigo_veiculo;?>" method="post" id="form_alugar" name="form_alugar" class="form_alugar">

                <div><label>Data de retirada</label></div>

                <div><input type="date" name="data_retirada" class="input"></div>

                <div><label>Local de retirada</label></div>
                
                <div>
                    <select name="local_retirada" id="local_retirada">
                
                        <option value="Local A">Locadora  SEDE</option>
                       
                
                    </select>

                </div>

                <div><input type="submit" id="btn_confirmar" name="btn_confirmar" value="Confirmar" class="botaoalugar"></div>


            </form>

        </div>

</body>

</html>