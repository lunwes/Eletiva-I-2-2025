<?php
require("cabecalho.php");
require("conexao.php");

try {
    $stmt = $pdo->query("SELECT * FROM roupas");
    $roupas = $stmt->fetchAll();

    $stmt = $pdo->query("SELECT * FROM clientes");
    $clientes = $stmt->fetchAll();
} catch (Exception $e) {
    echo "Erro ao consultar: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $tipo = $_POST['tipo'];
    $roupa = $_POST['roupa'];
    $cliente = $_POST['cliente'];
    $roupa_recebida = $_POST['roupa_recebida'] ?? null;

    $roupa_recebida = (empty($roupa_recebida)) ? null : $roupa_recebida;

    try {
        $stmt = $pdo->prepare("
            INSERT INTO transacao (tipo, roupas_idroupas, clientes_idclientes, roupa_recebida_id) VALUES
            (?, ?, ?, ?)
        ");
        if ($stmt->execute([$tipo, $roupa, $cliente, $roupa_recebida])) {
            header("location: transacoes.php?cadastro=true");
        } else {
            header("location: transacoes.php?cadastro=false");
        }
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}
?>

<script>
    function toggleRoupaRecebida() {
        const tipo = document.getElementById('tipo').value;
        const roupaRecebidaDiv = document.getElementById('roupaRecebidaDiv');
        const roupaRecebidaSelect = document.getElementById('roupa_recebida');

        if (tipo === 'troca') {
            roupaRecebidaDiv.style.display = 'block';
            roupaRecebidaSelect.required = true;
        } else {
            roupaRecebidaDiv.style.display = 'none';
            roupaRecebidaSelect.required = false;
            roupaRecebidaSelect.value = '';
        }
    } 
</script>

<h1>Nova Transação</h1>
<form method="post">
    <div class="mb-3">
        <label for="tipo" class="form-label">Selecione o tipo</label>
        <select id="tipo" name="tipo" class="form-select" required onchange="toggleRoupaRecebida()">
            <option value="">Selecione o tipo...</option>
            <option value="venda">Venda</option>
            <option value="troca">Troca</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="roupa" class="form-label">Selecione a Roupa</label>
        <select id="roupa" name="roupa" class="form-select" required>
            <option value="">Selecione a roupa...</option>
            <?php foreach ($roupas as $roupa): ?>
                <option value="<?= $roupa['idroupas'] ?>"><?= $roupa['modelo'] ?> - R$
                    <?= number_format($roupa['preco'], 2, ',', '.') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3" id="roupaRecebidaDiv" style="display: none;">
        <label for="roupa_recebida" class="form-label">Selecione a Roupa Recebida na Troca</label>
        <select id="roupa_recebida" name="roupa_recebida" class="form-select">
            <option value="">Selecione a roupa recebida...</option>
            <?php foreach ($roupas as $roupa): ?>
                <option value="<?= $roupa['idroupas'] ?>"><?= $roupa['modelo'] ?> - R$
                    <?= number_format($roupa['preco'], 2, ',', '.') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="cliente" class="form-label">Selecione o Cliente</label>
        <select id="cliente" name="cliente" class="form-select" required>
            <option value="">Selecione o cliente...</option>
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= $cliente['idclientes'] ?>"><?= $cliente['nome'] ?> - <?= $cliente['telefone'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="d-flex justify-content-end mt-3 gap-3">
        <button type="submit" class="btn"
            style="background-color: #7a5946; color: white; border: none; transition: 0.2s;"
            onmouseover="this.style.backgroundColor='#A67B5B'; this.style.transform='scale(1.05)'"
            onmouseout="this.style.backgroundColor='#7a5946'; this.style.transform='scale(1)'">
            Enviar
        </button>
        <button type="button" class="btn" style="color: white; background-color: #7a5946;" onclick="history.back();"
            onmouseover="this.style.backgroundColor='#A67B5B'; this.style.transform='scale(1.05)'"
            onmouseout="this.style.backgroundColor='#7a5946'; this.style.transform='scale(1)'">
            Voltar
        </button>
    </div>
</form>

<script>
    toggleRoupaRecebida();
</script>

<?php
require("rodape.php");
?>