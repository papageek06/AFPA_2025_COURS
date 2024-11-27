class Hero {

    constructor(name, marbles, loss, gain) {
        this.name = name;
        this.marbles = marbles;
        this.loss = loss;
        this.gain = gain;
    }

    cheat(heroSelected, enemy, listEnemies, randomIndexEnemy) {

        let cheat = prompt("Votre enemi à " + enemy.age + " ans, voulez profitez de lui en trichant? (0) - OUI / (1) - NON");

        if(cheat == 0) {
            heroSelected.marbles += (enemy.marbles);
            listEnemies.splice(randomIndexEnemy, 1);
            console.log("Insaciable petite fouine, vous avez triché, votre ennemi est mort !");
            console.log("Il vous reste désormais " + heroSelected.marbles + " billes à la fin de cette rencontre !");
        }

        // if(cheat == 0) {
        //     return true;
        // } else {
        //     return false;
        // }

        return (cheat == 0) ? true : false;

    }

    play(enemy, heroSelected, listEnemies, randomIndexEnemy) {

        let answer = prompt("Le jouer que vous affronté a-til un nombre de billes pair ou impair? (0) - pair / (1) - impair");

        if(answer == 0 && enemy.marbles % 2 == 0 || answer == 1 && enemy.marbles % 2 != 0) {
            heroSelected.marbles += (enemy.marbles + heroSelected.gain);
            listEnemies.splice(randomIndexEnemy, 1);
            console.log("Bravo, vous avez remporté " + enemy.marbles + " billes + votre bonus de " + heroSelected.gain + " billes");
        } else {
            heroSelected.marbles -= (enemy.marbles + heroSelected.loss);
            console.log("HAHAHAHA, votre enemi avait " + enemy.marbles + " billes, " + "  vous avez perdu " + enemy.marbles + " billes + votre malus de " + heroSelected.loss + " billes");
    
        }
    }

    checkUserInput(msg, min, max) {
    let theMsg =prompt(msg);//afficher le msg prompt 
    let rmsg = theMsg ;  // récupérer la saisie           
    while ( isNaN(rmsg) || rmsg <min || rmsg > max ) {
        prompt("se n'est pas la reponse attendue veuiller me saisir un chiffre entre " + min + "et " + max );
        input = prompt (msg)
    }
    return input ;
}

class Enemy {

    constructor(name, marbles, age) {
        this.name = name;
        this.marbles = marbles;
        this.age = age;
    }

}

let hero1 = new Hero("Seong Gi-hun", 10, 3, 1);
let hero2 = new Hero("Kang Sae-byeok", 15, 2, 2);
let hero3 = new Hero("Cho Sang-woo", 25, 1, 3);

let listHeroes = [hero1, hero2, hero3];
let listEnemies = [];

for(let i=0; i<18; i++) {
    let enemy = new Enemy("Enemy " + i, Math.floor((Math.random() * 15) + 1), Math.floor((Math.random() * 80) + 40));
    listEnemies.push(enemy);
}

let answerLevel = prompt("0 - Facile / 1 - Difficile / 2 - Moyen");
let listLevels = [4, 12, 18];
let nbrEncounter = listLevels[answerLevel];

let answerHero = prompt("0 - Seong Gi-hun / 1 - Kang Sae-byeok / 2 - Cho Sang-woo");
let heroSelected = listHeroes[answerHero];

console.log("Vous avez choisi de jouer avec " + heroSelected.name + ", vous jouez donc avec " + heroSelected.marbles + " billes, un malus de " + heroSelected.loss + " biilles et un bonus de " + heroSelected.gain + " billes !");

console.log("Vous devrez affronter " + nbrEncounter + " enemies, bonne chance à vous");

let counter = 1;

while(nbrEncounter > 0 && heroSelected.marbles > 0) {

    console.log("Rencontre N° " + counter);
    let randomIndexEnemy = Math.floor((Math.random() * listEnemies.length - 1));
    let enemy = listEnemies[randomIndexEnemy];
    console.log("Vous rencontrez " + enemy.name + " qui a " + enemy.age + " ans !");
 
    nbrEncounter--;
    counter++;

    if(enemy.age >= 70) {
        let cheat = heroSelected.cheat(heroSelected, enemy, listEnemies, randomIndexEnemy);

        if(cheat) {
            continue;
        }
    }

    heroSelected.play(enemy, heroSelected, listEnemies, randomIndexEnemy);

    console.log("Il vous reste désormais " + heroSelected.marbles + " billes à la fin de cette rencontre !");


}

if(heroSelected.marbles <= 0) {
    console.log("GAME OVER !");
} else {
    console.log("Partie gagnée ! vous remportez 45,6 milliards de Won sud-coréen.");
}