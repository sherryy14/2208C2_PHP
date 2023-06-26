<?php 

$conn = mysqli_connect("localhost","root",'','2208c2');

$order = $_POST['nameVal'];


$query = "SELECT * FROM `records` ORDER BY `name` $order";
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