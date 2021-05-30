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
    <body onload="getAllUsers()" class="bg8">
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
                        <input type="search" name="search" id="search-users" placeholder="Search users by name" onkeyup="searchUser()">
                    </div>    
                    <table class="table-data" id="admin-table-users">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>NIC</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody id="users-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="user-edit-popup" class="popup-modal">
                <div class="popup-modal-content">
                    <span class="close" onclick="closePopup()">&times;</span>
                    <div class="edit-div">
                        <h1>Edit User</h1>
                        <form action="" id="users-edit">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username">
                            <label for="user-nic">NIC</label>
                            <input type="text" name="user-nic" id="user-nic">
                            <button type="submit" onclick="updateEditedValues()">Update</button>
                        </form>
                    </div>
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