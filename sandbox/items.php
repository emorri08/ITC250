<?php
//items.php

$myItem = new Item(1, 'taco','our tacos are awesome',4.99);
$myItem->addExtra('Sour Cream');
$myItem->addExtra('Cheese');
$myItem->addExtra('Guacamole');
$myItem->addExtra('Salsa');

//our to go bag of food items
$items[] = $myItem;

$myItem = new Item(2, 'hot dog', 'we promise our hot dogs are not made of lips and assholes', 5.99);
$myItem->addExtra('Ketchup');
$myItem->addExtra('Sauerkraut');
$myItem->addExtra('Onions');
$myItem->addExtra('Black Olives');

$items[] = $myItem;

$myItem = new Item(3, 'sundae', 'Our sundaes have extra nuts', 7.55);
$myItem->addExtra('Chocolate Syrup');
$myItem->addExtra('Strawberry Syrup');
$myItem->addExtra('Tons O Nuts');
$myItem->addExtra('Cherries');

$items[] = $myItem;

$cost = 0;
$numOfItems;
foreach($items as $item)
{
    $cost += $item->Price;
    $numOfItems++;
    echo "<p>I ordered a $item->Name which costs $item->Price.</p>";
    echo "
        <p>My extras are as follows:</p>
        <ul>";

        foreach($item->Extras as $extra)
        {
            echo "<li>$extra</li>";
        }

    echo "</ul>";
}

echo "<p>I ordered $numOfItems items and it cost $cost.</p>";


// echo '<pre>';
// var_dump($items);
// echo '</pre>';

class Item{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Extras = array();


    public function __construct($ID,$Name,$Description,$Price){
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
    }//end constructor

    public function addExtra($extra){

        $this->Extras[] = $extra;

    }//end addExtra
}//end item class