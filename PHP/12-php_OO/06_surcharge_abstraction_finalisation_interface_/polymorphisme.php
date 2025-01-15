


<?php


    class A {

        public function test() {
            echo "je teste en français";
        }

        // je peux pas la redéfinir dans la classe fille
        final public function test2() {
            echo "je teste en français";
        }

        // overloading
        // public function test($arg1) {
        //     echo "je teste en $arg1";
        // }

    }

    class U extends A {

        // override
        // je redéfinis la méthode test de la classe mère
        public function test() {
            echo "je teste en ukrainiens";
        }

    }

    class M extends A {

    }

    $ukranian = new U;
    $ukranian->test(); // je teste en ukrainiens

    $ukranian = new M;
    $ukranian->test(); // je teste en français



?>