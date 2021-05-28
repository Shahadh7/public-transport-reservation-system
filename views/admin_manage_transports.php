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
    <body onload="getAllVehicles()">
        <section class="header-section">
            <?php include '../templates/admin-header.php' ?>
        </section>
        <section class="admin-content-section">
            <div class="side-bar">
            <?php include '../templates/side-bar.php' ?>
            </div>
            <div class="content-view">
                <h1> Manage Transport Vehicles</h1>
                <div class="div-container">
                    <table  class="table-data" id="admin-table-transport">
                        <thead>
                            <tr>
                                <th>Vehicle Name</th>
                                <th>Vehicle Type</th>
                                <th>Location From</th>
                                <th>Location To</th>
                                <th>Owner</th>
                                <th>Seat Count</th>
                                <th>Number Plate</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody id="transport-table-body">
                        </tbody>
                    </table>
                    <button class="add-new-btn" onclick="openAddPopUp()"> Add New</button>
                </div>
            </div>
            <div id="trans-edit-popup" class="popup-modal">
                <div class="popup-modal-content">
                    <span class="close" onclick="closePopup()">&times;</span>
                    <div class="edit-div">
                        <h1>Edit Transport Vehicle</h1>
                        <form action="" id="users-edit">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name">
                            <label for="vehicle-type">Vehicle Type</label>
                            <select name="vehicle-type" id="vehicle-type">
                                <option value="Bus">Bus</option>
                                <option value="Train">Train</option>
                            </select>
                            <label for="location-from">Location From</label>
                            <select name="location-from" id="location-from">
                                <option value="Colombo">Colombo</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Matara">Matara</option>
                                <option value="Gampola">Gampola</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Katugastota">Katugastota</option>
                            </select>
                            <label for="location-to">Location To</label>
                            <select name="location-to" id="location-to">
                                <option value="Colombo">Colombo</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Matara">Matara</option>
                                <option value="Gampola">Gampola</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Katugastota">Katugastota</option>
                            </select>
                            <label for="owner">Owner</label>
                            <input type="text" name="owner" id="owner">
                            <label for="seat-count">Seat Count</label>
                            <input type="text" name="seat-count" id="seat-count">
                            <label for="num-plate">Number Plate</label>
                            <input type="text" name="num-plate" id="num-plate">
                            <button type="submit" onclick="updateEditedValues()">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="trans-add-popup" class="popup-modal">
                <div class="popup-modal-content">
                    <span class="close" onclick="closePopup2()">&times;</span>
                    <div class="edit-div">
                        <h1>Add Transport Vehicle</h1>
                        <form action="" id="users-edit">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name2">
                            <label for="vehicle-type">Vehicle Type</label>
                            <select name="vehicle-type" id="vehicle-type2">
                                <option value="Bus">Bus</option>
                                <option value="Train">Train</option>
                            </select>
                            <label for="location-from">Location From</label>
                            <select name="location-from" id="location-from2">
                                <option value="Colombo">Colombo</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Matara">Matara</option>
                                <option value="Gampola">Gampola</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Katugastota">Katugastota</option>
                            </select>
                            <label for="location-to">Location To</label>
                            <select name="location-to" id="location-to2">
                                <option value="Colombo">Colombo</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Matara">Matara</option>
                                <option value="Gampola">Gampola</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Katugastota">Katugastota</option>
                            </select>
                            <label for="owner">Owner</label>
                            <input type="text" name="owner" id="owner2">
                            <label for="seat-count">Seat Count</label>
                            <input type="text" name="seat-count" id="seat-count2">
                            <label for="num-plate">Number Plate</label>
                            <input type="text" name="num-plate" id="num-plate2">
                            <button type="submit" onclick="addNewVehicle()">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-section">
            <?php include '../templates/footer.php' ?>
        </section> 
        <script src="../js/manage-transport-vehciles.js"></script>
    </body>
</html>

<?php } else {
 header("Location: admin_login.php");   
}?>