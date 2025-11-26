<?php
require("cabecalho.php");
require("conexao.php");
if($_SERVER['REQUEST_METHOD'] == "GET"){
    try{
        $stmt = $pdo ->prepare("SELECT * from roupas_tipos WHERE idtipo = ?");
        $stmt->execute([$_GET['id']]);
        $roupas_tipos = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        echo "Erro ao consultar roupas_tipos: ".$e->getMessage();
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM roupas_tipos WHERE idtipo = ?");
        if ($stmt->execute([$id])) {
            header('location: roupas_tipos.php?excluir=true');
        } else {
            header('location: roupas_tipos.php?excluir=false');
        }
    } catch (\Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<h1>Consultar Tipo de Roupa</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $roupas_tipos['idtipo']?>">
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome do tipo de roupa</label>
        <input disabled value="<?= $roupas_tipos['descricao']?>" type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <p>Deseja excluir esse registro?</p>
    <button type="submit" class="btn btn-danger">Excluir</button>
    <button onclick="history.back();" type="button" class="btn btn-secondary">Voltar</button>
</form>


<?php
require("rodape.php");
?>