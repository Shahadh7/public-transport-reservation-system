<?php 
    session_start();

    include '../../resources/db.php';

    $search_text = $_POST['search_text'];
    $type = $_SESSION['type'];

    if($type == "admin") {
        $db = new Db();
        $result = $db->searchUser($search_text);
        echo json_encode($result);
    } else {
        echo json_encode("you are not allowed to access this resource!");
    }

?>