<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php include("cabecalho.php"); ?>

<div class="container mt-3">
    <h1>Exercício 4</h1>

    <form method="post">
        <div class="mb-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label for="nome[]" class="form-label">Nome do <?= $i ?>° item</label>
                <input type="text" id="nome[]" name="nome[]" class="form-control" required="">

                <label for="preco[]" class="form-label">Preço do <?= $i ?>° item</label>
                <input type="number" step="0.01" id="preco[]" name="preco[]" class="form-control" required="">
            <?php endfor; ?>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomes = $_POST['nome'];
        $precos = $_POST['preco'];
        $itens = [];

        for ($i = 0; $i < count($nomes); $i++) {
            $nome = trim($nomes[$i]);
            $preco = $precos[$i];
            $preco_com_imposto = $preco + $preco * 15 / 100; 
            $itens[$nome] = $preco_com_imposto;
        }

        asort($itens);

        foreach ($itens as $nome => $precoFinal) {
            echo "<p>Item: $nome Preço com imposto: R$ " . number_format($precoFinal, 2, ',', '.') . "</p>";
        }
    }

    include("rodape.php");
    ?>
</div>
