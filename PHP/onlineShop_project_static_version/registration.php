<?php
require_once("inc/init.php");


$msg="";

if($_POST) {
        // La fonction htmlspecialchars convertit les caractères spéciaux en entités HTML pour empêcher 
    // l'exécution de code malveillant (comme des scripts) et protéger contre les attaques XSS (Cross-Site Scripting).

    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $email = filter_var(trim($_POST['email'], FILTER_VALIDATE_EMAIL)) ? htmlspecialchars(trim($_POST['email'], )) : null ;
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT );
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $address = htmlspecialchars(trim($_POST['address']));
    $city = htmlspecialchars(trim($_POST['city']));
    $postal_code = htmlspecialchars(trim($_POST['postal_code']));
    $sexe = ($_POST["sexe"] =="m" || $_POST["sexe"] =="f" ) ? htmlspecialchars(trim($_POST["sexe"])) : "m";
    $status = 0;



    if($pseudo && $email && $password && $last_name &&  $first_name && $address && $city && $postal_code && $sexe) {


        try {
            $sql = "INSERT INTO member (pseudo, email, password, last_name ,first_name , address , city , postal_code , sexe , status  ) VALUES ( :pseudo, :email, :password, :last_name , :first_name , :address , :city , :postal_code , :sexe ,:status )";
                        $stmt = $pdo->prepare($sql);

                        $stmt->execute(
                        [
                        ':pseudo' => $pseudo,
                        ':email' => $email,
                        ':password' => $password,
                        ':last_name' => $last_name,
                        ':first_name' => $first_name,
                        ':address' => $address,
                        ':city' => $city,
                        ':postal_code' => $postal_code,
                        ':sexe' => $sexe,
                        ':status' => $status,
                        ]
                    );
                    $nbrInsertedLines = $stmt->rowCount();
                    if($nbrInsertedLines > 0){

                    header('location:connection.php'); 
                    }else {
                 $msg = "<div class='alert bg-warning' >
                        veuiller remplire tout les champ
                        </div>";
        }
                    
        }catch (PDOException $e){
     
            $msg = "<div class='alert bg-warning' >
            une erreur est survenue lors de votre inscription !
            </div>";  
            

         
        }
        
    }}

            
require_once("inc/header.php");
   
        
    
    

?>

<!-- Body content -->
<?= $msg; ?>
<div class="col-md-12">
    <?= $msg ; ?>
    <form method="POST"  class="form-row">
        <!-- PSEUDO -->
        <div class="form-group col-md-6">
            <label for="pseudo">Pseudo:</label>
            <input type="text" class="form-control" id="pseudo" aria-describedby="pseudo" placeholder="Enter your pseudo" name="pseudo">
        </div>
        <!-- PASSWORD -->
        <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
        </div>
        <!-- Last Name -->
        <div class="form-group col-md-3">
            <label for="lasttName">Last Name</label>
            <input type="text" class="form-control" id="lastName" placeholder="Enter your last name" name="last_name">
        </div>
        <!-- First Name -->
        <div class="form-group col-md-3">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" placeholder="Enter your first name" name="first_name">
        </div>
        <!-- Email -->
        <div class="form-group col-md-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your first email" name="email">
        </div>

        <div class="form-grou col-md-3">
            <label for="sexe">Sexe:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="m" id="sexem" name="sexe">
                <label class="form-check-label" for="sexem">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="f" id="sexef" name="sexe">
                <label class="form-check-label" for="sexef">
                    Female
                </label>
            </div>

        </div>

        <!-- Address -->
        <div class="form-group col-md-12">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Enter your first address" name="address">
        </div>

        <!-- CITY -->
        <div class="form-group col-md-6">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" placeholder="Enter your first city" name="city">
        </div>

        <!-- POSTAL CODE -->
        <div class="form-group col-md-6">
            <label for="postalCode">Postal Code</label>
            <input type="text" class="form-control" id="postalCode" placeholder="Enter your first postal code" name="postal_code">
        </div>

        <div class="form-group col-md-3">
            <button type="submit" value="insert" class="btn btn-dark">Create my account</button>
        </div>
    </form>
</div>

<?php
require_once("inc/footer.php");
?>