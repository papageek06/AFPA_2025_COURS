//#############################//
//                             //
//       LISTE DE JOUEURS      //
//                             //
//#############################//
const listPlayers = [
    ["hero1", "hero2", "hero3"],
    [
        {
            name:"Seong Gi-hun",
            marbles:10,
            loss: 3,
            gain: 1
        },
        {
            name:"Kang Sae-byeok",
            marbles:15,
            loss: 2,
            gain: 2
        },
        {
            name:"Cho Sang-woo",
            marbles:20,
            loss: 1,
            gain: 3
        }
    ]
];

//#############################//
//                             //
//      LISTE DE NIVEAUX       //
//                             //
//#############################//
const listLevels = [['level1', 'level2', 'level3'], [2, 4, 6]];

//#############################//
//                             //
//      LISTE D'ENNEMIES       //
//                             //
//#############################//
const listEnemies = [
    { name: "Tao Huang", marbles: 5 , age: 20 }
    ,{ name: "Su He", marbles: 15 , age: 40 }
    ,{ name: "Tan Ju", marbles: 10 , age: 80 }
    ,{ name: "Shao Lin", marbles: 4 , age: 60 }
    ,{ name: "Xing Kang", marbles: 3 , age: 20 }
    ,{ name: "Jacky Chan", marbles: 12 , age: 50 }
];

//#############################//
//                             //
//         CONSTANTES          //
//                             //
//#############################//

const GAME_DETAILS = document.getElementById("game-details"); // c'est la partie ou j'ai les infos du héro et l'historique
const HISTORY = document.getElementById("history"); // historique
const REMAINING_MARBLES = document.querySelector(".remaining-marbles"); // la balise qui contiendra combien de billes il te reste
const HERO_NAME = document.querySelector(".hero-name"); // la balise qui contiendra le héros que tu as selectionné
const REMAINING_ENCOUNTERS = document.querySelector(".remaining-encounters"); // la balise qui affiche combien de rencontres il te reste

const WIN = document.getElementById("win"); // la page de fin en cas de victoire
const LOOSE = document.getElementById("loose"); // l'écran de fin si je perds

const ENEMIES = document.getElementById("enemies"); // la partie qui affiche mes ennemy
const HEROES = document.getElementById("heroes"); // le block qui t'affiche les différents héros
const LEVELS = document.getElementById("levels"); // le block qui t'affiche les différents niveaux
const ENEMIES_CHILDREN = document.querySelectorAll("#enemies .block"); // c'est les block dans la partie ennemies
const LIST_BLOCK_HTML = document.querySelectorAll(".block"); // c'est la classe commune a toutes les balises sur laquelle je peux cliquer

const ACTION = document.getElementById("action"); // le titre principal qui affiche l'action en cours (h1)
const REPLAY = document.getElementById("replay"); // le bouton pour rejouer la partie
const CHOICES = document.getElementById("choices"); // la partie qui contient les boutons pair ou impair
const LIST_BUTTONS_ODD_OR_EVEN = document.querySelectorAll("#choices button"); // boutons pair ou impair

// let listP = document.getElementsByTagName("p"); renvoit tous les paragraphes dans la page
// document.querySelector("#toto div a.maClasse"); // il vous renverra toujours la première occurence (renvoit toujours une seule balise (la première qu'il trouve))
// let listLinks = document.querySelectorAll("#toto div a.maClasse"); // il vous renvoit toutes les balises selectionnées (renvoit systémtiquement un liste)


// let listP = document.getElementsByTagName("p"); renvoit tous les paragraphes dans la page
// document.querySelector("#toto div a.maClasse"); // il vous renverra toujours la première occurence (renvoit toujours une seule balise (la première qu'il trouve))
//let listLinks = document.querySelectorAll("#toto div a.maClasse"); // il vous renvoit toutes les balises selectionnées

//#########################################################//
//                                                         //
//FONCTION PERMETTANT DE METTRE À JOUR LE HTML D'UN ÉLÉMENT//
//                                                         //
//#########################################################//

function updateInnerHTML(elemHTML , txt) {

}


//############################################################//
//                                                            //
//FONCTION PERMETTANT DE METTRE À JOUR LE DISPLAY D'UN ÉLÉMENT//
//                                                            //
//############################################################//

function handleDisplay (lemHTML , display){

}

//###############################################//
//                                               //
//FONCTION PERMETTANT DE METTRE METTRE FIN AU JEU//
//                                               //
//###############################################//

function endGame(win) {

}

//########################################//
//                                        //
//PERMET DE SELECTIONNER UN HERO À L'ÉCRAN//
//                                        //
//########################################//

function selectHeroAndDisplayInfo (heroSelectedClass) {

}

//##########################################//
//                                          //
//PERMET DE SELECTIONNER UN NIVEAU À L'ÉCRAN//
//                                          //
//##########################################//

function selectLevels (levelSelectedClass) {

}

//################################################//
//                                                //
//PERMET DE METTRE À JOUR L'HISTORIQUE DES COMBATS//
//                                                //
//################################################//

function updateHistory(msg) {

}

//#################################################//
//                                                 //
//PERMET DE MARQUE D'UNE CROIX ROUGE UN ENEMIE MORT//
//                                                 //
//#################################################//

function toggleRedCross(ennemyIndex, opacity){

}

//#########################################################//
//                                                         //
//PERMET DE REVENIR À L'ÉCRAN PRINCIPAL APRÈS UNE RENCONTRE//
//                                                         //
//#########################################################//

function goBackToMainScreen(){

}

//################################################################//
//                                                                //
//PERMET DE COMPARER LES VALEURS ET METTRE À JOUR L'AVANCÉE DU JEU//
//                                                                //
//################################################################//

function compareValues(userAnswer){

}

//##################################################################//
//                                                                  //
//PERMET DE CAPTER L'EVENeMENT CLICK SUR LES BUTTON PAIRE UO IMPAIRE//
//                                                                  //
//##################################################################//

for ( let i = i ; i < LIST_BUTTONS_ODD_OR_EVEN.length ; I++) {

    LIST_BUTTONS_ODD_OR_EVEN[i].addEventListener("click" , function() {

    }) ;
}


//###############################//
//                               //
//PERMET D'AFFICHER UNE RENCONTRE//
//                               //
//###############################//

function handleEncounter (){

};

//##############################################################//
//                                                              //
//PERMET DE GÉRER LES ÉVENEMENTS CLICK SUR L'ENSEMBLE DES BLOCKS//
//                                                              //
//##############################################################//

for (let i = 0 ; i < LIST_BLOCK_HTML.length ; i++) {
    LIST_BLOCK_HTML[i].addEventListener("click" , function(){

        // je veux recuperer la deuxieme classe de mon objet html
        let listclass = this.classlist ;
        let secondClass = listclass[1];


        // si j'ai clicker sur un element block qui a une classe qui commence par l => selectlevel
          // si j'ai clicker sur un element block qui a une classe qui commence par h => selectHero
            // si j'ai clicker sur un element block qui a une classe qui commence par e => handleEncounter

            if (secondClass.startWith("l")) {
                selectLevels() ; 

            } else if(secondClass.startWith("h")) {
                selectHeroAndDisplayInfo() ;

            } else {
                handleEncounter();
            }



    });
}

//##############################################################//
//                                                              //
//PERMET DE CAPTER SI JE VEUX REJOUER UNE PARTIE                //
//                                                              //
//##############################################################//