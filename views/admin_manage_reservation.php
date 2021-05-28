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
    <body>
        <section class="header-section">
            <?php include '../templates/admin-header.php' ?>
        </section>
        <section class="admin-content-section">
            <div class="side-bar">
            <?php include '../templates/side-bar.php' ?>
            </div>
            <div class="content-view">
                <h1> Manage Reservation</h1>
                <div class="div-container">
                    <table  class="table-data" id="admin-table-transport">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Travel Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Time</th>
                                <th>No of Seats Reserved</th>
                                <th>Paid Amount</th>
                                <th>Travel Type</th>
                                <th>Vehicle Name</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody id="reservation-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="footer-section">
            <?php include '../templates/footer.php' ?>
        </section> 
    </body>
</html>

<?php } else {
 header("Location: admin_login.php");   
}?>