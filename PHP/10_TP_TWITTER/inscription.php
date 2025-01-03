<?php

    require_once('config/haut_page.php');

    // si j'ai nu post
    // insert en bdd des données
    // hasher le mdp : password_hash()
    // redirection vers la page de connexion (header())

    // SI JE SUIS CO REDIRECTION A LA PAGE PROFIL
    if (isset($_SESSION["users_id"]) || !empty($_SESSION["users_id"])) {
      header('location:profil.php');
    }

    if($_POST) {

      $name = trim($_POST['name']);
      $email = trim($_POST['email']);
      $password = trim($_POST['password']);
      $repeatedPassword = trim($_POST['confirm_password']);

      if(empty($name) || empty($email) || empty($password) || empty($repeatedPassword)) {

        $msg .= "<div class='alert bg-warning'>
          Tous les champs sont obligatoires !
        </div>";

      }

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg .= "<div class='alert bg-warning'>
          Merci de renseigner un email valide !
        </div>";
      }

      if($password != $repeatedPassword) {
        $msg .= "<div class='alert bg-warning'>
          Merci de confirmer correctement le mot de passe !
        </div>";
      }

      if(empty($msg)) {

        // hasher le mot de passe
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        try {

          $sql = "INSERT INTO users (name, email, password,pseudo) VALUES (:name , :email, :password, :pseudo)";
          $stmt = $pdo->prepare($sql);

          $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashed_password,
          ]);
          $_SESSION["message"] = "<div class='alert bg-success'>
            Inscription confirmée
          </div>";
          // redirige vers la page connexion.php
          header('location:connexion.php');

        } catch(PDOException $e) {
            $msg .= "<div class='alert bg-warning'>
              Une erreur serveur est survenue merci de contacter l'administrateur du site. <br>
              Erreur : ". $e->getMessage() . ", code : " . $e->getCode() . "
            </div>";
        }

      }

    } 

?>

<h1>Inscription</h1>

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center">
            Inscription
          </div>

          <?= $msg; ?>
          <div class="card-body">
            <form method="POST">
              <!-- Champ name -->
              <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                  placeholder="Entrez votre name"
                  required
                />
              </div>
              <!-- Champ Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Entrez votre email"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="pseudo" class="form-label">votre pseudo</label>
                <input
                  type="pseudo"
                  class="form-control"
                  id="pseudo"
                  name="pseudo"
                  placeholder="Entrez votre pseudo"
                  required
                />
              </div>
              <!-- Champ Mot de passe -->
              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Créez un mot de passe"
                  required
                />
              </div>
              <!-- Confirmation du mot de passe -->
              <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirmez le mot de passe</label>
                <input
                  type="password"
                  class="form-control"
                  id="confirm_password"
                  name="confirm_password"
                  placeholder="Confirmez votre mot de passe"
                  required
                />
              </div>
              <!-- Bouton d'inscription -->
              <button type="submit" class="btn btn-success w-100">S'inscrire</button>
            </form>
          </div>
          <div class="card-footer text-center">
            <a href="#connexion">Déjà inscrit ? Connectez-vous</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php

    require_once('config/bas_page.php');

?>