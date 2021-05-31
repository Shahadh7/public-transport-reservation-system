<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg6" onload="getUserData()">
    <section class="header-section">
        <?php include '../templates/header.php' ?>
    </section>
    <section class="content-section">
        <h1 class="main-header">User Profile</h1>
        <div class="profile-container">
        <form action="" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" onkeyup="usernameVal()">
            <span id="username-error" class="error-text-prof"></span>
            <label for="nic">NIC</label>
            <input type="text" name="nic" id="nic" disabled style=" color:black">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Add an email address" onkeyup="emailVal()">
            <span id="email-error" class="error-text-prof" ></span>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" placeholder="Add a phone number" onkeyup="phoneVal()">
            <span id="phone-error" class="error-text-prof"></span>
            <label for="old_password">Old Password</label>
            <input type="password" name="old_password" id="old_password" placeholder="Enter the old password to change" onkeyup="passVal()">
            <span id="old-pass-error" class="error-text-prof"></span>
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" id="new_password" placeholder="Enter the New password" onkeyup="newPassVal()">
            <span id="new-pass-error" class="error-text-prof"></span>
            <label for="new_confirm_password">Confirm Password</label>
            <input type="password" name="new_confirm_password" id="new_confirm_password" placeholder="Enter the Password again" onkeyup="newConfirmPassVal()">
            <span id="new-confirm-pass-error" class="error-text-prof"></span>
            <div style=" display:flex;">
                <button type="submit" onclick="changeUserData()" style=" margin-right:20px;">Update</button>
            </div>
        </form>
        </div>
    </section>
    <section class="footer-section">
        <?php include '../templates/footer.php' ?>
    </section> 
    <script src="../js/profile.js"></script>
</body>
</html>