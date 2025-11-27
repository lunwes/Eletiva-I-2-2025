<?php
require("cabecalho.php");
require("conexao.php");

try {
    $stmt = $pdo->query("SELECT * FROM roupas_tipos");
    $tipos = $stmt->fetchAll();
} catch (Exception $e) {
    echo "Erro ao consultar roupas_tipos: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $modelo = $_POST['modelo'];
    $preco = $_POST['preco'];
    $tipo = $_POST['tipo'];

    try {
        $stmt = $pdo->prepare("
            INSERT INTO roupas (modelo, preco, roupas_tipos_idtipo) VALUES
            (?, ?, ?)
        ");
        if ($stmt->execute([$modelo, $preco, $tipo])) {
            header("location: roupas.php?cadastro=true");
        } else {
            header("location: roupas.php?cadastro=false");
        }
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}
?>

<h1>Nova Roupa</h1>
<form method="post">
    <div class="mb-3">
        <label for="modelo" class="form-label">Informe o modelo</label>
        <input type="text" id="modelo" name="modelo" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="preco" class="form-label">Informe o preço</label>
        <input type="number" step="0.01" id="preco" name="preco" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="tipo" class="form-label">Selecione o Tipo</label>
        <select id="tipo" name="tipo" class="form-select" required="">
            <option value="">Selecione o Tipo...</option>
            <?php foreach ($tipos as $tipo): ?>
                <option value="<?= $tipo['idtipo'] ?>"><?= $tipo['descricao'] ?></option>
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

<?php
require("rodape.php");
?>