<?php


class Societe
{
    public $adresse;
    public $ville;
    public $cp;

    public function __construct()
    {
    }

    public function __set($nom, $valeur)
    { // déclenchée que si l'on souhaite affecter une valeur sur une propriété inéxistante
        echo "La propriété " . $nom . " n'éxiste pas, la valeur " . $valeur . " n'a donc pas été affectée !" . "<br>";
    }

    public function __get($nom)
    { // déclenchée que si l'on souhaite récupérer une valeur sur une propriété inéxistante
        echo "La propriété " . $nom . " n'éxiste pas, la valeur n'a donc pas été récupérée !" . "<br>";
    }

    public function __call($nom, $argument)
    { // déclenchée que si l'on souhaite appeler une méthode inéxistante
        echo "La méthode " . $nom . " n'éxiste pas, les argument étaient " . implode("-", $argument) . "<br>";
    }

    public function __toString() {
        return "Adresse : " . $this->adresse . " cp: " . $this->cp . " ville : " . $this->ville;
    }
}

// __toString()
// __desctruct()
// __unset()

$societe = new Societe;
$societe->pays = "France";
$societe->ville = "Paris";
echo $societe->ville . "<br>";

$societe->toto("1", "yo");
