//############################//
//                            //
//  ARRAYS                    //
//                            //
//############################//


// EN JS TOUT EST OBJET
// STRING - INT - ARRAY - BALISE HTML

let numbers = [23, 78, 991];
let names = ["Samih", "Nicolas", "Daniel"];
let infos = [22, "Samih", true, ["armes à feu", "chasse", "pêche"]];

console.log(infos[1]); // Samih
console.log(infos[3][1]); // chasse

// push
numbers.push(22);
// slice
console.log(names.slice(1,2)); // Nicolas
// length

//############################//
//                            //
//  OBJECT      custom        //
//                            //
//############################//

let monObjet = {}; // j'ai cree un objet vide
let monObjet2 = new Object();// declaration

let wajdi = {
    firstName : "wajdi",
    age : 27 ,
    nationnality : "french",
    weight : 82 ,
    hobbies : ["musculation", "les cabines telephinique a londres", "thé marocain"],
    reviserSesCours : function(){
        console.log("j'ecoute mon prof samih en bossant a la maison");
    },
    eat : function() {
        this.weight++;
    }
};

console.log(wajdi.age); //27
console.log(wajdi.weight); //82
wajdi.eat();
console.log(wajdi.weight);//83