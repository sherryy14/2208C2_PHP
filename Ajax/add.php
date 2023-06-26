<?php 
$conn = mysqli_connect("localhost","root",'','2208c2');

$name = $_POST['stdName'];
$email = $_POST['stdEmail'];
$city = $_POST['stdCity'];

$insert = "INSERT INTO `records` (`name`, `email`, `city`) VALUES ('$name', '$email', '$city')";
$res = mysqli_query($conn, $insert);

?>