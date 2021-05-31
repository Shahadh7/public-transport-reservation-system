<?php 
    session_start();

    include '../../resources/db.php';

    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $nic = $_POST['nic'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $type = $_SESSION['type'];

    if($type == "admin") {
        if($email == "") {
            $email = NULL;
        }
        if($phone == "") {
            $phone = NULL;
        }
        $db = new Db();
        $result = $db->updateUser($user_id,$username,$nic,$email,$phone);
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>