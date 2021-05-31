<?php 
    session_start();

    include '../../resources/db.php';

    $price = $_POST['price'];
    $vehicle_id = $_POST['vehicleId'];

    $type = $_SESSION['type'];

    if($type == "admin") {
        $db = new Db();
        $result = $db->addNewPricing($vehicle_id,$price);
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>