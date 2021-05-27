<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section class="header-section">
        <?php include '../templates/header.php' ?>
    </section>
    <section class="content-section">
        <form action="" method="post">
            <input type="text" name="username" id="username">
            <input type="text" name="password" id="password">
            <button type="submit" onclick="login()">login</button>
        </form>
    </section>
    <section class="footer-section">
        <?php include '../templates/footer.php' ?>
    </section> 
    <script src="../js/auth.js"></script>
</body>
</html>