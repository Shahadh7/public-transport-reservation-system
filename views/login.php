<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign In</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="bg7">
        <section class="header-section">
            <?php include '../templates/header.php' ?>
        </section>
        <section class="content-section">
        <h1 class="main-header">Sign In</h1>
            <div class="user-login">
                <div class="login-form">
                    <form action="" method="post">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                        <div style=" display:flex;">
                            <button type="submit" onclick="login()" style=" margin-right:20px;">login</button>
                            <p><a class="have-acc" href="../views/signup.php">Don't have an account? Get Started</a></p>
                        </div>
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