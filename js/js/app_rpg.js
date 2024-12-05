class Player {
    constructor(name, billes, malus, bonus) {
        this.name = name;
        this.billes = billes;
        this.malus = malus;
        this.bonus = bonus;
    }
}

let listPlayer = ["Seong Gi-hun", "Kang Sae-byeok", "Cho Sang-woo"];
let playerSelect = null;
let players = null;

for (let i = 0; i < listPlayer.length; i++) {
    let confirme = confirm("Voulez-vous jouer avec " + listPlayer[i] + "?");
    if (confirme) {
        playerSelect = listPlayer[i];
        
        if (playerSelect == listPlayer[0]) {
            players = new Player(listPlayer[i], 10, -3, 1);
        } else if (playerSelect == listPlayer[1]) {
            players = new Player(listPlayer[i], 15, -2, 2);
        } else {
            players = new Player(listPlayer[i], 25, -1, 3);
        }
        break;
    }
}

console.log(playerSelect);
console.log(players);

  
let party =0 ;
let level =[4 , 12,18 ]
let levelSelect = prompt("tape (0) pour facil , (1) pour difficile , (2) impossible")
let levelPR = level[levelSelect]

console.log(levelPR);



class PlayerAdv {
    constructor(name, billes, age) {
        this.name = name; 
        this.billes = billes; 
        this.age = age;
    }
}

let opponent = [];        // Liste des adversaires disponibles
let hostOpponent = [];    // Liste des adversaires affrontés




// Création des adversaires
for (let i = 1; i <= levelPR; i++) {
    let randomBilles = Math.floor(Math.random() * 20) + 1;   // Nombre aléatoire de billes
    let age = Math.floor(Math.random() * 100);               // Âge aléatoire entre 0 et 99
    let ennemyName = "ennemy" + i;                           // Nom de l'adversaire

    let playerAdv = new PlayerAdv(ennemyName, randomBilles, age);
    opponent.push(playerAdv);  // Ajout de chaque adversaire à la liste `opponent`
}

console.log("Liste initiale des adversaires :", opponent);

// Boucle de jeu
while (party < levelPR && opponent.length > 0 || players.billes>1) {
    // Sélect un adversaire aléatoire parmi ceux restants
    let RandOpponentIndex = Math.floor(Math.random() * opponent.length);
    let currentOpponent = opponent[RandOpponentIndex]
    
    console.log("Adversaire actuel :" + currentOpponent.name);
    
    let billeAD = currentOpponent.billes;
    let billeModulo = billeAD % 2;

    console.log("Les billes de l'adversaire sont :", billeAD);
    if (currentOpponent.age >= 70 ) {
        let reponseTRiche = confirm("ton adversaire à " +currentOpponent.age +" et trop vieux pour tout voir !!\n tu as la possibilité de triché et de gagner toute c bille sans combatre !\n veux tu triché");
        if (reponseTRiche) {
            console.log("Gagné !");
            players.billes=players.billes+players.bonus+currentOpponent.billes;
            console.log("tu as " + players.billes + "billes");
            hostOpponent.push(currentOpponent);              // Ajoute l’adversaire affronté à `hostOpponent`
            opponent.splice(RandOpponentIndex, 1);           // Supprime l’adversaire de `opponent` pour ne pas le rejouer
            
            console.log("Adversaires déjà affrontés :", hostOpponent);
            console.log("Adversaires restants :", opponent);
            
            party++;
            continue;

        }
        
    } 
    let pari = parseInt(prompt("Les billes de votre adversaire sont de type : 1 pour paire ou 2 pour impaire ?"));
    
    // Vérification du pari
    if ((pari === 1 && billeModulo === 0) || (pari === 2 && billeModulo !== 0 )) {
        console.log("Gagné !");
        players.billes=players.billes+players.bonus+currentOpponent.billes;
        console.log("tu as " + players.billes + "billes");
    } else {
        console.log("Perdu !");
        players.billes = players.billes + players.malus + -currentOpponent.billes ;
        console.log("tu as " + players.billes + "billes");
    }
    
    // Déplacer l'adversaire actuel vers `hostOpponent` après le match
    hostOpponent.push(currentOpponent);              // Ajoute l’adversaire affronté à `hostOpponent`
    opponent.splice(RandOpponentIndex, 1);           // Supprime l’adversaire de `opponent` pour ne pas le rejouer
    
    console.log("Adversaires déjà affrontés :", hostOpponent);
    console.log("Adversaires restants :", opponent);
    
    party++;

    if (party >= levelPR && party >= levelPR  ){
        console.log("bravo tu as gagner  gagner 45.6 milliards de Won sud-coréen.");
    } else if (players.billes <=0) {
        console.log("la partie est finit tu n'as plus de bille!!!");
    }
}

console.log("Fin de la partie.");
console.log("Liste finale des adversaires affrontés :", hostOpponent);
console.log("Liste des adversaires non affrontés (si le niveau n'a pas tout utilisé) :", opponent);