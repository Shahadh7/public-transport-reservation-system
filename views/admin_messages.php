<?php session_start();?>
<?php if (isset($_SESSION['user_id']) && isset($_SESSION['type'])) {?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body onload="getAllMessages()">
        <section class="header-section">
            <?php include '../templates/admin-header.php' ?>
        </section>
        <section class="admin-content-section">
            <div class="side-bar">
            <?php include '../templates/side-bar.php' ?>
            </div>
            <div class="content-view">
                <h1> Messages</h1>
                <div class="div-container">
                    <table class="table-data" id="admin-table-message">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody id="message-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="footer-section">
            <?php include '../templates/footer.php' ?>
        </section> 
        <script src="../js/messages.js"></script>
    </body>
</html>

<?php } else {
 header("Location: admin_login.php");   
}?>