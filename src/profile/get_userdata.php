<?php 
    session_start();

    include '../../resources/db.php';

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $db = new Db();
        $result = $db->getUserData($user_id);
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>