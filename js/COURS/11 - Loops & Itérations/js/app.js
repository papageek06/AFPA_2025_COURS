console.log("Loops and Iterations");

// Departure
// Condition
// Increment (Decrement)

// FOR

for (var counter = 1; counter <= 11; counter++) {
  console.log("iteration : " + counter);
}

// EX :

document.write(
  "<ul> <li> 1 </li>  <li> 2 </li> <li> 3 </li> <li> 4 </li> <li> 5 </li> </ul>"
);

var myList = "<ul>";

for (var counter = 1; counter <= 5; counter++) {
  myList += "<li> " + counter + " </li>";
}

myList += "</ul>";

document.write(myList);