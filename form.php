


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <input type="text" name="username" id="" >
        <input type="text" name="age" id="">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>


<?php 
    // serverName, connectionName, Password, DatabaseName
   $conn =  mysqli_connect("localhost", 'root', '','practiceDB');

   if($conn){
     echo "Connected";
    }else{
       echo "Not Connected";

   }

   if(isset($_POST['submit'])){
       
       $fname = $_POST['username'];
       $age = $_POST['age'];
       
       $query = "INSERT INTO `practicetable` ( `name`, `age`) VALUES ( '$fname', '$age')";
                            // Connection, Query 
        $result = mysqli_query($conn, $query);
        
        if($result){
            echo "Data Inserted";
        }else{
            
            echo "Data Not Inserted";
        }

    }else{
        echo "Error";
    }


?>