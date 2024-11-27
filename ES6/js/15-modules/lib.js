const sum= (...args)=> {
    for(const nbr of args) {
        total += nbr ;
    }
    return total += nbr ;
};

// ca veut dire que l'element par defaut que je rends importable a l'exterieur de ce fichier
// c'est la fonction sum
// mais je pourrai rendre exportable plusieur choses

export default sum ;