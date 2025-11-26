<?php
require("cabecalho.php");
require("conexao.php");
try {
    $stmt = $pdo->query("SELECT * FROM roupas_tipos");
    $dados = $stmt->fetchAll();
} catch (\Exception $e) {
    echo "Erro: " . $e->getMessage();
}
if (isset($_GET['cadastro']) && $_GET['cadastro']) {
    echo "<p class='text-success'>Cadastro realizado!</p>";
} else if (isset($_GET['cadastro']) && !$_GET['cadastro']) {
    echo "<p class='text-danger'>Erro ao cadastrar!</p>";
}
if (isset($_GET['editar']) && $_GET['editar']) {
    echo "<p class='text-success'>Registro editado!</p>";
} else if (isset($_GET['editar']) && !$_GET['editar']) {
    echo "<p class='text-danger'>Erro ao cadastrar!</p>";
}
if (isset($_GET['excluir']) && $_GET['excluir']) {
    echo "<p class='text-success'>Registro excluído!</p>";
} else if (isset($_GET['excluir']) && !$_GET['excluir']) {
    echo "<p class='text-danger'>Erro ao cadastrar!</p>";
}
?>


<h2>Tipos de Roupas</h2>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($dados as $d):
            ?>
            <tr>
                <td><?= $d['idtipo'] ?></td>
                <td><?= $d['descricao'] ?></td>
                <td class="d-flex gap-2">
                    <a href="editar_roupas_tipos.php?id=<?= $d['idtipo'] ?>" data-bs-toggle="tooltip" title="Editar">
                        <i class="bi bi-pencil-square me-3" style="color: #73c2ff"></i>
                    </a>

                    <a href="consultar_roupas_tipos.php?id=<?= $d['idtipo'] ?>" data-bs-toggle="tooltip" title="Consultar">
                        <i class="bi bi-search" style="color: #73c2ff"></i>
                    </a>

                </td>
            </tr>
            <?php
        endforeach;
        ?>
    </tbody>
</table>
<div class="text-end">
    <a href="novo_tipo.php" data-bs-toggle="tooltip" title="Novo">
        <i class="bi bi-plus me-3 fs-1" style="color: #73c2ff"></i>
    </a>
</div>


<?php
require("rodape.php");
