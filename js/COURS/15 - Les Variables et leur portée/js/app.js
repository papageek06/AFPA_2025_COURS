console.log("Variables and functions scope");

// GLOBAL
myVariable = "my text"; // global
var myVariable2 = "my text"; // global

function myFunction() {
  var localVariable = "this is my local variable"; // local
  localVariable += " oh yeah !";
}

// console.log(localVariable);

var a = "my global variable";

function test() {
  var a = "my local variable";
  console.log(a);
}

console.log(a);
test();
