<?php 
    include '../../resources/db.php';

    $username= $_POST['username'];
    $nic = $_POST['nic'];
    $password= $_POST['password'];

    $db = new Db();
    $result = $db->registerUser($username,$nic,$password);
    echo json_encode($result);
?>