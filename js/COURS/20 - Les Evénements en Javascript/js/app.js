console.log("JS Events");

// Event handler

// HTML attribute
// anonymous function
// addEventListener

function myFunction(element) {
  element.style.color = "red";
  console.log("click");
}

console.log(document.querySelectorAll("#dblclickMe"));

// standalone function

function dbClick(event) {
  console.log("event", event);
  console.log("X : ", event.clientX);
  console.log("Y : ", event.clientY);
  console.log("dblclick");
  this.style.color = "green";
  console.log(" my text is : " + this.innerHTML);
}

document.querySelectorAll("#dblclickMe")[0].ondblclick = dbClick;

// anonymous function

// document.querySelectorAll("#dblclickMe")[0].ondblclick = function () {
//   console.log("dblclick");
//   this.style.color = "green";
//   console.log(" my text is : " + this.innerHTML);
// };

// addEventListener

document.querySelector("#myFocus").addEventListener("focus", function () {
  console.log("focus on");
  this.style.background = "red";
});

// change

document
  .querySelectorAll("input[type='text']")[1]
  .addEventListener("change", function () {
    console.log("change");
  });

// focus

document
  .querySelector("input[type='password']")
  .addEventListener("keyup", function () {
    console.log("keyup", this.value);
    if (isNaN(this.value)) {
      alert("Please, insert a numeric value");
    }
  });

// submit

document.querySelector("#myForm").addEventListener("submit", submitFunction);

function submitFunction(event) {
  console.log("submit");
  event.preventDefault(); // empeche le rechargement de la page
}

// hover
document.querySelector("img").addEventListener("mouseover", function () {
  this.style.width = "450px";
});

document.querySelector("img").addEventListener("mouseout", function () {
  this.style.width = "250px";
});
