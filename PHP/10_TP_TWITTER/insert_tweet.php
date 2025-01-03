<?php

require_once('config/haut_page.php');
 var_dump($_SESSION);
if($_POST){

 

    $sql = "INSERT INTO tweets (content, users_id) VALUES(:content, :users_id)";
    $stmt = $pdo->prepare($sql);
    $count = $stmt->execute(
        [
        ':content' => $_POST['content'],
        ':users_id' => $_POST['users_id']
        ]
    );

    if ($count > 0) {
        $msg = "<div class='alert bg-success'>
          Votre tweet a bien été inséré !
        </div>";
    }
}
?>


<h1>Créer un nouveau tweet</h1>

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center">
            Créer un nouveau tweet
          </div>

          <?= $msg; ?>
          <div class="card-body">
            <form method="POST">
            <input type="hidden" name="users_id" value="<?php echo $_SESSION["users_id"];?>">
              <!-- Champ Nom -->
              <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <input
                  type="text"
                  class="form-control"
                  id="content"
                  name="content"
                  placeholder="Entrez votre contenu"
                  required
                />
              </div>
              <!-- Bouton d'inscription -->
              <button type="submit" class="btn btn-success w-100">Créer tweet</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php

    require_once('config/bas_page.php');

?>