<?php 
    session_start();

    include '../../resources/db.php';

    $name = $_POST['name'];
    $vehtype = $_POST['type'];
    $locationFrom = $_POST['locationFrom'];
    $locationTo = $_POST['locationTo'];
    $owner = $_POST['owner'];
    $seatCount = $_POST['seatCount'];
    $numPlate = $_POST['numPlate'];

    $type = $_SESSION['type'];

    if($type == "admin") {
        $db = new Db();
        $result = $db->addVehicle($name,$vehtype,$locationFrom,$locationTo,$owner,$seatCount,$numPlate);
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>