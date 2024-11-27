const sum = (...args) => { 
    let total = 0;
    for(const nbr of args) {
        total += nbr;
    }

    return total;
};


// ça veut dire que l'élément par défaut que je rends importable à l'extérieur de ce fichier
// c'est la fonction sum
// mais je pourrai rendre exportable plusieurs choses
export default sum;