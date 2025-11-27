<?php
require("cabecalho.php");
require("conexao.php");

try {
    $stmt = $pdo->query("SELECT * FROM roupas_tipos");
    $tipos = $stmt->fetchAll();
    $stmt = $pdo->prepare("SELECT * FROM roupas WHERE idroupas = ?");
    $stmt->execute([$_GET['id']]);
    $roupa = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro ao consultar: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $modelo = $_POST['modelo'];
    $preco = $_POST['preco'];
    $tipo = $_POST['tipo'];
    $id = $_POST['id'];
    
    try {
        $stmt = $pdo->prepare("
            UPDATE roupas SET modelo = ?, preco = ?, roupas_tipos_idtipo = ?
            WHERE idroupas = ?
        ");
        if ($stmt->execute([$modelo, $preco, $tipo, $id])) {
            header("location: roupas.php?editar=true");
        } else {
            header("location: roupas.php?editar=false");
        }
    } catch (Exception $e) {
        echo "Erro ao editar: " . $e->getMessage();
    }
}
?>

<h1>Editar Roupa</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $roupa['idroupas'] ?>">
    <div class="mb-3">
        <label for="modelo" class="form-label">Informe o modelo</label>
        <input value="<?= $roupa['modelo'] ?>" type="text" id="modelo" name="modelo" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="preco" class="form-label">Informe o preço</label>
        <input value="<?= $roupa['preco'] ?>" type="number" step="0.01" id="preco" name="preco" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="tipo" class="form-label">Selecione o tipo</label>
        <select id="tipo" name="tipo" class="form-select" required="">
            <?php foreach ($tipos as $tipo): ?>
                <option value="<?= $tipo['idtipo'] ?>"  
                        <?= $tipo['idtipo'] == $roupa['roupas_tipos_idtipo'] ? "selected" : "" ?>>  
                    <?= $tipo['descricao'] ?>  
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="d-flex justify-content-end mt-3 gap-3">
        <button type="submit" class="btn" style="background-color: #7a5946; color: white; border: none; transition: 0.2s;" 
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