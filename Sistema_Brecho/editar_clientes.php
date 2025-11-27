<?php
require("cabecalho.php");
require("conexao.php");

try {
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE idclientes = ?");
    $stmt->execute([$_GET['id']]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro ao consultar: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $id = $_POST['id'];
    
    try {
        $stmt = $pdo->prepare("
            UPDATE clientes SET nome = ?, telefone = ?
            WHERE idclientes = ?
        ");
        if ($stmt->execute([$nome, $telefone, $id])) {
            header("location: clientes.php?editar=true");
        } else {
            header("location: clientes.php?editar=false");
        }
    } catch (Exception $e) {
        echo "Erro ao editar: " . $e->getMessage();
    }
}
?>

<h1>Editar Cliente</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $cliente['idclientes'] ?>">
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome</label>
        <input value="<?= $cliente['nome'] ?>" type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Informe o telefone</label>
        <input value="<?= $cliente['telefone'] ?>" type="text" id="telefone" name="telefone" class="form-control" required="">
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