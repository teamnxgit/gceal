<?php
    require_once('class_mysql.php');

    $db=new Mysql('site');

    $user_name=$_POST['username'];
    $username=$db->escape_string($user_name);

    $password=$_POST['password'];
    $hash=hash('sha256', $password);

    
    $sql_query="SELECT * FROM user WHERE username='".$username."' AND password_hash='".$hash."' AND status='Active'";
    $sql_result=$db->select_query($sql_query);

    if(mysqli_num_rows($sql_result)==1){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        while($row = $sql_result->fetch_assoc()){
            $_SESSION['user_name']=$row['username'];
            $_SESSION['user_role']=$row['role'];
            $_SESSION['permission_post']=$row['permission_post'];
            $_SESSION['permission_config']=$row['permission_config'];
            $_SESSION['permission_user']=$row['permission_user'];
            $_SESSION['permission_layout']=$row['permission_layout'];
        }
        echo "logged in";
    }
    else{
        echo "Incorrect Username or Password!";
    }

?>