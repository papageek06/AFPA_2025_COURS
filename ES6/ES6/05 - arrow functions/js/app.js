// function standalone
function func1(number) {
    return number*number;
}

// function variabilisé

const func2 = function(number) {
    return number*number;
};

func1();
func2();

// FONCTION FLÉCHÉES
const func3 = (number) => {
    return number * number;
}

const func4 = number => number * number;
const func5 = (number, number2) => number * number2;

// Fonction anonyme

setTimeout(function() {
    console.log("yo");
}, 1000);

setTimeout(() => {
    console.log("yo");
}, 1000);

// setTimeout(() =>  console.log("yo"), 1000);

