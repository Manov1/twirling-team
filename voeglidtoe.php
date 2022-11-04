<?php 
session_start();

include "connection.php";

$first_name = htmlspecialchars("firstname");
$last_name = htmlspecialchars("lastname");
$email = htmlspecialchars("test@gmail.com");
$adress = htmlspecialchars("address");
$city = htmlspecialchars("city");
$zipcode = htmlspecialchars("zipcode");


$sql = "INSERT INTO `members` (`First_name`, `Last_name`, `Email`, `Address`, `City`, `zipcode`) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $first_name, $last_name, $email, $adress, $city, $zipcode);
$result = $stmt->execute();
$realResult = true;
// header( "Refresh:0.1; url=login.php", true, 303); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg lid toe</title>
</head>
<body>
    
</body>
</html>