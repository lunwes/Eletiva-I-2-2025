<?php

    $valor = array(1, 2, 3, 4, 5);
    echo "<p> Primeiro valor do vetor: ".$valor[0]."</p>";
    // $v = $_POST['nome'];

    $vetor = [1, 2, 3, 4, 5];
    // função para exibir valores do vetor
    var_dump($vetor);
    echo "<br>";
    print_r($vetor);

    $vetor[4] = 6;
    echo "<p> Novo valor da posição 4: ".$vetor[4]."</p>";

    // $vetor['nome'] = "Lunes";
    $v = 'nome';
    $vetor[$v] = "Lunes";
    print_r($vetor);

    $valores = [
        'nome' => "Lunes",
        'sobrenome' => "Ramos",
        'idade' => 19
    ];

    foreach($valores as $c => $v){
        echo "<p>Posição: $c = Valor $v</p>";
    }

?>