<?php 
    session_start();

    include '../../resources/db.php';

    $vehicle_id = $_POST['vehicle_id'];
    $type = $_SESSION['type'];

    if($type == "admin") {
        $db = new Db();
        $result = $db->deleteVehicle($vehicle_id);
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>