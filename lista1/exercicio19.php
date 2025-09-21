<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dias em horas, minutos e segundos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php

include("cabecalho.php");
?>
<div class="container py-3">
    <h1>Exercício 18</h1>
    <form method="post">
        <div class="mb-3">
            <label for="dia" class="form-label">Informe a quantidade de dias: </label>
            <input type="number" id="dia" name="dia" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $dias = $_POST['dia'];
        $horas = $dias * 24;
        $minutos = $horas * 60;
        $segundos = $minutos * 60;
        echo "<p>A quantidade de dias é equivalente a:</p>";
        echo "<ul>";
        echo "<li>Horas: $horas</li>";
        echo "<li>Minutos: $minutos</li>";
        echo "<li>Segundos: $segundos</li>";
        echo "<ul>";
    }
    include("rodape.php");
    ?>