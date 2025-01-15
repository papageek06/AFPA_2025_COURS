<?php


    class Counter {

        public static $nbrInstanceClass = 0; // appartient à la classe (membre de classe)
        // pour avoir accès à $nbrInstanceClass je dois passer par la classe
        public $nbrInstanceObject = 0; // appartient à l'objet (membre d'instance)


        public function __construct() {
            ++self::$nbrInstanceClass;
            ++$this->nbrInstanceObject;
        }

        public static function squareNumber($nbr1) {
            return $nbr1 * $nbr1;
        }
    }

    $c1 = new Counter;
    $c2 = new Counter;
    $c3 = new Counter;
    $c4 = new Counter;
    $c5 = new Counter;

    echo "Nombre de fois que la classe a été instanciée : " . Counter::$nbrInstanceClass . "<br>"; // 4
    echo "Nombre de fois que l'objet a été instancié : " . $c4->nbrInstanceObject . "<br>"; // 1

    echo Counter::squareNumber(100);
?>
