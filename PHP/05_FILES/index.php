<?php

    $msg = "";

    if($_POST) {

        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';

        foreach ($_POST as $key => $value) {
            if(empty($value)) {
                $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
                    La valeur du champ $key est vide, veuillez saisir une donnée !
                </div>";
            }
        }

        $maxSize = 1000000; // 1MO

        if(!empty($_FILES["photo"]["name"])) {

            echo '<pre>';
            var_dump($_FILES);
            echo '</pre>';

            if($_FILES["photo"]["size"] > $maxSize) {
                $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
                    La taille du fichier chargé est limité à 1MO.
                </div>";
            }

            $listExtensions = ["png", "jpg", "jpeg"];
            $fileExtension = strrchr($_FILES["photo"]["name"], ".");

            if(!in_array($fileExtension, $listExtensions)) {
                $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
                    Merci de charger uniquement du jpg, png ou jpeg
                </div>";
            }

            if(empty($msg)) {
                $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
                    Votre voiture a bien été chargée en BDD.
                </div>"; 
            }

        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>$_FILES</title>
</head>
  <body>

    <!-- BODY -->

    <div class="container mt-5">

      <h1>Insérer une voiture en Base de donnée</h1>

      <?= $msg; ?>

      <form class="row" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-4">
          <label for="marque">Marque</label>
          <input type="text" class="form-control" placeholder="Marque" id="marque" name="marque" aria-describedby="marque">
        </div>

      <div class="form-group col-md-4">
          <label for="modele">Modele</label>
          <input type="text" class="form-control" placeholder="Modele" id="modele" name="modele" aria-describedby="modele">
        </div>

      <div class="form-group col-md-4">
          <label for="ch">CH</label>
          <input type="number" class="form-control" placeholder="CH" id="ch" name="ch" aria-describedby="ch">
        </div>

      <div class="form-group col-md-4">
          <label for="annee">ANNEE</label>
          <input type="text" class="form-control" placeholder="Année" id="annee" name="annee" aria-describedby="annee">
        </div>


        <div class="form-group col-md-4">
          <label for="photo">Photo</label>
          <input type="file" class="form-control-file" name="photo" id="photo">
        </div>

        <div class="form-group col-md-12">
            <label for="description">Description</label>
            <textarea class="form-control" placeholder="Description" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

      </form>
    </div>
  </body>
</html>