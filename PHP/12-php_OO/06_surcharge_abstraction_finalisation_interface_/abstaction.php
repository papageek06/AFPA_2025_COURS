<?php

    // héritage
    // encapsulation
    // abstraction
    // polymorphisme

    // Ne peut pas être instanciée :
    // Contient des méthodes abstraites :
    // Peut contenir des méthodes concrètes :
    // Utilise le mot-clé abstract :

    // PK?

    // quand on veut définir une classe parent qu'on souhaite hériter mais instancier
    // c'est quand certaines méthodes dans la classe mère doivent être définis obligatoirement
    // par les classes filles


    abstract class Player {

        abstract public function majority();
        abstract public function money();

        public function toto() {
            echo "toto";
        }

    }

    class PlayerFrench extends Player {

        public function majority() {
            return 18;
        }

        public function money() {
            return "€";
        }

    }

    class PlayerUs extends Player {
        
        public function majority() {
            return 21;
        }

        public function money() {
            return "$";
        }

    }


    // Une classe devient abstraite quand elle a des méthodes abstraites
    // une méthode abstraites n'a pas contenu
    // les classes héritières sont obligées de redéfinir les méthodes abstraites mères
    // une classe abstraite peut contenir des méthodes normales
    // Contrairement à une interface une classe abstraite peut contenir de la logique
    // Par contre, une classe abstraite au même titre qu'une interface ne peut être instancier

    $french = new PlayerFrench;
    $us = new PlayerUs;
    $lisPlayers = [$french, $us];

    foreach ($lisPlayers as $key => $player) {
        echo $player->majority();
    }
?>