<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 3</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<?php
  include("cabecalho.php");
?>

<div class="container py-3">
<h1>Exercício 3</h1>
<form method="post">
<div class="mb-3">
              <label for="valor1" class="form-label">Informe o valor de A</label>
              <input type="text" id="valor1" name="valor1" class="form-control" required="">
            </div><div class="mb-3">
              <label for="valor2" class="form-label">informe o valor de B</label>
              <input type="text" id="valor2" name="valor2" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $valor1 = $_POST['valor1'];
        $valor2 = $_POST['valor2'];

        if ($valor1 == $valor2){
            echo "Valores Iguais: $valor1";
        } elseif ($valor1 < $valor2){
            echo "$valor1, $valor2";
        } else {
            echo "$valor2, $valor1";
        }
    }

    include('rodape.php');
?>