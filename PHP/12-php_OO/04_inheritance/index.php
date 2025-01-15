<?php

    class Person {
        public $first_name;
        public $last_name;
        public $sexe;

        public function __construct($first_name, $last_name, $sexe) {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->sexe = $sexe;
        }

        protected function comeToSchool () {
            echo "Je viens tous les jours à l'école";
        }

        public function presentation() {
            echo "Hello, je m'appel $this->first_name";
        }

    }

    class Pupil extends Person {

        
        private $schoolName;
        
        public function __construct($first_name, $last_name, $sexe, $schoolName) {
            parent::__construct($first_name, $last_name, $sexe);
            $this->schoolName = $schoolName;
        }

        public function doHomeWorks() {
            echo "Je fais mes devoirs à la maison <br>";
        }

        public function getSchoolName() {
            return $this->schoolName;
        }

    }


    class Teacher extends Person {

        private $listStudents = [];


        public function __construct($first_name, $last_name, $sexe, $listStudents) {
            parent::__construct($first_name, $last_name, $sexe);
            $this->listStudents = $listStudents;
        }

        public function correctHomeWorks() {
            echo "Je fais la correction des devoirs à la maison<br>";
        }

        public function presentationPupils() {
            foreach ($this->listStudents as $student) {
                echo $student . "<br>";
            }
        }

    }

    $student = new Pupil("Ihor", "Shemetttttttt", "Homme", "AFPA");
    $teacher = new Teacher("Samih", "Habbani", "Homme", ["Ihor", "Kendall", "Marc"]);

    echo "<pre>";
    var_dump(get_class_methods($student));
    echo "</pre>";

    $student->doHomeWorks();
    $student->presentation();
    echo $student->getSchoolName();

    $teacher->presentationPupils();

?>