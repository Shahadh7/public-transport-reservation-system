<?php 
    session_start();

    include '../../resources/db.php';

    $user_id = $_POST['user_id'];
    $type = $_SESSION['type'];

    if($type == "admin") {
        $db = new Db();
        $result = $db->deleteUser($user_id);
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>