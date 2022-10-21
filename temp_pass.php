<?php
session_start();
include "connection.php";

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

if (isset($_POST['Wachtwoord'])) {
    $email = htmlspecialchars($_SESSION['emailchecker']);
    $wachtwoord = htmlspecialchars($_POST['password']);

    $sql = "SELECT `ID`, `Email`, `Username`, `Password`, `Access_level`, `is_active` FROM accounts WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    try {
        while ($row = $result->fetch_array()) {
            //result is in row
            $role = $row['is_active'];
            if ($wachtwoord == $_SESSION['temppass']) {
                if ($role == 1) {
                    $_SESSION['email'] = $email;
                    $_SESSION['access_level'] = $row['Access_level'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['sessionid'] = session_id();
                    alert('Je bent ingelogd!');
                    header("Refresh:0.1; url=index.php", true, 303);
                }
            }
        }
    } catch (Exception $e) {
        $e->getMessage();
    }
} else {
    $temppass = bin2hex(openssl_random_pseudo_bytes(4));
    $_SESSION['emailchecker'] = $_POST['checker'];
    $_SESSION['temppass'] = $temppass;

    alert($temppass);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="login/login.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <form method="post" id="loginform" action="temp_pass.php">
        <div id="formcontent">
            <h3> Tijdelijk wachtwoord voor Twirling Team Sparkle</h3>
            <br> <br> <br>
            <div class="form-center">
                <img id="icon" src="images/password.png" alt="Wachtwoord:">
                <input id="loginput" type="password" required name="password" placeholder="Wachtwoord">
                <br> <br> <br>
            </div>
        </div>
        <div id="bottomline">
            <div class="form-center">
                <input type="submit" id="button" name="Wachtwoord" value="login">
                <br>
            </div>
        </div>
    </form>
</body>

</html>