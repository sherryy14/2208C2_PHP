<?php 
include 'config.php';

if(isset($_POST["submit"])){
    $name = $_POST['name'];
    $Uname = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $date = $_POST['bd'];
    $gender = $_POST['gender'];
    $query="SELECT * FROM `users` where `Username`= '{$Uname}' OR `Email`= '{$email}' AND `password`= '{$pass}'";
    $result=mysqli_query($conn,$query);
    $res1=mysqli_num_rows($result);
   
    if($res1>0){
        echo"<script>
        alert('Account Exist')
    </script>";
    }else{
        $blowfish = password_hash($pass, CRYPT_BLOWFISH);
        $insertQuery="INSERT INTO `users` (`Name`, `Username`, `Email`, `Password`, `DateOfBirth`, `Gender`)
         VALUES ('$name', '$Uname', '$email', '$blowfish', '$date', '$gender')";
        $insertResult=mysqli_query($conn,$insertQuery);
        if($insertResult){
            echo"<script>
        alert('your account is created')
    </script>";
            // $sec="your account is created";
            echo"
            <script>
             setTimeout(()=>{
                window.location.href='login.php'
            }, 1000);
            </script>";
           }else{
            echo"<script>
        alert('your account is not created')
    </script>";
            // $reg="your account is not created";
           } 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>SignUp</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<style>
        body{
        background-color: lightsteelblue;
    }
    #a1{
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }
</style>
<body>
    <div id="a1">
    <form method="post">
        <input type="text" name="name" id="name" placeholder="Enter Your Name" required><br><br>
        <input type="text" name="username" id="Uname" placeholder="Enter Your User Name" required><br><br>
        <input type="email" name="email" id="email" placeholder="Enter Your Email" required><br><br>
        <input type="password" name="password" id="pass" placeholder="Enter Your Password" maxlength="8" required><br><br>
        <div>
        <input type="checkbox" id="check">
        <label>Show Password</label></div>
        <br>
        <input type="date" name="bd" id="bd" placeholder="Enter Your Date Of Birth" required><br><br>
        <label>M</label>
        <input type="radio" name="gender" id="gender" value="M" required>
        <label>F</label>
        <input type="radio" name="gender" id="gender" value="F" required><br><br>
        <input type="submit" value="SignUp" name="submit" id="btn">
        </form>
        </div>
        <script>
            document.getElementById("btn").addEventListener("click",()=>{
                let name = document.getElementById("name").value;
                let username = document.getElementById("Uname").value;
                let email = document.getElementById("email").value;
                let password = document.getElementById("pass").value;
                let nameRE =  /[A-Z]{1}[a-z]{3,}/;
                let UnameRE =  /[A-Z]{1}[a-z]{3,}[0-9]{3,}/;
                let emailRE =  /[a-zA-Z0-9]{5,}@[a-z]{2,7}([\.a-z]{3,4}[\.a-z]{2,3})/;
                let passwordRE =  /[A-Za-z]{5}[0-9]{3}/;
               let nameres = name.match(nameRE);  
               let Unameres =  username.match(UnameRE);
               let emailres =  email.match(emailRE);  
               let passres =  password.match(passwordRE);
               if (nameres,Unameres,emailres,passres) {
                    alert("OK! Your Input Is Valid");
               } else {
                alert("Your Input Is Not Valid");
               }  
            });

        let a = document.getElementById("pass");
                    document.getElementById("check").addEventListener('change', () => {
                        if (check.checked) {
                            a.type="text";
                        }else{
                            a.type="password";
                        }
                    }); 

        </script>
</body>
</html>