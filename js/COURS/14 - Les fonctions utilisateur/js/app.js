console.log("User functions");

// DRY
// Don't repeat yourself

// Function With no Return

function myFunction() {
  console.log("myFunction has been called !");
}

myFunction(); // function call

// Function With Return

function squareNumber() {
  // return
  return 2 * 2;
}

var result = squareNumber();
console.log("result :" + result);

// Function With argument

function functionWithArgument(myNumber) {
  // function with argument
  return myNumber * myNumber;
}

var result2 = functionWithArgument(2);
console.log("result2 : " + result2);

result2 = functionWithArgument(4);
console.log("result2 : " + result2);

result2 = functionWithArgument(10);
console.log("result2 : " + result2);

// Anonymous function
var myOtherFunction = function (myNumber) {
  return myNumber * myNumber;
};

myOtherFunction(4); // function Call

// Multiple Arguments

function calculMontantTTC(montantHT, tauxTVA) {
  return montantHT * tauxTVA; // montantTTC
}

var montantTTC = calculMontantTTC(100, 1.2);
console.log("montantTTC : " + montantTTC);

montantTTC = calculMontantTTC(120, 1.2);
console.log("montantTTC : " + montantTTC);

console.log(calculMontantTTC(100, 1.05));

// constants

const TAUX_20 = 1.2;

console.log(calculMontantTTC(100, TAUX_20));
