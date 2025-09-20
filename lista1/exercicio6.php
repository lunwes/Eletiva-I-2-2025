<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conversão de Celcius em Fahrenheit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php

include("cabecalho.php");
?>

<div class="container">
    <h1>Exercício 6</h1>
    <form method="post">
        <div class="mb-3">
            <label for="valor1" class="form-label">Digite o valor em Celcius:</label>
            <input type="number" id="valor1" name="valor1" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Enviar</button>
    </form>


    <?php   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $n1 = $_POST['valor1'];
        $resultado = ($n1 * 1.8) + 32;
        echo $n1º."º Celcius representam ".$resultado"º Fahrenheit";
        // - * ** / // %
        }

        include("rodape.php");
    ?>