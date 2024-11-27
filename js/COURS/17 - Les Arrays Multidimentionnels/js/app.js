console.log("Multidimentional Arrays");

// France 66.99
// Morocco 36.03
// Spain 46.94
// Panama 4.177

var multiArray = [
  ["France", "Morocco", "Spain", "Panama"],
  [66.99, 36.03, 46.94, 4.177],
];

console.log(multiArray);

console.log(multiArray[0][1]); // Morocco
console.log(multiArray[1][1]); //  36.03

function addLiToUl(country, population) {
  // ul selection
  var list = document.querySelector("ul");

  // li creation
  var li = document.createElement("li");

  // add some text to li
  li.appendChild(document.createTextNode(country + " : " + population));

  // add boostrap class
  li.classList.add("list-group-item");

  // append li to ul
  list.appendChild(li);
}

addLiToUl("France", 66.99);

for (var i = 0; i < multiArray[0].length; i++) {
  console.log(i);
  addLiToUl(multiArray[0][i], multiArray[1][i]);
}
