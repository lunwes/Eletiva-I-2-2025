<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 4</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<?php
  include("cabecalho.php");
?>

<div class="container py-3">
<h1>Exercício 4</h1>
<form method="post">
<div class="mb-3">
              <label for="valor1" class="form-label">Informe o valor do produto</label>
              <input type="text" id="valor1" name="valor1" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Enviar</button>
            </form>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $valor1 = $_POST['valor1'];
        if($valor1 > 100){
            $novoValor = $valor1 - ($valor1 * 15 /100);
            echo "Valor superior a R$ 100. Desconto aplicado. Novo valor: $novoValor";
        } else{
            echo "Valor: R$ $valor1";
        }
    }

    include('rodape.php');
?>