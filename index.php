<?php

$num = 2.4234;

echo "<h1>Index file</h1>";

echo 'This is number: ' . $num;

echo "<p>This is number:  $num </p>";

// datatypes: int float string boolean null 
// check datatype 
echo var_dump($num);
echo "<br><br>";

$name = 'Adnan Hasnain';

echo "<br>The length of $name is " . strlen($name);

echo " <br>The word count of $name is " . str_word_count($name);

echo " <br>The reverse order of $name is " . strrev($name);

$x = -9;
$y = 9.1;
echo "<br><br>";
echo pi();
echo "<br><br>";
echo abs($x);
echo "<br><br>";
echo sqrt($y);
echo "<br><br>";
echo rand(0, 10);
echo "<br><br>";
echo round($y);
echo "<br><br>";
echo floor($y);
echo "<br><br>";
echo ceil($y);


// conditional statements 

// x == 2 NOT AND y ==3 ----  NAND
echo "<br><br>";

$num1 = 5;
$num2 = 6;
$num3 = 6;

//  0 xor 1 = 1 
//  1 xor 0 = 1 


if (($num1 == $num2 xor $num2 == $num3 xor $num1 > $num3) and $num1 != $num2) {
    echo "Equal<br>";
} else {
    echo "Not Equal<br>";
}

//  1 and 1 = 1
if ($num1 < $num2 and $num2 == $num3) {
    echo "$num1 is less than $num2<br>";
} else {
    echo "$num1 is greater than $num2<br>";
}
// 5 + 6 ; 
// $num1 = $num1 + $num2;

$num1 += $num2;

echo $num1;

$kd = 9;

if ($kd >= 10) {
    echo "<br>OP Pro Player Max";
} else if ($kd > 8 and $kd < 10) {
    //     echo "<script>
    //     alert('OP Pro Player')
    // </script>";
    echo "<br>OP Pro Player";
} else if ($kd > 4 and $kd <= 8) {
    echo "<br>Pro Player";
} else if ($kd > 1 and $kd <= 4) {
    echo "<br>Noob Player";
} else {
    echo "<br>BOT";
}


define("FullName", "Muhammad Maaz");
echo FullName;

echo "<br><br>";
$language = "PHP";

switch ($language) {
    case 'PHP':
        echo "Hello PHP";
        break;
    case 'C':
        echo "Hello C";
        break;
    case 'C++':
        echo "Hello C++";
        break;
    case 'Python':
        echo "Hello Python";
        break;
    case 'JavaScript':
        echo "Hello JavaScript";
        break;
    default:
        echo "No More Hello!";
        break;
}

echo "<br><br>";

for ($i = 0; $i <= 10; $i++) {
    if ($i == 5) {
        // break;
        continue;
    }
    echo "Loop: $i<br>";
}

echo "<br><br>";

for ($i = 0; $i <= 5; $i++) {
    for ($j = 0; $j <= 5; $j++) {
        echo "*";
    }
    echo "<br>";
}

$w = 5;

while ($w <= 10) {
    echo "$w<br>";
    $w++;
}

$y = 5;
do {
    echo "Do: $y<br>";
    $y++;
} while ($y <= 10);


$age = array(23, 45, 34, 56, 34, 12);

$colors = ["Red", "Black", "Gold", "Pink", "Yellow"];
rsort($colors);
for ($i = 0; $i < sizeof($age); $i++) {
    echo "<h2>Age: $age[$i]</h2>";
}

foreach ($colors as $item) {
    echo "COLORS: $item<br>";
}

echo "<br>";

echo "<pre>";
print_r($age);
echo "</pre>";


echo "<br>";
$age[0] = 100;
// arrayname as indexName => ValueName 
// 0 (index) => 23 (value) 
foreach ($age as $key => $value) {
    echo "Age at index $key => $value<br>";
}

echo "$age[0]";
// Multi Dimensional Array 
$arr = [
    [],
    [],
    [],
    []
];
$arr1 = array(
    array(),
    array(),
    array(),
    array()
);
echo "<br>";
echo "<br>";

$std = [
    "Maaz" => 23,
    "Ahmed" => 25,
    "Owais" => 20,
    "Huda" => 21,
    "Ammar" => 22
];
arsort($std);
foreach ($std as $a => $i) {
    echo "Name : $a  And Age: $i <br>";
}

$stdInfo = [
    "std01" => ["Maaz", 23, "DISM", "Prime 2.0"],
    "std02" => ["Ahmed", 20, "DISM", "Prime 2.0"],
    "std03" => ["Yamin", 22, "DISM", "Prime 2.0"],
    "std04" => ["Kashan", 36, "DISM", "Prime"]
];

foreach ($stdInfo as $k => $v) {
    echo "Std ID: $k and ";
    echo "<pre>";
    print_r($v);
    echo "</pre>";
};


function fullname(){
    echo "Ali Khan";
}

fullname();

function sum($x, $y){
    $z = $x + $y;
    echo "Addition of $x and $y = $z<br>";
}

sum(4,5);

function info($name= 'Smith', $age=20, $city = "Karachi"){
    echo "Name: $name <br>Age:  $age <br> City: $city<br>";
}
info();

$a = 5;
function cal(){
    GLOBAL $a;
    $b= 5;
    $c = $a+$b;
    echo "GLOBAL C: $c<br>";
}
cal();

function incre(){
   static $i = 0;
    $i++;
    echo "Increment: $i<br>";
}

incre();
incre();
incre();
incre();
incre();

function add(){
    return 3+7;
}

add();

echo add();

?>