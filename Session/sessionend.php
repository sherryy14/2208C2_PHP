<?php 
// farz 
session_start();

echo $_SESSION['username'];
echo $_SESSION['useremail'];

if(isset($_POST['logout'])){

    if(isset($_SESSION['username']) && isset($_SESSION['useremail'])){
        session_unset();
        session_destroy();

        header("Location: session.php");

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
    <h1>Home Page</h1>
    <form method="post">
        <input type="submit" value="Logout" name='logout'>
    </form>
</body>
</html>