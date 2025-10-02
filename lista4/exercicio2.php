<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
include("cabecalho.php");
?>

<div class="container py-3">
    <h1>Exercício 2</h1>
    <form method="post">
        <div class="mb-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label for="nome[]" class="form-label">Informe o nome do <?= $i ?>° aluno</label>
                <input type="text" id="nome[]" name="nome[]" class="form-control" required="">

                <label for="nota1[]" class="form-label">Informe a 1° nota</label>
                <input type="text" id="nota1[]" name="nota1[]" class="form-control" required="">

                <label for="nota2[]" class="form-label">Informe a 2° nota</label>
                <input type="text" id="nota2[]" name="nota2[]" class="form-control" required="">

                <label for="nota3[]" class="form-label">Informe a 3° nota</label>
                <input type="text" id="nota3[]" name="nota3[]" class="form-control" required="">
            <?php endfor; ?>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nomes = $_POST['nome'];
        $notas1 = $_POST['nota1'];
        $notas2 = $_POST['nota2'];
        $notas3 = $_POST['nota3'];
        $alunos = [];

        for ($i = 0; $i < count($nomes); $i++){
            $media = ($notas1[$i] + $notas2[$i] + $notas3[$i]) / 3;
            $alunos[$nomes[$i]] = $media;
        }
        
        arsort($alunos);

        foreach ($alunos as $nome => $media) {
            echo "<p>Aluno: ".$nome." | Média: ".number_format($media, 1)."</p>";
        }
    }
    include("rodape.php");
    ?>