<?php
require('DBconnect.php');
session_start();
if (isset($_POST['email']) && isset($_POST['password'])){
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $query = "SELECT * FROM `users` WHERE userEmail='$email' and userPassword='".md5($password)."'";
    $result = mysqli_query($connection,$query) or die(mysqli_error($connection));
    $rows = mysqli_num_rows($result);
    $rs = mysqli_fetch_array($result);
    $_SESSION['userId']=$rs['userId'];
    $_SESSION['userEmail'] = $rs['userEmail'];
    $_SESSION['userName'] = $rs['userName'];
    if($rows==1){
        header("Location: index.php");
    }
    else{
        echo "<p>Username/password is incorrect.</p>";
    }
}
else{
    echo "<p> Email | Password not set </p>";
}
    ?>  