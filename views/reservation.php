<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg1">
    <section class="header-section">
        <?php include '../templates/header.php' ?>
    </section>
    <section class="content-section">
        <h1 class="main-header">Reserve Seats</h1>
        <div class="reserve-container">
        <div class="signup-form">
                <form action="" method="post">
                    <label for="username">Name</label>
                    <input type="text" name="username" id="username" onkeyup="usernameVal()">
                    <span id="username-error" class="error-text"></span>
                    <label for="password">Transport Company</label>
                    <input type="text" name="text" id="text" onkeyup="companyVal()">
                    <span id="password-error" class="error-text"></span>
                    <label for="nic">NIC</label>
                    <input type="text" name="nic" id="nic" onkeyup="nicVal()">
                    <span id="nic-error" class="error-text"></span>
                    <label for="password">Destination</label>
                    <input type="text" name="destination" id="destination" onkeyup="destiVal()">
                    <span id="password-error" class="error-text"></span>
                    <label for="password">Date</label>
                    <input type="date" name="date" id="date" onkeyup="dateVal()">
                    <span id="password-error" class="error-text"></span>
                    <label for="password">Reservation Time</label>
                    <input type="time" name="time" id="time" onkeyup="timeVal()">
                    <span id="password-error" class="error-text"></span>
                    <button type="submit" onclick="reserve()" style=" margin-right:20px;">Reserve Seat</button>
                </form>
            </div>
            <h1></h1>
        </div>
    </section>
    <section class="footer-section">
        <?php include '../templates/footer.php' ?>
    </section> 
</body>
</html>