<?php 
    session_start();
    include '../../resources/db.php';

    $db = new Db();
    $result = $db->getAllPricingInfo();
    echo json_encode($result);
?>