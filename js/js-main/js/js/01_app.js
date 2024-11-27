console.log("Hello World"); // fonction prédéfinie

// c'est un morceau de code prédéfinie qui appartient au langage Javascript (que le navigateur comprend)
// et qui va exécuter une action

// Langage de programmation
// instructions de code
// pour pondre un algoritme
// => c'est une suite d'instructions qui permet d'arriver à un résultat final attendu

// debug
// => recherche de bug et de solutions

//############################//
//                            //
//      VARIABLES             //
//                            //
//############################//

// ESPACE en mémoire (boite virtuelle) dans laquelle on va stocker une ou
// plusieurs données

// let first_name = "Samih";
// let lastName = "Habbani"; // camelCase

//############################//
//                            //
//      CONCATÉNIATION        //
//                            //
//############################//

// LIER BOUT A BOUT DEUX OU PLUSIEURS CHAINES DE CARACTÈRES

// let first_name = prompt("Quel est ton prénom?"); // string
// let lastName = prompt("Quel est ton nom?"); // string

// fonction prédéfinie 
// alert("Bonjour " + first_name + " " + lastName);

// let answer_pgm = confirm("es-tu un pgm pour affronter kendall?"); // boolean
// console.log(answer_pgm);
// dans une variable on peut avoir des données de différents types

let fullName = "Samih Habbani"; // string
let age = 33; // integer
let price = 33.6; // decimal (float)
let pgm = false; // boolean
let legalAge = true;
let hobbies = ["danse", "peinture", "bbq"]; // array (tableau) => stocker plusieurs valeurs à l'intérieur
let person = ["Samih", 33, true, ["val1", "val2"]];

// valeur de sam_pgm ce sera la valeur dans answer_pgm
// let sam_pgm = answer_pgm;


//############################//
//                            //
//  OPÉRATEURS ARITHMÉTIQUES  //
//                            //
//############################//

let res = 4 + 4;
let res2 = 4 - 4;
let res3 = 4 * 4;
let res4 = 4 / 4;
let res5 = 10 % 3; // (1) MODULO (reste d'une division euclidienne)

// écraser la valeur de la variable res5
res5 = 11 % 4;

//############################//
//                            //
//  OPÉRATEURS DE COMPARAISON //
//                            //
//############################//

let result = 4 > 3; // true
result = 4 >= 3; // true
result = 4 < 3; // false
result = 4 <= 3; // false
result = 4 <= 4; // true

result = 4 == 3; // on compare les valeurs
result = 4 == 4; // on compare les valeurs
result = 4 === 4; // ici on compare les valeur et le type
result = 4 === "4"; // false

result = 4 != 3; // true
result = 4 !== 3; // true ici on compare les valeur et le type
result = 4 !== 4; // false ici on compare les valeur et le type
result = 4 !== "4"; // true ici on compare les valeur et le type

// toute comparaison en JS vous renvoi un boolean (vrai  ou faux)

//############################//
//                            //
//  CONSTANTES                //
//                            //
//############################//

const tva = 20;
// tva = 19; erreur

// on mettra les balises html qu'on manipule dans des constantes
// pour des questions de performance

//############################//
//                            //
// Valeur primitives & objets //
//                            //
//############################//

// En javascript tout est objet (on a des objets prédéfinies)
// un string, un number, un array, un boolean tous sont des objets
// un objet c'est une boite dans laquelle on retrouve des données
// et des actions qui permettent de manipuler la donnée à l'intérieur
// ci-dessous str est un objet string
// et j'ai des actions qui me permettent de manipuler la chaine de caractère
// ces actions à l'intérieur de mes objets on appel ça une méthode
// une méthode c'est une fonction dans un objet

//############################//
//                            //
//  STRING                    //
//                            //
//############################//

let text = "Hello World"; // c'est variable objet string

console.log(text.length); // nbr de caractères de la string
console.log(text.toUpperCase()); // mettre en majuscule
console.log(text.toLowerCase()); // mettre en majuscule
console.log(text.slice(3, 7));

