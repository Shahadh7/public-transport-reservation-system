<?php 
    include '../../resources/db.php';

    $name= $_POST['name'];
    $email = $_POST['email'];
    $message= $_POST['message'];

    $db = new Db();
    $result = $db->submitContactForm($name,$email,$message);
    echo json_encode($result);
?>