let listSurvivors = ["nerd", "blonde", "sportif", "black", "hero"];
let deadPeople = []; // quand tu déclare une variable let en dehors de toute fonction ou block, elle est globale au script (accès partout)

let jason = {
    health: 100,
    encounterSurviror: function () {
        const indexMusic = Math.floor(Math.random() * (listSurvivors.length - 1));
        return listSurvivors[indexMusic];
    },
    probabilityForDamage : function(currentSurvivor) {
        let proba = Math.round(Math.random() * 100) / 100; // ici je suis dans une méthode (function) portée locale
        let indexSurvivor = listSurvivors.indexOf(currentSurvivor); // ça va vous renvoyer la position du survivant dans listSurvivors

        if(proba <= 0.2) {
            listSurvivors.splice(indexSurvivor, 1); // mon perso meurt
            deadPeople.push(currentSurvivor); // j'ajoute à ma liste de mort mon perso
            console.log(currentSurvivor + " est mort après la rencontre.");
        } else if(proba <= 0.5) {
            this.health -= 10; // j'inflige 10 points de dégats à jason
            console.log(currentSurvivor + " inflige 10 points de vie en dommage au tueur lors de la rencontre.");
        } else {
            this.health -= 15;
            listSurvivors.splice(indexSurvivor, 1); // mon perso meurt
            deadPeople.push(currentSurvivor); // j'ajoute à ma liste de mort mon perso
            console.log(currentSurvivor + " inflige 15 points de vie en dommage au tueur et meurt lors de la rencontre.");
        }
    }
};

while(jason.health > 0 && listSurvivors.length > 0) {

    let survivor = jason.encounterSurviror(); // survivor a une portée local car je suis dans un block (while) elle n'existe que dans le while
    console.log("Le tueur rencontre : " + survivor);

    jason.probabilityForDamage(survivor);

}

if(jason.health > 0) {
    console.log("HAHAHAHHA, Jason a tué tout le monde");
} else {
    console.log("Des survivants ont réussis à tuer le tueur en série");
}

if(deadPeople.length > 0) {
    console.log("Voici la liste des morts : ");
    for(let i = 0; i < deadPeople.length; i++) {
        console.log(deadPeople[i] + "\n");
    }

    if (confirm("do you wanna play again")) {
        PlayGame();
    } else {
        console.log("a la revoyure");
    }
}