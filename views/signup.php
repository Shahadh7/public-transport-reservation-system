<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section class="header-section">
        <?php include '../templates/header.php' ?>
    </section>
    <section class="content-section">
        <h1 class="main-header">Sign up</h1>
        <div id="signup-div">
            <div class="signup-form">
                <form action="" method="post">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                    <label for="nic">NIC</label>
                    <input type="text" name="nic" id="nic">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
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