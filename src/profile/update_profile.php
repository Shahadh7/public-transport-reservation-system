<?php 
    session_start();

    include '../../resources/db.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if($phone == "") {
        $phone = NULL;
    }

    if($email == "") {
        $email = NULL;
    }

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        if($password != "") {
            $db = new Db();
            $result = $db->updateUserDataWithNewPassword($username,$password,$email,$phone,$user_id);
            echo json_encode($result);
        }else {
            $db = new Db();
            $result = $db->updateUserDataWithoutNewPassword($username,$email,$phone,$user_id);
            echo json_encode($result);
        }
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>