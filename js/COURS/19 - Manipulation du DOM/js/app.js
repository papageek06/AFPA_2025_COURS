console.log("DOM Manipulation");

// Natural selection

var myP = myPgh; // html object
console.log(typeof myP);
myP.style.color = "red";
myP.style.fontSize = "70px";

// Selection by ID

var myOtherP = document.getElementById("myOtherPgh"); // html object
console.log(myOtherP);

myOtherP.style.display = "none";
// document.getElementById("myOtherPgh").style.display = "none";

// Selection by class

var listClass = document.getElementsByClassName("myDiv"); // html collection
console.log("listClass :" + typeof listClass);
console.log("listClass :", listClass);

var secondClass = listClass[1]; // second div
console.log(secondClass.textContent);
console.log(secondClass.innerHTML);

secondClass.style.color = "green";

// Selection by type
var myUl = document.getElementsByTagName("ul");
console.log("myUl : ", myUl); // to select ul
console.log("myUl : ", myUl[0].getElementsByTagName("li")); // to select ul li

// Selection by name attribute

var myName = document.getElementsByName("userName");
console.log("myName :", myName);

// Selection by querySelector

var selection = document.querySelector(".myDiv");
console.log("selection :", selection);

selection = document.querySelector("ul li");
console.log("selection :", selection);

// Selection by querySelectorAll

var myOtherSelectionAll = document.querySelectorAll("#querySelectorAll p");
console.log("myOtherSelectionAll :", myOtherSelectionAll);

// Selection by attribute

var img = document.querySelectorAll("img[src='img/moto.jpg']");
console.log("img :", img);
console.log("img :", img[0].title); // img title attribute

img[0].title = "img title changed !";

// Iteration

for (var i = 0; i < myOtherSelectionAll.length; i++) {
  myOtherSelectionAll[i].style.color = "orange";
}
