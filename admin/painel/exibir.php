<?php
require('../topo_admin.php');
require('../../conexao.php');

$select_veiculo = mysqli_query($conexao, "SELECT * FROM veiculo ORDER BY codigo_veiculo ASC");

if (mysqli_num_rows($select_veiculo) > 0) {
?>

<link rel='stylesheet' type='text/css' media='screen' href='../../css/Estilo.css'>
    <div class="estila_tabela">
        <div><h1>VEICULOS CADASTRADOS</h1></div>
        <table>
            <tr class="tabela_cabecalho">
                <td>CÓDIGO</td>
                <td>DESCRIÇÃO</td>
                <td>MARCA</td>
                <td>MODELO</td>
                <td>ANO</td>
                <td colspan="2">Ação</td>
            </tr>

            <?php while ($dados_veiculo = mysqli_fetch_assoc($select_veiculo)) { ?>
            <tr>
                <td><?php echo $dados_veiculo['codigo_veiculo'];?></td>
                <td><?php echo $dados_veiculo['descricao_veiculo'];?></td>
                <td><?php echo $dados_veiculo['marca_veiculo'];?></td>
                <td><?php echo $dados_veiculo['modelo_veiculo'];?></td>
                <td><?php echo $dados_veiculo['ano_veiculo'];?></td>
                <td>
                    <a href="atualizar.php?codigo_veiculo=<?php echo $dados_veiculo['codigo_veiculo'];?>">
                        <img src="../../img/editar.png" class="botao_acao" alt="Editar">
                    </a>
                </td>
                <td>
                    <a href="javascript:func()" onclick="confirmar_exclusao('<?php echo $dados_veiculo['codigo_veiculo'];?>')">
                        <img src="../../img/excluir.png" class="botao_acao" alt="Excluir">
                    </a>
                </td>
            </tr>
            <?php } ?>

        </table>
    </div>

<?php
} else {
    
    echo "<script> alert ('NÃO EXISTEM VEICULOS CADASTRADOS!');</script>";

    echo "<script> window.location.href='$url_admin/painel';</script>";
}
?>

<script>
function confirmar_exclusao(codigo_veiculo) {
    if (confirm("Tem certeza que deseja excluir esse veículo?")) {
        window.location.href = "remover.php?codigo_veiculo=" + codigo_veiculo;
    }
}
</script>
