<?php 
    session_start();

    include '../../resources/db.php';

    $pricing_id = $_POST['pricing_id'];
    $type = $_SESSION['type'];

    if($type == "admin") {
        $db = new Db();
        $result = $db->deletePricing($pricing_id);
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>