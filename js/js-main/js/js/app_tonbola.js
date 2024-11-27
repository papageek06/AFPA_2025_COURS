class Player {


    constructor( name, money, sexe ) {
        this.name = name;
        this.money = money;
        this.sexe = sexe;
    }

}

let rewards = [10000, 5000, 1000];
let listPlayers = [];
let nbrGames = 0;

for(let i = 1; i <= 10; i++) {

    let person;
    if(i % 2 == 0) {
        person = new Person("Payer " + i, 1000 * i, "f");
    } else {
        person = new Person("Payer " + i, 500 * i, "m");
    }

    listPlayers.push(person);

}

while (nbrGames < 3) {

}