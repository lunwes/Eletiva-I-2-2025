<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
include("cabecalho.php");
?>

<div class="container py-3">
    <h1>Exercício 3</h1>
    <form method="post">
        <div class="mb-3">
            <label for="dia" class="form-label">Informe o dia</label>
            <input type="text" id="dia" name="dia" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="mes" class="form-label">Informe o mês</label>
            <input type="text" id="mes" name="mes" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="ano" class="form-label">Informe o ano</label>
            <input type="text" id="ano" name="ano" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Enviar</button>
    </form>
    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        function LerValor(){
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];
        return [$dia, $mes, $ano];
        }
        $valores = LerValor();
        $var1 = $valores[0];
        $var2 = $valores[1];
        $var3 = $valores[2];
        
        if ($var1 >= 1 && $var1 <= 31 && $var2 >= 1 && $var2 <= 12){
            $data = date("$var1/$var2/$var3");
            echo $data;
        } else{
            echo "Data inválida!";
        }
    }

    include('rodape.php');
    ?>