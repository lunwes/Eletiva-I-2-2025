<?php
require("cabecalho.php");
require("conexao.php");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $stmt = $pdo->prepare("SELECT * from roupas_tipos WHERE idtipo = ?");
        $stmt->execute([$_GET['id']]);
        $roupas_tipos = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro ao consultar roupas_tipos: " . $e->getMessage();
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM roupas_tipos WHERE idtipo = ?");
        if ($stmt->execute([$id])) {
            header('location: tipos.php?excluir=true');
        } else {
            header('location: tipos.php?excluir=false');
        }
    } catch (\Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<style>
    .icone-acao {
        color: #7a5946 !important;
        font-size: 1.3rem;
        transition: 0.2s;
    }

    .icone-acao:hover {
        color: #A67B5B !important;
        transform: scale(1.35);
    }

    /* Estilo do modal personalizado */
    .modal-custom .modal-content {
        background-color: #FFE8D6;
        border: 2px solid #FFBC8A;
        border-radius: 12px;
        color: #7a5946;
    }

    .modal-custom .modal-header {
        background-color: #FFDAC1;
        border-bottom: 1px solid #FFBC8A;
        color: #7a5946;
    }

    .modal-custom .btn-marrom {
        background-color: #A67B5B;
        border-color: #8B5A3C;
        color: white;
    }

    .modal-custom .btn-marrom:hover {
        background-color: #8B5A3C;
        border-color: #7a5946;
        color: white;
    }

    .modal-custom .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>

<h1>Consultar Tipo de Roupa</h1>
<form method="post" id="formExcluir">
    <input type="hidden" name="id" value="<?= $roupas_tipos['idtipo'] ?>">
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome do tipo de roupa</label>
        <input disabled value="<?= $roupas_tipos['descricao'] ?>" type="text" id="nome" name="nome" class="form-control"
            required="">
    </div>
    <div class="d-flex justify-content-end gap-3">
        <button type="button" class="btn icone-acao" data-bs-toggle="modal" data-bs-target="#modalConfirmacao">
            <i class="bi bi-trash-fill"></i>
        </button>
        <button type="button" onclick="history.back();" class="btn icone-acao">
            <i class="bi bi-arrow-left-circle-fill"></i>
        </button>
    </div>
</form>

<div class="modal fade modal-custom" id="modalConfirmacao" tabindex="-1" aria-labelledby="modalConfirmacaoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalConfirmacaoLabel">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir o tipo de roupa "<strong><?= $roupas_tipos['descricao'] ?></strong>"?</p>
                <p class="text-danger"><small>Esta ação não pode ser desfeita.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="color: white; background-color: #7a5946;" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="document.getElementById('formExcluir').submit();">
                    Excluir
                </button>
            </div>
        </div>
    </div>
</div>

<?php
require("rodape.php");
?>