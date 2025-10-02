<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 10</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<?php
  include("cabecalho.php");
?>

<div class="container py-3">
<h1>Exercício 10</h1>
<form method="post">
<div class="mb-3">
              <label for="valor1" class="form-label">Informe um número</label>
              <input type="text" id="valor1" name="valor1" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Enviar</button>
            </form>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $valor1 = $_POST['valor1'];
        for($i = 1; $i <= 10; $i++){
            $resultado = $valor1 * $i;
            echo "<p>$valor1 x $i = $resultado</p>";
        }        
    }

    include('rodape.php');
?>