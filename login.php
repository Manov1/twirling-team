<?php
session_start();

include "connection.php";

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}


if (isset($_POST['login'])) {
    $email = htmlspecialchars($_POST['Email']);
    $wachtwoord = htmlspecialchars($_POST['password']);

    $sql = "SELECT `ID`, `Email`, `Username`, `Password`, `Access_level`, `is_active` FROM accounts WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    try {
        while ($row = $result->fetch_array()) {
            //result is in row
            $passwordreturn = password_verify($wachtwoord, $row['Password']);
            $role = $row['is_active'];
            if ($passwordreturn) {
                if ($role == 1) {
                    $_SESSION['email'] = $email;
                    $_SESSION['access_level'] = $row['Access_level'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['sessionid'] = session_id();
                    alert('Je bent ingelogd!');
                    header("Refresh:0.1; url=index.php", true, 303);
                }
            } else {
                alert("wachtwoord fout");
                if ($row['Email'] == $email) {
                    alert("email klopt");
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
    <link rel="stylesheet" href="login/login.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <form method="post" id="loginform" action="login.php">
        <div id="formcontent">
            <h3> Ledenadministratie systeem Twirling Team Sparkle </h3>
            <br> <br>
            <div>
            <img id="icon" src="images/mail.png" alt="E-mail:">
            <input id="loginput" type="text" required name="Email" placeholder="E-mail">
</div>
            <br>
            <img id="icon" src="images/password.png" alt="Wachtwoord:">
            <input id="loginput" type="password" required name="password" placeholder="Wachtwoord">
        </div>
        <div id="bottomline">
            <input type="submit" name="login" value="Login">
            <br>
        </div>
    </form>
</body>

</html>