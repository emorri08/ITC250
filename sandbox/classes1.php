<?php
//classes1.php

$people[] = new Person('Lennon','John',44);//dead people cant sue you (want to know fake data from real data)
$people[] = new Person('McCartney','Paul',46);
$people[] = new Person('Harrison','George',66);
$people[] = new Person('Starr','Ringo',35);


/*
$person->FirstName
$person->LastName
$person->Age
*/
foreach($people as $person){
    echo "<p>My name is $person->FirstName $person->LastName and I'm $person->Age years old.</p>";
}

/*
echo '<pre>';
var_dump($myPerson);
echo '</pre>';
*/


//echo $myPerson->Age;

class Person
{
    public $LastName = '';
    public $FirstName = ''; // default value of an empty string
    public $Age = 0; //default value of an empty number

    public function __construct($LastName,$FirstName,$Age){
        $this->LastName = $LastName;
        $this->FirstName = $FirstName;
        $this->Age = $Age;

    }//end Constructor

}//end Person class