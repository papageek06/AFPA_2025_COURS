"use strict";

const marc = {

    prenom : "marc",
    age : 22,
    marcher() {
        console.log(this);
    }
};

// marc.marcher();
const funcMarcher = marc.marcher.bind(marc); 
funcMarcher();