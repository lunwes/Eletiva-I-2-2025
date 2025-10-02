<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php include("cabecalho.php"); ?>

<div class="container mt-3">
    <h1>Exercício 3</h1>

    <form method="post">
        <div class="mb-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label for="codigo[]" class="form-label">Código do <?= $i ?>° produto</label>
                <input type="text" id="codigo[]" name="codigo[]" class="form-control" required="">

                <label for="nome[]" class="form-label">Nome do <?= $i ?>° produto</label>
                <input type="text" id="nome[]" name="nome[]" class="form-control" required="">

                <label for="preco[]" class="form-label">Preço do <?= $i ?>° produto</label>
                <input type="number" step="0.01" id="preco[]" name="preco[]" class="form-control" required="">
            <?php endfor; ?>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $codigos = $_POST['codigo'];
        $nomes = $_POST['nome'];
        $precos = $_POST['preco'];
        $produtos = [];

        for ($i = 0; $i < count($codigos); $i++) {
            $codigo = trim($codigos[$i]);
            $nome = trim($nomes[$i]);
            $preco = $precos[$i];


            if ($preco > 100) {
                $preco = $preco - $preco * 10 / 100;
            }

            $produtos[$codigo] = [
                'nome' => $nome,
                'preco' => $preco
            ];
        }

        ksort($produtos);

        foreach ($produtos as $codigo => $dados) {
            echo "<p>Código: $codigo Nome: {$dados['nome']} Preço: R$ " . number_format($dados['preco'], 2, ',', '.') . "</p>";
        }
    }

    include("rodape.php");
    ?>
</div>
