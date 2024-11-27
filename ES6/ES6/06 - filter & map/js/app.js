// filter

const listNbrs = [2, 4, 5, 11, 20, 9];

// objectif : je veux récupérer que les chiffres pair
const filterList = listNbrs.filter(function(nbr) {
    return nbr % 2 == 0;
});

console.log(filterList); // filterList est un nouvel array avec les données filtrées

const filterList2 = listNbrs.filter(nbr => nbr % 2 == 0);
console.log(filterList2);

// map

const listSquareNbrs = listNbrs.map(function(nbr) { // fonction anonyme fléchée
    return nbr * nbr;
});

const listSquareNbrs2 = listNbrs.map(nbr => nbr * nbr); // fonction anonyme fléchée
console.log(listSquareNbrs2);

