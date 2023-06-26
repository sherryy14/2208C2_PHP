<?php 

$pass = 'admin';

$md = md5($pass);

echo "Original Password: $pass - Encrypted MD5 Password: $md <br>";


$sha = sha1($pass);

echo "Original Password: $pass - Encrypted SHA1 Password: $sha <br>";

// BLOW Fish 

// $pass = $_POST['pass'];


$blowFish = password_hash($pass, CRYPT_BLOWFISH);

echo "Original Password: $pass - Encrypted BLOWFISH Password: $blowFish <br>";


if(password_verify($pass,$blowFish)){
    echo "Login";
}else{
    echo "Error";
}

echo "<br><br>";

$pattern = "/[a-z0-9]{5,10}/i";
$input ="AaBa1";

if(preg_match($pattern,$input)){
    echo "Matched";
}else{
    echo "Not Matched";
}

?>