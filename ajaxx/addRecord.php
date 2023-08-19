<?php 
include 'config.php';

$name = $_POST['stdName'];
$email = $_POST['stdEmail'];
$city = $_POST['stdCity'];

$query = "INSERT INTO `ajax` ( `name`, `email`, `city`) VALUES ( '$name', '$email', '$city')";
$res = mysqli_query($conn,$query);

?>