class Player { // custom type (notre propre type)

    constructor( name, money, sexe ) {
        this.name = name; // champs
        this.money = money;
        this.sexe = sexe;
    }

    sePresenter() {
        console.log("Je m'appel " + this.name + " et j'ai " + this.money + " sur mon compte !");
        // return "Je m'appel " + this.name + " et j'ai " + this.money + " sur mon compte !";
    }

}

function game (){
    let rewards = [10000, 5000, 1000];
let listPlayers = [];
let listWinners = [];
let nbrWinners = 0;

for(let i = 1; i <= 10; i++) {

    let player;
    if(i % 2 == 0) {
        player = new Player("Player " + i, 1000 * i, "f"); // objet créer à partir de l'instance de la classe player
    } else {
        player = new Player("Player " + i, 500 * i, "m");
    }
    player.sePresenter();
    listPlayers.push(player);

}


let winnersHaveWoman = false;

while (nbrWinners < 3) {


    let winner = listPlayers[random]; // objet de type player

    // je veux vérifier si le winner de la manche a pas déjà gagné

    if(nbrWinners == 2 && !winnersHaveWoman && winner.sexe !== "f") {
        continue;
    } else {
        // et si c'est le dernier tour, verifier que j'ai au moins une gagnante
        winner.money += rewards[nbrWinners];
        listWinners.push(winner);
        listPlayers.slice(random, 1); // de virer le gagnant de ma liste de joueurs
        
        if(winner.sexe === "f") {
            winnersHaveWoman = true;
        }

        console.log(winner.name + "remporte " + rewards[nbrWinners] + " et dispose maintenant de " + winner.money + " sur son compte !");
    
        nbrWinners++;
    }

}


if (confirm("veux tu relancer")){
    game()
} else { console.log("a bientot")}
// // let a = "mon text";
// let a = new String("mon text");

// function squareNumber(number) {

//     return number * number;
// }

// let result = squareNumber(2); // result = 4
// console.log(result);
// console.log(squareNumber(2));
// console.log(2*2);
}

