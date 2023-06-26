<?php 

$conn = mysqli_connect('localhost','root','','img');

if(isset($_POST['btn'])){
    $image = $_POST['img'];

    $q = "INSERT INTO `imgtable` ( `img`) VALUES ('$image')";
    $r = mysqli_query($conn, $q);

    if($r){
        echo "Inserted";
    }else{
        echo "Not Inserted";

    }

}


?>

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
        <input type="file" name="img" id="">
        <input type="submit" value="Submit" name='btn'>
    </form>
 
    <?php 
    $fetch = "SELECT * FROM imgTable";
    $fr = mysqli_query($conn,$fetch);
    while($row = mysqli_fetch_array($fr)){

   
    ?>

    <img src="image/<?php  echo $row['img']?>" alt="">

    <?php  }?>
  

</body>
</html>