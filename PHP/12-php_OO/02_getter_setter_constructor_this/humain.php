<?php

// Classe Human
// prenom
// nom
// sexe
// adresse

class Human {

    private $first_name;
    private $last_name;
    private $sexe;
    private $address;

    public function __construct($first_name, $last_name, $sexe, $address) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->sexe = $sexe;
        $this->address = $address;
    }


    public function getFirst_name(){
        return $this->first_name;
    }


    public function getLast_name(){
        return $this->last_name;

    }


    public function getSexe(){
        return $this->sexe;

    }


    public function getAddress(){
        return $this->address;

    }

    public function setFirst_name($first_name){
        $this->first_name = $first_name;
    }


    public function setLast_name($last_name){
        $this->last_name = $last_name;

    }


    public function setSexe($sexe){
        $this->sexe = $sexe;

    }


    public function setAddress($address){
        $this->address = $address;

    }

    public function presentation() {
        if($this->sexe == "Homme") {
            echo "Bonjour, je m'appel $this->first_name $this->last_name, je suis un homme et je vis à : $this->address <br>";
        } else {
            echo "Bonjour, je m'appel $this->first_name $this->last_name, je suis une femme et je vis à : $this->address <br>";
        }
    }
}

// getter setter
// construct

// une méthode qui permet de se présenter
// si je suis une f se présenter en tant que femme
// si je suis un h se présenter en tant qu'homme

// Mohammed
// Julie
// Anusa
// Nicolas
// Julien

$moha = new Human("Muhammed", "Ali", "Homme","Paris");
$julie = new Human("Julie", "Grichard", "Femme", "Nice");
$anusa = new Human("Anusa", "Rasolonjatovo", "Femme", "Marseille");
$nicolas = new Human("Nicolas", "Petit", "Homme", "Annecy");
$julien = new Human("Julien", "Du pont", "Homme", "Lacanau");

// Quand vous avez défini les 5 personnes
$listPersons = [$moha, $julie, $anusa, $nicolas, $julien];
// les mettre dans une liste
// parcourir la liste
// et faire se présenter tout le monde

foreach ($listPersons as $person) {
    $person->presentation();
}

?>