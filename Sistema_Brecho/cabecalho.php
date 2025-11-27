<?php
session_start();
if (!isset($_SESSION['acesso'])) {
    header('location: index.php');
    exit();
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle de Trocas e Vendas do Brechó</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --cor-1: #FFE8D6;
            --cor-2: #FFDAC1;
            --cor-3: #FFBC8A;
            --cor-4: #E89963;
            --cor-texto: #5A3E2B;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        body {
            display: flex;
            flex-direction: column;
            background-color: var(--cor-1);
            color: var(--cor-texto);
            font-family: "Segoe UI", sans-serif;
            min-height: 100vh;
        }

        .main-content {
            flex: 1 0 auto;
            padding: 20px 0;
        }

        .navbar-custom {
            background: var(--cor-3);
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: var(--cor-texto) !important;
            font-weight: 600;
        }

        .navbar-custom .nav-link:hover {
            color: var(--cor-4) !important;
        }

        .dropdown-menu {
            background-color: var(--cor-2);
        }

        .dropdown-item:hover {
            background-color: var(--cor-3);
        }

        .container-custom {
            background: rgba(233, 185, 142, 0.6);
            padding: 25px;
            margin-top: 25px;
            border-radius: 12px;
            box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="principal.php" style="color:#7a5946;">
                <i class="bi bi-bag-heart fs-3"></i> Brechó
            </a>

            <div class="d-flex align-items-center ms-auto me-3">
                <span style="color:#7a5946; font-weight:600;">
                    <?= $_SESSION['email'] ?>
                </span>
            </div>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="logout.php" class="nav-link" title="Sair" style="color:#7a5946; font-size:1.3rem;">
                        <i class="bi bi-box-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-content">
        <div class="container container-custom">