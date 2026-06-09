<?php
session_start();

if(!isset($_SESSION['acesso']))
    header('location: index.php');
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Transporte Público</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>

    @media print {
      .no-print {
        display: none !important;
      }
    }

    body{
      background:#f5f5f5;
      margin:0;
      padding:0;
    }

    .navbar-custom{
      background:#003366;
      border-bottom:2px solid #c328d1;
      box-shadow:0 4px 20px rgba(0,0,0,.3);
    }

    .navbar-brand{
      color:#17a2b8 !important;
      font-size:1.8rem;
      font-weight:700;
    }

    .navbar-brand:hover{
      color:#4dd0e1 !important;
    }

    .nav-link{
      color:#fff !important;
      font-weight:500;
      transition:.3s;
    }

    .nav-link:hover{
      color:#17a2b8 !important;
    }

    .dropdown-menu{
      background:#111;
      border:1px solid #c53d9c;
    }

    .dropdown-item{
      color:#fff;
    }

    .dropdown-item:hover{
      background:#17a2b8;
      color:#000;
    }

    .usuario-logado{
      color:#17a2b8;
      font-weight:bold;
      margin-right:15px;
    }

  </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom no-print">

  <div class="container-fluid">

    <a class="navbar-brand" href="principal.php">
      Transporte Público
    </a>

    <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">

      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="principal.php">
            Início
          </a>
        </li>

        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle"
             href="#"
             id="dropdownCadastros"
             role="button"
             data-bs-toggle="dropdown">

            Cadastros

          </a>

          <ul class="dropdown-menu">

            <li>
              <a class="dropdown-item" href="novaLinha.php">
                Linhas
              </a>
            </li>

            <li>
              <a class="dropdown-item" href="novoPassageiro.php">
                Passageiros
              </a>
            </li>

            <li>
              <a class="dropdown-item" href="novaEstacao.php">
                Estações
              </a>
            </li>

            <li>
              <a class="dropdown-item" href="novaViagem.php">
                Viagens
              </a>
            </li>

          </ul>

        </li>

        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            Sair
          </a>
        </li>

      </ul>

    </div>

  </div>

</nav>

<div class="container py-3">