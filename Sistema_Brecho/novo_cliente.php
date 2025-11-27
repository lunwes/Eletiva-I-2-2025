<?php
require("cabecalho.php");
require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    try {
        $stmt = $pdo->prepare("
            INSERT INTO clientes (nome, telefone) VALUES
            (?, ?)
        ");
        if ($stmt->execute([$nome, $telefone])) {
            header("location: clientes.php?cadastro=true");
        } else {
            header("location: clientes.php?cadastro=false");
        }
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}
?>

<h1>Novo Cliente</h1>
<form method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Informe o telefone</label>
        <input type="text" id="telefone" name="telefone" class="form-control" required="">
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