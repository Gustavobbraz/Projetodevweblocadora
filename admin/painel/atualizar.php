<?php 
    require('../topo_admin.php');
    require('../../conexao.php');

    $codigo_veiculo = $_GET['codigo_veiculo'];

    $select_veiculo = mysqli_query($conexao, "SELECT * FROM veiculo WHERE codigo_veiculo = $codigo_veiculo");

    if (mysqli_num_rows($select_veiculo) > 0) {
        $dados_veiculo = mysqli_fetch_assoc($select_veiculo);
    } else {
        echo "<script> alert ('NÃO EXISTEM VEICULOS CADASTRADOS!');</script>";
        echo "<script> window.location.href='$url_admin/painel';</script>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn_atualizar"])) {
        $codigo_veiculo = $_POST["codigo_veiculo"];
        $descricao = $_POST["descricao_veiculo"];
        $marca = $_POST["marca_veiculo"];
        $modelo = $_POST["modelo_veiculo"];
        $ano = $_POST["ano_veiculo"];

        $sql = "UPDATE veiculo SET descricao_veiculo='$descricao', marca_veiculo='$marca', modelo_veiculo='$modelo', ano_veiculo='$ano' WHERE codigo_veiculo='$codigo_veiculo'";

        if ($conexao->query($sql) === TRUE) {
            echo "<script> alert ('Veículo atualizado com sucesso!');</script>";
            echo "<script> window.location.href='exibir.php';</script>";
        } else {
            echo "Erro ao atualizar o veículo: " . $conexao->error;
        }
    }
?>

<link rel='stylesheet' type='text/css' media='screen' href='../../css/Estilo.css'>

<form id="form_atualizar" name="form_atualizar" class="form_atualizar" method="post" action="">

    <div><h1>Atualizar os dados</h1></div>

    <div class="agrupamento_atualizar">
        <div>

            <div><label>Codigo do veículo</label></div>
            <div><input type="text" id="codigo_veiculo" name="codigo_veiculo" placeholder="000" value="<?php echo $dados_veiculo['codigo_veiculo'];?>" readonly></div>

            <div><label>Digite a descrição do veículo </label></div>
            <div><input type="text" id="descricao_veiculo" name="descricao_veiculo" value="<?php echo $dados_veiculo['descricao_veiculo'];?>" required autofocus></div>

            <div><label>Digite a marca do veículo </label></div>
            <div><input type="text" id="marca_veiculo" name="marca_veiculo" value="<?php echo $dados_veiculo['marca_veiculo'];?>" required autofocus></div>

            <div><label>Digite o modelo do veículo</label></div>
            <div><input type="text" id="modelo_veiculo" name="modelo_veiculo" value="<?php echo $dados_veiculo['modelo_veiculo'];?>" required autofocus></div>

            <div><label>Digite o ano do veículo</label></div>
            <div><input type="text" id="ano_veiculo" name="ano_veiculo" placeholder="0000/0000" value="<?php echo $dados_veiculo['ano_veiculo'];?>" required autofocus></div>

            <div><input type="submit" id="btn_atualizar" name="btn_atualizar" value="Atualizar"></div>

        </div>    
    </div>

</form>
