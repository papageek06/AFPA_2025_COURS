<?php

require_once('config/haut_page.php');

if (!isset($_SESSION["users_id"]) || empty($_SESSION["users_id"])) {
  $_SESSION["message"] = "<div class='alert bg-success'>
      Veuillez vous connecter pour accéder à la page profil !
    </div>";
  header("connexion.php");
  exit();
}
$photoUploaded = false; 

if(isset($_FILES) && !empty($_FILES["photo"]["name"])) {

    $photoUploaded = true; 
    // extension (png, jpg, jpeg)
    $extensions = [".png", ".jpg", ".jpeg"];
    $extension = strrchr($_FILES["photo"]["name"], ".");

    if (!in_array($extension, $extensions)) {
        $msg .= "<div class='alert alert-warning' role='alert'>
            Veuillez charger un fichier au bon format (png, jpg, jpeg) !
        </div>";
    }

    $maxSize = 10000000;

    if ($_FILES["photo"]["size"] > $maxSize) {
        $erreur .= "<div class='alert alert-warning' role='alert'>
            Veuillez charger un un fichier moins lourd (max 1MO) !
        </div>";
    }

}
if($photoUploaded) {
  // gestion de la photo
  // copie sur le serveur
  $nomPhoto = "profil_" . time() . $extension;
 

  $urlPhoto = URL . "img/" . $nomPhoto;

  $cheminDossier = RACINE_SITE . "img/" . $nomPhoto;
  copy($_FILES["photo"]["tmp_name"], $cheminDossier);

  $sql = "UPDATE users SET name = :name , email = :email photo = :picture WHERE id = :users_id";
  $stmt = $pdo->prepare($sql);
  $count = $stmt->execute(
      [
      ':email' => $_POST['email'],
      ':name' => $_POST['name'],
      ':users_id' => $_POST['users_id'],
        ':picture' =>$urlPhoto,
      ]

} else {
  $sql = "UPDATE users SET name = :name , email = :email  WHERE id = :users_id";
  $stmt = $pdo->prepare($sql);
  $count = $stmt->execute(
      [
      ':email' => $_POST['email'],
      ':name' => $_POST['name'],
      ':users_id' => $_POST['users_id'],
   
      ])
}

if($_POST){

  $sql = "UPDATE users SET name = :name , email = :email photo = $urlphoto WHERE id = :users_id";
  $stmt = $pdo->prepare($sql);
  $count = $stmt->execute(
      [
      ':email' => $_POST['email'],
      ':name' => $_POST['name'],
      ':users_id' => $_POST['users_id'],
   
      ]
  );

  if ($count > 0) {
      $msg = "<div class='alert bg-success'>
        Votre tweet a bien été inséré !
      </div>";
  }
  $_SESSION["name"] = $_POST['name'];
  $_SESSION["email"] = $_POST['email'];
}

// si je suis pas connecté (si j'ai pas de session user)
// vous redirigez vers connexion.php
// sinon vous afficher les ifnos de la session dans la page

?>

<h1>Profil</h1>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          Mon Profil
        </div>
        <div class="card-body">
          <form  method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($_SESSION["user_id"]); ?>" >
            <!-- Champ Nom -->
            <div class="mb-3">
              <label for="user-name" class="form-label fw-bold">Nom :</label>
              <input type="text" id="user-name" name="name" class="form-control" value="<?= htmlspecialchars($_SESSION["name"]); ?>">
            </div>
            <!-- Champ Email -->
            <div class="mb-3">
              <label for="user-email" class="form-label fw-bold">Email :</label>
              <input type="email" id="user-email" name="email" class="form-control" value="<?= htmlspecialchars($_SESSION["email"]); ?>">
            </div>
            <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" class="form-control" id="photo">
        </div>

            <!-- Boutons -->
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
              
              <a href="deconnexion.php" class="btn btn-danger">supprime</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php

require_once('config/bas_page.php');

?>