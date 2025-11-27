<?php
require("cabecalho.php");
require("conexao.php");

try {
    $stmt = $pdo->query("SELECT t.idtransacao, t.tipo, t.data_transacao, r.modelo, 
                         rr.modelo as roupa_recebida, c.nome as cliente_nome 
                         FROM transacao t
                         INNER JOIN roupas r ON r.idroupas = t.roupas_idroupas
                         INNER JOIN clientes c ON c.idclientes = t.clientes_idclientes
                         LEFT JOIN roupas rr ON rr.idroupas = t.roupa_recebida_id
                         ORDER BY t.data_transacao DESC");
    $dados = $stmt->fetchAll();
} catch (\Exception $e) {
    echo "Erro: " . $e->getMessage();
}

$mensagemToast = "";
$tipoToast = "success";

if (isset($_GET['cadastro'])) {
    $mensagemToast = $_GET['cadastro'] ? "Cadastro realizado!" : "Erro ao cadastrar!";
    $tipoToast = $_GET['cadastro'] ? "success" : "danger";
}

if (isset($_GET['editar'])) {
    $mensagemToast = $_GET['editar'] ? "Registro editado!" : "Erro ao editar!";
    $tipoToast = $_GET['editar'] ? "success" : "danger";
}

if (isset($_GET['excluir'])) {
    $mensagemToast = $_GET['excluir'] ? "Registro excluído!" : "Erro ao excluir!";
    $tipoToast = $_GET['excluir'] ? "success" : "danger";
}
?>

<style>
.tabela-estilizada {
    background-color: #FFE8D6 !important;
    border: 2px solid #FFBC8A;
    border-radius: 10px;
    overflow: hidden;
    color: #7a5946;
    border-collapse: collapse;
}

.tabela-estilizada th,
.tabela-estilizada td {
    border-bottom: 1px solid #FFBC8A !important;
    padding: 15px 15px;
    border-left: none !important;
    border-right: none !important;
}

.tabela-estilizada thead th {
    background-color: #FFDAC1 !important;
    border-bottom: 2px solid #FFBC8A !important;
}

.tabela-estilizada tbody tr:last-child td {
    border-bottom: none !important;
}

.tabela-estilizada.table > :not(caption) > * > * {
    border-bottom: 1px solid #FFBC8A !important;
    color: #7a5946 !important;
    background-color: transparent !important;
}

.tabela-estilizada tbody tr:last-child td {
    border-bottom: none !important;
}

.tabela-estilizada thead {
    background-color: #FFDAC1 !important;
    color: #7a5946 !important;
    font-weight: 700;
}

.icone-acao {
    color: #7a5946 !important;
    font-size: 1.3rem;
    transition: 0.2s;
}

.icone-acao:hover {
    color: #A67B5B !important;
    transform: scale(1.35);
}

.botao-novo {
    color: #7a5946;
    transition: .2s;
}

.botao-novo:hover {
    color: #A67B5B;
    transform: scale(1.2);
}
</style>

<h2 class="mb-5" style="color: #8d6a4eff">Transações</h2>

<table class="table tabela-estilizada">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Data</th>
            <th>Roupa</th>
            <th>Roupa Recebida</th>
            <th>Cliente</th>
            <th style="width: 120px;">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados as $d): ?>
            <tr>
                <td><?= $d['idtransacao'] ?></td>
                <td><?= ucfirst($d['tipo']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($d['data_transacao'])) ?></td>
                <td><?= $d['modelo'] ?></td>
                <td><?= $d['roupa_recebida'] ?? '-' ?></td>
                <td><?= $d['cliente_nome'] ?></td>
                <td class="d-flex gap-3">
                    <a href="editar_transacoes.php?id=<?= $d['idtransacao'] ?>" data-bs-toggle="tooltip" title="Editar">
                        <i class="bi bi-pencil-square icone-acao"></i>
                    </a>
                    <a href="consultar_transacoes.php?id=<?= $d['idtransacao'] ?>" data-bs-toggle="tooltip" title="Consultar">
                        <i class="bi bi-search icone-acao"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="text-end">
    <a href="nova_transacao.php" data-bs-toggle="tooltip" title="Novo" class="botao-novo">
        <i class="bi bi-plus fs-1"></i>
    </a>
</div>

<div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 11;">
    <div id="mensagemToast" class="toast align-items-center text-bg-<?= $tipoToast ?> border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body"><?= $mensagemToast ?></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<?php
require("rodape.php");
?>