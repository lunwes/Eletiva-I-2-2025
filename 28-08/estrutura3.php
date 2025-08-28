<?php 

    include("cabecalho.php");
    // 1 - Domingo   2 - Segunda.....    
    $diaSemana = 3;

    switch($diaSemana){
        case 1:
            echo "Hoje é Domingo!";
            break;
        case 2:
            echo "Hoje é Segunda-Feira!";
            break;
        case 3:
            echo "Hoje é Terça-Feira!";
            break;
        default:
            echo "Hoje pode ser quarta, quinta, sexta ou sábado.";
    }

    include("rodape.php");