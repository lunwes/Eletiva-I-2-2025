<?php
require("cabecalho.php");
?>



<div class="container py-4">

    <h1 class="mb-3 text-center">Olá, <?= $_SESSION['nome'] ?>!</h1>
    <h6 class="mb-3 text-center">Selecione uma opção abaixo!</h6>

    <div class="row mt-4 g-4">

        <div class="col-md-4">
            <a href="tipos.php" class="text-decoration-none">
                <div class="p-4 text-center rounded border" style="
                        border-color:#FFBC8A;
                        background-color:#FFE8D6;
                        color:#7a5946;
                        transition:0.2s;
                    " onmouseover="this.style.backgroundColor='#ffe5d4ff'; this.style.transform='scale(1.03)';"
                    onmouseout="this.style.backgroundColor='#FFE8D6'; this.style.transform='scale(1)';">
                    <i class="bi bi-tags fs-1 mb-2" style="color:#7a5946;"></i>
                    <h4 class="m-0" style="color:#7a5946;">Tipos de Roupas</h4>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="roupas.php" class="text-decoration-none">
                <div class="p-4 text-center rounded border" style="
                        border-color:#FFBC8A;
                        background-color:#FFE8D6;
                        color:#7a5946;
                        transition:0.2s;
                    " onmouseover="this.style.backgroundColor='#ffe5d4ff'; this.style.transform='scale(1.03)';"
                    onmouseout="this.style.backgroundColor='#FFE8D6'; this.style.transform='scale(1)';">
                    <i class="bi bi-bag fs-1 mb-2" style="color:#7a5946;"></i>
                    <h4 class="m-0" style="color:#7a5946;">Roupas</h4>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="clientes.php" class="text-decoration-none">
                <div class="p-4 text-center rounded border" style="
                        border-color:#FFBC8A;
                        background-color:#FFE8D6;
                        color:#7a5946;
                        transition:0.2s;
                    " onmouseover="this.style.backgroundColor='#ffe5d4ff'; this.style.transform='scale(1.03)';"
                    onmouseout="this.style.backgroundColor='#FFE8D6'; this.style.transform='scale(1)';">
                    <i class="bi bi-people fs-1 mb-2" style="color:#7a5946;"></i>
                    <h4 class="m-0" style="color:#7a5946;">Clientes</h4>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="transacoes.php" class="text-decoration-none">
                <div class="p-4 text-center rounded border" style="
                        border-color:#FFBC8A;
                        background-color:#FFE8D6;
                        color:#7a5946;
                        transition:0.2s;
                    " onmouseover="this.style.backgroundColor='#ffe5d4ff'; this.style.transform='scale(1.03)';"
                    onmouseout="this.style.backgroundColor='#FFE8D6'; this.style.transform='scale(1)';">
                    <i class="bi bi-tags fs-1 mb-2" style="color:#7a5946;"></i>
                    <h4 class="m-0" style="color:#7a5946;">Transações</h4>
                </div>
            </a>
        </div>

    </div>
</div>

<?php
require("rodape.php");
?>