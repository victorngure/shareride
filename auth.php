<?php
session_start();
if(!isset($_SESSION["userId"])){
header("Location: login.html");
exit(); }
?>