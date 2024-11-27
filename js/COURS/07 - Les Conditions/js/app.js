console.log("Conditions");

var favoriteColor = prompt("What's your favorite color?");
console.log("favoriteColor " + favoriteColor);

if (favoriteColor == "pink") {
  // code to be executed if (favoriteColor == "pink") == true
  console.log("my favorite color is pink");
} else if (favoriteColor == "yellow") {
  console.log("my favorite color is yellow");
} else {
  console.log("condition by default!");
}

var comparison = favoriteColor == "pink";
console.log("comparison : " + comparison);

console.log(typeof favoriteColor);
