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
    <body onload="getCounts()">
        <section class="header-section">
            <?php include '../templates/admin-header.php' ?>
        </section>
        <section class="admin-content-section">
            <div class="side-bar">
            <?php include '../templates/side-bar.php' ?>
            </div>
            <div class="content-view">
                <h1> Hello! Welcome Admin</h1>
                <div class="admin-statistics">
                    <div class="stat-card">
                        <div class="card-container">
                            <h2><b>Total Registered Users</b></h2> 
                            <p id="users-count"></p> 
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="card-container">
                            <h2><b>Total Reservations</b></h2> 
                            <p id="reserve-count"></p> 
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="card-container">
                            <h2><b>Total Registered Vehicles</b></h2> 
                            <p id="vehicle-count"></p> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-section">
            <?php include '../templates/footer.php' ?>
        </section>
        <script src="../js/admin.js"></script> 
    </body>
</html>

<?php } else {
 header("Location: admin_login.php");   
}?>