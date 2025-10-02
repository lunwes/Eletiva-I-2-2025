<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php include("cabecalho.php"); ?>

<div class="container mt-3">
    <h1>Exercício 1</h1>

    <form method="post">
        <div class="mb-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label for="nome[]" class="form-label">Nome do <?= $i ?>° contato</label>
                <input type="text" id="nome[]" name="nome[]" class="form-control" required="">

                <label for="telefone[]" class="form-label">Telefone do <?= $i ?>° contato</label>
                <input type="text" id="telefone[]" name="telefone[]" class="form-control" required="">
            <?php endfor; ?>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomes = $_POST['nome'];
        $telefones = $_POST['telefone'];
        $contatos = [];
        $nomesExistentes = [];
        $telefonesExistentes = [];

        for ($i = 0; $i < count($nomes); $i++) {
            $nome = trim($nomes[$i]);
            $telefone = trim($telefones[$i]);

            if (in_array($nome, $nomesExistentes)) {
                echo "Contato duplicado: o nome $nome já foi cadastrado.";
            }

            if (in_array($telefone, $telefonesExistentes)) {
                echo "Telefone duplicado: o número $telefone já foi cadastrado.";
            }

            $nomesExistentes[] = $nome;
            $telefonesExistentes[] = $telefone;
            $contatos[$nome] = $telefone;
        }

        ksort($contatos);
        foreach ($contatos as $nome => $telefone) {
            echo "<p>Contato: $nome Telefone: $telefone</p>";
        }

    }

    include("rodape.php");
    ?>
</div>