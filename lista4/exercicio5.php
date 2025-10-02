<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php include("cabecalho.php"); ?>

<div class="container mt-3">
    <h1>Exercício 5</h1>

    <form method="post">
        <div class="mb-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label for="titulo[]" class="form-label">Título do <?= $i ?>° livro</label>
                <input type="text" id="titulo[]" name="titulo[]" class="form-control" required="">

                <label for="quantidade[]" class="form-label">Quantidade em estoque</label>
                <input type="number" id="quantidade[]" name="quantidade[]" class="form-control" required="">
            <?php endfor; ?>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulos = $_POST['titulo'];
        $quantidades = $_POST['quantidade'];
        $estoque = [];

        for ($i = 0; $i < count($titulos); $i++) {
            $titulo = trim($titulos[$i]);
            $quantidade = $quantidades[$i];
            $estoque[$titulo] = $quantidade;
        }

        ksort($estoque);

        foreach ($estoque as $titulo => $quantidade) {
            echo "<p>Título: $titulo Quantidade: $quantidade</p>";
            if ($quantidade < 5) {
                echo "<p>Alerta: Estoque baixo para o livro $titulo </p>";
            }
        }
    }

    include("rodape.php");
    ?>
</div>
