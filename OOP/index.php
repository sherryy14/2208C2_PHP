<?php 

class Animal {
    // properties 
    public $name;
    public $gender;
    public $diet;
    public $category;


    // constructor function calls / invoke automatically 
    function __construct($name,$gender,$diet,$category){
        $this->name = $name;
        $this->gender = $gender;
        $this->diet = $diet;
        $this->category = $category;
    }

    // methods 
    function walk(){
        echo "$this->name is $this->diet animal and can walk <br><br>";
    }
    function fly(){
        echo "$this->name is $this->diet animal and can fly <br><br>";
    }
    function crawl(){
        echo "$this->name is $this->diet animal and can crawl <br><br>";
    }


}

$a1 = new Animal('Cat','Female','Carnivoure','Domestic');
$a1->walk();

$a2 = new Animal('Horse','Male','Herbivoure','Domestic');
$a2->walk();

$a3 = new Animal('Crow','Male','Omnivoure','Domestic');
$a3->walk();
$a3->fly();

// insect is a child class and animal is a parent class 
// insect inherts animal 
class Insects extends Animal{
    public $feet;
    public $eye;
    public $wing;

    function __construct($feet,$eye,$wing,$name){
        $this->feet = $feet;
        $this->eye = $eye;
        $this->wing = $wing;
        $this->name = $name;
    }
    function sleeping(){
        echo "$this->name animals are not able to sleep. It has $this->feet feet(s), $this->eye eye, and $this->wing wings <br>";
    }
}

$i1 = new Insects(4, 2, 2,"Ant");
$i1->sleeping();
$i1->walk();
$i2 = new Insects(8, 4, 4,"Cockroch");
$i2->sleeping();
$i2->fly();

echo $i1->name;



?>