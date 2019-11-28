<?php
    $action = $_POST['action'];
    if($action=='Logout'){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        echo "Logged out";
    }
?>