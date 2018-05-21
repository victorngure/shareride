<?php
 include('DBconnect.php');
 if(isset($_POST["submit"])){ 
    $origin = $_POST["origin"];
    $destination = $_POST["destination"];
    $fare = $_POST["fare"];
    $vehicleType = $_POST["vehicleType"];
    $userId = $_SESSION['userId']; 

    $query = "INSERT INTO rides (origin, destination, fare, vehicleType, userId) VALUES ('$origin',$destination,'$fare','$vehicleType', '$userId')";
    $result= mysqli_query($connection,$query);
    if($result){
        echo "Ride added successfully";
    }
    else{
        echo "Ride not added";
    }
 }

?>