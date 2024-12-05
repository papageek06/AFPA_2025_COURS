class Person {

    constructor(firstName, name, age, sexe) {
        this.firstName = firstName;
        this.name = name;
        this.age = age;
        this.sexe = sexe;
    }

    arriverALheure() {
        console.log("J'arrive à l'heure tous les jours");
    }

}

class Professor extends Person {

    constructor(firstName, name, age, sexe, diploma) {
        super(firstName, name, age, sexe); // j'appel le constructeur de la classe parent
        this.diploma;
    }

    corrigerLesDevoirs() {
        console.log("J'adore corriger les devoirs");
    }

}

class Student extends Person {
    // appelé automatiquement quand je créer un objet à partir de la classe
    // il est appelé quand une classe est instanciée
    constructor(firstName, name, age, sexe, calendar) {
        super(firstName, name, age, sexe);
        this.calendar;
    }

    faireLesDevoirs() {
        console.log("J'adore faire les devoirs");
    }

} 

let sam = new Professor("Samih", "Habbani", 33, "m", "MBA");
let eliott = new Student("Eliott", "Bricout", 27, "m", ["12/09/1991", "09/12/1991"] );

console.log(sam);
console.log(eliott);
sam.corrigerLesDevoirs();
sam.arriverALheure();

eliott.faireLesDevoirs();
eliott.arriverALheure();
