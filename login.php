<?php 
session_start();

include "connection.php";

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}


if (isset($_POST['login'])) {
    $email = htmlspecialchars($_POST['Email']);
    $wachtwoord = htmlspecialchars($_POST['password']);

    $sql = "SELECT `ID`, `Email`, `Username`, `Password`, `Access_level`  FROM accounts WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    try {
        while ($row = $result->fetch_array()) {
            //result is in row
            $passwordreturn = password_verify($password, $row['Password']);
            $role = $row['Access_level'];

            if ($passwordreturn) {
                if ($role == 1 || $role == 2) { 
                $_SESSION['email'] = $email;
                $_SESSION['access_level'] = $row['Access_level'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['sessionid'] = session_id();
                alert('Je bent ingelogd!');
                header( "Refresh:0.1; url=index.php", true, 303);
                }
            }
        }
    } catch (Exception $e) {
        $e->getMessage();
    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
<form method="post" action="login.php">
        <label>E-mail: </label>
        <input  type="text" required name="Email" placeholder="typ hier je E-mail">
        <br>
        <label>Wachtwoord: </label>
        <input type="password" required name="password" placeholder="typ hier je wachtwoord">
        <br>
        <input type="submit" name="login" value="Login">
        <br>
    </form>
</body>
</html>