let text_trancated = text.slice(3, 7);

console.log(text); // Hello World

// JE VAIS AVOIR DES ACTIONS PRÉDÉFINIES POUR :
// STRING
// CHIFFRE
// ARRAY
// BOOLEAN

//############################//
//                            //
//  Number                    //
//                            //
//############################//

let nbr = 2;
console.log(typeof nbr); // type de la variable
console.log(nbr.toString());

//############################//
//                            //
//  Null & undefined          //
//                            //
//############################//

let score = null; // null
let nbrGames; // undefined (j'ai déclaré une variable sans valeur)


//############################//
//                            //
//  Conditions                //
//                            //
//############################//

// IF

let myAge = 18;
 
if(myAge >= 18) { // si
    console.log("Bienvenue sur mon site");
} else {
    // pour tout ceux qui n'ont pas 18 ans ou plus
    console.log("Scuze my french get the hell out of here !");
}

// vous aller demander au user sa couleur préférée
// si ca couleur préférée c'est rouge => change le background du body en rouge
// si ca couleur préférée c'est yellow => change le background du body en yellow
// si ca couleur préférée c'est violet => change le background du body en violet
// sinon on le mettra en vert

// let favouriteColor = prompt('Quelle est ta couleur préférée?');
let favouriteColor = "white";

// DOM
// DOCUMENT OBJECT MODEL
// votre page web pour JS
// c'est un gros objet
// qui contient des sous objets (balises)
// chaque objet à des méthodes prédéfinies ou des propriétés
// pour modifier l'aspect de chaque balise

if(favouriteColor == "red") {
    document.body.style.backgroundColor = "red";
} else if (favouriteColor == "yellow") {
    document.body.style.backgroundColor = "yellow";
} else if (favouriteColor == "violet") {
    document.body.style.backgroundColor = "violet";

} else {
    document.body.style.backgroundColor = "green";
}

//############################//
//                            //
//  Boucles                   //
//                            //
//############################//

let numbers = [27, 289, 999, 1893];
// console.log(numbers[0] * numbers[0]); // 27 * 27
// console.log(numbers[1] * numbers[1]); // 27 * 27
// console.log(numbers[2] * numbers[2]); // 27 * 27
// console.log(numbers[3] * numbers[3]); // 27 * 27

// FOR (SI JE CONNAIS À L'AVANCE COMBIEN DE FOIS JE DOIS RÉPTER LE CODE)
// départ
// condition
// incrémentation

for(let i = 0; i < numbers.length; i++) {
    console.log(numbers[i] * numbers[i]);
}

for(let i = 10; i < 15; i++) {
    console.log("Tour n° " + i);
}

// WHILE

let i = 0; // départ
while(i < numbers.length) { // condition
    console.log(numbers[i] * numbers[i]);
    i++; // incrémentation (pour que ma boucle ne tourne pas à l'infini)
}

let nber;
// tant qu'il m'a pas donné un chiffre compris entre 1 et 10
// je lui repose la question
// si c'est le cas
// j'affiche le résultat

while(isNaN(nber) || (nber > 10 || nber < 1)) {
    nber = prompt("Tu es bête, Donne moi un chiffre entre 1 et 10");
}

console.log(nber * nber);

// DO WHILE

do {
    nber = prompt("Donne moi un chiffre entre 1 et 10");
} while(isNaN(nber) || (nber > 10 || nber < 1));


// DRY
// DONT REPEAT YOURSELF 

//############################//
//                            //
//  Opérateurs logiques       //
//                            //
//############################//

// || (or)
let nationality = "English";
if(nationality == "English" || nationality == "Americain") {
    console.log("Hello");
}

// &&
let city = "Nice";
let firstName = "Brice";

if(city == "Nice" && firstName == "Brice") {
    console.log("Ca fart?");
}

//############################//
//                            //
//  Array                     //
//                            //
//############################//


//############################//
//                            //
//  Date                      //
//                            //
//############################//


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