<?php 
include 'config.php';
$id = $_GET['id'];

$query = "DELETE FROM `record` WHERE id = '{$id}'";
$result = mysqli_query($conn, $query);

if($result){
    header('Location: index.php');
}

?>