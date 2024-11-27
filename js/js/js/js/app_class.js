class  Person { // pascal naming convention

    // il est appelé automatiquement lors de l'instance d'une class
    constructor(name , firstName) {//permet d'initialiser des valeurs pour nos champs (propriete objet qu'on aura)
        this.name = name ;
        this.firstName = firstName ;


    } 

    sayHello( ) {//methode
    console.log("hey Salut , je m'appel" + this.firstName + " " + this.name);    
    }

}

const albano = new Person ("albano" , "ayme") ; // j'ai crée des objets a partir de l'instance de la classe Person
const wajdi = new Person ("wajdi" , "Rouafi") ;
const florian = new Person("Florian" , "santantonio");

albano.sayHello();
wajdi.sayHello();
florian.sayHello();