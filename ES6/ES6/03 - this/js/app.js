"use strict";

const marc = {

    prenom : "marc",
    age : 22,
    marcher() {
        console.log(this);
    }
};

marc.marcher();

const funcMarcher = marc.marcher; // ici je mets dans ma constant la définition de ma méthode

console.log(funcMarcher);
funcMarcher(); // ici this vaut window alors que ça devrait valoir marc
// en mode strict this est carrémetn devenu undefined

//
// Explications
//

// la valeur de this dépend de comment vous appeler la fonction
// si vous appelez une méthode dans un objet this renverra toujours une référence de l'objet

// par contre si vous appeler une fonction as "a standalone object" (objet sans classe) ou à l'éxtérieur d'une fonction
// this retournera l'objet global this qui correspond à l'objet window (quand le mode strict n'est pas activé)

// en strict mode => renverra undefined (pour éviter certain problème)
// en mode normal => nous renverra window