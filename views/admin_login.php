<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section class="header-section">
        <?php include '../templates/admin-header.php' ?>
    </section>
    <section class="content-section">
        <h1 class="main-header">Admin Login</h1>
        <div class="login-panel">
            <form action="" method="post">
                <label for="admin-username">Username</label>
                <input type="text" name="admin-username" id="admin-username">
                <label for="admin-password">Password</label>
                <input type="password" name="admin-password" id="admin-password">
                <button type="submit" onclick="adminLogin()">login</button>
            </form>
        </div>
    </section>
    <section class="footer-section">
        <?php include '../templates/footer.php' ?>
    </section> 
    <script src="../js/auth.js"></script>

</body>
</html>