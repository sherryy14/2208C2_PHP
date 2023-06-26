<?php 
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['useremail'])){
    header('Location: sessionend.php');
}

if(isset($_POST['login'])){

     $name = $_POST['name'];
     $email = $_POST['email'];

    $_SESSION['username'] =  $name;
    $_SESSION['useremail'] =  $email;

    header('Location: sessionend.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
    <h1>Login Page</h1>

    <form method="post">
        <input type="text" name="name" id="" placeholder="Name">
        <input type="text" name="email" id="" placeholder="Email">
        <input type="submit" value="Login" name='login'>
    </form>
</body>
</html>