let montantHT = document.getElementById("montantHT").value;
let montantTVA = document.getElementById("montantTVA").value;
let montantTTC = document.getElementById("montantTTC").value;
let tauxTVA = document.getElementById("tauxTVA");
let input = document.querySelectorAll(" input-calcul") ;

for ( let i= 0 ; i< input.length ; i++) {

input[i].addEventListener("click" , function(){
    input.forEach()
    if (input.name == "appliqueTauxTVA") {
        tauxTVA.value = this.value
    }

});

}
montantHT = parseInt(montantHT);
montantTVA = parseInt(montantTVA);
montantTTC = parseInt(montantTTC);







console.log(montantHT);
console.log(montantTVA);
console.log(montantTTC);

