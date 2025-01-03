<?php

  // si j'ai un $_GET["query"]
  // je récupère sa valeur
  // je récupère en bdd tous les tweets qui ont dans la colonne content
  // %$_GET["query"]%
  // et ensuite j'affiche les tweets

  require_once('init.php');


  if(isset($_GET["action"]) && $_GET["action"] = "disconnexion") {

    unset($_SESSION["users_id"]);
    unset($_SESSION["nom"]);
    unset($_SESSION["email"]);
  
    $_SESSION["message"] = "<div class='alert bg-success'>
          Vous avez été déconnecté
        </div>";
    header('location:connexion.php');
    exit();

  }




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


<!-- 

  DANS LA NAVIGATION
  // SI JE SUIS CONNECTÉ
  // J'AFFICHE PROFIL ET SE DECONNECTER

  SINON
  J'AFFICHE CONNEXION ET INSCRIPTION

-->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">MonSite</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">

        <?php if (isset($_SESSION["users_id"]) || !empty($_SESSION["users_id"])) { ?>

          <li class="nav-item">
            <a class="nav-link" href="profil.php">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?action=disconnexion">Se déconnecter</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="connexion.php">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inscription.php">Inscription</a>
          </li>
        <?php } ?>
        </ul>
        <!-- Formulaire de recherche -->
        <form class="d-flex" role="search" action="index.php" method="GET">
          <input
            class="form-control me-2"
            type="search"
            name="query"
            placeholder="Rechercher un tweet"
            aria-label="Search"
          />
          <button class="btn btn-outline-primary" type="submit">Rechercher</button>
        </form>
      </div>
    </div>
  </nav>
    
  <div class="container">
