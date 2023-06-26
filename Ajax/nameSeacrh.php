<?php 

$conn = mysqli_connect("localhost","root",'','2208c2');

$filter = $_POST['name'];


$query = "SELECT * FROM `records` WHERE `name` LIKE '$filter%'";
$res = mysqli_query($conn,$query);

$output = '';
while($row = mysqli_fetch_array($res)){
    $output .= "
    <tr>
    <td>$row[0]</td>
    <td>".ucwords($row[1])."</td>
    <td>$row[2]</td>
    <td>".ucwords($row[3])."</td>
    <td>$row[4]</td>
    
</tr>
    ";
}

echo $output;

?>