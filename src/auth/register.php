<?php 
    session_start();
    include '../../resources/db.php';
 
    $username= $_POST['username'];
    $password= $_POST['password'];
    $db = new Db();
    $result = $db->login($username,$password);

    if(sizeof($result)==1){
    
        foreach($result as $value){
    
            $user_id = $value['user_id'];
            $_SESSION['user_id'] = $user_id;
            
        }
        echo json_encode("success");
    }else{
        echo json_encode("invalid username or password");
    }

?>