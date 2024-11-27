// ARRAY

var myArray = ["Casablanca", "Tanger", "Agadir", "Ifrane"];
var myOtherArray = ["Casablanca", 40000, true, ["1", 2, true]];

console.log(myOtherArray.length); // 4
console.log(myOtherArray[0]); // Casablanca
console.log(myOtherArray[2]); // true

myArray.push("Paris");

console.log(myArray);

var listOfNames = ["Samih", "Thomas", "Isabelle", "Léa"];

// console.log("Bonjour " + listOfNames[0]);
// console.log("Bonjour " + listOfNames[1]);
// console.log("Bonjour " + listOfNames[2]);
// console.log("Bonjour " + listOfNames[3]);

var listHTML = "<ul>";
for (var i = 0; i < listOfNames.length; i++) {
  // code to be executed
  // console.log("Bonjour " + listOfNames[i]);
  listHTML += "<li> " + listOfNames[i] + " </li>";
}

listHTML += "</ul>";

document.write(listHTML);