<?php
require('../../conexao.php');

// Caminho do diretório de upload
$upload_dir = '../../upload/';

if (isset($_POST['codigo_veiculo'])) {
    $codigo_veiculo = $_POST['codigo_veiculo'];

    // Verificando se um arquivo de imagem foi enviado
    if (isset($_FILES['imagem_veiculo'])) {
        $imagem_veiculo = uniqid() . '.' . pathinfo($_FILES['imagem_veiculo']['name'], PATHINFO_EXTENSION);
        $imagem_veiculo_tmp = $_FILES['imagem_veiculo']['tmp_name'];

        // Movendo o arquivo enviado para o diretório de upload
        move_uploaded_file($imagem_veiculo_tmp, $upload_dir . $imagem_veiculo);

        // Concatenando o caminho completo da imagem
        $imagem_veiculo_path = $imagem_veiculo;

        // Atualizando o caminho da imagem na tabela de veículos
        $update_veiculo = "UPDATE veiculo SET imagem_veiculo = '".$imagem_veiculo_path."' WHERE codigo_veiculo = '".$codigo_veiculo."'";
        mysqli_query($conexao, $update_veiculo);
    }

    // Atualizando outros dados do veículo
    $descricao_veiculo = $_POST['descricao_veiculo'];
    $marca_veiculo = $_POST['marca_veiculo'];
    $modelo_veiculo = $_POST['modelo_veiculo'];
    $ano_veiculo = $_POST['ano_veiculo'];

    $update_veiculo = "UPDATE veiculo SET descricao_veiculo = '".$descricao_veiculo."', marca_veiculo = '".$marca_veiculo."', modelo_veiculo = '".$modelo_veiculo."', ano_veiculo = '".$ano_veiculo."' WHERE codigo_veiculo = '".$codigo_veiculo."'";
    mysqli_query($conexao, $update_veiculo);

    echo "<script> alert ('VEICULO ATUALIZADO COM SUCESSO!');</script>";
    echo "<script> window.location.href='$url_admin/veiculos/consultar.php';</script>";

} else if (isset($_POST['descricao_veiculo'])) {
    $descricao_veiculo = $_POST['descricao_veiculo'];
    $marca_veiculo = $_POST['marca_veiculo'];
    $modelo_veiculo = $_POST['modelo_veiculo'];
    $ano_veiculo = $_POST['ano_veiculo'];

    // Verificando se um arquivo de imagem foi enviado
    if (isset($_FILES['imagem_veiculo'])) {
        $imagem_veiculo = uniqid() . '.' . pathinfo($_FILES['imagem_veiculo']['name'], PATHINFO_EXTENSION);
        $imagem_veiculo_tmp = $_FILES['imagem_veiculo']['tmp_name'];

        // Movendo o arquivo enviado para o diretório de upload
        move_uploaded_file($imagem_veiculo_tmp, $upload_dir . $imagem_veiculo);

        // Concatenando o caminho completo da imagem
        $imagem_veiculo_path = $imagem_veiculo;
    } else {
        $imagem_veiculo_path = '';
    }
}
    $insert_veiculo = "INSERT INTO veiculo (descricao_veiculo, marca_veiculo, modelo_veiculo, ano_veiculo, imagem_veiculo) VALUES ('".$descricao_veiculo."', '".$marca_veiculo."', '".$modelo_veiculo."', '".$ano_veiculo."', '".$imagem_veiculo_path."')";

    if (mysqli_query($conexao, $insert_veiculo)) {
        mysqli_close($conexao);
        echo "<script> alert ('VEICULO CADASTRADO COM SUCESSO!');</script>";
        echo "<script> window.location.href='$url_admin/painel/exibir.php';</script>";
    } else { 
        echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR.');</script>";
        echo "<script> window.location.href='$url_admin/painel';</script>";
        mysqli_close($conexao);
    }   
