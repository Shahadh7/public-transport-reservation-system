<?php 
    session_start();
    include '../../resources/db.php';
 
    $username= $_POST['username'];
    $password= $_POST['password'];
    $is_admin= $_POST['is_admin'];
    $db = new Db();

    if($is_admin == "true") {
        $result = $db->adminLogin($username,$password);
        if(sizeof($result)==1){
        
            foreach($result as $value){
                $user_id = $value['user_id'];
                $type = $value['type'];
                $_SESSION['user_id'] = $user_id;
                $_SESSION['type'] = $type;
            }
            echo json_encode("success!");
        }else{
            echo json_encode("invalid username or password");
        }
    } else {

        $result = $db->login($username,$password);
        if(sizeof($result)==1){
        
            foreach($result as $value){
        
                $user_id = $value['user_id'];
                $username = $value['username'];
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                
            }
            echo json_encode("success");
        }else{
            echo json_encode("invalid username or password");
        }

    }

?>