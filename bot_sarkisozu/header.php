<?php include './function.php';?>


<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="description" content="Veri Tabanı Yönetim Sistemleri Final Projesi">
    <meta name="author" content="Ercüment Çağlar Bilgehan">
    <title>Şarkı Sözü Bot Yazılımı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="./"><img src="img/logo.png" width="40" height="40"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./">Giriş</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Veriler
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="veriler_sanatcilar.php">Sanatçılar</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="veriler_sarkilar.php">Şarkılar</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Test
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="test_sanatcilar.php">Sanatçılar</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="test_sarkilar.php">Şarkılar</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="test_sarki_form.php">Şarkı</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Botu Çalıştır
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="bot_calistir_sanatcilar.php">Sanatçılar</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="bot_calistir_sarkilar.php">Şarkılar</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="bot_calistir_sarki_form.php">Şarkı</a></li>
                </ul>
            </li>
        </ul>
        </div>
        </div>
    </nav>