class Humain {

    constructor(prenom, nom){
        this.prenom = prenom;
        this.nom = nom;
    } 

    marcher() {
        console.log("Je marche et je m'appel " + this.prenom);
    } 

}

const kendall = new Humain("Kendall", "Init");
const mautasem = new Humain("mautasem", "Suri");
const marc = new Humain("Marc", "Zuckerberg");

const listPerson = [kendall, mautasem, marc];

// je veux que tout le monde marche

listPerson.forEach((person) => {
    person.marcher();
});