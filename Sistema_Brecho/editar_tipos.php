<?php
require("cabecalho.php");
require("conexao.php");

if($_SERVER['REQUEST_METHOD'] == "GET"){
    try{
        $stmt = $pdo->prepare("SELECT * from roupas_tipos WHERE idtipo = ?");
        $stmt->execute([$_GET['id']]);
        $tipo = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        echo "Erro ao consultar tipo: ".$e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $descricao = $_POST['descricao'];
    $id = $_POST['id'];
    try {
        $stmt = $pdo->prepare("UPDATE roupas_tipos SET descricao = ? WHERE idtipo = ?");
        if ($stmt->execute([$descricao, $id])) {
            header('location: tipos.php?editar=true');
        } else {
            header('location: tipos.php?editar=false');
        }
    } catch (\Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<h1>Editar Tipo de Roupa</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $tipo['idtipo'] ?>">
    <div class="mb-3">
        <label for="descricao" class="form-label">Informe o nome do tipo</label>
        <input value="<?= $tipo['descricao'] ?>" type="text" id="descricao" name="descricao" class="form-control" required="">
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