<?php
require("cabecalho.php");
require("conexao.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nome = $_POST['nome'];
    try{
        $stmt = $pdo->prepare("INSERT INTO roupas_tipos (descricao) VALUES (?)");
        if($stmt->execute([$nome])){
            header('location: tipos.php?cadastro=true');
        } else{
            header('location: tipos.php?cadastro=false');
        }
    } catch(\Exception $e){
        echo "Erro: ".$e->getMessage();
    }
}
?>

<h1>Novo Tipo de Roupa</h1>
<form method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome da novo tipo de roupa</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<?php
require("rodape.php");
?>