
<?php 
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

// if(isset($_POST['logout'])){
//     session_unset();
//     session_destroy();

//     header("Location: login.php");
// }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard <?php echo "User:" .$_SESSION['user']?></h1>

    <a href="logout.php" class='btn btn-secondary'>Logout</a>
    <!-- <form method="post">
        <button type="submit" name='logout'>Logout</button>
    </form> -->

</body>
</html>