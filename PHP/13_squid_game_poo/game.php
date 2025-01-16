<?php

    require_once("./Hero.php");

    class Game {

        private $listHeroes;
        private $listLevels;
        private $listEnemies;
        private $hero;
        private $level;

        public function __construct($listHeroes, $listLevels, $listEnemies) {
            $this->listHeroes = $listHeroes;
            $this->listLevels = $listLevels;
            $this->listEnemies = $listEnemies;
        }


        public function start() {
            echo "<br><br>Game starting... <br>";
            $this->introduceAllHeroes();

        }

        private function introduceAllHeroes() {
            echo "<br><br>Introducing all heroes... <br>";

            foreach($this->listHeroes as $hero) {
                echo $hero->getName() . " combat avec " . $hero->getMarbles() . " billes, a un malus de ". $hero->getLoss() . " billes et un bonus de ". $hero->getGain() . " billes <br>";
            }

            $this->askHeroToChooseLevel();
            
        }

        private function askHeroToChooseLevel() {
            echo "<br><br>Choosing a level... <br>";

            for ($i=0; $i < count($this->listLevels[0]); $i++) { 
                echo "Appuyez sur $i pour " .  $this->listLevels[0][$i] . "(". $this->listLevels[1][$i]. " rencontres à faire !)<br>";
            }

            $this->level = $this->listLevels[1][Utils::randomNumber(0, count($this->listLevels[1]) -1 )];
            echo "Vous avez choisi d'affronter $this->level ennemis ! bon courage ☠️ <br>";
            $this->askPlayerToChooseHero();

        }

        private function askPlayerToChooseHero() {
            echo "<br><br>Choosing a hero... <br>";

            foreach ($this->listHeroes as $key => $hero) {
                echo "Press $key for " . $hero->getName() . "<br>";
            }

            $this->hero = $this->listHeroes[Utils::randomNumber(0, count($this->listHeroes) - 1)];
            echo "Vous avez choisi d'affronter vos ennemis avec " . $this->hero->getName() . " ☠️ <br>";
            $this->startFight();

        }

        private function handleEncounter($enemy, $enemyIndex) {

            echo "Votre enemi a des billes dans la main, est-ce un chiffre pair (press 1), ou impair (press 2)";
            $choice = $this->hero->chooseOddOrEven();

            if(($enemy->getMarbles() % 2 == 0 && $choice == 1) || $enemy->getMarbles() % 2 != 0 && $choice == 2) {
                $this->hero->setMarbles( $this->hero->getMarbles() + $enemy->getMarbles());
                array_slice($this->listEnemies, $enemyIndex); // je supprime l'ennemi du jeu
                echo "Bravo, vous avez gagné ". $enemy->getMarbles() . " billes ! <br> il vous reste ". $this->hero->getMarbles() . " billes <br>";
            } else {
                $this->hero->setMarbles( $this->hero->getMarbles() - $enemy->getMarbles());
                echo "Dommage, vous avez perdu ". $enemy->getMarbles() . " billes ! <br> il vous resqte ". $this->hero->getMarbles() . " billes <br>";
            }


        }

        private function startFight() {
            echo "<br><br>Starting fight... <br>";

            $counter = 1;
            while($this->hero->getMarbles() > 0 && $this->level > 0) {

                echo "Rencontre n° $counter <br>";

                $randomEnemyIndex = Utils::randomNumber(0, count($this->listEnemies) -1 );
                $enemy = $this->listEnemies[$randomEnemyIndex];
                echo "Vous affronté l'ennemi". $enemy->getName()." ! Préparez-vous !";

                if($enemy->getAge() >= 70) {
                    echo "Votre enemit est vieux, souhaitez-vous profitez de lui en trichant? 1 - ( OUI ) / 2 - ( NON )<br>";

                    if($this->hero->cheat()) {
                        echo "Insatiable petite fouine, votre enemi meurt et vous remporter ses billes ! <br>";
                        $this->hero->setMarbles( $this->hero->getMarbles() + $enemy->getMarbles() );
                        // je gagne la partie 
                        // mon enemit meurt
                        continue;
                    } else {
                        echo "C'est honorable, vous avez décidé de rester loyal ! <br>";
                    }

                }

                $this->handleEncounter($enemy , $randomEnemyIndex);

                $this->level--;
                $counter++;

            }

            $this->end();

        }

        private function end() {
            echo "<br><br>Ending game... <br>";

        }
        
    }


?>



