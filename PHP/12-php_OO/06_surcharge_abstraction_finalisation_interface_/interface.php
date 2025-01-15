<?php


    // contrat que doivent respecter les classes
    // les interfaces définissent le quoi?
    // les classes définissent le comment

    // dans une interface je n'ai pas de données (state)
    // pas de logique (behaviour)

    // je n'ai que de la définition de méthode
    // je n'ai que les méthodes que doivent définir les classes
    // qui vont implémenter l'interface

    // => contrat

    // pour s'assurer que nos classes ont bien définis la logique 
    // de toutes les méthodes présentes dans nos interfaces

    // une interface ne peut pas s'instancier

    interface Mouvement {

        public function mouvement(); // je ne fais que déclarer

    }


    class Boat implements Mouvement {

        public function mouvement() {
            echo "Je flotte sur l'eau";
        }

    }


    class Plane implements Mouvement {

        public function mouvement() {
            echo "Je flotte dans les airs";
        }

    }

?>