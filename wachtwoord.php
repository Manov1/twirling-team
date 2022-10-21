<?php
session_start();
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
                <img id="icon" src="images/mail.png" alt="E-mail:">
                <input id="loginput" type="text" required name="checker" placeholder="E-mail">
                <br> <br> <br>
            </div>
        </div>
        <div id="bottomline">
            <div class="form-center">
                <input type="submit" id="button" name="submit" value="Verstuur">
                <br>
            </div>
        </div>
    </form>
</body>

</html>