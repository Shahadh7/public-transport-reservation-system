<?php 
    session_start();

    include '../../resources/db.php';

    $reservation_id = $_POST['reservation_id'];
    $type = $_SESSION['type'];

    if($type == "admin") {
        $db = new Db();
        $result = $db->deleteReservation($reservation_id);
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>