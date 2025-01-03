<?php

require_once('config/haut_page.php');

// si j'ai un post
// je récupère le mdp et pseudo rentrés dans le formulaire
// je vais en bdd faire un select pour ce pseudo (email)
// vous récupérer toutes les infos
// password_verify() vous vérifiez si le mdp que j'ai en bdd
// pour ce pseudo, c'est le même que moi j'ai rentré
// si c'est le cas je créé une session en mettant les infos du user en session
// et je redirige vers la page profil.php

if (isset($_SESSION["users_id"]) || !empty($_SESSION["users_id"])) {
  header('location:profil.php');
}

// sinon j'affiche un msg d'erreur
$msg = (isset($_SESSION["message"]) && !empty($_SESSION["message"])) ? $_SESSION["message"] : "";

if(isset($_SESSION["message"])) {
  unset($_SESSION["message"]);
}

if ($_POST) {

  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  // vérifications
  // not empty
  // email est au format valide

  try {

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

      // si mon mot de passe est valide je créer une session utilisateur
      $_SESSION['users_id'] = $user['id'];
      $_SESSION['name'] = $user['name'];
      $_SESSION['email'] = $user['email'];

      header('location:profil.php');
      exit();
    } else {
      $msg .= "<div class='alert bg-warning'>
        Email ou mot de passe incorrect !
      </div>";
    }


  } catch (PDOException $e) {
    $msg .= "<div class='alert bg-warning'>
      Erreur lors de la connexion : ". $e->getMessage() . ", code : " . $e->getCode() . "
    </div>";
  }

}

?>


<h1>Connexion</h1>


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          Connexion
        </div>
        <div class="card-body">

        <?= $msg; ?>

          <form action="" method="POST">
            <!-- Champ Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Adresse Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email"
                required />
            </div>
            <!-- Champ Mot de passe -->
            <div class="mb-3">
              <label for="password" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="password" name="password"
                placeholder="Entrez votre mot de passe" required />
            </div>
            <!-- Case à cocher -->
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remember" />
              <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>
            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
          </form>
        </div>
        <div class="card-footer text-center">
          <a href="#mot-de-passe-oublie">Mot de passe oublié ?</a>
        </div>
      </div>
    </div>
  </div>
</div>


<?php

require_once('config/bas_page.php');

?>