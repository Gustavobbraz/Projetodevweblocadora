<?php require('../topo_admin.php');

    require('../../conexao.php');

    $codigo_veiculo = $_GET['codigo_veiculo'];

    $delete_veiculo = "DELETE FROM veiculo WHERE codigo_veiculo = $codigo_veiculo";

        if (mysqli_query($conexao,$delete_veiculo)) {

            mysqli_close($conexao);

            echo "<script> alert ('VEICULO EXCLUIDO COM SUCESSO!');</script>";

            echo "<script> window.location.href='$url_admin/admin/painel/exibir.php';</script>";

        } else {

            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR.');</script>";

            echo "<script> window.location.href='$url_admin/painel';</script>";
        }

?>