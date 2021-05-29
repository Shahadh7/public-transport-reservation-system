<?php 
    session_start();

    include '../../resources/db.php';

    $message_id = $_POST['message_id'];
    $type = $_SESSION['type'];

    if($type == "admin") {
        $db = new Db();
        $result = $db->deleteMessage($message_id);
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>