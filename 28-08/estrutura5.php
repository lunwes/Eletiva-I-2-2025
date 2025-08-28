<?php

    include("cabecalho.php");

    $i = 1;
    
    do{
        echo "<p>Número $i</p>";
        $i++;
    } while($i <= 4);

    include("rodape.php");