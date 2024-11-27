// destructuration d'objet

const kendall = {
    firstName : "Kendall",
    age : 27,
    country : "Wales"
};

// const firstName = kendall.firstName;
// const age = kendall.age;
// const country = kendall.country;

const { firstName, age, country } = kendall;
const { firstName:prenom, age:monAge, country:pays } = kendall;
const { age:kendallAge } = kendall;

console.log(country);
console.log(pays);
console.log(kendallAge);

let marc = ["val1", "val2", "val3"];
const [val1, val2, val3] = marc;

console.log(val2);