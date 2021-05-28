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
    <body onload="getAllPricing()">
        <section class="header-section">
            <?php include '../templates/admin-header.php' ?>
        </section>
        <section class="admin-content-section">
            <div class="side-bar">
            <?php include '../templates/side-bar.php' ?>
            </div>
            <div class="content-view">
                <h1> Manage Pricing</h1>
                <div class="div-container">
                    <table  class="table-data" id="admin-table-transport">
                        <thead>
                            <tr>
                                <th>Vehicle Name</th>
                                <th>Price</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody id="pricing-table-body">
                        </tbody>
                    </table>
                    <button class="add-new-btn" onclick="openAddPopUp()"> Add New</button>
                </div>
            </div>
            <div id="pricing-add-popup" class="popup-modal">
                <div class="popup-modal-content">
                    <span class="close" onclick="closeAddPopup()">&times;</span>
                    <div class="edit-div">
                        <h1>Add Pricing</h1>
                        <form action="" id="pricing-add">
                            <label for="vehicle-name">Vehicle Name</label>
                            <select name="vehicle-name" id="vehicle-name">
                            </select>
                            <label for="pricing">Price (LKR)</label>
                            <input type="text" name="pricing" id="pricing">
                            <button type="submit" onclick="addPricing()">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-section">
            <?php include '../templates/footer.php' ?>
        </section>
        <script src="../js/manage-pricing.js"></script> 
    </body>
</html>

<?php } else {
 header("Location: admin_login.php");   
}?>