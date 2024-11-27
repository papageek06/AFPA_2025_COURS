console.log("Logical Operators");

//
// && (AND)
//

var favoriteColor = prompt("What's your favorite color");
var age = prompt("How old are you?");

if (favoriteColor === "pink" && age == 29) {
  console.log("my favorite color is pink and I am 29");
}

//
// || (OR)
//
if (favoriteColor === "pink" || age == 29) {
  console.log("one condition at least is true");
} else {
  console.log("condition by default");
}

// RULES

// true + true => true
// true + false => false
// false + true => false
