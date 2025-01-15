<?php

// METTRE EN PLACE UNE STATION SERVICE

class Station {

// QUI A UNE CAPACITÉ
    private $capacity ;

    public function __construct($capacity) {
        $this->capacity = $capacity;
    }


    public function getCapacity() {
        return $this->capacity;
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

// ET QUI PERMET DE FAIRE LE PLEIN DANS LES VÉHICULES

    public function fillVehicle(Vehicle $vehicle) {
        $vehicle->fill($this);
    }  

// ET QUI FAIT ÉVOLUER SA CAPACITÉ EN FONCTION DES VÉHICULES SERVIS

    public function updateCapacity($liters) {
        $this->capacity -= $liters;
    }
}


// METTRE EN PLACE DES VÉHICULES

class Vehicle {

    // QUI ONT UN RÉSERVOIR
    // AVEC UNE CAPACITÉ MAX
    // ET QUI VIENNENT FAIRE LE PLEIN DANS LA STATION SERVICE
    private $capacity;
    private $currentLiters;

    public function __construct($capacity, $currentLiters) {
        $this->capacity = $capacity;
        $this->currentLiters = $currentLiters;
    }

    public function fill(Station $station) {
        $liters = $this->capacity - $this->currentLiters;
        if ($liters <= $station->getCapacity()) {
            $station->updateCapacity($liters);
            $this->currentLiters = $this->capacity;
        } else {
            $this->currentLiters += $station->getCapacity();
            $station->updateCapacity($station->getCapacity());
        }

    }
}

// LA STATION SERVICE AURA 800 LITRES
$station = new Station(800);


// CRÉER 3 VÉHICULES

$voiture1 = new Vehicle(70, 35);
$voiture2 = new Vehicle(50, 25);
$voiture3 = new Vehicle(40, 20);

// voiture 1 : capacité de 70L, dispose actuellement de 35L
// voiture 2 : capacité de 50L, dispose actuellement de 25L
// voiture 1 : capacité de 40L, dispose actuellement de 20L

?>