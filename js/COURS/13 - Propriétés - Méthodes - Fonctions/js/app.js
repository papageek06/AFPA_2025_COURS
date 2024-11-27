console.log("JavaScript Global Reference");

// The JavaScript global properties and functions can be used with all the built-in JavaScript objects.

/////                              /////
///// JavaScript Global Properties /////
/////                             /////

var undefined;
console.log(undefined); // undefined

var myText = "y";
var myNumber = Number(myText); // NaN
console.log(myNumber);

/////                             /////
///// JavaScript Global Functions /////
/////                            /////

if (isNaN(myNumber)) {
  console.log("myNumber is not a number");
}

var myNumber = "10";
console.log(typeof parseInt(myNumber)); // parseInt

myNumber = "10.32";
console.log(parseInt(myNumber)); // parseInt

var nbr1 = true;
var nbr2 = false;
var nbr3 = "998";
var nbr4 = "998xdjkjf";

console.log("nbr1 : " + Number(nbr1));
console.log("nbr2 : " + Number(nbr2));
console.log("nbr3 : " + Number(nbr3));
console.log("nbr4 : " + Number(nbr4));

/////                           /////
///// JavaScript Global Methods /////
/////                           /////

window.prompt();
window.alert();
window.confirm();

document.write("<p> my text </p>");
