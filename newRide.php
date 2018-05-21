<?php
session_start();
include('DBconnect.php');
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origin = $_POST["origin"];
    $destination = $_POST["destination"];
    $fare = $_POST["fare"];
    $vehicleType = $_POST["vehicleType"];
    $seatsAvailable = $_POST['seatsAvailable'];
    $driver = $_POST['driver'];
    $userId = $_SESSION['userId'];

    $query = "INSERT INTO rides (origin, destination, fare, vehicleType, seatsAvailable, driver, userId) VALUES ('$origin','$destination', $fare, '$vehicleType', $seatsAvailable, $driver, $userId)";
    $result= mysqli_query($connection,$query);
    if($result){
        echo "Ride added successfully";
    }
    else{
        echo "Ride not added" . mysqli_error($connection);
    }
 }
 else{
     echo "submit not set";
 }

?>