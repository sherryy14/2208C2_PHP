<?php
include 'config.php';

session_start();
if (isset($_SESSION['user']) && $_SESSION['user'] == true) {
    header("location:index.php");
    exit;
}

if (isset($_POST["submit"])) {
    $Uname = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $passquery = "SELECT `Password` FROM `ammar` WHERE  `Username`= '{$Uname}'";
    $passresult = mysqli_query($conn, $passquery);
    $passfetch = mysqli_fetch_assoc($passresult);

    $query = "SELECT * FROM `users` where `Username`= '{$Uname}' AND `Email`= '{$email}'";
    
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        if (password_verify($password, $passfetch['Password'])) {
            echo "Login";
            $_SESSION['user'] = true;
            header("location:index.php");
        } else {
            echo "Error";
        }

    } else {
        echo "<script>
    alert('ERROR')
</script>";
    };
};
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>LogIn</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<style>
    body {
        background-color: lightslategray;
    }

    #a1 {
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }
</style>

<body>
    <div id="a1">
        <form method="post">
            <input type="text" name="username" id="Uname" placeholder="Enter Your User Name" required><br><br>
            <input type="email" name="email" id="email" placeholder="Enter Your Email" required><br><br>
            <input type="password" name="password" id="pass" placeholder="Enter Your Password" maxlength="8" required><br><br>
            <div>
                <input type="checkbox" id="check">
                <label>Show Password</label>
            </div>
            <br>
            <input type="submit" name="submit" id="btn" value="LogIn">
            <a href="signup.php">Don't have an account?</a>
        </form>
    </div>
    <script>
        let a = document.getElementById("pass");
        document.getElementById("check").addEventListener('change', () => {
            if (check.checked) {
                a.type = "text";
            } else {
                a.type = "password";
            };
        });
    </script>
</body>

</html>