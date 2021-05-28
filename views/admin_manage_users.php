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
    <body onload="getAllUsers()">
        <section class="header-section">
            <?php include '../templates/admin-header.php' ?>
        </section>
        <section class="admin-content-section">
            <div class="side-bar">
            <?php include '../templates/side-bar.php' ?>
            </div>
            <div class="content-view">
                <h1> Manage Users</h1>
                <div class="div-container">
                    <div class="search-div">
                        <input type="search" name="search" id="search-users" placeholder="Search users by name">
                    </div>    
                    <table id="admin-table-users">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>NIC</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody id="users-table-body">
                            <!-- <tr>
                                <td>Shahadh</td>
                                <td>941162304V</td>
                                <td>
                                    <img src="../images/pencil.png" alt="edit-icon" class="operation-icons" >
                                    <img src="../images/delete.png" alt="trash-icon" class="operation-icons" onclick="deleteItem()">
                                </td>
                            </tr> -->
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </section>
        <section class="footer-section">
            <?php include '../templates/footer.php' ?>
        </section> 
        <script src="../js/manage-users.js"></script>
    </body>
</html>

<?php } else {
 header("Location: admin_login.php");   
}?>