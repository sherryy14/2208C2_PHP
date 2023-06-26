<?php 

// setcookie(name, value, expire, path, domain, secure, httponly);



// setcookie('product','Vivo Y33s', time()+60);
setcookie('users','new user', time()+3600*24*30);

// // echo time();


echo $_COOKIE['product'];
echo $_COOKIE['users'];
?>