<?php
include('auth.php');
include('DBconnect.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $userId = $_SESSION['userId'];
    $query = "INSERT INTO passengers (rideId, userId) VALUES ($id, $userId)";
    $result = mysqli_query($connection, $query);
    if($result){
        $secQuery = "SELECT seatsAvailable FROM rides WHERE rideId = $id";
        $secResult = mysqli_query($connection, $secQuery);
        while($row = $secResult->fetch_assoc())
            $seatsAvailable = $row['seatsAvailable'];
            if ($seatsAvailable > 0 ){
                $newSeats = $seatsAvailable - 1;
                $thirQuery = "UPDATE rides SET seatsAvailable = $newSeats WHERE rideId = $id";
                $thirResult = mysqli_query($connection, $thirQuery);
                echo "Ride booked successfully, remaining seats for ride " .$id ." are " .$newSeats;
                sendEmail();
            }
            else{
                echo "There are no available seats to book";
            }
            
    }
}
function sendEmail(){
    $userEmail = $_SESSION['userEmail'];
    $to = $userEmail;
    $subject = "Shareride booking";
    $txt = "You have successfully booked a ride at shareride!";
    $from = "victorngure@gmx.com";
    $headers = "From: " . $from;
    mail($to,$subject,$txt,$headers);
}
?>