<?php 
session_start();

include "connection.php";

if (!(isset($_SESSION['sessionid']) || $_SESSION['sessionid'] == session_id() || $_SESSION['access_level'] == 1)) {
  header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    
</body>
</html>