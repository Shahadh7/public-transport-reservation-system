<?php 
    session_start();

    include '../../resources/db.php';

    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $nic = $_POST['nic'];
    $type = $_SESSION['type'];

    if($type == "admin") {
        $db = new Db();
        $result = $db->updateUser($user_id,$username,$nic);
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>