// CRÉER UNE STATION SERVICE QUI CONTIENT 800 L

class GasStation {

    constructor(totalQuantity) {
        this.totalQuantity = totalQuantity;
    }

    faireLePLein(vehicule) {
        console.log(`Il reste actuellement ${this.totalQuantity} L dans la station service`);

        this.totalQuantity -= (vehicule.maxQuantity - vehicule.currentQuantity);
        
        console.log(`Nous avons mis ${vehicule.maxQuantity - vehicule.currentQuantity} littres dans le véhicule ${vehicule.name} pour faire le plein`);

        vehicule.currentQuantity = vehicule.maxQuantity;

        console.log(`Il reste désormais ${this.totalQuantity} L dans la station service`);

    }

}

class Vehicule {

    constructor(name, currentQuantity, maxQuantity) {
        this.name = name;
        this.currentQuantity = currentQuantity;
        this.maxQuantity = maxQuantity;
    }

}

let station = new GasStation(800);
let vehicule1 = new Vehicule("Clio 3", 30, 70);
let vehicule2 = new Vehicule("BM série 3", 10, 60);

// FAUDRA CRÉER UNE VÉHICULE 1 QUI A 30L DANS LE RÉSERVOIR ET UNE CAPACITÉ MAX DE 70L
// FAUDRA CRÉER UNE VÉHICULE 2 QUI A 10L DANS LE RÉSERVOIR ET UNE CAPACITÉ MAX DE 60L

station.faireLePLein(vehicule1);
station.faireLePLein(vehicule2);

// CE QUE JE VEUX POUVOIR FAIRE C'EST FAIR ELE PLEIN DES DEUX VÉHICULES DANS LA STATION SERVICE
// ET A CHAQUE FOIS AFFICHER COMBIEN D'ESSENCE J'AI MIS DANS LE VÉHICULE
// ET COMBIEN D'ESSENCE IL ME RESTE DANS LA STATION SERVICE