console.log("Objects");

var myObject = {}; // declaration
var myObject2 = new Object(); // declaration

// var car = {}; // declaration

// car.brand = "Renault"; // new property in object
// car.modele = "Clio 4";
// car.year = "2016";
// car.color = "red";
// car.ethanol = true;
// car.doors = 5;
// car.options = ["ABS", "ESP", "Air conditioning", "GPS"];
// car.features = {
//   power: "75",
//   plateNumber: "AA-132-BB",
// };

var car = {
  brand: "Renault", // new property in object
  modele: "Clio 4",
  year: "2016",
  color: "red",
  ethanol: true,
  doors: 5,
  options: ["ABS", "ESP", "Air conditioning", "GPS"],
  features: {
    power: "75",
    plateNumber: "AA-132-BB",
  },
  drive: function () {
    console.log("Vroum Vroum");
  },
  fuel: function () {
    console.log("Glou Glou");
  },
}; // declaration

console.log(car.modele); // property
car.drive(); // method

car.year = "2017";

console.log(car);
