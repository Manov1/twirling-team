<?php
$servername = "localhost";
$username = "twirling_team_sparkle";
$password = "xw5gUB2uyAHLPukeNapo";

$conn = new mysqli($servername, $username, $password, $username);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>