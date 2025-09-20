<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Área do retângulo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php

include("cabecalho.php");
?>

<div class="container">
    <h1>Exercício 8</h1>
    <form method="post">
        <div class="mb-3">
            <label for="valor1" class="form-label">Digite a largura do retângulo (cm):</label>
            <input type="number" id="valor1" name="valor1" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="valor2" class="form-label">Digite a altura do retângulo (cm):</label>
            <input type="number" id="valor2" name="valor2" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Enviar</button>
    </form>


    <?php   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $n1 = $_POST['valor1'];
        $n2 = $_POST['valor2'];
        $resultado = $n1 * $n2;
        echo "A área é de ".$resultado."cm";
        // - * ** / // %
        }

        include("rodape.php");
    ?>