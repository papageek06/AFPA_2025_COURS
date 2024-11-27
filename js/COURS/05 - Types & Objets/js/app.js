 console.log("Types and Objects");

//////        //////
////// String //////
//////        //////

// En javascript tout est objet
// un string, un number, un array, un boolean tous sont des objets
// un objet c'est une boite dans laquelle on retrouve des données
// et des actions qui permettent de manipuler la donnée à l'intérieur
// ci-dessous str est un objet string
// et j'ai des actions qui me permettent de manipuler la chaine de caractère

// une action on appel ca une méthode
// une méthode c'est une fonction dans un objet

// ca veut dire que dans ma variable str qui est un objet
// j'ai plein de méthode prédéfinies de type string

// donc j'ai des méthodes number - array - boolean etc...

var str = "my text"; // Object String

// property
console.log(str.length); // 7

// Method
console.log(str.toUpperCase()); // case sensitive

// slice
console.log(str.slice(3, 7));

// method result in variable
var myCut = str.slice(3, 7);

console.log(myCut);

// CONCATENATION
console.log("This is the value of myCut : " + myCut);

//////        //////
////// Number //////
//////        //////

var nbr = 2; // Object Number
console.log(typeof nbr);
console.log(typeof nbr.toString());

//////        //////
////// Boolean //////
//////        //////

var myBoolean = true;
var myBoolean2 = false;

//////                  //////
////// NULL & UNDEFINED //////
//////                  //////

var myObjectNull = null;

var undefinedVariable;

console.log(undefinedVariable);

////////////////////////                                ////////////////////////
//////////////////////// SUMUP : PRIMITIVES VS OBJECTS   ////////////////////////
////////////////////////                                ////////////////////////

//////////////////////// OBJECTS - In JavaScript, almost "everything" is an object.

// Booleans
// Numbers
// Strings

// Arrays
// Objects

// Dates
// Maths
// Regular expressions

// Functions

//////////////////////// PRIMITIVES (DATA TYPES) - A primitive value is a value that has no properties or methods.

// string
// number
// boolean
// null
// undefined
