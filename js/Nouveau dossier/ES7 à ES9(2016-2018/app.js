//ES7

// - opérateur d'exponentiation **
const base = 2;
const exponent = 3;
console.log(base ** exponent); // 8

// includes
const fruits = ["banana", "orange", "strawberry"];
console.log(fruits.includes("banana")); // true
console.log(fruits.includes("panacota")); // false


// ES6 8 - await async
// nouvelle faon de faire l'asynchrone

// la problématique
// je simule la réponse d'un serveur
// function reponseServeur() {
//     setTimeout(()=> {
//         return "ma valeur";
//     }, 2000);
// }

// la problématique c'est que le serveur a mis 2sec a répondre
// et du coup x est undefined car lorsque reponseServeur renvoit sa valeur
// la ligne 28 a déjà été executée
// let x = reponseServeur();

// AVANT ON UTILISAIT LES CALL BACK FUNCTIONS POUR RÉSOUDRE DE PROBLÈME
// EN RENDANT LE CODE "ASYNCHRONE"

function reponseServeur(callback) {
    setTimeout(() => {
        callback("ma valeur");
    }, 4000);
}

// console.log(x);
let x;
// Utilisation de la fonction avec une callback
reponseServeur((valeur) => {
    x = valeur;
    console.log("La valeur de x :", x); // Affichera "ma valeur" après 2 secondes
});

// AUJOURD'HUI (DEPUIS L'ES8)
// c'est comme ça aujourd'hui qu'on peut interroger un serveur en js
// pour ne pas a avoir a recharger la page et améliorer l'expérience utilisateur
const fetchData = async () => {

    // ajax
    // api fetch
    const response = await fetch("https://jsonplaceholder.typicode.com/posts/1");
    const data = response.json(); // récupérer les données serveur sous forme d'objet js
    console.log(data);
}

fetchData();