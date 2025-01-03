<?php

require_once("haut_page.php");

$msg = "";

// SI le formulaire est soumis
if ($_POST) {

    // vérifications

    foreach ($_POST as $field => $value) {
        if(empty($value)) {
            $msg .= "<div class='alert bg-danger'> 
                Veuillez renseigner le champ $field
            </div>";
        }
    }

    if(!is_numeric($_POST["cp"]) || strlen($_POST["cp"]) < 5) {
        $msg .= "<div class='alert bg-danger'> 
            Veuillez renseigner un code postal valide
        </div>";
    }

    $photoUploaded = false; 

    if(isset($_FILES) && !empty($_FILES["photo"]["name"])) {

        $photoUploaded = true; 
        // extension (png, jpg, jpeg)
        $extensions = [".png", ".jpg", ".jpeg"];
        $extension = strrchr($_FILES["photo"]["name"], ".");
    
        if (!in_array($extension, $extensions)) {
            $erreur .= "<div class='alert alert-warning' role='alert'>
                Veuillez charger un fichier au bon format (png, jpg, jpeg) !
            </div>";
        }
    
        $maxSize = 1000000;
    
        if ($_FILES["photo"]["size"] > $maxSize) {
            $erreur .= "<div class='alert alert-warning' role='alert'>
                Veuillez charger un un fichier moins lourd (max 1MO) !
            </div>";
        }

    }


    if (empty($msg)) {

        if($photoUploaded) {
            // gestion de la photo
            // copie sur le serveur
            $nomPhoto = "logement_" . time() . $extension;
    
            $urlPhoto = URL . "img/" . $nomPhoto;
    
            $cheminDossier = RACINE_SITE . "img/" . $nomPhoto;
            copy($_FILES["photo"]["tmp_name"], $cheminDossier);

        } else {
            $nomPhoto = null;
        }


        foreach ($_POST as $field => $value) {
            $_POST[$field] = addslashes($value);
        }

        extract($_POST);

        $titre = $_POST["titre"];

        // préparer la requête qui permet de faire l'insert
        $count = $pdo->exec(
            "INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type, description)
            VALUES('$titre', '$adresse', '$ville', '$cp', '$surface', '$prix', '$urlPhoto', '$type', '$description')"
        );

        if ($count > 0) {
            // msg de confirmation à afficher
            $msg = "<div class='alert alert-success' role='alert'>
                Votre logement a bien été inséré en BDD !
            </div>";
        }

    }

}


?>



    <?php echo $msg; ?>

    <form class="mb-5 mt-5" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="titre">Titre*</label>
            <input type="text" class="form-control" name="titre" id="titre" aria-describedby="titre"
                placeholder="Entrer un titre">
        </div>

        <div class="form-group">
            <label for="adresse">Adresse*</label>
            <input type="text" class="form-control" name="adresse" id="adresse" aria-describedby="adresse"
                placeholder="Entrer une adresse">
        </div>

        <div class="form-group">
            <label for="ville">Ville*</label>
            <input type="text" class="form-control" name="ville" id="ville" aria-describedby="ville"
                placeholder="Entrer une ville">
        </div>

        <div class="form-group">
            <label for="cp">Code postal*</label>
            <input type="tel" class="form-control" id="cp" name="cp" aria-describedby="cp"
                placeholder="Entrer un code postal">
        </div>

        <div class="form-group">
            <label for="surface">Surface*</label>
            <input type="number" class="form-control" name="surface" id="surface" aria-describedby="surface"
                placeholder="Entrer une surface">
        </div>

        <div class="form-group">
            <label for="prix">Prix*</label>
            <input type="number" class="form-control" name="prix" id="prix" aria-describedby="prix"
                placeholder="Entrer un prix">
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" class="form-control" id="photo">
        </div>

        <div class="form-group col-md-4">
            <label for="location">Type*</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="location" name="type" class="custom-control-input" value="location">
                <label class="custom-control-label" for="location">Location</label>
            </div>
        </div>

        <div class="form-group col-md-4">
            <label for="vente" style="color:transparent">Type</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="vente" checked name="type" class="custom-control-input" value="Vente">
                <label class="custom-control-label" for="vente">Vente</label>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <?php

require_once("bas_page.php");

?>
