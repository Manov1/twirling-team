<!DOCTYPE html>
<html lang="nl">
<?php
include "connection.php";

$sql = "SELECT `First_name`, `Last_name`, `Email`, `Address`, `City`, `zipcode` FROM members";
$result = $conn->query($sql);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <title>[7.1] 🌀 Twirling Team Sparkle</title>

    <link rel="stylesheet" href="sidebar/sidebar.css">
    <link rel="stylesheet" href="leden/leden.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include 'sidebar/sidebar.php';
    ?>
    <div class="leden-container">
        <div class="leden-title-container">
            <div class="text-container">
                <h1 class="leden-title">Leden</h1>
                <p class="leden-text">Een lijst van leden met naam, telefoonnummer en email</p>
            </div>
            <div class="leden-button-container">
                <a href="voeglidtoe.php" type="button" class="leden-button">Add user</a>
            </div>
        </div>
        <div class="flex-container">
            <div class="overflow-container">
                <div class="padding-container">
                    <div class="table-container">
                        <table id="leden" class="leden-table">
                            <thead>
                                <tr>
                                    <th scope="col" class="table-naam">Naam</th>
                                    <th scope="col" class="table-email">Email</th>
                                    <th scope="col" class="table-eind-datum">Eind-datum abbonement</th>
                                    <th scope="col" class="table-info">
                                        <span class="sr-only">Info</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- foreach -->
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td class="table-naam-text"><?php printf($row["First_name"]); ?> <?php printf($row["Last_name"]); ?></td>
                                    <td class="table-email-text"><?php printf($row["Email"]); ?></td>
                                    <td class="table-eind-datum-text">lindsay.walton@example.com</td>
                                    <td class="table-info-text">
                                        <a href="#" class="table-info-button">Info<span class="sr-only">, <?php printf($row["First_name"]); ?> <?php printf($row["Last_name"]); ?></span></a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                <!-- end foreach -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include 'sidebar/sidebar-end.php'; ?>
</body>

</html>