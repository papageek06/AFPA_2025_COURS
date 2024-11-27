// CRÉER LES HEROS

class Hero { // POO (PROGRAMMATION ORIENTÉE OBJET)

    constructor(name, marbles, loss, gain) {

    }

}

let hero1 = new Hero("Seon Gi-hun", 10, 3, 1);


// CRÉER LES ENNEMIES


class Enemy { // POO (PROGRAMMATION ORIENTÉE OBJET)

    constructor(name, marbles, age) {
        
    }

}

let enemy1 = new Enemy("Enemy1", 12, 70);
// let enemy1 = new Enemy("Enemy1", 12, 70);
// let enemy1 = new Enemy("Enemy1", 12, 70);
// let enemy1 = new Enemy("Enemy1", 12, 70);


// DEMANDER QUEL NIVEAU
let listLevels = [4, 12, 18];

let answerLevel = prompt("Quel niveau tu veux? press (0) pour Facile, (1) pour moyen, (2) pour difficile");
let nbrEncounters = listLevels[answerLevel];


// QUEL PERSO IL VEUT CHOISIR
let listHeroes = [hero1, hero2, hero3];
let answerhero = prompt("Quel héro tu veux? press (0) Seon-Gi-Hun, (1) Sae-bok, (2) Sang-who");
let hero = listHeroes[answerhero];

// tant que nbrEncounters > 0 && hero.marbles > 0 le jeu continu

    // rencontrer au hasard un enemie dans la liste d'ennemy (math.random())

    // mon ennemi a -til un nombre de bille pair ou impair (prompt)
        // si je dis pair et que c'est pair => j'ai gagné les billes de l'ennemi + bonus
        // si je dis impair et que c'est impair => j'ai gagné les billes de l'ennemi + bonus
            // l'ennemi meur donc je le dégage de la list d'enemies

        // si je dis impair et que c'est paur => j'ai perdu les billes de l'ennemi - malus
        // si je dis pair et que c'est impair => j'ai perdu les billes de l'ennemi - malus

    // nbrEncounters--;