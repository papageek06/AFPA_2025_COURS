<?php

    require_once("./IHero.php");

    class Game {

        private $listHeroes;
        private $listLevels;
        private $listEnemies;
        private IHero $hero;
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
                $hero->introduce();
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

            echo "Votre enemi a des billes dans la main, est-ce un chiffre pair (press 1), ou impair (press 2)<br>";
            $choice = $this->hero->chooseOddOrEven();

            echo $choice == 1 ? "PAIR ! <br>" : "IMPAIR ! <br>";

            if(($enemy->getMarbles() % 2 == 0 && $choice == 1) || $enemy->getMarbles() % 2 != 0 && $choice == 2) {
                $gain = $enemy->getMarbles() + $this->hero->getGain();
                $this->hero->setMarbles( $this->hero->getMarbles() + $gain);
                array_slice($this->listEnemies, $enemyIndex); // je supprime l'ennemi du jeu`

                echo "Bien joué, l'ennemi avait " . $enemy->getMarbles() . " billes dans sa main ! <br>";
                echo "Vous remportez $gain billes ! <br>";
            } else {
                $loss = $enemy->getMarbles() + $this->hero->getLoss();
                $this->hero->setMarbles( $this->hero->getMarbles() - $loss);

                echo "HAHAHA vous avez perdu cette partie, l'ennemi avait " . $enemy->getMarbles() . " billes dans sa main ! <br>";
                echo "Vous perdez $loss billes ! <br>";
            }

            echo "Il vous reste actuellement " . $this->hero->getMarbles() . " billes dans votre main ! <br><br>";


        }

        private function startFight() {
            echo "<br><br>Starting fight... <br>";

            $counter = 1;
            while($this->hero->getMarbles() > 0 && $this->level > 0) {

                echo "Rencontre n° $counter <br>";

                $randomEnemyIndex = Utils::randomNumber(0, count($this->listEnemies) -1 );
                $enemy = $this->listEnemies[$randomEnemyIndex];
                echo "Vous affronté l'ennemi " . $enemy->getName() . " ! Préparez-vous !<br>";

                $this->level--;
                $counter++;

                if($enemy->getAge() >= 70) {
                    echo "Votre enemit est vieux, souhaitez-vous profitez de lui en trichant? 1 - ( OUI ) / 2 - ( NON )<br>";

                    if($this->hero->cheat()) {
                        echo "Insatiable petite fouine, votre enemi meurt et vous remporter ses billes ! <br>";
                        echo "Vous remportez " . $enemy->getMarbles() . " billes que l'ennemi avait dans sa main !<br>";
                        $this->hero->setMarbles( $this->hero->getMarbles() + $enemy->getMarbles() );
                        echo "Il vous reste actuellement " . $this->hero->getMarbles() . " billes dans votre main ! <br><br>";
                        array_slice($this->listEnemies, $randomEnemyIndex);
                        continue;
                    } else {
                        echo "C'est honorable, vous avez décidé de rester loyal ! <br>";
                    }

                }

                $this->handleEncounter($enemy, $randomEnemyIndex);

            }

            $this->end();

        }

        private function end() {
            echo "<br><br>Ending game... <br>";

            if($this->hero->getMarbles() > 0) {
                echo "Bien joué, vous remportez 45, 6 milliards de won sud coréen !";
            } else {
                echo "HAHAHAHA, bienvenu en enfer !";
            }

        }
        
    }


?>