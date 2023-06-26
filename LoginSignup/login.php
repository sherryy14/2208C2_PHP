<?php
include 'config.php';
session_start();

if(isset($_SESSION['user'])){
    header("Location: index.php");
}


if (isset($_POST['login'])) {
    $username = $_POST['uname'];
   
    $password = $_POST['pass'];



    $query=  "SELECT * FROM  `users` WHERE username = '{$username}' AND passowrd = '{$password}'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        $_SESSION['user'] = $username;
        header("location: index.php");
    }else{
        $failed = "Username or password incorrect";
    }


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-3">Login</h1>
        <form class="row g-3" method="post">
            <div class="col-md-4">
                <label for="validationDefaultUsername" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                    <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" name='uname' required>
                </div>
            </div>

            
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Password</label>
                <input type="password" class="form-control" name='pass' id="validationDefault01" name='pass' required>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" name='login' type="submit">Submit form</button>
                <p class="text-danger"> <?php echo @$failed; ?> </p>
            </div>
        </form>
    </div>
</body>

</html>