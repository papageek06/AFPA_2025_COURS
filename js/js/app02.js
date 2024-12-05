// Exercice : Jeu du nombre secret
// Objectif
// Le joueur doit deviner un nombre aléatoire entre 1 et 100. À chaque essai, le programme donnera un indice (trop haut, trop bas, ou correct). Le jeu doit permettre de relancer une partie en appuyant sur une touche.

// Étapes
// Variables et constantes : Créez des constantes pour les messages d'indice (par exemple, "Trop haut", "Trop bas", "Correct") et une variable pour stocker le nombre d'essais restants.
// Conditions et boucles : Utilisez une boucle pour permettre à l'utilisateur de faire plusieurs essais jusqu'à ce qu'il devine le nombre ou que les essais soient épuisés.
// Méthode pour générer un nombre aléatoire.
// Méthode pour vérifier la réponse et retourner le bon message.
// Bonus : Affichez les essais restants après chaque tentative.



// correction 

function PlayGame() {

    const too_hight = "chiffre trop haut";
    const too_low = "chiffre trop bas";
    const correct = "chiffre correct";
    
    let chances = 3 ;
    let answer;
    
    Math.floor(Math.random() * (max - min + 1) + min);
    console.log(SECRET_NUMBER);
    while(chances >0) {
    
      answer = prompt("donne moi un chiffre entre 1 et 10")
      // tant que le user ne me donne pas un chiffre et un chiffre compris entre a et 10 
      //je lui repose la question sans lui faire perdre de point de vie 
    
      if (isNaN(answer) || (answer>10 || answer<1 )) {
      alert("chiffre non valable !!");
        continue;
      }
    
    
      if(answer < SECRET_NUMBER) {
        alert(too_low) ;
      } else if (answer> SECRET_NUMBER) {
        alert (too_hight);
      } else {
        alert(correct);
        break; // ca vous fait sortir de la boucle
      }
      chances--;
    }
    
    if (chances<=0) {
      alert( "ha ha ha !! you lose !! le chiffre etait"+ SECRET_NUMBER);
    }
    }
    
    
    let PlayAGAIN = confirm("do you play again ??") ;
    
    // if (playagain) == true)
    if (PlayAGAIN) {
      PlayGame();} else { 
        alert("merci pour votre partie !!");
      }
    
    
    PlayGame();