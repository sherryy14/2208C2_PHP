<?php 

include 'config.php';

$city = $_POST['cityVal'];
$query = "SELECT * FROM `ajax` WHERE city = '$city'";
$res = mysqli_query($conn,$query);

while($row= mysqli_fetch_assoc($res)){
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['city']."</td>
        </tr>";
}

?>