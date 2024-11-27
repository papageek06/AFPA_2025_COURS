const eliott = {
    parler() {
        let self = this;
        setTimeout(function() {
            // console.log("this", this);
            console.log("this", self);
        }, 1000);
    }
}

eliott.parler();

// les fonctions fléchées ne réafectent pas de valeur à this
// peu importe ou il se troue dans l'objet

const kendall = {

    parler() {
        setTimeout(() => {
            console.log("this", this);
        }, 1000);
    }

}

kendall.parler();