<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg5">
    <section class="header-section">
        <?php include '../templates/header.php' ?>
    </section>
    <section class="content-section">
        <h1 class="main-header">Create A New Account</h1>
        <div id="signup-div">
            <div class="signup-form">
                <form action="" method="post">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" onkeyup="usernameVal()">
                    <span id="username-error" class="error-text"></span>
                    <label for="nic">NIC</label>
                    <input type="text" name="nic" id="nic" onkeyup="nicVal()">
                    <span id="nic-error" class="error-text"></span>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" onkeyup="passVal()">
                    <span id="password-error" class="error-text"></span>
                    <button type="submit" onclick="signup()" style=" margin-right:20px;">Sign up</button>
                </form>
            </div>
        </div>
    </section>
    <section class="footer-section">
        <?php include '../templates/footer.php' ?>
    </section> 
    <script src="../js/auth.js"></script>
</body>
</html>