<?php
require('DBconnect.php');
if (isset($_POST['email']) && isset($_POST['password'])){
    $email = ($_POST['email']);
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    $mobile = ($_POST['password']);
    $query = "INSERT into `users` (userName, userPassword, userEmail, userMobile)
    VALUES ('$username', '".md5($password)."', '$email', '$mobile')";
    $result = mysqli_query($connection,$query);
    if($result){
         header("Location: login.html");
    }
}
?>