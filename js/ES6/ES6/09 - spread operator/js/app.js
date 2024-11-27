const list1 = [1, 2, 3, 4];
const list2 = [5, 6, 7, 8];

const v = 19;
const x = [...list1]; // j'ai copié le contenu de list1 dans x
const y = ["start", ...list1, "a", ...list2, 9, 10, v]; // j'ai copié le contenu de list1 et list2 dans y

const ihor = {
    firstName : "Ihor",
    age : 30
};

const mautasem = {
    president : "Mautasem",
    yearsOfExperience : 33
};

const copyObj = {...ihor, age : 31, country : "Ukrainia", ...mautasem};

console.log(copyObj);

const sam = {
    firstName : "Samih",
    age : 33
};

const samih = {...sam};
// samih n'est pas un clone de sam
// et qu'il ont en mémoire deux adresses différentes
// donc ce sont deux objets différents

// en revanche si j'avais samih = sam
// samih pointerai en mémoire vers le même objet
// et donc lamodification de l'un entrainerait la modificaiton de l'autre

sam.age = 50;

console.log(samih);

let a = 5;
let monAge = 30;
console.log(monAge); // 30
let b = 30;

monAge = a;

console.log(a); // 5
console.log(monAge); // 5
console.log(b); // 30