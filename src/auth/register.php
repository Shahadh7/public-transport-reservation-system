<?php 
    include '../../resources/db.php';
 
    $username= $_POST['username'];
    $password= $_POST['password'];
    $db = new Db();
    $status = $db->login($username,$password);
    if(count($status) > 0){
        echo json_encode("success");
    }else {
        echo json_encode("invalid username or password");
    }
    
?>