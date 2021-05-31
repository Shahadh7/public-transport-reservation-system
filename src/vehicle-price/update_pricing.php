<?php 
    session_start();

    include '../../resources/db.php';

    $pricingId = $_POST['pricingId'];
    $price = $_POST['price'];
    $type = $_SESSION['type'];

    if($type == "admin") {
        $db = new Db();
        $result = $db->updatePricing($pricingId,$price);
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>