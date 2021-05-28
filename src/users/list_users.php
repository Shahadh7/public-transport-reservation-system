<?php 
    session_start();
    include '../../resources/db.php';

    $type = $_SESSION['type'];

    if($type == "admin") {
        $db = new Db();
        $result = $db->getUsers();
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>